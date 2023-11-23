<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../mysql/form.css">
    
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="">
      <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-4 font-weight-normal">Giriş Yapınız.</h1>
      <input type="text" id="inputUsername" class="form-control mb-1" name="username" placeholder="Kullanıcı Adı"   >
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Şifre" >
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> 
          Beni Hatırla
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Giriş Yap!</button>
      <?php 
          require "connect.php";
          if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
              if ($password == $row['password']) {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $row["username"];   
                header("Refresh:1 ../anasayfa/index.php");
              }
              else {
                echo "Yanlış Şifre";
              }
              
            }
            else{
              echo "Kaydınız Bulunmamaktadır";  
            }
          }
          ?>
          
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
  </body>
</html>