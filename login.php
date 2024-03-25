<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Severent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
    <h1>Please Log in</h1> 
    <form action="" method="post">
    <input type="text" name="email" id="email"> 
    <input type="text" name="pw" id="pw"> 
    <button name='login'>Log in</button>
    <a href="index.php"><button type="button">Cancel</button></a>
    </form
    <?php
    require_once "db_function.php";
    $conn = new DB();
    if(isset($_POST['login'])){
        $conn->getConnection();
        //check if the user is already logged in
        session_start();
        if(isset($_SESSION['user'])){
            header('Location: index.php');
        }
        $email = $_POST['email'];
        $password = $_POST['pw'];
        $db = new DB();
        $res = $db->login($email, $password);
        if($res === false){
            echo "<script>alert('Wrong email or password!')</script>";
        }else{
            $_SESSION['user'] = 1;
            header('Location: index.php');
        }
    }
    ?>
</body>
</html>