<?php
require "../mysql/connect.php";
include ("yetki.php");


if(isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
  $users = "SELECT * FROM user WHERE user_id = '$user_id' ";
}
else {
  echo "Kullanıcı Bulunamadı";
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>
<body>

  <header class="container-fluid navbar navbar-expand-lg bg-dark" style="background: linear-gradient(to right, #614385, #516395);">
    <h5 style="text-transform: capitalize;" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white fs-4" href="#">Merhaba <?php echo $_SESSION['username']; ?></h4>


  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="sidebar col-md-3 col-lg-2 p-0 bg-body-tertiary" >
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" style="background: linear-gradient(to bottom, #614385, #516395);" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto flex-grow-1">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-white active" aria-current="page" href="../anasayfa/index.php">
                  Anasayfa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-white" href="index.php?user_id=<?php echo $_SESSION['user_id']; ?>">
                  Bilgileriniz
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-white" href="users.php">
                  Kayıtlı Kullanıcılar
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-white" href="add_card.php">
                  Kitap Ekleme
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 text-white" href="comments.php">Gelen Yorumlar
              </a>
            </li>
            </ul>

           

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
              <li class="nav-item my-3">
                <form action="../mysql/logout.php" method="POST">
                  <button type="submit" name="logout" class="nav-link d-flex align-items-center gap-2 text-white">Çıkış Yap</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

</body>

</html>