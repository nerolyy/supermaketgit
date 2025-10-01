<?php
require_once 'db.php';

$sections = [
  'Готовая еда с курицей' => 18,
  'Готовая еда с говядиной' => 19,
  'Готовая еда с рыбой' => 20
];

$data = [];
foreach ($sections as $title => $categoryId) {
  $stmt = $conn->prepare("SELECT id, name, original_price, image FROM products WHERE category_id = ? ORDER BY id DESC");
  $stmt->bind_param("i", $categoryId);
  $stmt->execute();
  $res = $stmt->get_result();
  while ($row = $res->fetch_assoc()) {
    $data[$title][] = $row;
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Готовая еда</title>
  <link rel="stylesheet" href="chocolate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <header>
    <div class="logo">
      <a href="mainpage.php"><img src="img/logo.png" alt="Логотип" /></a>
      <div class="store-name">DREAM STORE</div>
    </div>
    <nav>
      <div class="menu-links">
        <a href="mainpage.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="discounts.php">Акции</a>
        <a href="feedback.php">Поддержка</a>
        <a href="lk.php">Ваш профиль</a>
      </div>
      <div class="icons">
        <a href="register.php"><img src="img/user.png" alt="Пользователь" /></a>
        <a href="cart.php"><img src="img/buy.png" alt="Корзина" /></a>
      </div>
    </nav>
  </header>

  <main class = content>
  <?php foreach ($data as $title => $items): ?>
    <section class="category-section">
      <div class="category-header"><?= htmlspecialchars($title) ?></div>
      <div class="product-grid">
        <?php if (empty($items)): ?>
          <p style="padding: 12px;">Пока нет товаров в этой категории.</p>
        <?php else: ?>
          <?php foreach ($items as $p): ?>
            <div class="product-card">
              <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="product-image">
              <h3 class="product-title"><?= htmlspecialchars($p['name']) ?></h3>
              <p class="product-price"><?= htmlspecialchars((string)intval($p['original_price'])) ?> ₽</p>
              <form method="post" action="add_to_cart.php">
                <input type="hidden" name="product_name" value="<?= htmlspecialchars($p['name']) ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($p['original_price']) ?>">
                <input type="hidden" name="image" value="<?= htmlspecialchars($p['image']) ?>">
                <button type="submit" class="add-to-cart-button">Добавить в корзину</button>
              </form>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </section>
  <?php endforeach; ?>
</main>

  <footer class="footer">
    <div class="footer-section">
      <h4>Информация</h4>
      <ul>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Блог</a></li>
        <li><a href="#">О нас</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Контакты</h4>
      <p><a href="tel:+79077097914">+7 907 709 7914</a> – Служба поддержки</p>
      <p><a href="#">Магазины</a></p>
      <p>
        <a href="tel:+79077097841">+7 907 709 7841</a> – Онлайн поддержка
        <i class="fab fa-whatsapp"></i>
        <i class="fab fa-telegram"></i>
      </p>
    </div>

    <div class="footer-section">
      <h4>Следите за нами</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-telegram"></i></a>
      </div>

      <h4>Подписка на скидки</h4>
      <div class="subscribe">
        <input type="email" placeholder="Укажите ваш email..." />
        <button><i class="fa-regular fa-paper-plane"></i></button>
      </div>
    </div>
  </footer>
</div>
</body>
</html>
