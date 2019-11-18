<?php

// FunctionClass.php

class FunctionClass
{

    protected $db_name = 'xtray';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_host = 'localhost';

    // Open a connect to the database.
    // Make sure this is called on every page that needs to use the database.

    public function connect()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        // Check connection
        $success_start_tag = "<div class='white-text green'>";
        $error_start_tag = "<div class='white-text red'>";
        $end_tag = "</div>";
        if (!$connection) {
            die($error_start_tag . "Connection failed: " . mysqli_connect_error()) . $end_tag;
        }
//        echo $success_start_tag . "Connected successfully" . $end_tag;
    }

    public function login($username, $password, $role)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($role == "admin") {
            $sql = "SELECT admin_id FROM admin WHERE admin_name='" . $username . "'" . "AND admin_password='" . $password . "'";
        } elseif ($role == "student") {
            $sql = "SELECT student_id FROM student WHERE student_reg_no='" . $username . "'" . "AND student_password='" . $password . "'";
        } elseif ($role == "lecturer") {
            $sql = "SELECT lecturer_id FROM lecturer WHERE lecturer_staff_no='" . $username . "'" . "AND lecturer_password='" . $password . "'";
        } else {
            echo "<div class='red white-text'>Error</div>";
        }

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            if ($role == "admin") {
                while ($admin_row = $result->fetch_assoc()) {
                    session_start();
                    $_SESSION["aid"] = $admin_row['admin_id'];
                }
                header("Location: admin_profile.php");
            } elseif ($role == "student") {
                while ($student_row = $result->fetch_assoc()) {
                    session_start();
                    $_SESSION["sid"] = $student_row['student_id'];
                }
                header("Location: student_profile.php");
            } elseif ($role == "lecturer") {
                while ($lecturer_row = $result->fetch_assoc()) {
                    session_start();
                    $_SESSION["lid"] = $lecturer_row['lecturer_id'];
                }
                header("Location: lecturer_profile.php");
            }
        } else {
            echo "<div class='red white-text'>Wrong Username or Password</div>";
        }
    }

    public function get_admin_name($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT admin_name FROM admin WHERE admin_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row['admin_name'];
            }
        } else {
            echo "error";
        }
    }

    public function get_lecturer_name($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT lecturer_name FROM lecturer WHERE lecturer_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['lecturer_name'];
            }
        } else {
            echo "error";
        }
    }

    public function get_student_name($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT student_name FROM student WHERE student_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['student_name'];
            }
        }
    }

    public function admin_view_students()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT student_id,student_name,student_reg_no,student_course FROM student";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['student_name'] .
                    "</td><td>" .
                    $row['student_reg_no'] .
                    "</td><td>" .
                    $this->get_course_name($row['student_course']) .
                    "</td><td>" .
                    "<input hidden name = 'rid' type = 'text'  value = '" . $row['student_id'] . "'>" .
                    "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                    "</td></tr>";
            }
        } else {
            echo "No Students";
        }
    }

    public function admin_view_courses()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT course_id,course_name FROM course";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['course_name'] .
                    "</td><td>" .
                    "<input hidden name = 'rid' type = 'text'  value = '" . $row['course_id'] . "'>" .
                    "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                    "</td></tr>";
            }
        } else {
            echo "No Courses";
        }
    }

    public function get_course_name($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT course_name FROM course WHERE course_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['course_name'];
            }
        } else {
            echo "error";
        }
    }

    public function admin_view_lecturer()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT lecturer_id,lecturer_name,lecturer_staff_no FROM lecturer";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['lecturer_name'] .
                    "</td><td>" .
                    $row['lecturer_staff_no'] .
                    "</td><td>" .
                    "<input hidden name = 'rid' type = 'text'  value = '" . $row['lecturer_id'] . "'>" .
                    "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                    "</td></tr>";
            }
        } else {
            echo "No Lecture";
        }
    }

    public function admin_view_units()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT unit_id,unit_name,unit_course,unit_lecturer FROM unit";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['unit_name'] .
                    "</td><td>" .
                    $this->get_course_name($row['unit_course']) .
                    "</td><td>" .
                    $this->get_lecturer_name($row['unit_lecturer']) .
                    "</td><td>" .
                    "<input hidden name = 'rid' type = 'text'  value = '" . $row['unit_id'] . "'>" .
                    "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                    "</td></tr>";
            }
        } else {
            echo "No Units";
        }
    }

    public function lecturer_view_submitted_assignments($lid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $unit_sql = "SELECT unit_id FROM unit";
        $unit_result = $connection->query($unit_sql);
        if ($unit_result->num_rows > 0) {
            // output data of each row
            while ($unit_row = $unit_result->fetch_assoc()) {

                $ass_sql = "SELECT assignment_id,assignment_uni,assignment_date_uploaded,assignment_date_due FROM lec_assignment WHERE assignment_uni='" . $unit_row['unit_id'] . "'";
                $ass_result = $connection->query($ass_sql);
                if ($ass_result->num_rows > 0) {
                    // output data of each row
                    while ($ass_row = $ass_result->fetch_assoc()) {
                        $stu_ass_sql = "SELECT student_assignment_student,date_uploaded,file FROM student_assignment WHERE student_assignment_assignment='" . $ass_row['assignment_id'] . "'";
                        $stu_ass_result = $connection->query($stu_ass_sql);
                        if ($stu_ass_result->num_rows > 0) {
                            // output data of each row
                            while ($row = $stu_ass_result->fetch_assoc()) {
                                $sn = $this->get_student_name($row['student_assignment_student']);
                                $check_lec_unit = $this->check_lec_unit($lid, $ass_row['assignment_uni']);
                                if ($check_lec_unit == "TRUE") {
                                    echo "<tr><td>" .
                                        $this->get_unit_name($ass_row['assignment_uni']) .
                                        "</td><td>" .
                                        $sn .
                                        "</td><td>" .
                                        $row['date_uploaded'] .
                                        "</td><td>" .
                                        "</p><a class='btn white black-text' href='" . $row['file'] .
                                        "' style='font-weight: bolder;'>Download</a>" .
                                        "</td></tr>";
                                }
                            }
                        }
                    }
                }

            }
        }

    }

    public function lecturer_view_notes($lid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $unit_sql = "SELECT unit_id FROM unit WHERE unit_lecturer=" . $lid;
        $unit_result = $connection->query($unit_sql);
        if ($unit_result->num_rows > 0) {
            // output data of each row
            while ($unit_row = $unit_result->fetch_assoc()) {
                $notes_sql = "SELECT notes_id,notes_unit,notes_date_uploaded,file FROM notes WHERE notes_unit='" . $unit_row['unit_id'] . "'";
                $notes_result = $connection->query($notes_sql);
                if ($notes_result->num_rows > 0) {
                    // output data of each row
                    while ($notes_row = $notes_result->fetch_assoc()) {
                        $check_lec_unit = $this->check_lec_unit($lid, $notes_row['notes_unit']);
                        if ($check_lec_unit == "TRUE") {
                            echo "<tr><td>" .
                                $this->get_unit_name($notes_row['notes_unit']) .
                                "</td><td>" .
                                $notes_row['notes_date_uploaded'] .
                                "</td><td>" .
                                "</p><a class='btn white black-text' href='" . $notes_row['file'] .
                                "' style='font-weight: bolder;'>Download</a>" .
                                "</td><td>" .
                                "<input hidden name = 'rid' type = 'text'  value = '" . $notes_row['notes_id'] . "'>" .
                                "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                                "</td></tr>";
                        }
                    }
                }
            }
        }
    }

    public function check_lec_unit($lid, $uid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM unit WHERE unit_lecturer='" . $lid . "' AND unit_id='" . $uid . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return "TRUE";
        } else {
            return "FALSE";
        }

    }

    public function lecturer_view_assignments($lid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $unit_sql = "SELECT unit_id FROM unit";
        $unit_result = $connection->query($unit_sql);
        if ($unit_result->num_rows > 0) {
            // output data of each row
            while ($unit_row = $unit_result->fetch_assoc()) {

                $ass_sql = "SELECT assignment_id,assignment_uni,assignment_date_uploaded,assignment_date_due,file FROM lec_assignment WHERE assignment_uni='" . $unit_row['unit_id'] . "'";
                $ass_result = $connection->query($ass_sql);
                if ($ass_result->num_rows > 0) {
                    // output data of each row
                    while ($row = $ass_result->fetch_assoc()) {
                        $check_lec_unit = $this->check_lec_unit($lid, $row['assignment_uni']);
                        if ($check_lec_unit == "TRUE") {
                            echo "<tr><td>" .
                                $this->get_unit_name($row['assignment_uni']) .
                                "</td><td>" .
                                $row['assignment_date_uploaded'] .
                                "</td><td>" .
                                $row['assignment_date_due'] .
                                "</td><td>" .
                                "<a class='btn white black-text' href='" . $row['file'] .
                                "' style='font-weight: bolder;'>Download</a>" .
                                "</td><td>" .
                                "<input hidden  name = 'rid' type = 'text'  value = '" . $row['assignment_id'] . "'>" .
                                "<button name = 'delete' type = 'submit' class='btn red white-text'>DELETE</button>" .
                                "</td></tr>";
                        }
                    }
                }

            }
        }
    }

    public function get_student_course($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT student_course FROM student WHERE student_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['student_course'];
            }
        }
    }

    public function get_unit_course($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT unit_course FROM unit WHERE unit_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['unit_course'];
            }
        }

    }

    public function student_notes($sid)
    {
        $student_course = $this->get_student_course($sid);
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT notes_unit,notes_date_uploaded,file FROM notes";
        $start_card = "<div class='col s12 m12 l12 card blue'>
                        <div class='card-content center'>";

        $end_card = "</div></div>";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $unit_course = $this->get_unit_course($row['notes_unit']);
                if ($student_course == $unit_course) {
                    $dynamic_card = "<div class='card-title white-text' style='font-weight: bolder; '>" .
                        $this->get_unit_name($row['notes_unit']) .
                        "</div><p class='white-text'>Date Uploaded: " .
                        $row['notes_date_uploaded'] .
                        "</p><a class='btn white black-text' href='" . $row['file'] .
                        "' style='font-weight: bolder; margin: 10%'>Download</a>";
                    echo $start_card . $dynamic_card . $end_card;
                }
            }
        } else {
            echo "error";
        }

    }

    public function student_assignments($sid)
    {
        $student_course = $this->get_student_course($sid);
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT assignment_id,assignment_uni,assignment_date_due,file FROM lec_assignment";
        $start_card = "<div class='col s12 m12 l12 card blue'>
                        <div class='card-content center'>";

        $end_card = "</div></div>";

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $unit_course = $this->get_unit_course($row['assignment_uni']);
                if ($student_course == $unit_course) {
                    $today = date("Y-m-d");

                    $date = new DateTime();
                    $add = $date->format($row['assignment_date_due']);
                    $nadd = date_create($add);
                    $add = date_format($nadd, "Y-m-d");


                    if ($add > $today) {
                        $dynamic_card = "<div class='card-title white-text' style='font-weight: bolder; '>" .
                            $this->get_unit_name($row['assignment_uni']) .
                            "</div><p class='white-text'>Date Due: " .
                            $row['assignment_date_due'] .
                            "</p><a class='btn white black-text' href='" . $row['file'] .
                            "'style='font-weight: bolder; margin: 10%'>View</a>" .
                            "<a class='btn white black-text ' href='student_assignment_submit.php?ass=" . $row['assignment_id'] .
                            "'style='font-weight: bolder; margin: 10%'>Submit</a>";
                        echo $start_card . $dynamic_card . $end_card;
                    }
                }
            }
        } else {
            echo "error";
        }

    }

    public function get_unit_name($id)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT unit_name FROM unit WHERE unit_id=" . $id;
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row['unit_name'];
            }
        }
    }

    public function admin_add_course($cname)
    {
        $cname = strtoupper($cname);
        $check_course_name = $this->check_course_name($cname);
        if ($check_course_name === FALSE) {
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO course (course_name)VALUES ('" . $cname . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: admin_view_course.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "<div class='red white-text'>Course Already Exists</div>";
        }
    }

    public function admin_add_student($sname, $regno, $course)
    {
        $regno = strtoupper($regno);
        $check_regno = $this->check_regno($regno);
        if ($check_regno === FALSE) {
            $password = $regno;
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO student (student_name,student_reg_no,student_password,student_course)VALUES ('" . $sname . "','" . $regno . "','" . $password . "','" . $course . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: admin_view_student.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "<div class='red white-text'>Student Already Exists</div>";
        }
    }

    public function admin_add_lecturer($lname, $staffno)
    {
        $staffno = strtoupper($staffno);
        $check_staffno = $this->check_staffno($staffno);
        if ($check_staffno === FALSE) {
            $password = $staffno;
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO lecturer (lecturer_name,lecturer_staff_no,lecturer_password)VALUES ('" . $lname . "','" . $staffno . "','" . $password . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: admin_view_lecturer.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "<div class='red white-text'>Lecturer Already Exists</div>";
        }
    }

    public function admin_add_unit($uname, $course, $lecturer)
    {
        $uname = strtoupper($uname);
        $uname = str_replace(' ', '', $uname);
        $check_unit_name = $this->check_unit_name($uname);
        if ($check_unit_name === FALSE) {
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO unit (unit_name,unit_course,unit_lecturer)VALUES ('" . $uname . "','" . $course . "','" . $lecturer . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: admin_view_unit.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "<div class='red white-text'>Unit Already Exists</div>";
        }
    }

    public function check_course_name($cname)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM course WHERE course_name='" . $cname . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_regno($regno)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM student WHERE student_reg_no='" . $regno . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_unit_name($uname)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM unit WHERE unit_name='" . $uname . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_staffno($staffno)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM lecturer WHERE lecturer_staff_no='" . $staffno . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_all_courses()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT course_id,course_name FROM course";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['course_id'] .
                    "'>" . $row['course_name'] .
                    "</option>";
            }
        } else {
            echo "error";
        }
    }

    public function get_all_lecturers()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT lecturer_id,lecturer_name FROM lecturer";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['lecturer_id'] .
                    "'>" . $row['lecturer_name'] .
                    "</option>";
            }
        } else {
            echo "error";
        }

    }

    public function get_lecturer_units($lid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT unit_id,unit_name,unit_lecturer FROM unit";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($lid == $row['unit_lecturer']) {
                    echo "<option value='" . $row['unit_id'] .
                        "'>" . $row['unit_name'] .
                        "</option>";
                }
            }
        } else {
            echo "error";
        }

    }

    public function add_assignment($unit, $file_name, $file_size, $file_tmp, $date_due)
    {
        $file_path = "../uploads/" . rand() . $file_name;
        $errors = array();

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 GB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $file_path);
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO lec_assignment (file,assignment_uni,assignment_date_due)VALUES ('" . $file_path . "','" . $unit . "','" . $date_due . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: lecturer_view_assignments.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }

        } else {
            print_r($errors);
        }
    }

    public function check_ass_submission($sid, $ass)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT * FROM student_assignment WHERE student_assignment_student='" . $sid . "' AND student_assignment_assignment='" . $ass . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            return "FALSE";
        } else {
            return "TRUE";
        }

    }

    public function submit_assignment($assignment, $file_name, $file_size, $file_tmp, $sid)
    {
        $file_path = "../uploads/" . rand() . $file_name;
        $errors = array();

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 GB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $file_path);
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO student_assignment (file,student_assignment_assignment,student_assignment_student)VALUES ('" . $file_path . "','" . $assignment . "','" . $sid . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: student_assignment.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }

        } else {
            print_r($errors);
        }
    }

    public function add_notes($unit, $file_name, $file_size, $file_tmp)
    {
        $file_path = "../uploads/" . rand() . $file_name;
        $errors = array();

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 GB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $file_path);
            $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $sql = "INSERT INTO notes (file,notes_unit)VALUES ('" . $file_path . "','" . $unit . "')";

            if ($connection->query($sql) === TRUE) {
                header("Location: lecturer_view_notes.php");
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }

        } else {
            print_r($errors);
        }
    }

    public function delete_student($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM student WHERE student_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Student deleted successfully";
        } else {
            echo "Error deleting student: " . $connection->error;
        }
    }

    public function delete_lecturer($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM lecturer WHERE lecturer_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Lecturer deleted successfully";
        } else {
            echo "Error deleting lecturer: " . $connection->error;
        }
    }

    public function delete_unit($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM unit WHERE unit_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Unit deleted successfully";
        } else {
            echo "Error deleting unit: " . $connection->error;
        }
    }

    public function delete_course($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM course WHERE course_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Course deleted successfully";
        } else {
            echo "Error deleting course: " . $connection->error;
        }
    }

    public function delete_notes($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM notes WHERE notes_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Notes deleted successfully";
        } else {
            echo "Error deleting notes: " . $connection->error;
        }
    }

    public function delete_assignments($rid)
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "DELETE FROM lec_assignment WHERE assignment_id='" . $rid . "'";

        if ($connection->query($sql) === TRUE) {
            echo "Assignments deleted successfully";
        } else {
            echo "Error deleting assignments: " . $connection->error;
        }
    }
}
