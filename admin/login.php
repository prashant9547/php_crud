<?php 
require_once 'initilize.php';

if(is_post_request()){
    $login =  [];
    $login['email'] = $_POST['uname'] ?? '';
    $login['password'] = md5($_POST['pass']) ?? '';
    $result = loginChk($login);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Portfolio | Login </title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>

            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" name="uname" id="uname">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass" id="pass">
                </div>
                <button type="submit" name="login" id="login" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p> -->
                <!-- <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small> &copy; Copyrights All Rights Reserved By Prashant Radadiya.</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
