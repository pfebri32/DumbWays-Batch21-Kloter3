<?php
    require_once 'db.php';

    session_destroy();
    header("Location: /4B/index.php");

    $conn->close();
?>