<?php 
  require "../mysql/connect.php";
  date_default_timezone_set("Europe/Istanbul");

  
  if (!empty($_SESSION['username'])) {
      $username = $_SESSION["username"];
      
      // SQL sorgusunu hazırla
      $query = "SELECT * FROM user WHERE username = ?";
      $stmt = $conn->prepare($query);
  
      // Parametreleri bağla
      $stmt->bind_param("s", $username);
  
      // Sorguyu çalıştır
      $stmt->execute();
  
      // Sonucu al
      $result = $stmt->get_result();
  
      // Verileri al
      $row = $result->fetch_assoc();
  }
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Carousel Template · Bootstrap v5.3</title>
  <head>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="carousel.css">

  </head>
  <body>
    <header class="p-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
            <img src="" alt="">
          </a>
  
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
            <li><a href="#" class="nav-link px-2 link-body-emphasis">Inventory</a></li>
            <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
            <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
          </ul>
  
          
          <?php if (isset($_SESSION['login'])) {?>
                    <h5 style="text-transform: capitalize;" class="me-3">Merhaba <?php echo $row['username'] ?></h5>
                    <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                      <li><a class="dropdown-item" href="#">New project...</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../mysql/logout.php">Sign out</a></li>
                    </ul>
                  </div>
                <?php } 
                    else {?>
                        <ul class="nav">
                            <li class="nav-item me-2">
                                <a href="../mysql/login.php" class="nav-link btn">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                 <a href="../mysql/signup.php" class="nav-link btn">
                                   Signup  
                                </a>
                            </li>
                        </ul>
                <?php } ?>
        </div>
      </div>
    </header>






    
<main>

  <div class="container marketing " style="margin-top: 80px;">
      <div class="row">
      <div class="col-lg-4 text-center">  
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">En Popüler Kitaplar</h2>
        <p>2023 yılında okunan en popüler kitapları sizler için derledik.</p>
        <p><a class="btn btn-secondary" href="../cards/cards.html">İncele &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">Yeni Çıkanlar</h2>
        <p>2023 yılında çıkan en yeni kitapları sizler için derledik.</p>
        <p><a class="btn btn-secondary" href="#">İncele &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">Filme Uyarlananlar</h2>
        <p>En çok izlenen filmlerin uyarlandıkları kitapları sizler için derledik.</p>
        <p><a class="btn btn-secondary" href="#">İncele &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Okumadan geçen gün <span class="text-body-secondary">yitirilmiş bir gündür.</span></h2>
        <p class="lead">Kitapsız yaşamak kör, sağır, dilsiz yaşamaktır.</p>
      </div>
      <div class="col-md-5">
       <img src="../img/2.jpg" width="500" height="500" alt="">
      </div> 
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Kitap okumak  <span class="text-body-secondary"> hem fiziksel hem de zihinsel sağlığınıza fayda sağlar.</span></h2>
        <p class="lead"> Beynin bağlantısını güçlendirir.
          Empati yeteneğinizi artırır.
          Kelime dağarcığınızı geliştirir.
          Stresi azaltır.
          Sizi iyi bir gece uykusuna hazırlar.
          Depresyon belirtilerini hafifletmeye yardımcı olur.</p>
      </div>
      <div class="col-md-5 order-md-1">
      >
        <img src="../img/8.jpg"  width="500" height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
      <img src="../img/10.jpg" width="500" height="500" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2023 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
</body>
</html>
