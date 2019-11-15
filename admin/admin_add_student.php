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
            <li><a href="admin_profile.php" class="white-text center">Profile</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Student<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="admin_view_student.php">View Students</a></li>
                                <li><a href="admin_add_student.php" style="background-color: #2196F3; color:  white;">Add
                                        Student</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header">Course<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="admin_view_course.php">View Courses</a></li>
                                <li><a href="admin_add_course.php">Add Course</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header">Lecturer<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="admin_view_lecturer.php">View Lecturers</a></li>
                                <li><a href="admin_add_lecturer.php">Add Lecturer</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header">Units<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="admin_view_unit.php">View Units</a></li>
                                <li><a href="admin_add_unit.php">Add Unit</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="btn btn-block white" style="margin: 10px">
                            <a href="../index.php" class="black-text center">Log Out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<main>
    <div class="no-pad-top section">
        <center>
            <div class="card blue" style="width: 50%;padding: 10%">
                <div class="card-content center">
                    <div class="card-title white-text" href="#" style="font-weight: bolder; ">Add Student</div>
                    <form>
                        <div class="row">
                            <div class=" input-field col s12 m12 l12">
                                <i class="material-icons prefix white-text">account_circle</i>
                                <input type="text" class="validate white-text" id="name">
                                <label class="white-text" for="name">Name</label>
                            </div>
                            <div class=" input-field col s12 m12 l12">
                                <i class="material-icons prefix white-text">credit_card</i>
                                <input class="white-text" type="text" class="validate" id="regno">
                                <label class="white-text" for="regno">Reg No</label>
                            </div>
                            <div class=" input-field col s12 m12 l12">
                                <div class="row">
                                    <div class="col s3 m3 l3">
                                        <i class="material-icons prefix white-text">school</i>
                                    </div>
                                    <div class="col s9 m9 l9">
                                        <select>
                                            <option value="" disabled selected>Course</option>
                                            <option value="1">Computer Science</option>
                                            <option value="2">Applied Statistics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="center">
                                <a class="btn white black-text" href="admin_profile.php" style="font-weight: bolder; margin: 10%">Save</a>
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
