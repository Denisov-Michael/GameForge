<?php 
    include "components/core.php";
    
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }

    if(isset($_POST['reg'])){
        foreach($_POST as $key => $value){
            if($key != 'reg'){
                if($value == ''){
                    $errors = "Все поля должны быть заполнены!";
                }
            }
        }
        if(!isset($errors)){
            $password = md5($_POST['password']);
            $link->query("INSERT INTO `users`(`login`, `name`, `surname`, `patronymic`, `email`, `phone`, `password`) 
            VALUES('{$_POST['login']}', '{$_POST['name']}', '{$_POST['surname']}', '{$_POST['patronymic']}', '{$_POST['email']}', '{$_POST['phone']}', '$password')");
        }
    }  

    include "header.php";
?>
    <main>
        <form action="reg.php" method="post">
            <p>
                <label for="login">Login</label></br>
                <input type="text" id="login" name="login">
            </p>
            <p>
                <label for="password">Пароль</label></br>
                <input type="password" id="password" name="password">
            </p>
            <p>
                <label for="surname">Фамилия</label></br>
                <input type="text" id="surname" name="surname">
            </p>
            <p>
                <label for="name">Имя</label></br>
                <input type="text" id="name" name="name">
            </p>
            <p>
                <label for="patronymic">Отчество</label></br>
                <input type="text" id="patronymic" name="patronymic">
            </p>
            <p>
                <label for="email">Email</label></br>
                <input type="email" id="email" name="email">
            </p>
            <p>
                <label for="phone">Телефон</label></br>
                <input type="text" id="phone" name="phone">
            </p>
            <?php 
                if(isset($errors)){ 
                    echo "<p>$errors</p>";
                }
            ?>
            <button name="reg">
                Зарегистрироваться
            </button>
        </form>
    </main>
</body>
</html>
<? include "footer.php"; ?>