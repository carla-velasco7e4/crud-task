<?php include '../views/components/menu.php';?>

<?php if($_SESSION['isAdmin'] === true) { ?>

<h1>Create task</h1>
<form action="../../FormDispatcher.php" method="post">

    <input type="hidden" name="c" value="task">
    <input type="hidden" name="m" value="store">

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

    <input type="submit" name="save">Add Todo</input>
</form>