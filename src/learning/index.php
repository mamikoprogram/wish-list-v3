<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP版 本気の Docker サンプル</title>
</head>
<body>
<h1>PHP版 本気の Docker サンプル</h1>
<h2>DB接続確認</h2>
<?php
$db = new PDO(
    'mysql:dbname=' . getenv('MYSQL_DATABASE') . ';host=' . getenv('MYSQL_HOST'),
    getenv('MYSQL_USER'),
    getenv('MYSQL_PASSWORD')
);
$row = $db->query("select now()")->fetch();
echo $row[0];
?>
<h2>DB接続サンプル</h2>
<pre
    style="background-color: lightgray; border: 1px solid black; padding: 10px;">
$db = new PDO(
    'mysql:dbname=' . getenv('MYSQL_DATABASE') . ';host=' . getenv('MYSQL_HOST'),
    getenv('MYSQL_USER'),
    getenv('MYSQL_PASSWORD')
);
$row = $db->query("select now()")->fetch();
echo $row[0];
</pre>


</body>
</html>
