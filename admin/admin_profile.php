<?php
session_start();
//access functions
require('../database/FunctionClass.php');
$xtray_functions = new FunctionClass();
$aid = $_SESSION['aid'];
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
    <title>Student Assignment Repository | Admin </title>
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
            <li><a href="admin_profile.php" class="white-text center" style="background-color: #2196F3">Profile</a></li>
            <li><a href="admin_view_student.php">View Students</a></li>
            <li><a href="admin_add_student.php">Add Student</a></li>
            <li><a href="admin_view_course.php">View Courses</a></li>
            <li><a href="admin_add_course.php">Add Course</a></li>
            <li><a href="admin_view_lecturer.php">View Lecturers</a></li>
            <li><a href="admin_add_lecturer.php">Add Lecturer</a></li>
            <li><a href="admin_view_unit.php">View Units</a></li>
            <li><a href="admin_add_unit.php">Add Unit</a></li>
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
            <div class="row" style="width: 50%">
                <div class="col s12 m12 l12 card blue">
                    <div class="card-content center">
                        <div class="white-text" style="font-weight: bolder; ">Welcome
                        <?php
                        $xtray_functions->get_admin_name($aid);
                        ?>
                        </div>
                    </div>
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
