<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .success {
            background-color: #d1fae5;
            padding: 10px;
            margin-bottom: 15px;
        }

        .edit {
            color: blue;
        }

        .delete {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/tasks/create" class="add-button">
        + Add Task
    </a>

    @if($tasks->count() > 0)

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)

                    <tr>

                        <td>{{ $task->id }}</td>

                        <td>{{ $task->task_name }}</td>

                        <td>{{ $task->description }}</td>

                        <td>{{ $task->status }}</td>

                        <td>
                            {{ $task->due_date ?? 'No deadline' }}
                        </td>

                        <td>

                            <a
                                href="/tasks/{{ $task->id }}/edit"
                                class="edit">
                                Edit
                            </a>

                            <form
                                 action="/tasks/{{ $task->id }}"

                                method="POST"
                                style="display:inline;">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete"
                                    onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No tasks available yet.</p>

    @endif

</div>

</body>
</html>