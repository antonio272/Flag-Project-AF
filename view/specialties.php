<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Clinic</title>
    </head>
    <body>
        <h1>Escolha a especialidade</h1>
        <ul>
<?php
    foreach($specialties as $specialty) {
        echo '
        <li>
            <a href="' .BASE_PATH. 'booking/' .$specialty["specialty_id"]. '">' .$specialty["name"]. '</a>
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