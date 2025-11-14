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

function setQuestion4($q, $correct, $opt1, $opt2, $opt3, $opt4, $score, $cookieName) {
    setcookie($cookieName, TRUE, time() + 31536000);
    return [
        "question" => $q,
        "correctAnswer" => $correct,
        "firstOption" => $opt1,
        "secondOption" => $opt2,
        "thirdOption" => $opt3,
        "fourthOption" => $opt4,
        "questionScore" => $score
    ];
}

$data = [];

if (isset($_POST["firstfirst"])) {
    $data = setQuestion4(
        "What is the closest planet to the Sun?", 
        "thirdOption",
        "Earth", 
        "Mars", 
        "Mercury", 
        "Venus",
        10, 
        "firstfirst"
    );
} elseif (isset($_POST["firstsecond"])) {
    $data = setQuestion4(
        "Which galaxy do we live in?",
        "thirdOption",
        "Andromeda",
        "Whirlpool",
        "Milky Way",
        "Sombrero",
        20,
        "firstsecond"
    );

} elseif (isset($_POST["firstthird"])) {
    $data = setQuestion4(
        "What is the largest type of star?",
        "thirdOption",
        "White dwarf",
        "Neutron star",
        "Red dwarf",
        "Red supergiant",
        30,
        "firstthird"
    );

} elseif (isset($_POST["firstfourth"])) {
    $data = setQuestion4(
        "Which black hole was photographed in 2019?",
        "thirdOption",
        "Sagittarius A*",
        "Cygnus X-1",
        "M87*",
        "V404 Cygni",
        40,
        "firstfourth"
    );

} elseif (isset($_POST["firstfifth"])) {
    $data = setQuestion4(
        "What force keeps planets in orbit?",
        "secondOption",
        "Magnetism",
        "Gravity",
        "Solar wind",
        "Radiation",
        50,
        "firstfifth"
    );

} elseif (isset($_POST["secondfirst"])) {
    $data = setQuestion4(
        "What is the strongest muscle by weight?",
        "secondOption",
        "Heart",
        "Jaw (masseter)",
        "Gluteus maximus",
        "Bicep",
        10,
        "secondfirst"
    );

} elseif (isset($_POST["secondsecond"])) {
    $data = setQuestion4(
        "How many bones does an adult human have?",
        "thirdOption",
        "150",
        "201",
        "206",
        "250",
        20,
        "secondsecond"
    );

} elseif (isset($_POST["secondthird"])) {
    $data = setQuestion4(
        "Which organ produces insulin?",
        "secondOption",
        "Liver",
        "Pancreas",
        "Kidney",
        "Stomach",
        30,
        "secondthird"
    );

} elseif (isset($_POST["secondfourth"])) {
    $data = setQuestion4(
        "What blood type is the universal donor?",
        "thirdOption",
        "A-",
        "AB+",
        "O-",
        "B+",
        40,
        "secondfourth"
    );

} elseif (isset($_POST["secondfifth"])) {
    $data = setQuestion4(
        "Which vitamin comes from sunlight?",
        "fourthOption",
        "Vitamin A",
        "Vitamin B12",
        "Vitamin C",
        "Vitamin D",
        50,
        "secondfifth"
    );

} elseif (isset($_POST["thirdfirst"])) {
    $data = setQuestion4(
        "What is the largest continent?",
        "secondOption",
        "Africa",
        "Asia",
        "Europe",
        "North America",
        10,
        "thirdfirst"
    );

} elseif (isset($_POST["thirdsecond"])) {
    $data = setQuestion4(
        "What is the capital of Australia?",
        "secondOption",
        "Sydney",
        "Canberra",
        "Melbourne",
        "Perth",
        20,
        "thirdsecond"
    );

} elseif (isset($_POST["thirdthird"])) {
    $data = setQuestion4(
        "Which African country has the largest population?",
        "thirdOption",
        "Kenya",
        "Ethiopia",
        "Nigeria",
        "Egypt",
        30,
        "thirdthird"
    );

} elseif (isset($_POST["thirdfourth"])) {
    $data = setQuestion4(
        "What is the longest river in the world?",
        "firstOption",
        "Amazon",
        "Nile",
        "Yangtze",
        "Mississippi",
        40,
        "thirdfourth"
    );

} elseif (isset($_POST["thirdfifth"])) {
    $data = setQuestion4(
        "Which country is landlocked?",
        "fourthOption",
        "Thailand",
        "Vietnam",
        "Malaysia",
        "Bolivia",
        50,
        "thirdfifth"
    );

} elseif (isset($_POST["fourthfirst"])) {
    $data = setQuestion4(
        "What does CPU stand for?",
        "firstOption",
        "Central Processing Unit",
        "Core Power Unit",
        "Central Program Utility",
        "Computer Processing Unit",
        10,
        "fourthfirst"
    );

} elseif (isset($_POST["fourthsecond"])) {
    $data = setQuestion4(
        "Which company created the iPhone?",
        "secondOption",
        "Samsung",
        "Apple",
        "Google",
        "Microsoft",
        20,
        "fourthsecond"
    );

} elseif (isset($_POST["fourththird"])) {
    $data = setQuestion4(
        "What does HTML stand for?",
        "secondOption",
        "Hyper Trainer Markup Language",
        "Hyper Text Markup Language",
        "Hosting Text Module Language",
        "Hyperlink Text Mode Layout",
        30,
        "fourththird"
    );

} elseif (isset($_POST["fourthfourth"])) {
    $data = setQuestion4(
        "Which language is used heavily in machine learning?",
        "thirdOption",
        "Java",
        "C#",
        "Python",
        "Swift",
        40,
        "fourthfourth"
    );

} elseif (isset($_POST["fourthfifth"])) {
    $data = setQuestion4(
        "Moore’s Law states transistor count...",
        "secondOption",
        "Halves every decade",
        "Doubles every two years",
        "Triples every year",
        "Stays constant",
        50,
        "fourthfifth"
    );

} elseif (isset($_POST["fifthfirst"])) {
    $data = setQuestion4(
        "Who is the main character in Toy Story?",
        "thirdOption",
        "Jessie",
        "Rex",
        "Woody",
        "Buzz Lightyear",
        10,
        "fifthfirst"
    );

} elseif (isset($_POST["fifthsecond"])) {
    $data = setQuestion4(
        "Which movie has 'I'll be back'?",
        "secondOption",
        "Rocky",
        "Terminator",
        "Predator",
        "Rambo",
        20,
        "fifthsecond"
    );

} elseif (isset($_POST["fifththird"])) {
    $data = setQuestion4(
        "Who directed Inception?",
        "thirdOption",
        "Steven Spielberg",
        "James Cameron",
        "Christopher Nolan",
        "Ridley Scott",
        30,
        "fifththird"
    );

} elseif (isset($_POST["fifthfourth"])) {
    $data = setQuestion4(
        "Highest-grossing movie of all time?",
        "secondOption",
        "Avengers: Endgame",
        "Avatar",
        "Titanic",
        "Star Wars: The Force Awakens",
        40,
        "fifthfourth"
    );

} elseif (isset($_POST["fifthfifth"])) {
    $data = setQuestion4(
        "Who is the 'Queen of Pop'?",
        "secondOption",
        "Taylor Swift",
        "Madonna",
        "Ariana Grande",
        "Beyoncé",
        50,
        "fifthfifth"
    );
}

include "../client/questionPage.html";

?>