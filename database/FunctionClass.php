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
                echo $row['student_name'];
            }
        } else {
            echo "error";
        }
    }

    public function admin_view_students()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT student_name,student_reg_no,student_course FROM student";
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
                    "</td></tr>";
            }
        } else {
            echo "error";
        }
    }


    public function admin_view_courses()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT course_name FROM course";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['course_name'] .
                    "</td></tr>";
            }
        } else {
            echo "error";
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
        $sql = "SELECT lecturer_name,lecturer_staff_no FROM lecturer";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['lecturer_name'] .
                    "</td><td>" .
                    $row['lecturer_staff_no'] .
                    "</td><td>";
            }
        } else {
            echo "error";
        }
    }

    public function admin_view_units()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT unit_name,unit_course,unit_lecturer FROM unit";
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
                    "</td></tr>";
            }
        } else {
            echo "error";
        }
    }

    public function lecturer_view_assignments()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT assignment_uni,assignment_date_uploaded,assignment_date_due FROM assignment";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['assignment_uni'] .
                    "</td><td>" .
                    $row['assignment_date_uploaded'] .
                    "</td><td>" .
                    $row['assignment_date_due'] .
                    "</td></tr>";
            }
        } else {
            echo "No assignment";
        }
    }


    public function lecturer_view_notes()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT notes_unit,notes_date_uploaded FROM notes";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .
                    $row['notes_unit'] .
                    "</td><td>" .
                    $row['notes_date_uploaded'] .
                    "</td><td>";
            }
        } else {
            echo "error";
        }
    }

    public function student_notes()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT notes_unit,notes_date_uploaded FROM notes";
        $start_card = "<div class='col s12 m12 l12 card blue'>
                        <div class='card-content center'>";

        $end_card = "<a class='btn white black-text ' href='submitassignment.php'
                     style='font-weight: bolder; margin: 10%'>Download</a>
                     </div></div>";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $dynamic_card = "<div class='card-title white-text' style='font-weight: bolder; '>" .
                    $this->get_unit_name($row['notes_unit']) .
                    "</div><p class='white-text'>Date Uploaded: " .
                    $row['notes_date_uploaded'] .
                    "</p>";
                echo $start_card . $dynamic_card . $end_card;
            }
        } else {
            echo "error";
        }

    }

    public function student_assignments()
    {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $sql = "SELECT assignment_uni,assignment_date_due FROM assignment";
        $start_card = "<div class='col s12 m12 l12 card blue'>
                        <div class='card-content center'>";

        $end_card = "<a class='btn white black-text' href='index.php'
                     style='font-weight: bolder; margin: 10%'>View</a>
                     <a class='btn white black-text ' href='student_assignment_submit.php'
                     style='font-weight: bolder; margin: 10%'>Submit</a>
                     </div>
                     </div>";


        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $dynamic_card = "<div class='card-title white-text' style='font-weight: bolder; '>" .
                    $this->get_unit_name($row['assignment_uni']) .
                    "</div><p class='white-text'>Date Uploaded: " .
                    $row['assignment_date_due'] .
                    "</p>";
                echo $start_card . $dynamic_card . $end_card;

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
        } else {
            echo "error";
        }
    }


}
