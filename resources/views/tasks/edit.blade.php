<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <header class="header">
        <h1>Edit Task</h1>
    </header>

    <main class="container">
        <form action="{{ route('tasks.update', $task->id, false) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="task_name"
                   value="{{ $task->task_name }}" required>

            <input type="text" name="description"
                   value="{{ $task->description }}">

            <select name="status">
                <option value="Pending" @selected($task->status === 'Pending')>Pending</option>
                <option value="Ongoing" @selected($task->status === 'Ongoing')>Ongoing</option>
                <option value="Completed" @selected($task->status === 'Completed')>Completed</option>
            </select>

            <input type="date" name="due_date"
                   value="{{ $task->due_date }}">

            <button type="submit">Update Task</button>
        </form>

        <a href="{{ route('tasks.index', [], false) }}">Back to Tasks</a>
    </main>

</body>
</html>