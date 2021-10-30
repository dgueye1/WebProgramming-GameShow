7<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<title>Results</title>
	<link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
<?php 	
if($_POST['submit']) {
	if($q1=='' || $q2 =='' || $q3 =='')
	    $q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];

	if($q1=='' || $q2 =='' || $q3 =='') {
		echo '<h2>Answer all of the following questions.</h2> <br>';
		echo '<button type="button"><a href="gameshow.html">Try Again?</a></button>';
		echo '<button type="button"><a href="logout.php">Logout</a></button>';
	}
	else {
		$score = 0;
		if($q1 == 1) {
		  $score++;
		}
		if($q2 == 2) {
		  $score++;
		}
		if($q3 == 2) { 
		  $score++;
		}
	  $score = $score	/ 3 *100;
		
		if($score < 100)
		{
		  echo "<h1>Answer:</h1> <br>";
		  echo '<h2>You got a score of ' . intval($score) . '%</h2>';
		  echo '<button type="button"><a href="gameshow.html">Try Again?</a></button> <br> <br>';
		  echo '<button type="button"><a href="logout.php">Logout</a></button>';
		}
		else {
		  echo "<h1>Answer:</h1> <br>";
		  echo '<h2>YOU WON!!</h2> <br>';
		  echo '<button type="button"><a href="logout.php">Logout</a></button>';
		}
	}
}

$VisitCount = 0;

if(isset($_COOKIE['VisitCount'])){
  $VisitCount = $_COOKIE['VisitCount'];
  $VisitCount ++;
  $scoreString = $_COOKIE['scoreBoard'];
}

  if($score == 0){
    $scoreBoard = $_COOKIE['scoreBoard'] . " ". 0;
  }else{
    $scoreBoard = $_COOKIE['scoreBoard'] . " ". floor($score);
  }

setcookie('VisitCount', $VisitCount);
setcookie('scoreBoard', $scoreBoard);

if($VisitCount == 0){
  $scoreBoard = floor($score);
  $pieces = explode(" ", $scoreBoard);
  rsort($pieces);
}else{ 
  $pieces = explode(" ", $scoreBoard);
  rsort($pieces);
} 
if($score >= $pieces[0]){
  echo "<br><p id = 'topscore'>You got one of the top scores!</p>";
}
?>
<br>
<p>LeaderBoards</p>
<table width="500px" cellspacing="1px" cellpadding="1px" border="1px">
<?php
for($i = 0; $i < 10; $i++){
  $num = $pieces[$i];
  echo "<tr>";
    for($j = 0; $j < 2; $j++){
      if($j == 0){
        echo "<td width=35px height=35px>";
        echo $i + 1 . ".";
      }else{
        echo "<td width=35px height=35px>";
        echo $num;
      }
      echo "</td>";
    }
  echo "</tr>";
}
?>
</table>
</body>
</html>