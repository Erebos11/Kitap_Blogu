<?php 
include("sidebar.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5"> 
    
    <?php include("../mysql/message.php"); ?>
    <div class="card">
        <div class="card-header">
         <h4>Kayıtlı Kullanıcılar
            <?php if ($_SESSION['role'] == 1) {?>
                <a href="add_user.php" class="btn btn-primary float-end">Admin/Kullanıcı Ekle</a>
        <?php    } ?>
         </h4>
        </div>
    
    <div class="card-body">

    
    <table class="table table-bordered my-4 ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kullanıcı Adı</th>
                <th>Email</th>
                <th>Yetkiniz</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query_run = mysqli_query($conn,"SELECT * FROM user");
                
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                    ?>
                        <tr>
                            <td><?=$user['user_id'];?></td>
                            <td><?php echo $user['username'];?></td>
                            <td><?php echo $user['email'];?></td>
                           
                            <td><?php 
                                    if ($user['role'] == '1') {
                                        echo "Admin";
                                    } 
                                    elseif ($user["role"] == "0") {
                                        echo "Kullanıcı";
                                    }
                                    elseif ($user["role"] == "2") {
                                        echo "Editör";
                                    }
                                ?>
                            </td> 
                                 <td>
                                    <a href="edit-users.php?user_id=<?=$user['user_id'];?>"  class="btn btn-success">Düzenle</a>
                                </td>
                                <td>    
                                <form action="user_process.php" method="post">   
                                    <button type="submit" name="user_delete" value="<?=$user['user_id'];?>" class="btn btn-warning ">Sil</button>
                                </form> 
                            </td>    
                          
                            
                        </tr>
                    <?php
                    }
                }
                else {
                ?>
                <tr>
                  <td colspan="4">
                    Kayıtlı Kullanıcı Bulunamadı.
                  </td>  
                </tr>
                <?php
                }


            ?>
        </tbody>
    </table>
    </div>
</div>
</main>
</body>
</html>