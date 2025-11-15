<?php

session_start();

$player1Score = $_COOKIE['player1Score'] ?? '0';
$player2Score = $_COOKIE['player2Score'] ?? '0';
$questionCount = isset($_COOKIE['questionCount']) ? (int)$_COOKIE['questionCount'] : 0;
$player1turn = isset($_COOKIE['player1turn']) ? filter_var($_COOKIE['player1turn'], FILTER_VALIDATE_BOOLEAN) : true;

// Initialize category mastery tracking
if (!isset($_COOKIE['player1_space'])) {
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
}

// Initialize Daily Double positions (randomly select 2 questions) - Only once per game
if (!isset($_COOKIE['daily_double_1']) || $_COOKIE['daily_double_1'] === '') {
	$allButtons = [
		'firstfirst','firstsecond','firstthird','firstfourth','firstfifth',
		'secondfirst','secondsecond','secondthird','secondfourth','secondfifth',
		'thirdfirst','thirdsecond','thirdthird','thirdfourth','thirdfifth',
		'fourthfirst','fourthsecond','fourththird','fourthfourth','fourthfifth',
		'fifthfirst','fifthsecond','fifththird','fifthfourth','fifthfifth'
	];
	
	// Use better randomization
	$randomKeys = array_rand($allButtons, 2);
	$dd1 = $allButtons[$randomKeys[0]];
	$dd2 = $allButtons[$randomKeys[1]];
	
	setcookie('daily_double_1', $dd1, time() + 31536000);
	setcookie('daily_double_2', $dd2, time() + 31536000);
}

if (!isset($_COOKIE['player1Score'])) {
	setcookie('player1Score', $player1Score, time() + 31536000);
}
if (!isset($_COOKIE['player2Score'])) {
	setcookie('player2Score', $player2Score, time() + 31536000);
}
if (!isset($_COOKIE['questionCount'])) {
	setcookie('questionCount', $questionCount, time() + 31536000);
}
if (!isset($_COOKIE['player1turn'])) {
	setcookie('player1turn', $player1turn ? '1' : '0', time() + 31536000);
	setcookie('player2turn', $player1turn ? '0' : '1', time() + 31536000);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['answerButton'])) {
		$newCount = $questionCount + 1;
		setcookie('questionCount', $newCount, time() + 31536000);

		$correct = ($_POST['correctAnswer'] ?? '') === ($_POST['selectedAnswer'] ?? '');
		$questionScore = (int)($_POST['questionScore'] ?? 0);
		$category = $_POST['category'] ?? '';
		$wasDailyDouble = isset($_POST['was_daily_double']) && $_POST['was_daily_double'] === '1';

		if ($correct) {
			$p1turn = isset($_COOKIE['player1turn']) ? filter_var($_COOKIE['player1turn'], FILTER_VALIDATE_BOOLEAN) : $player1turn;
			
			// Update score - ADD points for correct answer
			if ($p1turn) {
				$player1Score = ((int)$player1Score + $questionScore);
				setcookie('player1Score', (string)$player1Score, time() + 31536000);
				
				// Update category mastery
				$currentMastery = (int)($_COOKIE["player1_$category"] ?? 0);
				$newMastery = $currentMastery + 1;
				setcookie("player1_$category", (string)$newMastery, time() + 31536000);
				
				// Check for Category Mastery Bonus (2+ correct in same category)
				if ($newMastery == 2) {
					$bonusPoints = 25;
					$player1Score = ((int)$player1Score + $bonusPoints);
					setcookie('player1Score', (string)$player1Score, time() + 31536000);
					setcookie('mastery_message', "Player 1 earned a 25-point Category Mastery Bonus for " . ucfirst($category) . "!", time() + 10);
					// Reset category counter after bonus
					setcookie("player1_$category", '0', time() + 31536000);
				}
			} else {
				$player2Score = ((int)$player2Score + $questionScore);
				setcookie('player2Score', (string)$player2Score, time() + 31536000);
				
				// Update category mastery
				$currentMastery = (int)($_COOKIE["player2_$category"] ?? 0);
				$newMastery = $currentMastery + 1;
				setcookie("player2_$category", (string)$newMastery, time() + 31536000);
				
				// Check for Category Mastery Bonus
				if ($newMastery == 2) {
					$bonusPoints = 25;
					$player2Score = ((int)$player2Score + $bonusPoints);
					setcookie('player2Score', (string)$player2Score, time() + 31536000);
					setcookie('mastery_message', "Player 2 earned a 25-point Category Mastery Bonus for " . ucfirst($category) . "!", time() + 10);
					// Reset category counter after bonus
					setcookie("player2_$category", '0', time() + 31536000);
				}
			}
		} else {
			// Wrong answer
			$p1turn = isset($_COOKIE['player1turn']) ? filter_var($_COOKIE['player1turn'], FILTER_VALIDATE_BOOLEAN) : $player1turn;
			
			// Reset category mastery on wrong answer if they had progress
			if (!empty($category)) {
				if ($p1turn) {
					$currentMastery = (int)($_COOKIE["player1_$category"] ?? 0);
					if ($currentMastery > 0) {
						setcookie("player1_$category", '0', time() + 31536000);
					}
				} else {
					$currentMastery = (int)($_COOKIE["player2_$category"] ?? 0);
					if ($currentMastery > 0) {
						setcookie("player2_$category", '0', time() + 31536000);
					}
				}
			}
			
			// If Daily Double, SUBTRACT the wager amount
			if ($wasDailyDouble) {
				if ($p1turn) {
					$player1Score = ((int)$player1Score - $questionScore);
					setcookie('player1Score', (string)$player1Score, time() + 31536000);
				} else {
					$player2Score = ((int)$player2Score - $questionScore);
					setcookie('player2Score', (string)$player2Score, time() + 31536000);
				}
			}
			
			// Switch turns
			$p1turn = !$p1turn;
			setcookie('player1turn', $p1turn ? '1' : '0', time() + 31536000);
			setcookie('player2turn', $p1turn ? '0' : '1', time() + 31536000);
			$player1turn = $p1turn;
		}
	}

	$buttonNames = [
		'firstfirst','firstsecond','firstthird','firstfourth','firstfifth',
		'secondfirst','secondsecond','secondthird','secondfourth','secondfifth',
		'thirdfirst','thirdsecond','thirdthird','thirdfourth','thirdfifth',
		'fourthfirst','fourthsecond','fourththird','fourthfourth','fourthfifth',
		'fifthfirst','fifthsecond','fifththird','fifthfourth','fifthfifth'
	];
	foreach ($buttonNames as $bn) {
		if (isset($_POST[$bn])) {
			setcookie($bn, '1', time() + 31536000);
			header('Location: questionPage.php');
			exit;
		}
	}
}

