  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Kayıt Olunuz</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../mysql/form.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="POST">
      <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
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

      <?php 
        require "connect.php";
        if (isset($_POST['send'])) {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email='$email' ");
          if (mysqli_num_rows($duplicate) > 0) {
            echo "Kullanıcı adı veya email daha önceden kullanılmış!";
          }else {
            $query = "INSERT INTO user VALUES('','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo "Kayıt başarılı bir şekilde oluşmuştur";
            header("Refresh:1 ../anasayfa/index.php");
          }
      
        }
      ?>

      <br><br><br><br>
      


      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </form>
  </body>
</html>