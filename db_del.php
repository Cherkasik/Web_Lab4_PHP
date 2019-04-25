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
    $title = $_POST['titles'];
    $request = "DELETE FROM `news` WHERE `news_title`=\"".$title[0]."\"";
    $result = mysqli_query($link, $request, MYSQLI_USE_RESULT);
    if (mysqli_error($link)) {
        print ("Ошибка БД в запросе " + $request + ". MySQL пишет ". mysqli_error($link));
    };
    mysqli_free_result ($result);
    mysqli_close($link);
    header('Refresh: 2; url=/');
    echo "Удаление успешно";
?>
