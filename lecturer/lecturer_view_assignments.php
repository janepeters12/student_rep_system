<?php
session_start();
//access functions
require('../database/FunctionClass.php');
$xtray_functions = new FunctionClass();
$lid = $_SESSION['lid'];
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
    <title>Student Assignment Repository | Lecturer </title>
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
            <li><a href="lecturer_profile.php" class="white-text center">Profile</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Notes<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="lecturer_view_notes.php">View Notes</a></li>
                                <li><a href="lecturer_add_notes.php">Add Notes</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header">Assignments<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="lecturer_view_assignments.php" style="background-color: #2196F3">View Assignments</a></li>
                                <li><a href="lecturer_add_assignments.php">Add Assignments</a></li>
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
        <div class="center">
            <a class="btn white black-text" href="lecturer_add_assignments.php" style="font-weight: bolder; margin: 20px">Add Assisnments</a>
        </div>
        <table>
            <tr>
                <th>Unit</th>
                <th>Date Uploaded</th>
                <th>Due Date</th>
            </tr>
            <tr>
                <td>COM 313</td>
                <td>12/9/2019</td>
                <td>22/9/2019</td>
            </tr>
        </table>
    </div>
</main>

<?php include('../footer.php') ?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script type="text/javascript" src="../assets/js/xtray.js"></script>
</body>
