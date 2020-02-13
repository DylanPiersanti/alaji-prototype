<?php

$baseUrl = 'http://e-learning.alaji.fr/webservice/rest/server.php?';
$format = 'moodlewsrestformat=json';
$token = '92e270ed7da760d3d6df191e5582337b';

$url = $_SERVER['PHP_SELF'];
$url_array = explode('/', $url);
$studentId = end($url_array);

function getUser($id)
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&criteria[0][key]=id&criteria[0][value]=';
    $method = 'core_user_get_users';

    $uri = $baseUrl . $format . '&wstoken=' . $token . '&wsfunction=' . $method . $params . $id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}

function getMarks($id)
{
    global $baseUrl;
    global $format;
    global $token;

    $params = '&attemptid=';
    $method = 'mod_quiz_get_attempt_review';

    $uri = $baseUrl . $format . '&wstoken=' . $token . '&wsfunction=' . $method . $params . $id;
    $response = json_decode(file_get_contents($uri));

    return $response;
}

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

$attempt = getAttempts($studentId);
$data = getUser($studentId);

$attemptId = end($attempt->attempts)->id;
$review = getMarks($attemptId);


$test1 = intval($review->questions[0]->mark);
$test2 = intval($review->questions[1]->mark);
$test3 = intval($review->questions[2]->mark);
$test4 = intval($review->questions[3]->mark);



$oral2 = null;
$oral3 = null;
$oral4 = null;


if (!isset($_POST['addNote1'])) {
    $oral1 = null;
} else {
    $oral1 = (bool) $_POST['addNote1'];
}

if (!isset($_POST['addNote2'])) {
    $oral2 = null;
} else {
    $oral2 = (bool) $_POST['addNote2'];
}

if (!isset($_POST['addNote3'])) {
    $oral3 = null;
} else {
    $oral3 = (bool) $_POST['addNote3'];
}

if (!isset($_POST['addNote4'])) {
    $oral4 = null;
} else {
    $oral4 = (bool) $_POST['addNote4'];
}


isset($oral1) ? $m1 = ($test1 * 0.23) + ($oral1 * 0.77) : $m1 = '';

if (isset($oral1)) {
    if ($m1 >= 0.5) {
        $debrief1 = 'acquis';
    } else {
        $debrief1 = 'non-acquis';
    }
} else {
    $debrief1 = null;
}

isset($oral2) ? $m2 = ($test2 * 0.89) + ($oral2 * 0.11) : $m2 = '';

if (isset($oral2)) {
    if ($m2 >= 0.5) {
        $debrief2 = 'acquis';
    } else {
        $debrief2 = 'non-acquis';
    }
} else {
    $debrief2 = null;
}

isset($oral3) ? $m3 = ($test3 * 0.52) + ($oral3 * 0.48) : $m3 = '';

if (isset($oral3)) {
    if ($m3 >= 0.5) {
        $debrief3 = 'acquis';
    } else {
        $debrief3 = 'non-acquis';
    }
} else {
    $debrief3 = null;
}

isset($oral4) ? $m4 = ($test4 * 0.34) + ($oral4 * 0.66) : $m4 = '';

if (isset($oral4)) {
    if ($m4 >= 0.5) {
        $debrief4 = 'acquis';
    } else {
        $debrief4 = 'non-acquis';
    }
} else {
    $debrief4 = null;
}