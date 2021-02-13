<?php require_once "../db.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Soal 4B</title>

        <link rel="stylesheet" href="../styles/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../styles/main.css">
    </head>
    <body>
        <?php require_once '../navigation.php'; ?>
        <div class='container'>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sql = 'SELECT * FROM article WHERE id = ' . $_POST['id'] . ';';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row['id_user'] == $_SESSION['user_id']) {
                                $conn->query('UPDATE article SET title = "' . $_POST['title'] . '" WHERE id = ' . $_POST['id'] . ';');
                            }
                        }
                        header("Location: /4B/articles.php");
                    }
                } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $sql = 'SELECT * FROM article WHERE id = ' . $_GET['id'] . ';';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if ($row['id_user'] == $_SESSION['user_id']) {
                                echo '<form action="/4B/article/update.php" method="POST">
                                    <div>Title</div>
                                    <input type="hidden" name="id" value="' . $_GET['id'] . '">
                                    <input type="text" name="title" value="' . $row['title'] . '">
                                    <input type="submit" value="UPDATE">
                                </form>';
                            }
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>
<?php $conn->close();  ?>