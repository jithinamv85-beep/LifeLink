<?php
session_start();
include 'config/db.php';

$error = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password']))
        {
            $_SESSION['user']      = $user['id'];
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['name']      = $user['name'];
            $_SESSION['email']     = $user['email'];
            $_SESSION['role']      = $user['role'];

            if($user['role'] == 'admin')
            {
                header("Location: admin/dashboard.php");
            }
            elseif($user['role'] == 'hospital')
            {
                header("Location: hospitals/dashboard.php");
            }
            else
            {
                header("Location: dashboard.php");
            }

            exit();
        }
        else
        {
            $error = "Invalid Password";
        }
    }
    else
    {
        $error = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>LifeLink Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f5f5f5;
}

.login-box{
    width:400px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
}

h1{
    text-align:center;
    color:#d32f2f;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:8px;
}

button{
    width:100%;
    padding:12px;
    background:#d32f2f;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#b71c1c;
}

.link{
    text-align:center;
    margin-top:15px;
}

.link a{
    color:#d32f2f;
    text-decoration:none;
    font-weight:bold;
}

.error{
    color:red;
    text-align:center;
    margin-bottom:10px;
}

@media(max-width:500px){
    .login-box{
        width:90%;
        padding:25px;
    }
}

</style>

</head>

<body>

<div class="login-box">

<h1> LifeLink Login</h1>

<?php
if(!empty($error))
{
    echo "<div class='error'>$error</div>";
}
?>

<form method="post">

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

<div class="link">
Don't have an account?
<a href="register.php">Register</a>
</div>

</div>

</body>
</html>