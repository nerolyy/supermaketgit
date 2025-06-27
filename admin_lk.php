<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="admin_lk.css">
</head>
<body>
    <h1>Добро пожаловать в админ панель,  <?= htmlspecialchars($_SESSION['first_name']) ?>!</h1>

    <h2>Просмотр данных:</h2>
    <ul>
        <li><a href="view_all_categories.php">Все категории</a></li>
        <li><a href="view_all_orders.php">Все заказы</a></li>
        <li><a href="view_all_products.php">Все товары</a></li>
        <li><a href="view_all_suppliers.php">Все поставщики</a></li>
        <li><a href="view_all_users.php">Все пользователи</a></li>
        <li><a href="view_order_by_user.php">Заказы по пользователю</a></li>
        <li><a href="view_orders_in_period.php">Заказы за период</a></li>
        <li><a href="view_products_expiring_7_days.php">Товары с истекающим сроком (7 дней)</a></li>
        <li><a href="view_products_with_category.php">Товары с названиями категорий</a></li>
        <li><a href="view_suppliers_with_expiring_products_3_day.php">Поставщики с просрочкой</a></li>
    </ul>

    <div class="logout">
    <a href="logout.php">Выйти из аккаунта</a>
    <a href="mainpage.php">На главную</a>
</div>
</body>
</html>
