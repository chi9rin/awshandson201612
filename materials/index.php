<?php

$UPDATE_COUNTER_QUERY = 'UPDATE data SET value = value + 1 WHERE name = "counter"';
$GET_COUNTER_QUERY = 'SELECT value FROM data WHERE name = "counter"';
$server_ip = $_SERVER['SERVER_ADDR'];

$dbhost = '<< RDS Endpoint >>';
$dbport = '3306';
$dbname = '<< DB Name >>';

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname}";
$username = '<< Username >>';
$password = '<< Password >>';

try {
  $dbh = new PDO($dsn, $username, $password);

  $dbh->query($UPDATE_COUNTER_QUERY);

  foreach($dbh->query($GET_COUNTER_QUERY) as $row) {
    $counter_value = $row['value'];
  }

} catch (PDOException $e) {
  print('cannot connect to mysql ep' + $dbhost);
}

?>

<html>
  <head>
    <title>AWS handson</title>
  </head>
  <body>
    <p>Connected: <? print($server_ip) ?></p>
    <p>Counter: <? print($counter_value) ?></p>
  </body>
</html>

