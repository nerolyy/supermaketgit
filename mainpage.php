<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Супермаркет</title>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="mainpage.css">
</head>
<body>
<header>
  <div class="logo">
    <a href="mainpage.php"><img src="img/logo.png" alt=""/></a>
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
      <a href="register.php"><img src="img/user.png"/></a>
      <a href="cart.php"><img src="img/buy.png"/></a>
    </div>
  </nav>
</header>

<main>
  <section class="banner">
  <div class="banner-slider">
    <img src="img/banner.jpg" class="banner-image" alt="Баннер 1">
    <button class="banner-btn prev">&#10094;</button>
    <button class="banner-btn next">&#10095;</button>
  </div>
</section>

<main>
  <section class="promo-section">
    <h2 class="promo-title">Акции</h2>
    <div class="promo-cards">
      <div class="promo-card">
        <img src="img/summervibe.jpg" alt="">
        <span class="promo-text">Для летнего настроения</span>
      </div>
      <div class="promo-card">
        <img src="img/persik.jpg" alt="">
        <span class="promo-text">Сезон персиков и не только</span>
      </div>
      <div class="promo-card">
        <img src="img/4ereshnya.jpg" alt="">
        <span class="promo-text">Самый сезон черешни</span>
      </div>
    </div>
  </section>

  <section class="categories">
    <div class="category">
      <img src="img/1.jpg" alt="">
      <span>Готовая еда</span>
    </div>
    <div class="category">
      <img src="img/2.jpg" alt="Хлеб и выпечка">
      <span>Хлеб и выпечка</span>
    </div>
    <div class="category">
      <img src="img/3.jpg" alt="Молочка">
      <span>Молоко, сыр, яйца</span>
    </div>
    <div class="category">
      <img src="img/4.jpg" alt="Фрукты">
      <span>Овощи, фрукты, грибы</span>
    </div>
  </section>
</main>

  <section class="about">
    <div class="about-text">
      <h2>О нас</h2>
      <p>
        История нашего супермаркета началась с мечты основателя создать уютное место, где покупатели могли бы приобрести свежие продукты, почувствовать себя комфортно и приятно провести время среди широкого ассортимента качественного товара.    
        <br><br>
        Сначала открылся небольшой магазинчик в спальном районе столицы, но вскоре идея получила отклик и поддержку местных жителей. Это вдохновило команду расширяться: открывались новые магазины, формировалась культура обслуживания, разрабатывались стандарты качества.
        <br><br>
        Сегодня наша сеть представлена несколькими торговыми точками по всей Москве, каждая из которых продолжает бережно хранить семейные ценности сервиса и заботы о покупателях. Мы гордимся своей историей и продолжаем двигаться вперёд, создавая атмосферу тепла и комфорта для каждого гостя!
        «От одного магазина к целой семье близких друзей!»
      </p>
    </div>
    <div class="about-map">
      <iframe src="https://yandex.ru/map-widget/v1/?ll=37.595265%2C55.752285&z=18.97&mode=poi&poi%5Bpoint%5D=37.595265%2C55.752285&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D243624635890"
              frameborder="0" allowfullscreen="true">
      </iframe>
    </div>
  </section>
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
      <a href="tel:+79077097841">+7 907 709 7841</a> – Онлайн служба поддержки 
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

    <h4>Подписывайтесь на скидки</h4>
    <div class="subscribe">
      <input type="email" placeholder="Укажите ваш email..." />
      <button><i class="fa-regular fa-paper-plane"></i></button>
    </div>
  </div>
</footer>
<script src="main.js"></script>
</body>
</html>
