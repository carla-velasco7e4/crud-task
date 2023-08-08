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
        $typeToEdit = $item;
        break;
    }
}

if (!$typeToEdit) {
    echo "type not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the type in the session
    $title = $_POST['title'];


    foreach ($_SESSION["types"] as &$item) {
        if ($item['id'] == $typeId) {
            $item['title'] = $title;
            break;
        }
    }

    header("Location: create.php"); // Redirect back to the type list
    exit();
}
?>

<a href="index.php">logout</a><br><br>
<a href="../create.php">task list</a>


<h1>Edit</h1>
<form action="edit.php?id=<?= $typeId; ?>" method="post">
    <input type="hidden" name="id" value="<?= $typeToEdit['id']; ?>">

    <label for="title">Title:</label>
    <input type="text" name="title" value="<?= $typeToEdit['title']; ?>"><br><br>

    <!-- Display other input fields for editing -->
    <button type="submit">Update type</button>
</form>
