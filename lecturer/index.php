<?php
//access functions
require('../database/FunctionClass.php');
$xtray_functions = new FunctionClass();
?>

<!DOCTYPE html>
<html lang "en-US">

<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--logo in tab-->
    <link rel="icon" href="../assets/images/logo.png">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../assets/css/xtray.css"/>
    <title>Student Assignment Repository | Lecture </title>

</head>

<body>
<!-- navbar -->
<nav>
    <div class="nav-wrapper blue-grey">
        <a href="../index.php" class="brand-logo">
            <img alt="xtray" src="../assets/images/logo.png">
        </a>
    </div>
</nav>

<!-- login buttons card -->
<center>
    <div class="card blue" style="width: 50%;padding: 5%">
        <?php
        //logging in
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = "lecturer";
            if (empty($username) || empty($password)) {
                echo "<div class='red white-text'>Input All Fields Before Submitting</div>";
            } else {
                $xtray_functions->login($username, $password, $role);
            }
        }
        ?>

        <div class="card-content center">
            <div class="card-title white-text" style="font-weight: bolder">Log In As Lecturer</div>
            <form action="index.php" method="post">
                <div class="row">
                    <div class=" input-field col s12 m12 l12">
                        <i class="material-icons prefix white-text">account_circle</i>
                        <input class="white-text validate" name="username" type="text" id="staffno" required>
                        <label class="white-text" for="staffno">Staff No</label>
                    </div>
                    <div class=" input-field col s12 m12 l12">
                        <i class="material-icons prefix white-text">visibility</i>
                        <input class="white-text validate" name="password" type="password" id="Password"
                               required>
                        <label class="white-text" for="Password">Password</label>
                    </div>
                    <div class="col s12 m12 l12">
                        <button type="submit" name="login" class="btn white black-text"
                                style="font-weight: bolder; margin: 10%"> Login
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</center>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
</body>
</html>