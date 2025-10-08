<!--  First row - header showing Entry level, page title and timer -->
<div class="w3-row headerunit roma_blue">
    <div class="w3-third w3-container w3-text-white">
        <h3>Entry <?php echo ($_REQUEST["level"]); ?></h3> <!--checks query string for value for 'level' and displays it -->
    </div>
    <div class="w3-third w3-container w3-center w3-text-white">
        <h1>Final Assessment</h1>
    </div>
    <!--query selector in function (on function page) replaces ids with data to display 45 minute timer --> 
    <div class="w3-third w3-padding w3-container w3-center w3-text-white" id="timer" > 
        <span class="timer-icon"><i class="fa fa-hourglass-2"></i></span>
        <span class="timer-text">Time remaining: 45:00</span>
    </div>
</div>

<?php
// define variables for first and last name and set to empty values
$fname = $lname = "";
//check if the form has been submitted via post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get and cleanse the form input data using input function
    $fname = input($_POST["fname"]);
    $lname = input($_POST["lname"]);
}
//define a function to clean the input data
function input($data) {
  $data = trim($data);//remove any leading /trailing white space
  $data = stripslashes($data);//remove any backslashes added
  $data = htmlspecialchars($data);//convert special characters to HTML entities to prevent hacking
  return $data;// return the input data
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST"){ //checks whether form is submitted via POST method
    
    $_SESSION['questionbank']= array(); //creates a session variable array 
?>

<!--  Form section collecting first and last name using labelled input fields-->
<form class="w3-row-padding" method="post" action="result.php"  id="assessmentForm">
    <input type="hidden" name="level" value="<?php echo $_REQUEST["level"]; ?>"> <!--posts a hidden value which checks the entry level in the query string -->
    <div class="w3-row">
        <div class="w3-half">
            <label>First Name</label>
            <input class="w3-input w3-padding w3-border w3-round" size="5" type="text" name="fname">
        </div>
        
        <div class="w3-half">
            <label>Last Name</label>
            <input class="w3-input w3-padding w3-border w3-round roma-green" type="text" name="lname">
        </div>
    </div>  
    <br>

<?php
    $lev = $_REQUEST['level'];
    $y= "SELECT * FROM `assessmentroma`  WHERE `Level` = '$lev' ORDER BY Rand()"; 
    //create variable pulling data associated with the level which the user is currently completing the assessment for from the 'assessment' table in database
    $qno=0;
    //loop through and collect values for question, answers and unique id to new variables
    foreach(kquery($conn,$y) as $items){
        $question = $items["Question"];
        $ans1 = $items["Answer1"];
        $ans2 = $items["Answer2"];
        $ans3 = $items["Answer3"];
        $id = $items["id"];
        //push the data for those variables as an array into the session variable array
        array_push($_SESSION['questionbank'],array($question,$items["Correct"],$ans1,$ans2,$ans3,$items["Unit"],$items["UnitNo"]));
        //update question number for each following question
        $qno=$qno +1;
?>

    <!--  Form section which loops through arrays (created above) to display questions and their sets of three answers, with users inputting their answers using radio buttons-->

    <div class="w3-container w3-half w3-padding w3-card w3-border w3-border-blue">
        <!--  This is the question -->
        <h5> <?php echo $qno;?>: <?php echo $question;?></h5>
        <!--  First answer option -->
        <input id="<?php echo $ans1;?>"class="w3-radio" type="radio" name="<?php echo $id;?>" value= "a" required>
        <label for="<?php echo $ans1;?>"><?php echo $ans1;?></label>
        <br>
        <!--  Second answer option -->
        <input id="<?php echo $ans2;?>" class="w3-radio" type="radio" name="<?php echo $id;?>" value= "b">
        <label for="<?php echo $ans2;?>"><?php echo $ans2;?></label>
        <br>
        <!--  Third answer option -->
        <input id="<?php echo $ans3;?>" class="w3-radio" type="radio" name="<?php echo $id;?>" value= "c">
        <label for="<?php echo $ans3;?>"><?php echo $ans3;?></label>
        <br>
        <br>
    </div>

<?php
    } //close of foreach loop
?>

<!--  Submit button which opens results page in new tab -->
<div class="w3-row w3-padding">
    <button type="submit" formtarget="_blank" class="w3-button w3-padding w3-margin w3-round-xlarge roma_green w3-hover">Submit</button>
</div>
</form>

<?php 
//close of request method if statement for form
}
?>

