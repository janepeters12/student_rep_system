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
            <li><a href="admin_profile.php">Profile</a></li>
            <li><a href="admin_view_student.php">View Students</a></li>
            <li><a href="admin_add_student.php">Add Student</a></li>
            <li><a href="admin_view_course.php">View Courses</a></li>
            <li><a href="admin_add_course.php">Add Course</a></li>
            <li><a href="admin_view_lecturer.php">View Lecturers</a></li>
            <li><a href="admin_add_lecturer.php" style="background-color: #2196F3" class="white-text center">Add Lecturer</a></li>
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
            <div class="card blue" style="width: 75%;padding: 10%">
                <?php
                //logging in
                if (isset($_POST['save'])) {
                    $lname = $_POST['lname'];
                    echo $lname;
                    $staffno = $_POST['staffno'];
                    echo $staffno;
                    if (empty($lname) ||empty($staffno)) {
                        echo "<div class='red white-text'>Input All Before Submitting</div>";
                    } else {
                        $xtray_functions->admin_add_lecturer($lname,$staffno);
                    }
                }
                ?>
                <div class="card-content center">
                    <div class="card-title white-text"  href="#" style="font-weight: bolder; ">Add Lecturer</div>
                    <form action="admin_add_lecturer.php" method="post">
                        <div class="row">
                            <div class=" input-field col s12 m12 l12">
                                <i class="material-icons prefix white-text">account_circle</i>
                                <input class="white-text validate" type="text" name="lname" id="name" required>
                                <label class="white-text" for="name">Name</label>
                            </div>
                            <div class=" input-field col s12 m12 l12">
                                <i class="material-icons prefix white-text">credit_card</i>
                                <input class="white-text validate" type="text" name="staffno" id="staffno" required>
                                <label class="white-text" for="staffno">Staff No</label>
                            </div>
                            <div class="center">
                                <button type="submit" name="save" class="btn white black-text"
                                        style="font-weight: bolder; margin: 10%"> SAVE
                                </button>
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
