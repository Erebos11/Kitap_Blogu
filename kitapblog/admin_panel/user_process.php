<?php 
include("yetki.php");


if (isset($_POST["user_delete"])) {   
    $user_id = $_POST['user_delete'];
    $query = "DELETE FROM user WHERE user_id = '$user_id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Üye Silinmiştir.";
        header("Location: users.php");
        exit(0);
    }
    
   
}


if (isset($_POST["add_user"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $add = "INSERT INTO user (username,password,email,role) VALUES ('$username','$password','$email','$role')";
    $add_run = mysqli_query($conn, $add);

    if ($add_run) {
        $_SESSION['message'] = "Başarılı bir şekilde eklenmiştir."; 
        header("Location: users.php");
        exit(0);
    }

}


if (isset($_POST["update_user"])) {
    
    $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    $query = "UPDATE user SET username='$username', password='$password', email='$email', role='$role' 
    WHERE user_id='$user_id'";
    
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;



        $_SESSION['message'] = "Başarılı bir şekilde güncellenmiştir."; 
        header("Location: users.php");
        exit(0);
    }
    
    



   
}
?>  