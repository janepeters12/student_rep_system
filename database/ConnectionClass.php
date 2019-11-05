<?php

// ConnectionClass.php

class ConnectionClass
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
        echo $success_start_tag . "Connected successfully" . $end_tag;
    }
}
