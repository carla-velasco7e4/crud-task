<?php
session_start();

// Get the type ID from the URL
if (isset($_GET['id'])) {
    $typeId = $_GET['id'];
} else {
    echo "type ID not provided.";
    exit();
}

// Find the type based on the type ID
$typeToEdit = null;
foreach ($_SESSION["types"] as $item) {
    if ($item['id'] == $typeId) {
        $typeToDelete = $item;
        break;
    }
}

if (!$typeToDelete) {
    echo "type not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_SESSION["types"] as $index => $item) {
        if ($item['id'] == $typeId) {
            unset($_SESSION["types"][$index]);
            break;
        }
    }
    header("Location: create.php");
    exit();
}
?>

<a href="index.php">logout</a><br><br>
<a href="../create.php">task list</a>


<h1>Delete</h1>
<p>Do you want to delete this type?</p>
<a href="create.php">No</a><br>
<form action="delete.php?id=<?= $typeId; ?>" method="post">
    <input type="hidden" name="id" value="<?= $typeToEdit['id']; ?>">
    <button type="submit">Yes</button>
</form>

<div style="border: 2px solid green; padding: 10px; margin: 15px; display: inline-block;">
    Id: <?= $typeToDelete['id'] ?><br>
    Title: <?= $typeToDelete['title'] ?><br>
</div>

<br><br>

