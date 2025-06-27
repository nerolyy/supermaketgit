<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$errors = [];

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '@') !== false;
}

function validate_phone($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    return strlen($digits) === 11;
}

if (isset($_POST['add'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    if ($first_name === '' || $last_name === '') {
        $errors[] = "Имя и фамилия обязательны.";
    }
    if (!validate_email($email)) {
        $errors[] = "Введите корректный email с символом '@'.";
    }
    if (!validate_phone($phone)) {
        $errors[] = "Номер телефона должен содержать ровно 11 цифр.";
    }
    if ($role === '') {
        $errors[] = "Выберите роль пользователя.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, email, address, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $first_name, $last_name, $phone, $email, $address, $role);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_POST['edit'])) {
    $id = (int)$_POST['id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    if ($first_name === '' || $last_name === '') {
        $errors[] = "Имя и фамилия обязательны.";
    }
    if (!validate_email($email)) {
        $errors[] = "Введите корректный email с символом '@'.";
    }
    if (!validate_phone($phone)) {
        $errors[] = "Номер телефона должен содержать ровно 11 цифр.";
    }
    if ($role === '') {
        $errors[] = "Выберите роль пользователя.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, phone=?, email=?, address=?, role=? WHERE id=?");
        $stmt->bind_param("ssssssi", $first_name, $last_name, $phone, $email, $address, $role, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$query = "SELECT * FROM view_all_users ORDER BY id ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
    <link rel="stylesheet" href="view_all_user.css">
</head>
<body>
    <div class="top-links">
        <a href="admin_lk.php" class="btn-nav">← Назад в панель</a>
        <a href="mainpage.php" class="btn-nav">На главную</a>
    </div>

    <h2>Все пользователи</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" class="add-form">
        <input type="text" name="first_name" placeholder="Имя" required value="<?= isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '' ?>">
        <input type="text" name="last_name" placeholder="Фамилия" required value="<?= isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '' ?>">
        <input 
          type="tel" 
          name="phone" 
          placeholder="Телефон" 
          pattern="\d{11}" 
          title="Введите ровно 11 цифр" 
          oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
          required 
          value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>"
        >
        <input type="email" name="email" placeholder="Email" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        <input type="text" name="address" placeholder="Адрес" value="<?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?>">
        <select name="role" required>
            <option value="" disabled <?= !isset($_POST['role']) ? 'selected' : '' ?>>Роль</option>
            <option value="user" <?= (isset($_POST['role']) && $_POST['role'] === 'user') ? 'selected' : '' ?>>Пользователь</option>
            <option value="admin" <?= (isset($_POST['role']) && $_POST['role'] === 'admin') ? 'selected' : '' ?>>Админ</option>
        </select>
        <button type="submit" name="add" class="btn-add">Добавить</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Адрес</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td>
                        <form method="post" class="inline-edit" style="margin:0;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>" required>
                    </td>
                    <td>
                            <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>" required>
                    </td>
                    <td>
                            <input 
                              type="tel" 
                              name="phone" 
                              value="<?= htmlspecialchars($row['phone']) ?>" 
                              pattern="\d{11}" 
                              title="Введите ровно 11 цифр"
                              oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            >
                    </td>
                    <td>
                            <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
                    </td>
                    <td>
                            <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>">
                    </td>
                    <td>
                            <select name="role" required>
                                <option value="user" <?= $row['role'] === 'user' ? 'selected' : '' ?>>Пользователь</option>
                                <option value="admin" <?= $row['role'] === 'admin' ? 'selected' : '' ?>>Админ</option>
                            </select>
                    </td>
                    <td>
                            <button type="submit" name="edit" class="btn-save">Сохранить</button>
                        </form>
                        <form method="get" style="display:inline; margin:0;">
                            <input type="hidden" name="delete" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn-delete" onclick="return confirm('Удалить пользователя?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
