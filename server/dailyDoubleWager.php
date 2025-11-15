<?php

session_start();

$currentPlayerScore = (int)($_COOKIE['wager_current_score'] ?? 0);
$maxWager = (int)($_COOKIE['wager_max'] ?? 50);

// Handle wager submission
if (isset($_POST['wager_submit']) && isset($_POST['wager_amount'])) {
    $wagerAmount = (int)$_POST['wager_amount'];
    if ($wagerAmount >= 5 && $wagerAmount <= $maxWager) {
        setcookie('current_wager', (string)$wagerAmount, time() + 31536000);
        
        // Redirect back to questionPage with the original button POST data
        $pendingButton = $_COOKIE['pending_question_button'] ?? '';
        if ($pendingButton) {
            // Create a form that auto-submits to preserve POST data
            echo '<!DOCTYPE html><html><body><form id="autoForm" method="post" action="questionPage.php">';
            echo '<input type="hidden" name="' . htmlspecialchars($pendingButton) . '" value="1">';
            echo '</form><script>document.getElementById("autoForm").submit();</script></body></html>';
            exit;
        } else {
            header('Location: questionPage.php');
            exit;
        }
    }
}

include "../client/dailyDoubleWager.html";

?>