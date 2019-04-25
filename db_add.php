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
    $title = htmlentities($_POST['title']);
    $date = htmlentities($_POST['date']);
    $text = htmlentities($_POST['body']);
    $request = "INSERT INTO `news`(`news_text`, `news_title`, `news_date`) VALUES ("."\"".$text."\", \"".$title."\", \"".$date."\")";
    $result = mysqli_query($link, $request, MYSQLI_USE_RESULT);
    if (mysqli_error($link)) {
        print ("Ошибка БД в запросе " + $request + ". MySQL пишет ". mysqli_error($link));
    };
    mysqli_free_result ($result);
    mysqli_close($link);
    header('Refresh: 2; url=/');
    echo "Добавление успешно";
?>
