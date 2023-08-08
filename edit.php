<?php
session_start();

// Get the task ID from the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
} else {
    echo "Task ID not provided.";
    exit();
}

// Find the task based on the task ID
$taskToEdit = null;
foreach ($_SESSION["tasks"] as $item) {
    if ($item['id'] == $taskId) {
        $taskToEdit = $item;
        break;
    }
}

if (!$taskToEdit) {
    echo "Task not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the task in the session
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $assignedTo = $_POST['assignedTo'];
    $type = $_POST['type'];

    foreach ($_SESSION["tasks"] as &$item) {
        if ($item['id'] == $taskId) {
            $item['title'] = $title;
            $item['description'] = $description;
            $item['status'] = $status;
            $item['assignedTo'] = $assignedTo;
            $item['type'] = $type;
            $item['lastUpdated'] = date('Y-m-d H:i:s');
            break;
        }
    }

    header("Location: index.php"); // Redirect back to the task list
    exit();
}
?>

<form action="edit.php?id=<?= $taskId; ?>" method="post">
    <input type="hidden" name="id" value="<?= $taskToEdit['id']; ?>">

    <label for="title">Title:</label>
    <input type="text" name="title" value="<?= $taskToEdit['title']; ?>"><br><br>

    <label for="description">Description:</label>
    <textarea name="description" required><?= $taskToEdit['description']; ?></textarea><br><br>


    <label for="status">Status:</label>
    <select name="status" required>
        <option <?= $taskToEdit['status'] == "Not Started" ? "selected" : "" ; ?> value="Not Started">Not Started</option>
        <option <?= $taskToEdit['status'] == "In Progress" ? "selected" : "" ; ?> value="In Progress">In Progress</option>
        <option <?= $taskToEdit['status'] == "Done" ? "selected" : "" ; ?> value="Done">Done</option>
    </select><br><br>

    <label for="assignedTo">Assigned To:</label>
    <input type="text" name="assignedTo" required value="<?= $taskToEdit['assignedTo']; ?>"><br><br>

    <label for="type">Type:</label>
    <select name="type">
        <option <?= $taskToEdit['type'] == "PHP" ? "selected" : "" ; ?> value="PHP">PHP</option>
        <option <?= $taskToEdit['type'] == "Frontend" ? "selected" : "" ; ?> value="Frontend">Frontend</option>
        <option <?= $taskToEdit['type'] == "Logistics" ? "selected" : "" ; ?> value="Logistic">Logistic</option>
    </select><br><br>

    <!-- Display other input fields for editing -->
    <button type="submit">Update Task</button>
</form>
