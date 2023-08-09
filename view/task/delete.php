<?php session_start() ?>


<p>Do you want to delete this task?</p>
<a href="../../index.php">No</a><br>
<form action="../../FormDispatcher.php" method="post">

    <input type="hidden" name="c" value="task">
    <input type="hidden" name="m" value="destroy">

    <input type="hidden" name="id" value="<?= $taskToEdit['id']; ?>">
    <button type="submit">Yes</button>
</form>