$questionCount = isset($_COOKIE['questionCount']) ? (int)$_COOKIE['questionCount'] : $questionCount;
if ($questionCount >= 25) {
	if ((int)$player1Score > (int)$player2Score) {
		header('Location: ../client/winner1.html');
		exit;
	} else {
		header('Location: ../client/winner2.html');
		exit;
	}
}

function renderButton(string $name, string $label): string {
	$disabled = !empty($_COOKIE[$name]);
	$dd1 = $_COOKIE['daily_double_1'] ?? '';
	$dd2 = $_COOKIE['daily_double_2'] ?? '';
	$isDailyDouble = ($name === $dd1 || $name === $dd2);
	
	if ($disabled) {
		return "<div class=\"col-sm questionbutton\"><button type=\"submit\" name=\"$name\" style=\"width: 100%; height: 100%;\" disabled>$label</button></div>";
	}
	
	$displayLabel = $isDailyDouble ? "DD" : $label;
	$buttonClass = $isDailyDouble ? "daily-double-btn" : "";
	
	return "<div class=\"col-sm questionbutton\"><button type=\"submit\" name=\"$name\" class=\"$buttonClass\" style=\"width: 100%; height: 100%;\">$displayLabel</button></div>";
}

$masteryMessage = '';
if (isset($_COOKIE['mastery_message'])) {
	$masteryMessage = '<div class="alert alert-success mastery-alert">' . htmlspecialchars($_COOKIE['mastery_message'], ENT_QUOTES, 'UTF-8') . '</div>';
}

// Build category mastery tracker HTML
$categories = ['space' => 'Space', 'health' => 'Health', 'world' => 'World', 'tech' => 'Tech', 'movies' => 'Movies'];
$masteryTrackerP1 = '<div class="mastery-tracker"><h3>Player 1 Progress</h3>';
$masteryTrackerP2 = '<div class="mastery-tracker"><h3>Player 2 Progress</h3>';

foreach ($categories as $key => $label) {
	$p1Count = (int)($_COOKIE["player1_$key"] ?? 0);
	$p2Count = (int)($_COOKIE["player2_$key"] ?? 0);
	
	$p1Dots = str_repeat('●', $p1Count) . str_repeat('○', 2 - $p1Count);
	$p2Dots = str_repeat('●', $p2Count) . str_repeat('○', 2 - $p2Count);
	
	$masteryTrackerP1 .= "<div class=\"category-progress\"><span class=\"cat-label\">$label:</span> <span class=\"cat-dots\">$p1Dots</span></div>";
	$masteryTrackerP2 .= "<div class=\"category-progress\"><span class=\"cat-label\">$label:</span> <span class=\"cat-dots\">$p2Dots</span></div>";
}

