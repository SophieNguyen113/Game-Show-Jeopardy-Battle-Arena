<?php

session_start();

$p1Score = (int)($_COOKIE['player1Score'] ?? 0);
$p2Score = (int)($_COOKIE['player2Score'] ?? 0);
$p1Wager = isset($_COOKIE['final_wager_p1']) ? (int)$_COOKIE['final_wager_p1'] : null;
$p2Wager = isset($_COOKIE['final_wager_p2']) ? (int)$_COOKIE['final_wager_p2'] : null;

if ($p1Wager === null || $p2Wager === null) {
    header('Location: finalJeopardyWager.php');
    exit;
}

$finalQuestions = [
    [
        'question' => 'In math, what is the only even prime number?',
        'correctAnswer' => 'firstOption',
        'firstOption' => '2',
        'secondOption' => '0',
        'thirdOption' => '4',
        'fourthOption' => '6'
    ],
    [
        'question' => 'Which ocean is the largest by surface area?',
        'correctAnswer' => 'secondOption',
        'firstOption' => 'Atlantic',
        'secondOption' => 'Pacific',
        'thirdOption' => 'Indian',
        'fourthOption' => 'Arctic'
    ],
    [
        'question' => 'HTML stands for?',
        'correctAnswer' => 'thirdOption',
        'firstOption' => 'Hyper Tool Multi Language',
        'secondOption' => 'Hyperlinks and Text Marking Language',
        'thirdOption' => 'Hyper Text Markup Language',
        'fourthOption' => 'Home Tool Markup Language'
    ],
    [
        'question' => 'The Earth revolves around the Sun in about how many days?',
        'correctAnswer' => 'fourthOption',
        'firstOption' => '180',
        'secondOption' => '300',
        'thirdOption' => '400',
        'fourthOption' => '365'
    ],
    [
        'question' => 'Which vitamin do we primarily get from sunlight exposure?',
        'correctAnswer' => 'firstOption',
        'firstOption' => 'Vitamin D',
        'secondOption' => 'Vitamin C',
        'thirdOption' => 'Vitamin B12',
        'fourthOption' => 'Vitamin A'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['final_submit'])) {
    $p1Ans = $_POST['p1_selectedAnswer'] ?? '';
    $p2Ans = $_POST['p2_selectedAnswer'] ?? '';
    $correct = isset($_SESSION['final_correct']) ? $_SESSION['final_correct'] : '';

    if ($correct !== '') {
        if ($p1Ans === $correct) {
            $p1Score += $p1Wager;
        } else {
            $p1Score -= $p1Wager;
        }
        if ($p2Ans === $correct) {
            $p2Score += $p2Wager;
        } else {
            $p2Score -= $p2Wager;
        }

        setcookie('player1Score', (string)$p1Score, time() + 31536000);
        setcookie('player2Score', (string)$p2Score, time() + 31536000);
        setcookie('final_completed', '1', time() + 31536000);

        setcookie('final_wager_p1', '', time() - 3600);
        setcookie('final_wager_p2', '', time() - 3600);

        if ($p1Score > $p2Score) {
            header('Location: ../client/winner1.html');
            exit;
        } elseif ($p2Score > $p1Score) {
            header('Location: ../client/winner2.html');
            exit;
        } else {
            header('Location: ../client/tie.html');
            exit;
        }
    }
}

if (!isset($_SESSION['final_question'])) {
    $idx = random_int(0, count($finalQuestions) - 1);
    $_SESSION['final_question'] = $finalQuestions[$idx];
    $_SESSION['final_correct'] = $finalQuestions[$idx]['correctAnswer'];
}

$q = $_SESSION['final_question'];

$data = [
    'question' => $q['question'],
    'firstOption' => $q['firstOption'],
    'secondOption' => $q['secondOption'],
    'thirdOption' => $q['thirdOption'],
    'fourthOption' => $q['fourthOption']
];

include "../client/finalJeopardy.html";

?>