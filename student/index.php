<?php require("../database/ConnectionClass.php") ?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Student Assignment Repository</title>
</head>

<body>
<!-- navbar -->
<nav>
    <div class="nav-wrapper blue-grey">
        <a href="../index.php" class="brand-logo">
            <img alt="xtray" src="../assets/images/logo.png">
        </a>
        <ul class="right">
            <li><a href="../about_us.php"><i class="material-icons left">info</i>About us</a></li>
        </ul>
    </div>
</nav>

<!-- login buttons card -->
<center>
    <div class="card blue" style="width: 50%;padding: 5%">
        <div class="card-content center">
            <div class="card-title white-text" href="#" style="font-weight: bolder">Log In As Student</div>
            <form>
                <div class="row">
                    <div class=" input-field col s12 m12 l12">
                        <i class="material-icons prefix white-text">account_circle</i>
                        <input class="white-text" name="username" type="text" class="validate" id="regno">
                        <label class="white-text" for="regno">Reg No</label>
                    </div>
                    <div class=" input-field col s12 m12 l12">
                        <i class="material-icons prefix white-text">visibility</i>
                        <input class="white-text" name="password" type="password" class="validate" id="password">
                        <label class="white-text" for="password">Password</label>
                    </div>
                    <div class="col s12 m12 l12">
<!--                        <button name="login" type="submit" class="btn white black-text"-->
<!--                                style="font-weight: bolder; margin: 10%">Log-->
<!--                            in-->
<!--                        </button>-->
                        <a href="student_profile.php" class="btn white black-text" style="font-weight: bolder; margin: 10%">Log in</a>
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
      