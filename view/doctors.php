<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title><?php echo $doctors[0]["specialty"]; ?></title>
    </head>
    <body>
        <h1><?php echo $doctors[0]["specialty"]; ?></h1>
        <ul>
<?php
    foreach($doctors as $doctor) {
        echo '
        <li>
            <a href="' .BASE_PATH. 'booking/?specialty_id='.$doctor["specialty_id"].'&doctor_id='.$doctor["doctor_id"].'">' .$doctor["name"]. '</a>
        </li>
        ';
    }
?>
        </ul>
<?php
    //nav;
?>
    </body>
</html>
        