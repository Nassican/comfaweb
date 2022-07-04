<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/home.css" />
  <title>Confaweb</title>
  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo">Comfamiliar</div>
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>
      <!-- NAVIGATION MENUS -->
      <div class="menu">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="#">Acerca</a></li>
        <li><a href="#">Pricing</a></li>
        <li class="services">
          <a href="#">Servicios</a>
          <!-- DROPDOWN MENU -->
          <ul class="dropdown">
            <li><a href="#"></a></li>
            <li><a href="#">PQRS 1</a></li>
            <li><a href="#">PQRS 2</a></li>
            <li><a href="#">PQRS 3</a></li>
            <li><a href="#">PQRS 4</a></li>
          </ul>
        </li>
        <li><a href="#">Contactos</a>
          <ul class="dropdown">
            <li><a href="#"></a></li>
            <li><a href="#">PQRS 1</a></li>
            <li><a href="#">PQRS 2</a></li>
            <li><a href="#">PQRS 3</a></li>
            <li><a href="#">PQRS 4</a></li>
          </ul>
        </li>
      </div>
    </ul>

    <nav class="datos">
      <ul class="datos-links">
        <div class="menu-datos">
          <li><a href="<?php echo base_url; ?>Login">Login</a></li>
          <li><a href="<?php echo base_url; ?>Login/registrarse">Register</a></li>
        </div>
      </ul>
    </nav>
  </nav>

</head>

<body>
  <div class="container">
    <div class="panel active" style="background-image: url('<?php echo base_url; ?>Img/Home/R.jpg');">
      <h3>Noticias</h3>
    </div>
    <div class="panel" style="background-image: url('<?php echo base_url; ?>Img/Home/confa2.png');">
      <h3>Battlefield</h3>
    </div>
    <div class="panel" style="background-image: url('<?php echo base_url; ?>Img/Home/skyrim.jpg');">
      <h3>The Elder Scrolls</h3>
    </div>
    <div class="panel" style="background-image: url('<?php echo base_url; ?>Img/Home/destiny.jpg');">
      <h3>Destiny</h3>
    </div>
    <div class="panel" style="background-image: url('<?php echo base_url; ?>Img/Home/battle.jpg');">
      <h3>Batllefied 2042</h3>
    </div>
    <div class="panel" style="background-image: url('<?php echo base_url; ?>Img/Home/one.jpg');">
      <h3>One Piece</h3>
    </div>
  </div>
  <script src="<?php echo base_url; ?>Assets/js/home.js"></script>
</body>

</html>