<!DOCTYPE php>
<html lang="ru">
<head>
    <title>Freshest news</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <button onclick="location.href='admin.php'">Администратор</button>
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
        echo "<div class='text'>".$text."</div>";
        echo "<div class='day'>".$date."</div>";
    }
    if (!mysqli_error($link)) {
        
    }
    else {
        print ("Ошибка БД в запросе " + $request + ". MySQL пишет ". mysqli_error($link));
    };
    mysqli_free_result ($result);
    mysqli_close($link);
    ?>
</body>
</html> 
