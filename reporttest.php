<?php
include_once "dbk.php";
include_once "function.php";

$date=date("Y-m-d");
$temp=date_create(date("Y-m-d"));
date_add($temp,date_interval_create_from_date_string("-30 days"));
$startdate= date_format($temp,"Y-m-d");
$sql = "SELECT * FROM `Reports`;";
$l1total = $l1totalpc = $l1passpc = $l1refpc = $l1passes = $l1refs=0;
$l3total = $l3totalpc = $l3passpc = $l3refpc = $l3passes = $l3refs=0;

foreach(kquery($conn,$sql) as $reportvalues){
    if(date($reportvalues['Date'])>$startdate){

        switch( $reportvalues['Level']){
            case "1": $l1total++; 
            $l1totalpc+=$reportvalues['OutcomePercentage'];
            if($reportvalues['Outcome']=="Pass"){
                $l1passes++; 
                $l1passpc+=$reportvalues['OutcomePercentage'];
            }
            else{
                $l1refs++; 
                $l1refpc+=$reportvalues['OutcomePercentage'];
            }
            break;
            case "3": $l3total++; 
            $l3totalpc+=$reportvalues['OutcomePercentage'];
            if($reportvalues['Outcome']=="Pass"){
                $l3passes++; 
                $l3passpc+=$reportvalues['OutcomePercentage'];
            }
            else{
                $l3refs++; 
                $l3refpc+=$reportvalues['OutcomePercentage'];
            }
            break;
        }
    }
}

$msg="";
$msg.="Monthly Report for the period ". $startdate." to ". $date."\r\n";
$tot=$l1total + $l3total;
$msg.= "The final assessments were taken by a total of ". $tot .".\r\n<b>Level 1 report:</b>\r\n";
$msg.=$l1total." took the final assessment. Of that amount, there were "; 
$msg.=$l1passes. " passes and ".$l1refs." referrals.\r\n";
$msg.="The average percentage mark overall was ".$l1totalpc/$l1total."%.\r\n"; 
$msg.="The average percentage mark of the passes was ".$l1passpc/$l1passes."%.\r\n"; 
$msg.="The average percentage mark of the referrals was ".$l1refpc/$l1refs."%.\r\n"; 

$msg.="<b>Level 3 report:</b>\r\n".$l3total." took the final assessment. of that amount,"; 
$msg.="there were ".$l3passes." passes and ".$l3refs." referrals.\r\n";
$msg.="The average percentage mark overall was ".$l3totalpc/$l3total."%.\r\n";  
$msg.="The average percentage mark of the passes was ".$l3passpc/$l3passes."%.\r\n"; 
$msg.="The average percentage mark of the referrals was ".$l3refpc/$l3refs."%.\r\n"; 
echo nl2br($msg);

$to="k.tang@hotmail.co.uk";
$subject="Monthly Report";
mail($to,$subject,$msg);

?>