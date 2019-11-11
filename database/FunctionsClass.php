<?php

// ConnectionClass.php
require("../database/ConnectionClass.php");
$xtray_db_connection = new ConnectionClass();
$xtray_db_connection->connect();

class FunctionsClass
{
    public function login($username, $password)
    {
        $password = md5($password);
        $sql = "SELECT id from users WHERE username='$username' and password='$password'";

        //checking if the username is available in the table
        $result = mysqli_query($this->db, $sql);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if($count_row == 0) {
            // row not found, do stuff...
            echo "wrong login creds";
        } else {
            // do other stuff...
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            $_SESSION[ 'login_time' ] = time();

            header("location: welcome.php");
        }

    }
}