$masteryTrackerP1 .= '</div>';
$masteryTrackerP2 .= '</div>';

$replacements = [
	'{{PLAYER1_SCORE}}' => htmlspecialchars((string)$player1Score, ENT_QUOTES, 'UTF-8'),
	'{{PLAYER2_SCORE}}' => htmlspecialchars((string)$player2Score, ENT_QUOTES, 'UTF-8'),
	'{{PLAYER2_NAME}}' => isset($_COOKIE['user_name']) ? htmlspecialchars($_COOKIE['user_name'], ENT_QUOTES, 'UTF-8') : 'Player 2',
	'{{LOGIN_LINK}}' => isset($_COOKIE['user_name']) ? "<a style=\"float:right\" href=\"./logout.php\">" . htmlspecialchars($_COOKIE['user_name'], ENT_QUOTES, 'UTF-8') . "</a>" : "<a href=\"./login.html\" style=\"float:right\"> Login </a>",
	'{{PLAYER1_HEADER_CLASS}}' => $player1turn ? 'has-highlight' : '',
	'{{PLAYER2_HEADER_CLASS}}' => $player1turn ? '' : 'has-highlight',
	'{{PLAYER1_SCORE_CLASS}}' => $player1turn ? 'score-highlight' : '',
	'{{PLAYER2_SCORE_CLASS}}' => $player1turn ? '' : 'score-highlight'
];

$replacements['{{BTN_firstfirst}}'] = renderButton('firstfirst', '$10');
$replacements['{{BTN_firstsecond}}'] = renderButton('firstsecond', '$10');
$replacements['{{BTN_firstthird}}'] = renderButton('firstthird', '$10');
$replacements['{{BTN_firstfourth}}'] = renderButton('firstfourth', '$10');
$replacements['{{BTN_firstfifth}}'] = renderButton('firstfifth', '$10');

$replacements['{{BTN_secondfirst}}'] = renderButton('secondfirst', '$20');
$replacements['{{BTN_secondsecond}}'] = renderButton('secondsecond', '$20');
$replacements['{{BTN_secondthird}}'] = renderButton('secondthird', '$20');
$replacements['{{BTN_secondfourth}}'] = renderButton('secondfourth', '$20');
$replacements['{{BTN_secondfifth}}'] = renderButton('secondfifth', '$20');

$replacements['{{BTN_thirdfirst}}'] = renderButton('thirdfirst', '$30');
$replacements['{{BTN_thirdsecond}}'] = renderButton('thirdsecond', '$30');
$replacements['{{BTN_thirdthird}}'] = renderButton('thirdthird', '$30');
$replacements['{{BTN_thirdfourth}}'] = renderButton('thirdfourth', '$30');
$replacements['{{BTN_thirdfifth}}'] = renderButton('thirdfifth', '$30');

$replacements['{{BTN_fourthfirst}}'] = renderButton('fourthfirst', '$40');
$replacements['{{BTN_fourthsecond}}'] = renderButton('fourthsecond', '$40');
$replacements['{{BTN_fourththird}}'] = renderButton('fourththird', '$40');
$replacements['{{BTN_fourthfourth}}'] = renderButton('fourthfourth', '$40');
$replacements['{{BTN_fourthfifth}}'] = renderButton('fourthfifth', '$40');

$replacements['{{BTN_fifthfirst}}'] = renderButton('fifthfirst', '$50');
$replacements['{{BTN_fifthsecond}}'] = renderButton('fifthsecond', '$50');
$replacements['{{BTN_fifththird}}'] = renderButton('fifththird', '$50');
$replacements['{{BTN_fifthfourth}}'] = renderButton('fifthfourth', '$50');
$replacements['{{BTN_fifthfifth}}'] = renderButton('fifthfifth', '$50');

$templatePath = __DIR__ . '/../client/index.html';
if (!file_exists($templatePath)) {
	$fallback = __DIR__ . '/../index.html';
	if (file_exists($fallback)) {
		$templatePath = $fallback;
	} else {
		echo 'Template not found.';
		exit;
	}
}

$content = file_get_contents($templatePath);
$output = strtr($content, $replacements);

// Insert mastery trackers at the very beginning of body content
$trackers = '<div class="mastery-trackers-container">' . $masteryTrackerP1 . $masteryTrackerP2 . '</div>';
$output = str_replace('</header>', '</header>' . $trackers, $output);

// Insert mastery message after the score container
$output = str_replace('<div id="score_container_main">', '<div id="score_container_main">' . $masteryMessage, $output);

header('Content-Type: text/html; charset=utf-8');
echo $output;

?>