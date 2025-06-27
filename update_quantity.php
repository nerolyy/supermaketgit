<?php
session_start();

if (isset($_POST['index'], $_POST['action'])) {
    $index = (int)$_POST['index'];
    if (isset($_SESSION['cart'][$index])) {
        if ($_POST['action'] === 'increase') {
            $_SESSION['cart'][$index]['quantity']++;
        } elseif ($_POST['action'] === 'decrease') {
            $_SESSION['cart'][$index]['quantity']--;
            if ($_SESSION['cart'][$index]['quantity'] <= 0) {
                unset($_SESSION['cart'][$index]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
    }
}

header("Location: cart.php");
exit();
