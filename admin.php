<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Admin page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form action="db_add.php"  method="post">
    <div>
        <h4>Добавить новость</h4>
        <p>Заголовок<br><input name="title" placeholder="Введите заголовок" required /></p>
        <p>Дата<br><input type="date" name="date" placeholder="Введите дату" required /></p>
        <p>Новость<br><textarea name="body" placeholder="Введите новость:" required></textarea></p>
          <input class="butt" type="submit" name="submit" value="Добавить">
    </div>
    </form>
    <form action="db_del.php"  method="post">
    <div>
        <h4>Удалить новость</h4>
        <p>Выберите новость:<br><select name="titles[]">
            <?php
            $server = 'localhost';
            $user = 'root';
            $password = '525355';
            $db = 'lab4_web';
            $link = mysqli_connect($server, $user, $password, $db);
            if (mysqli_connect_errno()){
                echo "ERROR connecting DB";
                exit;
            }
            $request = "SELECT news_title FROM news";
            $result = mysqli_query($link, $request, MYSQLI_USE_RESULT);
            while ($row = mysqli_fetch_array($result)){
                $title = $row[0];
                echo "<option>".$title."</option>";
            }
            mysqli_free_result ($result);
            mysqli_close($link);
            ?>
        </select></p>
        <input class="butt" type="submit" name="delete" value="Удалить">
    </div>
    </form>
</body>
