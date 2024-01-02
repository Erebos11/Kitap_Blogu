<?php 
include("yetki.php");

if (isset($_POST["upload-card"]) && isset($_FILES['image'])) {
    $baslik = $_POST["baslik"];
    $aciklama = $_POST["aciklama"];
    $site_url = $_POST["site_url"];

    $img_name = $_FILES["image"]["name"];
    $img_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];


    if ($error === 0) {
        if ($img_size > 350000) {
            $_SESSION['message'] = 'Fotoğrafın boyutu çok yüksek!.';
            header("Location: add-card.php");
            exit(0);
        }
        else {
            $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg","jpeg","png");

            if (in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = '../img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }else{
                $_SESSION['message'] = 'Yanlış Dosya Türü!';
                header('Location: add-card.php');
                exit(0);
            }
        }
        
    }
    else{
        $_SESSION['message'] = 'Bilinmeyen Bir hata oluştu.';
        header('Location: add-card.php');
        exit(0);
    }



     $query = "INSERT INTO kitap_db (baslik,aciklama,resim_url,site_url) VALUES ('$baslik','$aciklama','$new_img_name','$site_url')";
     $query_run = mysqli_query($conn, $query);
     if ($query_run){
         $_SESSION['message'] = "Kart Başarılı bir şekilde eklenmiştir.";
         header("Location: ../cards/cards.php ");
         exit(0);
     }
}

?>