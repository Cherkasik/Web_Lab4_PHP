<!DOCTYPE php>
<html lang="ru">
<head>
</head>
<body>
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
    $request = "SELECT news_date, news_text, news_title FROM news";
    $result = mysqli_query($link, $request, MYSQLI_USE_RESULT);
    while ($row = mysqli_fetch_array($result)){
        $date = $row[0];
        $text = $row[1];
        $title = $row[2];
        echo "<h3>".$title."</h3>";
        echo "<div>".$text."</div>";
        echo "<div>".$date."</div>";
    }
    if (!mysqli_error()) {
        
    }
    else {
        print ("Ошибка БД в запросе " + $request + ". MySQL пишет ". mysqli_error());
    };
    mysqli_free_result ($result);
    mysqli_close($link);
    ?>
</body>
</html> 
