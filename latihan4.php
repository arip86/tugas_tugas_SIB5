<form method="POST">
    <label for="">Username</label><br>
    <input type="text" name="username" > <br>
    <label for="">Password</label><br>
    <input type="password" name="pass"><br>
    <input type="submit" name="login" value="Login" id="">

</form>

<?php
$username = $_POST ['username'];
$password = $_POST ['pass'];
$login = $_POST ['login'];
if(isset($login)){
    echo 'Hallo'. $username.'<br> dan password Anda '.$password;
}


?>