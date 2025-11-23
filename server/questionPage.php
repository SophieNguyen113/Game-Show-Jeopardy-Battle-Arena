<?php

session_start();

if (!isset($_COOKIE["player1Score"])) {
    setcookie("player1Score", "0", time() + 31536000);
}
if (!isset($_COOKIE["player2Score"])) {
    setcookie("player2Score", "0", time() + 31536000);
}

$player1turn = isset($_COOKIE["player1turn"]) && $_COOKIE["player1turn"];
$player1Score = $_COOKIE["player1Score"] ?? 0;
$player2Score = $_COOKIE["player2Score"] ?? 0;

// Check if this is a Daily Double question
$dd1 = $_COOKIE['daily_double_1'] ?? '';
$dd2 = $_COOKIE['daily_double_2'] ?? '';

function setQuestion4($q, $correct, $opt1, $opt2, $opt3, $opt4, $score, $cookieName, $category) {
    setcookie($cookieName, TRUE, time() + 31536000);
    return [
        "question" => $q,
        "correctAnswer" => $correct,
        "firstOption" => $opt1,
        "secondOption" => $opt2,
        "thirdOption" => $opt3,
        "fourthOption" => $opt4,
        "questionScore" => $score,
        "category" => $category,
        "buttonName" => $cookieName
    ];
}

$data = [];

// Space category questions
if (isset($_POST["firstfirst"])) {
    $data = setQuestion4("What is the closest planet to the Sun?", "thirdOption", "Earth", "Mars", "Mercury", "Venus", 10, "firstfirst", "space");
} elseif (isset($_POST["secondfirst"])) {
    $data = setQuestion4("Which galaxy do we live in?", "thirdOption", "Andromeda", "Whirlpool", "Milky Way", "Sombrero", 20, "secondfirst", "space");
} elseif (isset($_POST["thirdfirst"])) {
    $data = setQuestion4("What is the largest type of star?", "fourthOption", "White dwarf", "Neutron star", "Red dwarf", "Red supergiant", 30, "thirdfirst", "space");
} elseif (isset($_POST["fourthfirst"])) {
    $data = setQuestion4("Which black hole was photographed in 2019?", "thirdOption", "Sagittarius A*", "Cygnus X-1", "M87*", "V404 Cygni", 40, "fourthfirst", "space");
} elseif (isset($_POST["fifthfirst"])) {
    $data = setQuestion4("What force keeps planets in orbit?", "secondOption", "Magnetism", "Gravity", "Solar wind", "Radiation", 50, "fifthfirst", "space");
}

// Health category questions
elseif (isset($_POST["firstsecond"])) {
    $data = setQuestion4("What is the strongest muscle by weight?", "secondOption", "Heart", "Jaw (masseter)", "Gluteus maximus", "Bicep", 10, "firstsecond", "health");
} elseif (isset($_POST["secondsecond"])) {
    $data = setQuestion4("How many bones does an adult human have?", "thirdOption", "150", "201", "206", "250", 20, "secondsecond", "health");
} elseif (isset($_POST["thirdsecond"])) {
    $data = setQuestion4("Which organ produces insulin?", "secondOption", "Liver", "Pancreas", "Kidney", "Stomach", 30, "thirdsecond", "health");
} elseif (isset($_POST["fourthsecond"])) {
    $data = setQuestion4("What blood type is the universal donor?", "thirdOption", "A-", "AB+", "O-", "B+", 40, "fourthsecond", "health");
} elseif (isset($_POST["fifthsecond"])) {
    $data = setQuestion4("Which vitamin comes from sunlight?", "fourthOption", "Vitamin A", "Vitamin B12", "Vitamin C", "Vitamin D", 50, "fifthsecond", "health");
}

// World category questions
elseif (isset($_POST["firstthird"])) {
    $data = setQuestion4("What is the largest continent?", "secondOption", "Africa", "Asia", "Europe", "North America", 10, "firstthird", "world");
} elseif (isset($_POST["secondthird"])) {
    $data = setQuestion4("What is the capital of Australia?", "secondOption", "Sydney", "Canberra", "Melbourne", "Perth", 20, "secondthird", "world");
} elseif (isset($_POST["thirdthird"])) {
    $data = setQuestion4("Which African country has the largest population?", "thirdOption", "Kenya", "Ethiopia", "Nigeria", "Egypt", 30, "thirdthird", "world");
} elseif (isset($_POST["fourththird"])) {
    $data = setQuestion4("What is the longest river in the world?", "secondOption", "Amazon", "Nile", "Yangtze", "Mississippi", 40, "fourththird", "world");
} elseif (isset($_POST["fifththird"])) {
    $data = setQuestion4("Which country is landlocked?", "fourthOption", "Thailand", "Vietnam", "Malaysia", "Bolivia", 50, "fifththird", "world");
}

