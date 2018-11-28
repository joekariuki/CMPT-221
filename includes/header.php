<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" type="text/css" href="css/style.css" >
<body>
  <header>
  <nav class="w3-bar w3-color">
    <a href="/limbo-Alpha/landing.php" class="w3-left w3-button w3-hover-white">Limbo</a>
    <a href="/limbo-Alpha/lost.php" class="w3-left w3-button w3-hover-white">Lost Items</a>
    <a href="/limbo-Alpha/found.php" class="w3-left w3-button w3-hover-white">Found Items</a>
    <a href="/limbo-Alpha/ql.php" class="w3-left w3-button w3-hover-white">Quick Links</a>
    <?php if ($pid > -1) {
      echo '<a href="/limbo-Alpha/landing.php" class="w3-right w3-button w3-hover-white">Logout</a>';
    } else {
      echo '<a href="/limbo-Alpha/login.php" class="w3-right w3-button w3-hover-white">Login</a>';
    }
  ?>
  </nav>
</header>