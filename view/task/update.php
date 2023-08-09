<?php include '../views/components/menu.php';?>
<?php session_start() ?>

<?php if($_SESSION['isAdmin'] === true) { ?>

<form action="../../FormDispatcher.php" method="post">

    <input type="hidden" name="c" value="task">
    <input type="hidden" name="m" value="update">

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
        <?php
        foreach ($_SESSION["types"] as $index => $item) {
            echo "<option " . ($taskToEdit['type'] == $item['title'] ? "selected" : "") . " value='" . $item['title'] . "'>" . $item['title'] . "</option>";
        }
        ?>

        <?= $taskToEdit['status'] == "Done" ? "selected" : "" ; ?>
    </select>

    <!-- Display other input fields for editing -->
    <input type="submit" name="save">Add Todo</input>
</form>