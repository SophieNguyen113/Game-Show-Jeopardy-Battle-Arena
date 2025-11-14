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

function setQuestion($q, $correct, $opt1, $opt2, $score, $cookieName) {
    setcookie($cookieName, TRUE, time() + 31536000);
    return [
        "question" => $q,
        "correctAnswer" => $correct,
        "firstOption" => $opt1,
        "secondOption" => $opt2,
        "questionScore" => $score
    ];
}

$data = [];

if (isset($_POST["firstfirst"])) {
    $data = setQuestion("What are the symptoms of dengue fever?", "firstOption", "Fever, headache, rashes, joint-muscle pain", "Fever, blood clotting, back pain", 10, "firstfirst");
} elseif (isset($_POST["firstsecond"])) {
    $data = setQuestion("Malaria is transmitted by a mosquito bite, but what causes the disease? ", "firstOption", "A parasite", "A virus", 10, "firstsecond");
} elseif (isset($_POST["firstthird"])) {
    $data = setQuestion("What is the scientific name for the chicken pox virus?", "secondOption", "Vaccina virus", "Varicella zoster", 10, "firstthird");
} elseif (isset($_POST["firstfourth"])) {
    $data = setQuestion("What is Polio?", "firstOption", "Virus", "Bacteria", 10, "firstfourth");
} elseif (isset($_POST["firstfifth"])) {
    $data = setQuestion("Cancer is the result of the uncontrolled growth of abnormal cells anywhere in the body", "firstOption", "True", "False", 10, "firstfifth");
} elseif (isset($_POST["secondfirst"])) {
    $data = setQuestion("Do people who have contracted dengue fever need to be quarantined?", "secondOption", "True", "False", 20, "secondfirst");
} elseif (isset($_POST["secondsecond"])) {
    $data = setQuestion("Which of the following US presidents did not suffer from malaria during his lifetime?", "secondOption", "George Washington", "Richard Nixon", 20, "secondsecond");
} elseif (isset($_POST["secondthird"])) {
    $data = setQuestion("Which ages account for half of the victims of chicken pox?", "firstOption", "5-9", "10-31", 20, "secondthird");
} elseif (isset($_POST["secondfourth"])) {
    $data = setQuestion("Polio is also known as poliomyelitis.", "firstOption", "True", "False", 20, "secondfourth");
} elseif (isset($_POST["secondfifth"])) {
    $data = setQuestion("Most common form of cancer in all humans.", "secondOption", "Brain cancer", "Skin cancer", 20, "secondfifth");
} elseif (isset($_POST["thirdfirst"])) {
    $data = setQuestion("Is it possible to be infected with dengue virus but have no symptoms?", "firstOption", "True", "False", 30, "thirdfirst");
} elseif (isset($_POST["thirdsecond"])) {
    $data = setQuestion("Which of the following can repel mosquitoes?", "firstOption", "Citronella", "Banana", 30, "thirdsecond");
} elseif (isset($_POST["thirdthird"])) {
    $data = setQuestion("The virus that causes chicken pox is a part of what virus family?", "secondOption", "coronaviruses", "herpesviruses", 30, "thirdthird");
} elseif (isset($_POST["thirdfourth"])) {
    $data = setQuestion("Who invented the Polio Vaccine?", "secondOption", "Hiram Maxim", "Jonas Salk", 30, "thirdfourth");
} elseif (isset($_POST["thirdfifth"])) {
    $data = setQuestion("Tobacco causes _______ of cancer deaths around the world", "secondOption", "30%", "22%", 30, "thirdfifth");
} elseif (isset($_POST["fourthfirst"])) {
    $data = setQuestion("Is it possible to be infected with dengue virus but have no symptoms?", "secondOption", "3 to 9 Days", "5 to 7 Days", 40, "fourthfirst");
} elseif (isset($_POST["fourthsecond"])) {
    $data = setQuestion("According to the World Health Organization's estimate in 2000, malaria kills one child how often?", "secondOption", "every 5 minutes", "every 30 seconds", 40, "fourthsecond");
} elseif (isset($_POST["fourththird"])) {
    $data = setQuestion("The spots, which are symptoms of the chicken pox disease, start in which of the following places?", "firstOption", "Face and trunk", "Knees and elbows", 40, "fourththird");
} elseif (isset($_POST["fourthfourth"])) {
    $data = setQuestion("What is the machine they would put polio patients in?", "firstOption", "Iron Lung", "Automated Breathing Apparatus", 40, "fourthfourth");
} elseif (isset($_POST["fourthfifth"])) {
    $data = setQuestion("Which of the viruses below causes cancer resulting from chronic infection?", "secondOption", "Herpes simplex viruses (HSV)", "Human papilloma virus (HPV) and Hepatitis B virus (HBV)", 40, "fourthfifth");
} elseif (isset($_POST["fifthfirst"])) {
    $data = setQuestion("If you get dengue fever once, can you get it again?", "firstOption", "True", "False", 50, "fifthfirst");
} elseif (isset($_POST["fifthsecond"])) {
    $data = setQuestion("Which of these drinks contains quinine, an anti-malarial property?", "firstOption", "Tonic", "Red Bull", 50, "fifthsecond");
} elseif (isset($_POST["fifththird"])) {
    $data = setQuestion("Chicken pox isn't contagious.", "secondOption", "True", "False", 50, "fifththird");
} elseif (isset($_POST["fifthfourth"])) {
    $data = setQuestion("Which year was the polio Vaccine released?", "secondOption", "1985", "1955", 50, "fifthfourth");
} elseif (isset($_POST["fifthfifth"])) {
    $data = setQuestion("What kind of foods are linked to colon cancer?", "firstOption", "Processed meats", "Foods with salt substitutes", 50, "fifthfifth");
}

include "../client/questionPage.html";

?>