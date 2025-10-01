<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Статистика
$stats = [
    'total_users' => 0,
    'total_orders' => 0,
    'revenue_total' => 0.0,
    'orders_last_7_days' => 0,
    'new_orders' => 0,
    'products_expiring_7_days' => 0,
    'feedback_last_7_days' => 0,
];

// Всего пользователей
$q1 = $conn->query("SELECT COUNT(*) AS c FROM users");
if ($q1 && ($row = $q1->fetch_assoc())) { $stats['total_users'] = (int)$row['c']; }

// Всего заказов
$q2 = $conn->query("SELECT COUNT(*) AS c FROM orders");
if ($q2 && ($row = $q2->fetch_assoc())) { $stats['total_orders'] = (int)$row['c']; }

// Общая выручка по order_items
$q3 = $conn->query("SELECT COALESCE(SUM(price * quantity), 0) AS sum_amount FROM order_items");
if ($q3 && ($row = $q3->fetch_assoc())) { $stats['revenue_total'] = (float)$row['sum_amount']; }

// Заказы за последние 7 дней
$q4 = $conn->query("SELECT COUNT(*) AS c FROM orders WHERE order_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
if ($q4 && ($row = $q4->fetch_assoc())) { $stats['orders_last_7_days'] = (int)$row['c']; }

// Новые заказы (статус 'Новый')
$q5 = $conn->query("SELECT COUNT(*) AS c FROM orders WHERE status = 'Новый'");
if ($q5 && ($row = $q5->fetch_assoc())) { $stats['new_orders'] = (int)$row['c']; }

// Товары, срок годности истекает в 7 дней
$q6 = $conn->query("SELECT COUNT(*) AS c FROM products WHERE expiration_date IS NOT NULL AND expiration_date <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
if ($q6 && ($row = $q6->fetch_assoc())) { $stats['products_expiring_7_days'] = (int)$row['c']; }

// Обращения за 7 дней
$q7 = $conn->query("SELECT COUNT(*) AS c FROM feedback WHERE submitted_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
if ($q7 && ($row = $q7->fetch_assoc())) { $stats['feedback_last_7_days'] = (int)$row['c']; }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="admin_lk.css">
    <style>
      .stats-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(220px,1fr)); gap: 16px; margin: 16px 0; }
      .stat-card { border: 1px solid #e3e3e3; border-radius: 10px; padding: 16px; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.06); }
      .stat-title { font-size: 14px; color: #666; margin-bottom: 8px; }
      .stat-value { font-size: 24px; font-weight: 700; }
      .stat-sub { font-size: 12px; color: #999; margin-top: 6px; }
    </style>
</head>
<body>
    <h1>Добро пожаловать в админ панель,  <?= htmlspecialchars($_SESSION['first_name']) ?>!</h1>

    <h2>Статистика и мониторинг</h2>
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-title">Пользователи (всего)</div>
        <div class="stat-value"><?= number_format($stats['total_users'], 0, ',', ' ') ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Заказы (всего)</div>
        <div class="stat-value"><?= number_format($stats['total_orders'], 0, ',', ' ') ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Выручка (всего)</div>
        <div class="stat-value"><?= number_format($stats['revenue_total'], 2, ',', ' ') ?> ₽</div>
        <div class="stat-sub">Сумма по позициям заказов</div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Заказы за 7 дней</div>
        <div class="stat-value"><?= number_format($stats['orders_last_7_days'], 0, ',', ' ') ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Новые заказы</div>
        <div class="stat-value"><?= number_format($stats['new_orders'], 0, ',', ' ') ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Срок годности ≤ 7 дней</div>
        <div class="stat-value"><?= number_format($stats['products_expiring_7_days'], 0, ',', ' ') ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-title">Обращения за 7 дней</div>
        <div class="stat-value"><?= number_format($stats['feedback_last_7_days'], 0, ',', ' ') ?></div>
      </div>
    </div>

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
