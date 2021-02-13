<?php require_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Soal 4B</title>

        <link rel="stylesheet" href="styles/bootstrap-grid.min.css">
        <link rel="stylesheet" href="styles/main.css">
    </head>
    <body>
        <?php require_once 'navigation.php'; ?>
        <div class='container'>
            <?php
                if (isset($_SESSION['isLogin'])) {
                    echo '<div class="welcome">Welcome, ' . $_SESSION['user_name'] . '.</div>';
                } 
            ?>
        </div>
    </body>
</html>
<?php $conn->close();  ?>