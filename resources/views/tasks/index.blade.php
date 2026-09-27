<!DOCTYPE html>
<html>
<head>
    <title>My Task Manager</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <header class="header">
        <h1>My Task Manager</h1>
    </header>

    <main class="container">
        <form action="{{ route('tasks.store', [], false) }}" method="POST">
            @csrf

            <input type="text" name="task_name"
                   placeholder="Task name" required>

            <input type="text" name="description"
                   placeholder="Description">

            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>

            <input type="date" name="due_date">

            <button type="submit">Add Task</button>
        </form>

        <h2>My Tasks</h2>

        @foreach ($tasks as $task)
            <div class="task-row">
                <div>
                    <h3>{{ $task->task_name }}</h3>
                    <p>{{ $task->description }}</p>
                </div>
                <p>{{ $task->status }}</p>
                <p>{{ $task->due_date }}</p>

                <div class="actions">
                    <a class="edit-button" href="{{ route('tasks.edit', $task->id, false) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id, false) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </main>

</body>
</html>