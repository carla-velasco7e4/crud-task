<?php
session_start();
//session_unset();

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

//check the request method (to see if the form has been sended)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $assignedTo = $_POST['assignedTo'];
    $type = $_POST['type'];

    //setting admin
    if (isset($_POST['isAdmin']) && ($_POST['isAdmin'] === 'true' || $_POST['isAdmin'] === 'false')) {
        $_SESSION['isAdmin'] = ($_POST['isAdmin'] === 'true');
    }
    //creating a new todo item
    create($title, $description, $status, $assignedTo, $type);
}

?>

<h1>New task</h1>
<form action="" method="post">
    <label>Are you an administrator?:</label><br><br>
    <input type="radio" id="html" name="isAdmin" value="true">
    <label for="true">Yes</label><br>
    <input type="radio" id="css" name="isAdmin" value="false">
    <label for="false">No</label><br><br>

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
        <option value="PHP">PHP</option>
        <option value="Frontend">Frontend</option>
        <option value="Logistic">Logistic</option>
    </select><br><br>

    <button type="submit">Add Todo</button>
</form>

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
