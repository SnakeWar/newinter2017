<?php
/*$link = mysqli_connect("mysql.hostinger.com.br", "u746126155_camp", "Lxp5BLRuWYca", "u746126155_db");*/
        $link = mysqli_connect("localhost", "snakewar_camp", "pHxsHwQHND", "snakewar_campeonato_db");
/*$link = mysqli_connect("localhost", "root", "123456", "campeonato_db");*/

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);
?>
