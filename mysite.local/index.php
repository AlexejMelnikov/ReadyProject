<?php 
  include 'inc/headers.inc.php'; 
  include 'inc/cookie.inc.php';
  // определение имени файла
  define('PATH_LOG', log.".".txt);
  include 'inc/log.inc.php';
  
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    <?= $title ?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="inc/style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">обо всём сразу</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1><?= $header?></h1>
    <!-- Заголовок -->
    <?php 
    
    if($_COOKIE['vizitCounter'] == 0) {
      echo("спасибо что зашли на огонек ! ");
      }
      else {
        echo (" Вы зашли к нам ".$vizitCounter." раз. Последнее посещение было :".date("j-M-Y H:m:s", $_COOKIE['lastVizit']));
      }
    
    ?>
    <!-- Область основного контента -->
    <?php 
      include 'inc/routing.inc.php'; 
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='index.php?id=contact'>Контакты</a>
      </li>
      <li><a href='index.php?id=about'>О нас</a>
      </li>
      <li><a href='index.php?id=info'>Информация</a>
      </li>
      <li><a href='test/index.php'>Он-лайн тест</a>
      </li>
      <li><a href='index.php?id=gbook'>Гостевая книга</a>
      </li>
      <li><a href='eshop/catalog.php'>Магазин</a>
      </li>
      <li><a href='index.php?id=log'>Журнал посещений</a>
      </li>
    </ul>
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер-мега сайт, 2000 &ndash; <?= date('Y')?>
      <!-- Нижняя часть страницы -->
  </div>
</body>

</html>