<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <?php include("../anasayfa/header.php"); ?>


    <main>
        <div class="container mt-3 mb-3 rounded" style="background-color: #e6e6e6;">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM kitap_db");

            if ($result) {
                $counter = 0;
                while ($kitap = mysqli_fetch_assoc($result)) {
                    if ($counter % 3 == 0) {
                        echo '<div class="row">';
                    }
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <input type="hidden" name="kitap_id" value="<?= $kitap['kitap_id']; ?>">
                            <img src="../img/<?= $kitap['resim_url']; ?>" width="600" height="600" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $kitap['baslik']; ?></h5>
                                <p class="card-text"><?= $kitap['aciklama']; ?></p>
                                <a href="../altsayfa/<?= $kitap['site_url']; ?>.php" class="btn btn-primary">Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                <?php
                    $counter++;
                    if ($counter % 3 == 0) {
                        echo '</div>';
                    }
                }
            } else {
                ?>
                <h4>Kitap Bulunamadı</h4>
            <?php
            }
            ?>
        </div>

    </main>
</body>

</html>