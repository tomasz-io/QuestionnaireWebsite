<?php

require 'vendor/autoload.php';
use Parse\ParseClient;
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseSessionStorage;

session_start();

//init parse
ParseClient::initialize('XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP', 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY', 'hMaVrHtAn7YZB0Gmtvr0xKxj5DPILRlNRUHqaIQG');
// set session storage
ParseClient::setStorage( new ParseSessionStorage() );


$email = $_POST["email"];
$password = $_POST['password'];

try {
  $user = ParseUser::logIn($email, $password);
  // Do stuff after successful login.
  $currentUser = ParseUser::getCurrentUser();
  header("Location: f6s_tool.php");
  die();
} catch (ParseException $error) {
  echo 'Message: ' .$error->getMessage();  // The login failed. Check error to see why.
}

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <meta http-equiv="refresh" content="2;URL='f6s_login.php'"/>
  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>
<body>
</body>
</html>
