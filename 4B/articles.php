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
        <link rel="stylesheet" href="styles/articles.css">
    </head>
    <body>
        <?php
            if (!isset($_SESSION['isLogin'])) {
                header("Location: /4B/login.php");
            } 
        ?>
        <?php require_once 'navigation.php'; ?>
        <div class='container'>
            <table class='articles__table'>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sql = 'SELECT article.id, article.title, author.name FROM article LEFT JOIN author ON article.id_user = author.id WHERE id_user = ' . $_SESSION['user_id'];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>
                                    <form action="/4B/article/view.php" method="GET">
                                        <input type="hidden" name="id" value=' . $row['id'] . '>
                                        <input type="submit" value="VIEW">
                                    </form>
                                    <form action="/4B/article/update.php" method="GET">
                                        <input type="hidden" name="id" value=' . $row['id'] . '>
                                        <input type="submit" value="UPDATE">
                                    </form>
                                    <form action="/4B/article/delete.php" method="POST">
                                        <input type="hidden" name="id" value=' . $row['id'] . '>
                                        <input type="submit" value="DELETE">
                                    </form>
                                </td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
            <a href="/4B/article/create.php">Create A New Article</a>
        </div>
    </body>
</html>
<?php $conn->close();  ?>