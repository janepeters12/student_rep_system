<!DOCTYPE html>
<html lang "en-US">

<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--logo in tab-->
    <link rel="icon" href="assets/images/logo.png">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="assets/css/xtray.css"/>
    <title>Student Assignment Repository | Homepage </title>

</head>
<body>
<!-- navbar -->
<nav>
    <div class="nav-wrapper blue-grey">
        <a href="index.php" class="brand-logo">
            <img alt="xtray" src="assets/images/logo.png">
        </a>
            </div>
</nav>

<!-- login buttons card -->
<center>
    <div class="card blue" style="width: 50%;padding: 5%">
        <div class="card-content center">
            <div class="card-title white-text" style="font-weight: bolder">Log In</div>
            <a class="btn white black-text" href="student/index.php" style="font-weight: bolder; margin: 10%">Student</a>
            <a class="btn white black-text " href="lecturer/index.php"
               style="font-weight: bolder; margin: 10%">Lecturer</a>
        </div>
    </div>
</center>
<?php include('footer.php') ?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>
</html>