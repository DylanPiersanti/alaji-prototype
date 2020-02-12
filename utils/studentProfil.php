<?php 

$baseUrl = 'http://e-learning.alaji.fr/webservice/rest/server.php?';
$format = 'moodlewsrestformat=json';
$token = '92e270ed7da760d3d6df191e5582337b';

$url = $_SERVER['PHP_SELF'];
$url_array = explode('/',$url);
$studentId = end($url_array);

function getUser($id)
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&criteria[0][key]=id&criteria[0][value]=';
    $method = 'core_user_get_users';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params.$id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}

function getMarks($id) {
    global $baseUrl;
    global $format;
    global $token;

    $params = '&attemptid=';
    $method = 'mod_quiz_get_attempt_review';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params.$id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}

function getAttempts($id) {
    global $baseUrl;
    global $format;
    global $token;

    $params = '&quizid=202&userid=';
    $method = 'mod_quiz_get_user_attempts';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params.$id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}

$attempt = getAttempts($studentId);
$data = getUser($studentId);

$attemptId = end($attempt->attempts)->id;
$review = getMarks($attemptId);

$note1 = $review->questions[0]->mark;