// Tech category questions
elseif (isset($_POST["firstfourth"])) {
    $data = setQuestion4("What does CPU of computers stand for?", "firstOption", "Central Processing Unit", "Core Power Unit", "Central Program Utility", "Computer Processing Unit", 10, "firstfourth", "tech");
} elseif (isset($_POST["secondfourth"])) {
    $data = setQuestion4("Which famous company created the iPhone?", "secondOption", "Samsung", "Apple", "Google", "Microsoft", 20, "secondfourth", "tech");
} elseif (isset($_POST["thirdfourth"])) {
    $data = setQuestion4("What does HTML on coding language stand for?", "secondOption", "Hyper Trainer Markup Language", "Hyper Text Markup Language", "Hosting Text Module Language", "Hyperlink Text Mode Layout", 30, "thirdfourth", "tech");
} elseif (isset($_POST["fourthfourth"])) {
    $data = setQuestion4("Which language is used heavily in machine learning?", "thirdOption", "Java", "C#", "Python", "Swift", 40, "fourthfourth", "tech");
} elseif (isset($_POST["fifthfourth"])) {
    $data = setQuestion4("Moore's Law states transistor count...", "secondOption", "Halves every decade", "Doubles every two years", "Triples every year", "Stays constant", 50, "fifthfourth", "tech");
}

// Movies category questions
elseif (isset($_POST["firstfifth"])) {
    $data = setQuestion4("Who is the main character in Toy Story?", "thirdOption", "Jessie", "Rex", "Woody", "Buzz Lightyear", 10, "firstfifth", "movies");
} elseif (isset($_POST["secondfifth"])) {
    $data = setQuestion4("Which movie has famous quote 'I'll be back'?", "secondOption", "Rocky", "Terminator", "Predator", "Rambo", 20, "secondfifth", "movies");
} elseif (isset($_POST["thirdfifth"])) {
    $data = setQuestion4("Who directed Inception, a science fiction action film?", "thirdOption", "Steven Spielberg", "James Cameron", "Christopher Nolan", "Ridley Scott", 30, "thirdfifth", "movies");
} elseif (isset($_POST["fourthfifth"])) {
    $data = setQuestion4("What is the highest-grossing movie of all time?", "secondOption", "Avengers: Endgame", "Avatar", "Titanic", "Star Wars: The Force Awakens", 40, "fourthfifth", "movies");
} elseif (isset($_POST["fifthfifth"])) {
    $data = setQuestion4("Who is the well-known 'Queen of Pop'?", "secondOption", "Taylor Swift", "Madonna", "Ariana Grande", "Beyoncé", 50, "fifthfifth", "movies");
}

// Check if this question is a Daily Double
$isDailyDouble = false;
if (isset($data["buttonName"]) && ($data["buttonName"] === $dd1 || $data["buttonName"] === $dd2)) {
    $isDailyDouble = true;
}

// If Daily Double and no wager yet, redirect to wager page
if ($isDailyDouble && (!isset($_COOKIE['current_wager']) || $_COOKIE['current_wager'] == '0')) {
    $currentPlayerScore = $player1turn ? (int)$player1Score : (int)$player2Score;
    $maxWager = max($currentPlayerScore, 50);
    
    // Store data needed for wager page
    setcookie('wager_max', (string)$maxWager, time() + 31536000);
    setcookie('wager_current_score', (string)$currentPlayerScore, time() + 31536000);
    
    // Store which button was clicked so we can reload the question after wagering
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['firstfirst','firstsecond','firstthird','firstfourth','firstfifth',
            'secondfirst','secondsecond','secondthird','secondfourth','secondfifth',
            'thirdfirst','thirdsecond','thirdthird','thirdfourth','thirdfifth',
            'fourthfirst','fourthsecond','fourththird','fourthfourth','fourthfifth',
            'fifthfirst','fifthsecond','fifththird','fifthfourth','fifthfifth'])) {
            setcookie('pending_question_button', $key, time() + 31536000);
            break;
        }
    }
    
    header('Location: dailyDoubleWager.php');
    exit;
}

// If Daily Double with wager set, use wager as question score
if ($isDailyDouble && isset($_COOKIE['current_wager']) && $_COOKIE['current_wager'] > 0) {
    $data["questionScore"] = (int)$_COOKIE['current_wager'];
    $data["isDailyDouble"] = true;
    // Clear the wager cookie after using it
    setcookie('current_wager', '0', time() + 31536000);
} else {
    $data["isDailyDouble"] = false;
}

include "../client/questionPage.html";

?>