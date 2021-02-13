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
        <link rel="stylesheet" href="styles/login.css">
    </head>
    <body>
        <?php require_once 'navigation.php'; ?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = "SELECT * FROM author WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "' LIMIT 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $_SESSION['isLogin'] = true;
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['user_image'] = $row['image'];
                    }
                    header("Location: /4B/index.php");
                }
            }
        ?>
        <?php
            if (isset($_SESSION['isLogin'])) {
                header("Location: /4B/index.php");
            } else {
        ?>
            <div class='container login__container'>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
                    <div class='form__header'>Login</div>
                    <div class='login__form'>
                        <div class='form__group'>
                            <div>E-mail</div>
                            <input type='text' name='email'>
                        </div>
                        <div class='form__group'>
                            <div>Password</div>
                            <input type='password' name='password'>
                        </div>
                    </div>
                    <input class='submit' type="submit" value='Login'>
                </form>
            </div>
        <?php } ?>
    </body>
</html>
<?php $conn->close();  ?>