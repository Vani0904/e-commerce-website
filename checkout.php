<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>





<?php
}else {
    header("Location: login.php");
    exit();
}
?>