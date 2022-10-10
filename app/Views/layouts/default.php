<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection("title") ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="bg-dark p-3 d-flex flex-row align-items-center">
      <a href="/" class="text-decoration-none text-light fs-5">Codeigniter</a>
      <!-- <php if (uri_string() === 'user/login'): ?>
        <a href="/user/register">Înregistrează-te</a>
      <php endif; ?>
      <php if (uri_string() === 'user/register'): ?>
        <a href="/user/login">Autentifică-te</a>
      <php endif; ?> -->
      <a 
        class="text-decoration-none text-secondary ms-3"
        href="<?php
          if (uri_string() == 'user/login') {
            echo "/user/register";
          } elseif (uri_string() == 'user/register') {
            echo "/user/login";
          }
        ?>"
      >
        <?php 
          if (uri_string() == 'user/login') {
            echo "Înregistrează-te";
          } elseif (uri_string() == 'user/register') {
            echo "Autentifică-te";
          }
        ?>
      </a>
    </nav>

    <?= $this->renderSection("content") ?>

</body>
</html>