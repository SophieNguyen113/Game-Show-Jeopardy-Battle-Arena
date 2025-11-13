<?php

	session_start();
	
    if(!isset($_COOKIE["player1Score"])){
        setcookie("player1Score","0",time()+ 31536000);
    }
    if(!isset($_COOKIE["player2Score"])){
        setcookie("player2Score","0",time()+ 31536000);
    }
    if($_COOKIE["player1turn"]){
        $player1turn = TRUE;
    }else{
        $player1turn = FALSE;
    }
    $player1Score = $_COOKIE["player1Score"];
    $player2Score = $_COOKIE["player2Score"];
    //echo "player1Score is ".$player1Score."<br>";
	//echo "player2Score is ".$player2Score."<br>";
	if(isset($_POST["firstfirst"])){
        $question = "What are the symptoms of dengue fever?";
        $correctAnswer = "firstOption";
        $firstOption = "Fever, headache, rashes, joint-muscle pain";
        $secondOption = "Fever, blood clotting, back pain";
        $questionScore = 10;
        setcookie("firstfirst", TRUE, time() + 31536000);
	}elseif (isset($_POST["firstsecond"])) {
        $question = "Malaria is transmitted by a mosquito bite, but what causes the disease? ";
        $correctAnswer = "firstOption";
        $firstOption = "A parasite";
        $secondOption = "A virus";
        $questionScore = 10;
        setcookie("firstsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["firstthird"])) {
        $question = "What is the scientific name for the chicken pox virus?";
        $correctAnswer = "secondOption";
        $firstOption = "Vaccina virus";
        $secondOption = "Varicella zoster";
        $questionScore = 10;
        setcookie("firstthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["firstfourth"])) {
        $question = "What is Polio?";
        $correctAnswer = "firstOption";
        $firstOption = "Virus";
        $secondOption = "Bacteria";
        $questionScore = 10;
        setcookie("firstfourth", TRUE, time() + 31536000);
    }elseif (isset($_POST["firstfifth"])) {
        $question = "Cancer is the result of the uncontrolled growth of abnormal cells anywhere in the body";
        $correctAnswer = "firstOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 10;
        setcookie("firstfifth", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondfirst"])) {
        $question = "Do people who have contracted dengue fever need to be quarantined?";
        $correctAnswer = "secondOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 20;
        setcookie("secondfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondsecond"])) {
        $question = "Which of the following US presidents did not suffer from malaria during his lifetime?";
        $correctAnswer = "secondOption";
        $firstOption = "George Washington";
        $secondOption = "Richard Nixon";
        $questionScore = 20;
        setcookie("secondsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondthird"])) {
        $question = "Which ages account for half of the victims of chicken pox?";
        $correctAnswer = "firstOption";
        $firstOption = "5-9";
        $secondOption = "10-31";
        $questionScore = 20;
        setcookie("secondthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondfourth"])) {
        $question = "Polio is also known as poliomyelitis.";
        $correctAnswer = "firstOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 20;
        setcookie("secondfourth", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondfifth"])) {
        $question = "Most common form of cancer in all humans.";
        $correctAnswer = "secondOption";
        $firstOption = "Brain cancer";
        $secondOption = "Skin cancer";
        $questionScore = 20;
        setcookie("secondfifth", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdfirst"])) {
        $question = "Is it possible to be infected with dengue virus but have no symptoms?";
        $correctAnswer = "firstOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 30;
        setcookie("thirdfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdsecond"])) {
        $question = "Which of the following can repel mosquitoes?";
        $correctAnswer = "firstOption";
        $firstOption = "Citronella";
        $secondOption = "Banana";
        $questionScore = 30;
        setcookie("thirdsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdthird"])) {
        $question = "The virus that causes chicken pox is a part of what virus family?";
        $correctAnswer = "secondOption";
        $firstOption = "coronaviruses";
        $secondOption = "herpesviruses";
        $questionScore = 30;
        setcookie("thirdthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdfourth"])) {
        $question = "Who invented the Polio Vaccine?";
        $correctAnswer = "secondOption";
        $firstOption = "Hiram Maxim";
        $secondOption = "Jonas Salk";
        $questionScore = 30;
        setcookie("thirdfourth", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdfifth"])) {
        $question = "Tobacco causes _______ of cancer deaths around the world";
        $correctAnswer = "secondOption";
        $firstOption = "30%";
        $secondOption = "22%";
        $questionScore = 30;
        setcookie("thirdfifth", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthfirst"])) {
        $question = "Is it possible to be infected with dengue virus but have no symptoms?";
        $correctAnswer = "secondOption";
        $firstOption = "3 to 9 Days";
        $secondOption = "5 to 7 Days";
        $questionScore = 40;
        setcookie("fourthfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthsecond"])) {
        $question = "According to the World Health Organization's estimate in 2000, malaria kills one child how often?";
        $correctAnswer = "secondOption";
        $firstOption = "every 5 minutes";
        $secondOption = "every 30 seconds";
        $questionScore = 40;
        setcookie("fourthsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourththird"])) {
        $question = "The spots, which are symptoms of the chicken pox disease, start in which of the following places?";
        $correctAnswer = "firstOption";
        $firstOption = "Face and trunk";
        $secondOption = "Knees and elbows";
        $questionScore = 40;
        setcookie("fourththird", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthfourth"])) {
        $question = "What is the machine they would put polio patients in?";
        $correctAnswer = "firstOption";
        $firstOption = "Iron Lung";
        $secondOption = "Automated Breathing Apparatus";
        $questionScore = 40;
        setcookie("fourthfourth", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthfifth"])) {
        $question = "Which of the viruses below causes cancer resulting from chronic infection?";
        $correctAnswer = "secondOption";
        $firstOption = "Herpes simplex viruses (HSV)";
        $secondOption = "Human papilloma virus (HPV) and Hepatitis B virus (HBV)";
        $questionScore = 40;
        setcookie("fourthfifth", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthfirst"])) {
        $question = "If you get dengue fever once, can you get it again?";
        $correctAnswer = "firstOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 50;
        setcookie("fifthfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthsecond"])) {
        $question = "Which of these drinks contains quinine, an anti-malarial property?";
        $correctAnswer = "firstOption";
        $firstOption = "Tonic";
        $secondOption = "Red Bull";
        $questionScore = 50;
        setcookie("fifthsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifththird"])) {
        $question = "Chicken pox isn't contagious.";
        $correctAnswer = "secondOption";
        $firstOption = "True";
        $secondOption = "False";
        $questionScore = 50;
        setcookie("fifththird", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthfourth"])) {
        $question = "Which year was the polio Vaccine released?";
        $correctAnswer = "secondOption";
        $firstOption = "1985";
        $secondOption = "1955";
        $questionScore = 50;
        setcookie("fifthfourth", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthfifth"])) {
        $question = "What kind of foods are linked to colon cancer?";
        $correctAnswer = "firstOption";
        $firstOption = "Processed meats";
        $secondOption = "Foods with salt substitutes";
        $questionScore = 50;
        setcookie("fifthfifth", TRUE, time() + 31536000);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Show: Jeopardy! Battle Arena - Game Start</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="../styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1 class="center" id="h1">Game Show: Jeopardy! Battle Arena</h1>
    </header>

	<div id = "score_container_main">
    <div>
			<?php if($player1turn){ ?>
				<div style="float:left; width: 50%;text-align: center;font-size: 35px;background: lightblue;"><img src="../images/test.png" width="50px" height = "50px"/>Player 1</div>
				<div style="float:right; width: 50%; text-align: center;font-size: 35px"><img src="../images/test.png" width="50px" height = "50px"/><?php if(isset($_COOKIE["user_name"])){ echo $_COOKIE["user_name"];} else{ echo "Player 2";}?></div>
			<?php }else{ ?>
				<div style="float:left; width: 50%;text-align: center;font-size: 35px;"><img src="../images/test.png" width="50px" height = "50px"/>Player 1</div>
				<div style="float:right; width: 50%; text-align: center;font-size: 35px;background: lightblue;"><img src="../images/test.png" width="50px" height = "50px"/><?php if(isset($_COOKIE["user_name"])){ echo $_COOKIE["user_name"];} else{ echo "Player 2";}?></div>
			<?php } ?>
			
		</div>
		<div>
			<?php if($player1turn){ ?>
				<div style="float:left; width: 50%;text-align: center;font-size: 30px;background: lightblue;"><?php if(isset($_COOKIE["player1Score"])){ echo $player1Score; }else{ echo 0;} ?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 30px;"><?php if(isset($_COOKIE["player2Score"])){ echo $player2Score; }else{ echo 0;} ?></div>
				<?php }else{ ?>
					<div style="float:left; width: 50%;text-align: center;font-size: 30px;"><?php if(isset($_COOKIE["player1Score"])){ echo $player1Score; }else{ echo 0;} ?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 30px;background: lightblue;"><?php if(isset($_COOKIE["player2Score"])){ echo $player2Score; }else{ echo 0;} ?></div>
					<?php } ?>
			
			
		</div>
	</div>
    <br/>
    <br/>
    <br/>
	<form action="../server/index.php" method="post">
        <div id = "questiondiv" style= "text-align: center;">
            <div>
                <h2><?php echo $question; ?></h2>
            </div>
            <br/>
            <input type="radio" id="true" name="selectedAnswer" value="firstOption">
            <label for="true"><?php echo $firstOption ?></label><br>
            <input type="radio" id="false" name="selectedAnswer" value="secondOption">
            <label for="false"><?php echo $secondOption ?></label><br>
            <div>
                <input style = "align: center" type = "submit" name="answerButton" value = "Submit Answer">
            </div>
            <input style = "visibility:hidden;" type="text" id="correctAnswer" name = "correctAnswer" value = <?php echo $correctAnswer?>> </input> 
            <input style = "visibility:hidden;" type="text" id="questionScore" name = "questionScore" value = <?php echo $questionScore?>> </input> 
            <input style = "visibility:hidden;" type="text" id="player1turn" name = "player1turn" value = <?php echo $player1turn?>> </input> 
            <!-- <input style = "visibility:hidden;" type="text" id="buttonID" name = "buttonID" value = <?php echo $buttonID?>> </input>  -->
        </div>
    </form>
</body>
</html>