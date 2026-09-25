<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back {
            margin-left: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    @if($errors->any())

        <div class="error">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form action="/tasks" method="POST">

        @csrf

        <label>Task Name</label>

        <input
            type="text"
            name="task_name"
            placeholder="Enter task name"
            required
        >

        <label>Description</label>

        <textarea
            name="description"
            rows="5"
            placeholder="Enter task description"
        ></textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input
            type="date"
            name="due_date"
        >

        <button type="submit">
            Save Task
        </button>

        <a href="/tasks">Cancel</a>

    </form>

</div>

</body>
</html>