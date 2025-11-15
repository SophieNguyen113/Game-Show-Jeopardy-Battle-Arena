<?php

    setcookie("player1Score", 0, time() + 31536000);
    setcookie("player2Score", 0, time() + 31536000);
    setcookie("player1turn", TRUE, time() + 31536000);
    setcookie("player2turn", FALSE, time() + 31536000);
    setcookie("questionCount", 0 , time() + 31536000);
    
    // Reset category mastery tracking
    setcookie('player1_space', '0', time() + 31536000);
    setcookie('player1_health', '0', time() + 31536000);
    setcookie('player1_world', '0', time() + 31536000);
    setcookie('player1_tech', '0', time() + 31536000);
    setcookie('player1_movies', '0', time() + 31536000);
    setcookie('player2_space', '0', time() + 31536000);
    setcookie('player2_health', '0', time() + 31536000);
    setcookie('player2_world', '0', time() + 31536000);
    setcookie('player2_tech', '0', time() + 31536000);
    setcookie('player2_movies', '0', time() + 31536000);
    
    // Reset Daily Double tracking
    setcookie('daily_double_1', '', time() - 3600);
    setcookie('daily_double_2', '', time() - 3600);
    setcookie('current_wager', '0', time() + 31536000);
    setcookie('pending_question_button', '', time() - 3600);
    setcookie('mastery_message', '', time() - 3600);
    setcookie('wager_max', '0', time() - 3600);
    setcookie('wager_current_score', '0', time() - 3600);
    
    setcookie("firstfirst", FALSE, time() + 31536000);
    setcookie("firstsecond", FALSE, time() + 31536000);
    setcookie("firstthird", FALSE, time() + 31536000);
    setcookie("firstfourth", FALSE, time() + 31536000);
    setcookie("firstfifth", FALSE, time() + 31536000);

    setcookie("secondfirst", FALSE, time() + 31536000);
    setcookie("secondsecond", FALSE, time() + 31536000);
    setcookie("secondthird", FALSE, time() + 31536000);
    setcookie("secondfourth", FALSE, time() + 31536000);
    setcookie("secondfifth", FALSE, time() + 31536000);

    setcookie("thirdfirst", FALSE, time() + 31536000);
    setcookie("thirdsecond", FALSE, time() + 31536000);
    setcookie("thirdthird", FALSE, time() + 31536000);
    setcookie("thirdfourth", FALSE, time() + 31536000);
    setcookie("thirdfifth", FALSE, time() + 31536000);

    setcookie("fourthfirst", FALSE, time() + 31536000);
    setcookie("fourthsecond", FALSE, time() + 31536000);
    setcookie("fourththird", FALSE, time() + 31536000);
    setcookie("fourthfourth", FALSE, time() + 31536000);
    setcookie("fourthfifth", FALSE, time() + 31536000);

    setcookie("fifthfirst", FALSE, time() + 31536000);
    setcookie("fifthsecond", FALSE, time() + 31536000);
    setcookie("fifththird", FALSE, time() + 31536000);
    setcookie("fifthfourth", FALSE, time() + 31536000);
    setcookie("fifthfifth", FALSE, time() + 31536000);

    header("location: ../client/about.html");
    
?>