<?php
    $x= 'SELECT * FROM `ketane` WHERE `UnitName`="'.$_REQUEST['unitname'].'";';//query to select all from the database ketane and gets the unitname passed in the request parameter and stores in variable $x
    
    foreach(kquery($conn,$x) as $details){/*foreach loop calling function kquery with databaseconnection and SQLquery checking the level and assigning respective lesson and activity for those level  */

        if ($_REQUEST["level"] == "3"){ 
           $lesson = $details["LessonL3"];                  
            $activity = $details["ActivityL3"];
        }
        else {
            $lesson = $details["LessonL1"];
            $activity = $details["ActivityL1"];
        }
?>

<!--  First row - header-->
<div class="w3-row headerunit roma_blue">
    <div class="w3-third w3-container w3-text-white w3-center">
        <!--using the ucfirst() function to capitalize the first letter of the requested level-->
        <h3>Entry <?php echo ucfirst($_REQUEST["level"]); ?></h3>
    </div>
    <div class="w3-third w3-container w3-center w3-text-white">
         <!--printing the unitno and unitname-->
        <h1>Unit <?php echo $details["UnitNo"];?>: <?php echo $details["UnitName"];?></h1>
         <!--printing the image-->
        <img src="<?php echo $details["Image"];?>" alt="progress_bar" class="w3-image" style="width:100%">
    </div>
    <div class="w3-row w3-center w3-padding">
         <!-- hyperlink button that directs users to a specific lesson depending on the status of the unit, the level,type and the name of the unit-->
        <a href="?status=unit&level=<?php echo ucfirst($_REQUEST["level"]);?>&type=lesson&unitname=<?php echo $details['UnitName'];?>" class="w3-button w3-round-xlarge roma_green w3-hover">Lesson</a>
        <a href="?status=unit&level=<?php echo ucfirst($_REQUEST["level"]);?>&type=activity&unitname=<?php echo $details['UnitName'];?>" class="w3-button w3-round-xlarge roma_green w3-hover">Activity</a>
        <a href="?status=unit&level=<?php echo ucfirst($_REQUEST["level"]);?>&type=quiz&unitname=<?php echo $details['UnitName'];?>" class="w3-button w3-round-xlarge roma_green w3-hover">Quiz</a>
    </div>
</div><!-- end row - header-->

<?php
    //switch statement based on the value of type parameter
    switch ($_REQUEST['type']){
        case "lesson": include "lesson.php"; /*Include respective pages for the status passed */
        break;/* break out of switch statement */
        case "activity": include "activity.php"; 
        break;
        case "quiz": include "quiz.php"; 
        break;
        default: include "lesson.php";// If none of the above cases match include lesson.php
    }
    
?>




<?php
    }
?>
<!-- pre,next buttons -->
<?php
// Get the current URL using $_SERVER superglobal variable
$current_url = $_SERVER['REQUEST_URI'];

/*The parse_url() function is called and it takes the URL as its first argument and the component to retrieve as the second argument, the PHP_URL_QUERY constant is used as the second argument to retrieve only the query string parameters from the URL(the part of a URL that follows the question mark (?) and contains key-value pairs separated by ampersands (&))*/
$query_string = parse_url($current_url, PHP_URL_QUERY);

/*Parse the $query_string variable, which contains the query parameters and values in the current URL, into an associative array of key-value pairs and assigns it to the $query_params variable.*/
parse_str($query_string, $query_params);

// Checks if the unitname and level key exists in the $query_params array using isset and assign it to a variable
$current_unitname = isset($query_params['unitname']) ? $query_params['unitname'] : '';
$current_level = isset($query_params['level']) ? $query_params['level'] : '';

// creating an array $unitnames with unit names
$unitnames = array('Covid', 'Universal Credit', 'Carer\'s Allowance', 'Personal Independence Payment', 'Pregnancy','Shopping', 'Domestic Violence', 'Health Problems',);

//using array_search() function to find the index of the $current_unitname variable in the $unitnames array.
$current_unit_index = array_search($current_unitname, $unitnames);

/*the condition $current_unit_index > 0 is checked ,if true reduce the index value of $unitnames array by 1 else return null and assign to a variable*/
$previous_unitname = $current_unit_index > 0 ? $unitnames[$current_unit_index - 1] : '';

/*the condition $current_unit_index < count($unitnames) - 1 is checked ,if true increase the index value of $unitnames array by 1 else return null and assign to a variable*/
$next_unitname = $current_unit_index < count($unitnames) - 1 ? $unitnames[$current_unit_index + 1] : '';

/*assigning $current_level to $previous_level and $next_level to ensure that the previous and next URLs have the same level parameter as the current URL.*/
$previous_level = $current_level;
$next_level = $current_level;

//set the $previous_url variable to an empty string 
$previous_url = '';

/*check if $previous_unitname is not empty and updates URL using the index.php file as the base URL and the query parameters unit, level, and unitname are added to it using the values of $previous_level and $previous_unitname.*/

if (!empty($previous_unitname)) {
    $previous_url = "index.php?status=unit&level=$previous_level&unitname=$previous_unitname";
}

$next_url = '';

if (!empty($next_unitname)) {
    $next_url = "index.php?status=unit&level=$next_level&unitname=$next_unitname";
}
?>
<!-- Display the previous and next navigation buttons -->
<div class="w3-row-padding">
  <?php 
    //if $previous_unitname is not empty display previous button with URL created using the $previous_url variable
    if (!empty($previous_unitname)): 
  ?>
    <a href="<?php echo $previous_url; ?>" class="w3-button  w3-round-xlarge roma_green w3-hover w3-left">Previous Unit</a>
  <?php endif; ?>

  <?php 
   //if $previous_unitname is not empty display previous button with URL created using the $previous_url variable
    if (!empty($next_unitname)): 
    ?>
    <a href="<?php echo $next_url; ?>" class="w3-button  w3-round-xlarge roma_green w3-hover w3-right">Next Unit</a>
  <?php endif; ?>
</div>

   

