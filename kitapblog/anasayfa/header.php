<?php
session_start();
require "../mysql/connect.php";
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <title>Document</title>
</head>

<body>
  <header class="p-3 border-bottom" style="background: linear-gradient(to right, #614385, #516395);">
    <div class="container"> 
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="" alt="">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../anasayfa/index.php" class="nav-link px-2 link-light">Anasayfa</a></li>
          <li><a href="../cards/cards.php" class="nav-link px-2 link-light">Tüm Kitaplar</a></li>
          <?php if (isset($_SESSION['login']) ) { ?>
            <li><a href="../user/user_profile.php" class="nav-link px-2 link-light">Bilgilerim</a></li>
            <li><a href="../anasayfa/comment.php" class="nav-link px-2 link-light">İletişim</a></li>

            <?php
            if (($_SESSION["role"] == 1 or $_SESSION["role"] == 2)) { ?>
              <li>
                <a class="nav-link px-2 link-light" href="../admin_panel/index.php?user_id=<?php echo $_SESSION["user_id"]; ?>">Panel</a>
              </li>
          <?php
            }
          }
          ?>
        </ul>

        <?php include("../mysql/message.php"); ?>
        <?php if (isset($_SESSION['login'])) { ?>
          <ul class="nav">
            <li class="nav-item me-2 d-flex align-items-center">
              <h5 style="text-transform: capitalize;" class="me-4">Merhaba <?php echo $_SESSION['username'] ; ?></h5>
            </li>
            <li class="nav-item ">
              <form action="../mysql/logout.php" method="POST">
                <button type="submit" name="logout" class="text-white btn btn-dark">Çıkış Yap</button>
              </form>
            </li> 
          </ul>
        <?php } else { ?>
          <ul class="nav">
            <li class="nav-item me-2 ">
              <a href="../mysql/login.php" class="text-white btn btn-dark">
                Login
              </a>
            </li>
            <li class="nav-item">
              <a href="../mysql/signup.php" class="text-white btn btn-dark">
                Signup
              </a>
            </li>

          </ul>
        <?php } ?>
      </div>
    </div>
  </header>
</body>

</html>