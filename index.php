<?php
session_start();
unset($_SESSION["isAdmin"]);
//session_unset();

//check the request method (to see if the form has been sended)


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //setting admin
    if (isset($_POST['isAdmin']) && ($_POST['isAdmin'] === 'true' || $_POST['isAdmin'] === 'false')) {
        $_SESSION['isAdmin'] = ($_POST['isAdmin'] === 'true');
    }
    header("Location: create.php");
    exit();
}

?>

<h1>Login</h1>

<form action="" method="post">
    <label>Are you an administrator?:</label><br><br>

    <input type="radio" id="html" name="isAdmin" value="true">
    <label for="true">Yes</label><br>

    <input type="radio" id="css" name="isAdmin" value="false">
    <label for="false">No</label><br><br>

    <button type="submit">Submit</button>
</form>