<?php
session_start();

if (!isset($_SESSION['types'])) {
    $_SESSION['typeCounter'] = 1;
}

// when you click the create data you call this funciton
function create($title) {

    $id = $_SESSION['typeCounter'];
    $_SESSION['typeCounter']++;

    //creating an associative array for the type
    $inputForm = [
        "id" => $id,
        "title" => $title,
    ];

    //saving the type in session
    $_SESSION["types"][] = $inputForm;
}


//check the request method (to see if the form has been sended)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    create($title);
}
?>

<a href="index.php">logout</a><br><br>

<?php if($_SESSION['isAdmin'] === true) { ?>
    <a href="../create.php">task list</a>

    <h1>Create type</h1>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>

        <button type="submit">Add type</button>
    </form><br>

<?php } ?>

<h1>All types</h1>
<div style="display: flex; flex-wrap: wrap;">
    <?php
    //if we have types in session we make a for-each of them
    if (isset($_SESSION["types"])) {
        foreach ($_SESSION["types"] as $index => $item) {
            echo '<div style="border: 2px solid green; padding: 10px; margin: 15px;">';
            echo "Id: " . $item['id'] . "<br>";
            echo "Title: " . $item['title'] . "<br>";
            if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] === true) {
                echo '<a href="edit.php?id=' . $item['id'] . '">Edit</a><br>';
                echo '<a href="delete.php?id=' . $item['id'] . '">Delete</a><br>';
            }
            echo '</div>';
        }
    }
    ?>
</div>