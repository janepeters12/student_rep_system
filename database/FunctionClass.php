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
        $success_start_tag = "<div class=\"white-text green\">";
        $error_start_tag = "<div class=\"white-text red\">";
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
}
