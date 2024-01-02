<?php 
include("sidebar.php");

?>

<!doctype html>
<html lang="tr" data-bs-theme="auto">
  <head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Admin Paneli</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="dashboard.css">
    
  </head>
  <body>
    

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
<div class="card">
    <?php include("../mysql/message.php"); ?>
        <div class="card-header">
            <h4>
                Kitap Ekle
            </h4>
        </div>
        <div class="card-body">
            <form action="card_code.php"  method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title">Başlık</label> 
                        <input type="text" name="baslik" class="form-control" id="title">  
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">İçerik</label>
                        <input type="text" name="aciklama" class="form-control" id="description">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="url">URL</label>
                        <input type="text" name="site_url" class="form-control" id="url">
                    </div>
                    <div class="input-group col-md-12 mb-3">
                        <input type="file" class="form-control" name="image" id="file">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" name="upload-card" class="btn btn-primary">Kitap Ekle</button>
                    </div>
                </div>
            </form>
        </div>

</main> 
</body>
</html>