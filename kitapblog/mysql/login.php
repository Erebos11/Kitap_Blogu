<?php
session_start();
require "connect.php";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"); 

  $row = mysqli_fetch_assoc($result);  //row değişkenine veri tabanındaki seçili verileri fetch_assoc fonksiyonuyla atıyoruz. 
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {

      $_SESSION['role'] = $row['role'];
      $_SESSION["login"] = true;             //login,rol ve kullanıcı adını hafızada tutar
      $_SESSION["username"] = $username;
      $_SESSION['user_id'] = $row['user_id'];
      
      
      if ($row['role'] == '0') { //üye
        $_SESSION['message'] = "Hoşgeldin $username";  
        header('Location: ../anasayfa/index.php');
        exit(0);
      } elseif ($row['role'] == '1') {  //admin
        $_SESSION['message'] = "Hoşgeldin $username";
        header('Location: ../admin_panel/index.php?user_id=' . $row["user_id"]);
        exit(0);
      } elseif ($row['role'] == '2') { //editör
        $_SESSION['message'] = "Hoşgeldin $username";
        header('Location: ../admin_panel/index.php?user_id=' . $row["user_id"]);
        exit(0);
      }

    
      
    } 
    else {
        $_SESSION['message'] = "Yanlış Şifre";
        header("Location: ../anasayfa/index.php");
        exit(0);
      }
    } 
  else {
    $_SESSION['message'] = "Kaydınız Bulunmamaktadır";
    header("Location: ../anasayfa/index.php");
    exit(0);
  }
}

?>

<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Giriş Yap</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/log.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="form.css">

</head>

<body class="text-center d-flex justify-content-center align-items-center">

  <form class="form-signin" method="post" action="">
    <h1 class="h3 mb-4 font-weight-normal">Giriş Yapınız.</h1>
    <input type="text" id="inputUsername" class="form-control mb-1" name="username" placeholder="Kullanıcı Adı">
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Şifre">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me">
        Beni Hatırla
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Giriş Yap!</button>
  </form>

  <?php
  if (isset($_SESSION["login"])) {
    $_SESSION['message'] = "Zaten giriş yapılmış durumda!";
    header("Location: ../anasayfa/index.php");
    exit(0);
  }
  ?>
</body>

</html>