<?php
session_start();
require "connect.php";


if (isset($_POST['send'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email='$email' ");

  $query = mysqli_query($conn, "SELECT * FROM user");
  $row = mysqli_fetch_assoc($query);  // seçilen verileri dizi değerine döndürür

  
  if (mysqli_num_rows($duplicate) > 0) {
    $_SESSION['message'] = "Kullanıcı adı veya email daha önceden kullanılmış!";
  } else {
    $query = "INSERT INTO user(username,password,email) VALUES('$username','$password','$email')";
    $check_query = mysqli_query($conn, $query);




    if ($check_query) {

      $_SESSION['message'] = "Kayıt Başarılı bir şekilde oluşturulmuştur.";
      header('Location: ../anasayfa/index.php');
      exit(0);
      

    } else {
      $_SESSION['message'] = "Bir şeyler yanlış gitti..";
      header("Refresh:1 signup.php ");
      exit(0);
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Kayıt Olunuz</title>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="form.css">
</head>

<body class="text-center d-flex justify-content-center align-items-center">
  <form class="form-signin" action="" method="POST">
    
    <?php include("message.php"); ?>
    <h1 class="h3 mb-4 font-weight-normal">Kayıt Olunuz!</h1>
    <input type="email" id="inputEmail" class="form-control mb-1" placeholder="Email" name="email" required autofocus>
    <input type="text" id="inputUsername" class="form-control" placeholder="Kullanıcı Adı" name="username" required>
    <input type="password" id="inputPassword" class="form-control" placeholder="Şifre" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me">
        Beni Hatırla
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="send">Kayıt Ol!</button>


  </form>
</body>

</html>