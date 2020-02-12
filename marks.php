<?php 

$baseUrl = 'http://e-learning.alaji.fr/webservice/rest/server.php?';
$format = 'moodlewsrestformat=json';
$token = '92e270ed7da760d3d6df191e5582337b';

function getMarks($id) {
    global $baseUrl;
    global $format;
    global $token;

    $params = '&attemptid=';
    $method = 'mod_quiz_get_attempt_review';

    $uri = $baseUrl.$format.'&wstoken='.$token.'&wsfunction='.$method.$params.$id;
    $response = json_decode(file_get_contents($uri));

    $marks = [
        intval($response->questions[0]->mark),
        intval($response->questions[1]->mark),
        intval($response->questions[2]->mark),
        intval($response->questions[3]->mark)
    ];
    
    return $marks;
}

print_r(getMarks(448));
