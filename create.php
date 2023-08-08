<?php
session_start();

if (!isset($_SESSION['taskCounter'])) {
    $_SESSION['taskCounter'] = 1;
}

// when you click the create data you call this funciton
function create($title, $description, $status, $assignedTo, $type) {

    //creating id for the task
    $id = $_SESSION['taskCounter'];
    $_SESSION['taskCounter']++;

    //creating an associative array for the task
    $inputForm = [
        "id" => $id,
        "title" => $title,
        "description" => $description,
        "status" => $status,
        "assignedTo" => $assignedTo,
        "type" => $type,
        'createdAt' => date('Y-m-d H:i:s'),
        'lastUpdated' => date('Y-m-d H:i:s')
    ];

    //saving the task in session
    $_SESSION["tasks"][] = $inputForm;
}

?>

<a href="index.php">logout</a><br><br>

<?php if($_SESSION['isAdmin'] === true) { ?>
    <a href="./type/create.php">types list</a>

    <h1>Create task</h1>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br><br>


        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select><br><br>

        <label for="assignedTo">Assigned To:</label>
        <input type="text" name="assignedTo" required><br><br>

        <label for="type">Type:</label>
        <select name="type">
        <?php
            foreach ($_SESSION["types"] as $index => $item) {
                echo "<option value=". $item['title'] . ">" . $item['title'] . "</option>";
            }
        ?>
        </select>

        <br><br>

        <button type="submit">Add Todo</button>
    </form><br>

<?php } ?>

<h1>All tasks</h1>
<div style="display: flex; flex-wrap: wrap;">
    <?php
    //if we have tasks in session we make a for-each of them
    if (isset($_SESSION["tasks"])) {
        foreach ($_SESSION["tasks"] as $index => $item) {
            echo '<div style="border: 2px solid green; padding: 10px; margin: 15px;">';
            echo "Id: " . $item['id'] . "<br>";
            echo "Title: " . $item['title'] . "<br>";
            echo "Description: " . $item['description'] . "<br>";
            echo "Status: " . $item['status'] . "<br>";
            echo "Assigned To: " . $item['assignedTo'] . "<br>";
            echo "Type: " . $item['type'] . "<br>";
            echo "Created At: " . $item['createdAt'] . "<br>";
            echo "Last Updated: " . $item['lastUpdated'] . "<br>";
            if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] === true) {
                echo '<a href="edit.php?id=' . $item['id'] . '">Edit</a><br>';
                echo '<a href="delete.php?id=' . $item['id'] . '">Delete</a><br>';
            }
            echo '</div>';
        }
    }
    ?>
</div>