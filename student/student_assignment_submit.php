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
    <title>Student Assignment Repository | Student </title>
</head>

<body>
<header>
    <div class="container">
        <ul id="slide-out" class="sidenav sidenav-fixed blue-grey">
            <li><a href="../index.php" class="white">
                    <div class="sidebar-logo center">
                        <img src="../assets/images/logo.png">
                    </div>
                </a>
            </li>
            <li class="white"> &nbsp;</li>
            <li><a href="student_profile.php" class="white-text center">Profile</a>
            </li>
            <li><a href="student_notes.php" class="white-text center">Notes</a></li>
            <li><a href="student_assignment.php" class="white-text center" style="background-color: #2196F3">Assignments</a></li>
            <li>
                <div class="btn btn-block white" style="margin: 10px">
                    <a href="../index.php" class="black-text center">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</header>
<main>
    <div class="no-pad-top section">
        <center>
            <div class="card blue" style="width: 50%;padding: 15%">
                <div class="card-content center">
                    <div class="card-title white-text"  href="#" style="font-weight: bolder; ">ASSIGNMENT</div>
                    <form>
                        <div class="row center">
                            <div class=" input-field col s12 m12 l12">
                                <input type="file" class="validate" id="choose file">
                            </div>
                            <a class="btn white black-text " href="student_assignment_submit.php"
                               style="font-weight: bolder; margin: 10%">Submit</a>

                        </div>
                    </form>

                </div>
            </div>
        </center>

    </div>
</main>

<?php include('../footer.php') ?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script type="text/javascript" src="../assets/js/xtray.js"></script>
</body>
