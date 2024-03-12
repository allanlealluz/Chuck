<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Severent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form action="register.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

    <?php 
    require_once "db_function.php";
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $name = htmlentities($_POST['name']);
        $email =  htmlentities($_POST['email']);
        $password =  htmlentities($_POST['password']);
        $db = new DB();
        $db->getConnection();
        $db->register($name,$email,$password);
    }
    
    ?>
</body>
</html>