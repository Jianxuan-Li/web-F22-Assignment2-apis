<?php
putenv('ROOT_DIR=' . __DIR__);
include('env.php');
// database config
// ref: https://www.php.net/manual/en/pdo.connections.php
// cuz we use different dev-env, so we need to set different db info
if ($USER == 'JACK' || isset($_ENV["JACK_HOST"])) {
    // Jack's config 
    $db_params = array(
        'db_host'        => 'database',
        'db_username'    => 'root',
        'db_password'    => 'tiger',
        'db_name'        => 'assignment2',
        'db_port'        => 3306,
        'db_pconnect'    => true
    );
} else if ($USER == 'AAYUSH' || isset($_ENV["AAYUSH_HOST"])) {
    // For Aayush's config
    $db_params = array(
        'db_host'        => 'localhost',
        'db_username'    => 'root',
        'db_password'    => 'root',
        'db_name'        => 'assignment2',
        'db_port'        => 8889,
        'db_pconnect'    => true
    );
} else {
    // For Krupal's local dev env
    $db_params = array(
        'db_host'        => 'localhost',
        'db_username'    => 'root',
        'db_password'    => '',
        'db_name'        => 'assignment2',
        'db_port'        => 3306,
        'db_pconnect'    => true
    );
}

function getDSN()
{
    global $db_params;
    $dbname = $db_params['db_name'];
    $dbhost = $db_params['db_host'];
    $dbport = $db_params['db_port'];
    return "mysql:dbname=" . $dbname . ";host=" . $dbhost . ";port=" . $dbport . ";charset=utf8mb4";
}

function getDBParam($key)
{
    global $db_params;
    return $db_params[$key];
}
