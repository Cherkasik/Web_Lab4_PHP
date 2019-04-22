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
echo "Соединение с MySQL установлено!<br/>";
echo "Информация о сервере: " . mysqli_get_host_info($link) . "<br/>";
$request = "SELECT news_date, news_text, news_title FROM news";
$result = mysqli_query($link, $request, MYSQLI_USE_RESULT);
$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf ("%s<br/> (%s)<br/> %s<br/>", $row[0], $row[1], $row[2]);
if (!mysqli_error()) {
    
  }
else {
    print ("Ошибка БД в запросе " + $request + ". MySQL пишет ". mysqli_error());
};
mysqli_free_result ($result);
mysqli_close($link);
?>
