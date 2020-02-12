<?php 

function getAllUsers()
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&criteria[0][key]=email&criteria[0][value]=%';
    $method = 'core_user_get_users';

    $uri = $baseUrl . $format . '&wstoken=' . $token . '&wsfunction=' . $method . $params;
    $response = json_decode(file_get_contents($uri));
    return $response;
}

$data = getAllUsers();