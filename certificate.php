
<?php

include_once "dbk.php";
include "function.php";

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




<script type="text/javascript">
    function yesFields() {
        document.getElementById("nameLabel").style.display = "block";
        document.getElementById("nameField").style.display = "block";
        document.getElementById("emailLabel").style.display = "block";
        document.getElementById("emailField").style.display = "block";
    }

    function noFields() {
        document.getElementById("nameLabel").style.display = "block";
        document.getElementById("nameField").style.display = "block";
        document.getElementById("emailLabel").style.display = "none";
        document.getElementById("emailField").style.display = "none";
    }
</script>

</head>
<body>
    <!--  First row - header-->
    <div class="w3-row headerunit roma_blue">
        <div class="w3-third w3-container w3-text-white">
				<h3>Entry <?php echo ($_REQUEST["level"]); ?></h3>
        </div>
        <div class="w3-third w3-container w3-center w3-text-white">
            <h1>Certificate Page</h1>
        </div>
    </div>

<?php
    // define variables and set to empty values
    $name = $email = $dob = "";

    //check if the form has been submitted via post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get and cleanse the form input data using input function
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    }

    //define a function to clean the input data
    function test_input($data) {
    $data = trim($data);//remove any leading /trailing white space
    $data = stripslashes($data);//remove any backslashes added
    $data = htmlspecialchars($data);//convert special characters to HTML entities to prevent hacking
    return $data;// return the input data
    }
?>
 
<!--  Form section collecting emailid,name amd dob using input fields-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<input type="hidden" name="level" value="<?php echo $_REQUEST["level"]; ?>">
<input type="hidden" name="fname" value="<?php echo $_REQUEST["fname"]; ?>">
<input type="hidden" name="lname" value="<?php echo $_REQUEST["lname"]; ?>">

    <div  class="w3-content w3-margin-right"  style="max-width:800px">  
    <h3> Do you have an E-mail address?</h3>
    <!--  radio input selection field for emailid that calls respective functions when selected-->
        <input  class="w3-radio" type="radio" name="user_type" value="with_email" onclick="yesFields()">
        <label  class="w3-xlarge">I have email id</label><br>
        <input  class="w3-radio" type="radio" name="user_type" value="without_email" onclick="noFields()">
        <label  class="w3-xlarge">I have no email id</label>
        
         <!--name input field -->  
        <div class="w3-section w3-margin-right">  
                <label id="nameLabel" style="display: none;">Name:</label>
                <input class="w3-input w3-border" type="text" name="name" id="nameField" style="display: none; width:50%" required><br>
        </div>
        
        <!--Email input field -->  
        <div class="w3-section w3-margin-right">
                <label id="emailLabel" style="display: none;">Email:</label>
                <input class="w3-input w3-border" type="email" name="email" id="emailField" style="display: none;width:50%" >
        </div>
    </div>
    <!--submit button -->  
    <div class="w3-center">
            <input type="submit"  name="submit" value="Submit" class="w3-button roma_green w3-margin-bottom">
    </div>
   
</form>
<br>


<?php

//check if the form has been submitted via post method
    if(isset($_POST['submit'])){
        // Get the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // Validate the email address if it is not empty
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit();
        }


        // Validate the name and date of birth fields
        if (empty($name)) {
            echo "Name is required";
            exit();
        }

        

        // Set the recipient email address
        $to = "xxx@gmail.com";

        // Set the email subject and body
        $subject = "Certificate of Completion";
        $message = "Name: $name \r\nDate of Birth: $dob \r\nEmail: $email " ;
        $message .="Hi Tania \r\n\r\n ".$name.", have scored 80% or above in the exam and provided the following details for the certificate:\r\n\r\n";

        // Set the email headers
        $headers = "From: xxx@gmail.com" . "\r\n" .
            "Reply-To: user@yahoo.co.uk" . "\r\n" .
            "CC: cc.com";
        // if condition if email is not null
        if ($email) {
            // Send the email
            if(mail($to,$subject,$message,$headers)){
                echo "Email sent successfully";
            } else{
                echo "Email sending failed";
            }
        } else {
            
            // Generate the certificate to download
            include 'certificate_template.php';
        }
    }//end of if statememt to check if the form has been submitted via post method

?>
    
      
</body>
</html>



 


