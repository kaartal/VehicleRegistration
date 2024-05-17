<?php
session_start();


if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {

    $_SESSION['logged_in'] = true;
    
    header('Location: main_menu.html');
    exit();
} else {
    
    $_SESSION['login_error'] = 'Invalid username or password';
    header('Location: login_form.html');
    exit();
}
?>
