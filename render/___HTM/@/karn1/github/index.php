<?php

session_start();

$accessToken = $_SESSION['accessToken'];
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php

       if($accessToken != "")echo "<br /> logged! in. you token: ". $accessToken; else echo "<p><a href='https://github.com/login/oauth/authorize?client_id=0a962ca9b677a417eebf'>Sign In with GitHub</a></p>";
    ?>


</body>
</html>
