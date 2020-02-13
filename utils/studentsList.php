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

function getAttempts($id)
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&quizid=202&userid=';
    $method = 'mod_quiz_get_user_attempts';

    $uri = $baseUrl . $format . '&wstoken=' . $token . '&wsfunction=' . $method . $params . $id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}
