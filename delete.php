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
        $taskToDelete = $item;
        break;
    }
}

if (!$taskToDelete) {
    echo "Task not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_SESSION["tasks"] as $index => $item) {
        if ($item['id'] == $taskId) {
            unset($_SESSION["tasks"][$index]);
            break;
        }
    }
    header("Location: index.php"); // Redirigir de vuelta a la lista de tareas
    exit();
}
?>

<p>Do you want to delete this task?</p>
<a href="index.php">NO</a>
<form action="delete.php?id=<?= $taskId; ?>" method="post">
    <input type="hidden" name="id" value="<?= $taskToEdit['id']; ?>">
    <button type="submit">Yes</button>
</form>

<div style="border: 2px solid green; padding: 10px; margin: 15px; display: inline-block;">
    Id: <?= $taskToDelete['id'] ?><br>
    Title: <?= $taskToDelete['title'] ?><br>
    Description: <?= $taskToDelete['description'] ?><br>
    Status: <?= $taskToDelete['status'] ?><br>
    Assigned To: <?= $taskToDelete['assignedTo'] ?><br>
    Type: <?= $taskToDelete['type'] ?><br>
    Created At: <?= $taskToDelete['createdAt'] ?><br>
    Last Updated: <?= $taskToDelete['lastUpdated'] ?><br>
</div>

<br><br>

