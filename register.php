<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Severent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form method="post" id="form">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <button type="submit" class="btn btn-primary" id='submit'>Register</button>
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
    <script>
    document.getElementById("submit").addEventListener("click", function(event){
    var email = document.getElementById("email").value;
    if(email.indexOf("@gmail.com") == -1 || email.indexOf("@hotmail.com") == -1 || email.indexOf("@yahoo.com") == -1 ){
        event.preventDefault()
        alert("Invalid Email");
    }else{
        document.getElementById("form").submit();
    }
    });     
        </script>
</body>
</html>