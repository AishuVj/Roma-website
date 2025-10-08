<?php 
//start session, call database connection and function pages
session_start();
$_SESSION['Results']=0;

include_once "dbk.php";
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ketane Project</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="romastyle.css">

</head>
<body>
	<!--  First row - header with page title-->
	<div class="w3-row headerunit roma_blue">
		<div class="w3-third w3-container">
		</div>
		<div class="w3-third w3-container w3-center w3-text-white">
			<h1>Result</h1>
		</div>
	</div>

	<?php

	$counter=0; 

	foreach ($_POST as $try){ // loop through posted values
		if($counter==0){
			$level=$try; // collect level and assign to new variable
		}
		elseif($counter>2){ //the question data starts at [3] as the first three posted values are 'level', 'first name' and 'last name'
			if($_SESSION['questionbank'][$counter-3][1]==$try){ //compares stored correct answer with posted given answer 
				$_SESSION['Results']=$_SESSION['Results']+1; //tally of correct results
			}
		}
		$counter=$counter + 1; //moves the 'counter' along one each time in the loop
		
	}



	$coun=count($_POST)-3; //counts number of questions (minus posted values for first and last name and lesson)
	$score=$_SESSION['Results']/$coun*100; // calculate score as a percentage based on number of questions


	if($level==1){
		if($score>=75){ 
		$outcome='Pass';?> 
			<p><?php echo "Congratulations, you have scored ".$score."% and passed the assessment!";?></p><br>
			<?php include "certificate_template.php"; ?>
		<?php }
		else{ 
			$outcome='Ref';?> <!-- message for score under 75%-->
			<p><?php echo "Your score is ".$score."%. You need at least 75% to pass, please try again.";?></p><br>
		<?php }
	}	

	elseif($level==3){
		if($score>=79){ 
			$outcome='Pass';?><!-- message for score over 79%-->
			<p><?php echo "Congratulations, you have scored ".$score."% and passed the assessment!";?></p><br>
			<?php include "certificate_template.php"; ?>
		<?php }
		else{ 
			$outcome='Ref';?><!-- message for score under 79%-->
			<p><?php echo "Your score is ".$score."%. You need at least 79% to pass, please try again.";?></p><br>
		<?php }
	}
	$sql = "SELECT `Unit`, COUNT(*) FROM `assessmentroma` WHERE `Level`=".$level." GROUP BY `Unit`;";
	$scores=[];
	foreach(kquery($conn,$sql) as $scoring){
		$scores[$scoring['Unit']]=$scoring['COUNT(*)'];
		//echo $scores[$scoring['Unit']];
	}
	?>
	<br><br>
	<?php
	$qno=-2;
	$counter=0;
	$question=[];
	foreach ($_POST as $try){
		if($counter>2){
			$question[$counter-2]=array('UnitNo'=>$_SESSION['questionbank'][$counter-3][6], 'Question'=>$_SESSION['questionbank'][$counter-3][0],'CorrectAnswer'=>$_SESSION['questionbank'][$counter-3][1],'GivenAnswer'=>$try,'Unit'=>$_SESSION['questionbank'][$counter-3][5]);
		}
		$counter=$counter + 1;
		$qno=$qno+1;
	} // close of for each loop

	$columns = array_column($question, $_SESSION['questionbank'][$counter-3][6]);
	array_multisort($columns,SORT_ASC, $question);
	
	$units=["Covid"=>0,"Universal Credit"=>0,"Carer's Allowance"=>0,"Personal Independence Payment"=>0,"Pregnancy"=>0,"Shopping"=>0,"Domestic Violence"=>0,"Health Problems"=>0];
	
	foreach ($question as $questionno => $value){ 
		
		if($value['CorrectAnswer']==$value['GivenAnswer']){
			$units[$value['Unit']]=$units[$value['Unit']]+1;
		}
	}
	$uni=0;
	foreach($units as $unit=>$val){
		$uni=$uni+1;
		echo "Unit ".$uni.": ".$unit ."- You got ".$val." of ".$scores[$unit]." questions correct. <a href= 'http://www.elattlearning.com/KellyT/Roma/?status=unit&level=".$level."&unitname=".$unit."'>Click here</a> to review Unit ".$uni.". <br>";
	}	
	$date=date("Y-m-d");
	echo $date;
	$sqlii = "INSERT INTO `Reports`(`Level`, `Outcome`, `OutcomePercentage`, `Date`) VALUES (".$level.",'".$outcome."',".$score.",'".$date."');";
	if($conn->query($sqlii)===TRUE){
		echo "record created";
	}
	else{
		echo "error".$conn->error;
	}
?>
	</div>

<!--		print_r($question);
	 -->
</body>
</html>