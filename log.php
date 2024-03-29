<?php 

    include "components/core.php";

    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
    
    if(isset($_POST['log'])){
        $password = md5($_POST['password']);
        $users = $link->query("SELECT * FROM `users` 
            WHERE `login` = '{$_POST['login']}' AND `password` = '$password'");
        if($users->num_rows > 0){
            $user = $users->fetch_assoc();
            $_SESSION['user'] = [
                'id' => $user['id'],
                'isAdmin' => $user['isAdmin'],
            ];
            header("Location: index.php");
        }else{
            $errors = "Неверный логин или пароль";
        }
    }

    include "header.php";
?>
    <main>
        <form action="log.php" method="post">
            <p>
                <label for="login">Login</label><br/>
                <input type="text" id="login" name="login">
            </p>
            <p>
                <label for="password">Пароль</label><br/>
                <input type="password" id="password" name="password">
            </p>
            <?php 
                if(isset($errors)){ 
                    echo "<p>$errors</p>";
                }
            ?>
            <button name="log">
                Авторизоваться
            </button>
        </form>
    </main>
</body>
</html>
<? include "footer.php"; ?>