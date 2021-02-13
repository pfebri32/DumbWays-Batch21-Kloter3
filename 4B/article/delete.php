<?php
    require_once '../db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = 'SELECT * FROM article WHERE id = ' . $_POST['id'] . ';';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['id_user'] == $_SESSION['user_id']) {
                    $conn->query('DELETE FROM article WHERE id = ' .  $_POST['id'] . ';');
                }
            }
            header("Location: /4B/articles.php");
        }
    }

    $conn->close();
?>