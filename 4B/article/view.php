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
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $sql = 'SELECT article.id, article.title, article.content, author.name FROM article LEFT JOIN author ON article.id_user = author.id WHERE article.id = ' . $_GET['id'];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div>ID: ' . $row['id'] . '</div>';
                            echo '<div>Title: ' . $row['title'] . '</div>';
                            echo '<div>Content: ' . $row['content'] . '</div>';
                            echo '<div>Written By: ' . $row['name'] . '</div>';
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>
<?php $conn->close();  ?>