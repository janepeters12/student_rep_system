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
            <li><a href="lecturer_profile.php">Profile</a></li>
            <li><a href="lecturer_view_notes.php">View Notes</a></li>
            <li><a href="lecturer_add_notes.php">Add Notes</a></li>
            <li><a href="lecturer_view_assignments.php">View Assignments</a></li>
            <li><a href="lecturer_add_assignments.php"  class="white-text center" style="background-color: #2196F3">Add Assignments</a></li>
            <div class="btn btn-block white" style="margin: 10px">
                <a href="../index.php" class="black-text center">Log Out</a>
            </div>
        </ul>
    </div>
</header>
<main>
    <div class="no-pad-top section">
        <center>
            <div class="card blue" style="width: 75%;padding: 20px">
                <?php
                //logging in
                if (isset($_POST['save'])) {
                    $file = $_FILES['file'];
                    $unit = $_POST['unit'];
                    $date_due = $_POST['date_due'];
                    $file_name = $_FILES['file']['name'];
                    $file_size =$_FILES['file']['size'];
                    $file_tmp =$_FILES['file']['tmp_name'];
                    $file_type=$_FILES['file']['type'];

                    if (empty($file_name) ||empty($unit) ||empty($date_due)) {
                        echo "<div class='red white-text'>Input All Before Submitting</div>";
                    } else {
                        $xtray_functions->add_assignment($unit,$file_name,$file_size,$file_tmp,$date_due);
                    }
                }
                ?>
                <div class="card-content center">
                    <div class="card-title white-text" style="font-weight: bolder; ">ASSIGNMENT</div>
                    <form action="lecturer_add_assignments.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class=" input-field col s12 m12 l12">
                                <input name="file" type="file" class="validate" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" required>
                            </div>
                            <div class=" input-field col s12 m12 l12">
                                <div class="row">
                                    <div class="col s3 m3 l3">
                                        <i class="material-icons prefix white-text">school</i>
                                    </div>
                                    <div class="col s9 m9 l9">
                                        <select class="validate" name="unit" required>
                                            <option value="" disabled selected>Unit</option>
                                            <?php
                                            $xtray_functions->get_lecturer_units($lid);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col m12 l12 s12">
                                <input name="date_due" type="date" class="white-text" id="date_due" required>
                                <label class="white-text" for="date_due">Date Due</label>
                            </div>
                            <div class="center">
                                <button type="submit" name="save" class="btn white black-text"
                                        style="font-weight: bolder; margin: 10%"> SAVE
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <input type="text" class="datepicker">
        </center>

    </div>
</main>

<?php include('../footer.php') ?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../assets/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script type="text/javascript" src="../assets/js/xtray.js"></script>
</body>
