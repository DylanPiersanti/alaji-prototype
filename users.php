<?php

$baseUrl = 'http://e-learning.alaji.fr/webservice/rest/server.php?';
$format = 'moodlewsrestformat=json';
$token = '92e270ed7da760d3d6df191e5582337b';

function getUser($id)
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&criteria[0][key]=id&criteria[0][value]=';
    $method = 'core_user_get_users';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params.$id;
    $response = json_decode(file_get_contents($uri));
    return $response->users[0]->email;
}

var_dump(getUser(242));

function getAllUsers() {
    global $baseUrl;
    global $format;
    global $token;

    $params = '&criteria[0][key]=email&criteria[0][value]=%';
    $method = 'core_user_get_users';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params;
    $response = json_decode(file_get_contents($uri));
    return $response;
}
/*
$data = getAllUsers();
for ($i=0; $i < count($data->users); $i++) { 
    echo $data->users[$i]->email . ' / ';
}
*/