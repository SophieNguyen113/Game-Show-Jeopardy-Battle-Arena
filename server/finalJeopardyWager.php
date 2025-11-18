<?php

session_start();

$player1Score = (int)($_COOKIE['player1Score'] ?? 0);
$player2Score = (int)($_COOKIE['player2Score'] ?? 0);

setcookie('final_started', '1', time() + 31536000);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wager_submit'])) {
    $p1w = isset($_POST['p1_wager']) ? (int)$_POST['p1_wager'] : -1;
    $p2w = isset($_POST['p2_wager']) ? (int)$_POST['p2_wager'] : -1;

    $p1max = max(0, $player1Score);
    $p2max = max(0, $player2Score);

    $valid = ($p1w >= 0 && $p1w <= $p1max) && ($p2w >= 0 && $p2w <= $p2max);

    if ($valid) {
        setcookie('final_wager_p1', (string)$p1w, time() + 31536000);
        setcookie('final_wager_p2', (string)$p2w, time() + 31536000);

        header('Location: finalJeopardy.php');
        exit;
    } else {
        $error = 'Invalid wager amounts. Please check limits.';
    }
}

include "../client/finalJeopardyWager.html";

?>