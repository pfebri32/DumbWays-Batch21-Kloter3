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
                if (!isset($_SESSION['isLogin'])) {
                    header("Location: /4B/index.php");
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sql = 'INSERT INTO article (title, content, id_user) VALUES ("' . $_POST['title'] . '", "' . $_POST['content'] . '", ' . $_SESSION['user_id'] . ');';
                    $result = $conn->query($sql);
                    header("Location: /4B/articles.php");
                }
            ?>
            <form action="/4B/article/create.php" method="POST">
                <div>Title</div>
                <input type="text" name="title">
                <div>Content</div>
                <input type="text" name="content">
                <input type="submit" value="Create">
            </form>
        </div>
    </body>
</html>
<?php $conn->close();  ?>