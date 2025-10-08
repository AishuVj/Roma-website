<!DOCTYPE html>
<html lang="en">
<head>
<title>Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

</style>
</head>
<body>  
<?php
// define variables and set to empty values
$name = $email = $news = $comment = $subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $subject = test_input($_POST["subject"]);
  $comment = test_input($_POST["comment"]);
  $news = test_input($_POST["news"]);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



    <div class="w3-content" style="max-width:600px">
      <h4 class="w3-center"><b>Contact Me</b></h4>
      <p>Do you want me to photograph you? Fill out the form and fill me in with the details :) I love meeting new people!</p>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="w3-section">
          <label>Name</label>
          <input class="w3-input w3-border" type="text" name="name" required>
        </div>
        <div class="w3-section">
          <label>Email</label>
          <input class="w3-input w3-border" type="text" name="email" required>
        </div>
        <div class="w3-section w3-card">
          <h2>NewsLetter</h2>
           opt In <input type="radio" name="news" value="true"><br>
           opt Out <input type="radio" name="news" value="false">
        </div>
        <div class="w3-section">
            <label>Subject</label>
            <input class="w3-input w3-border" type="text" name="subject" required>
          </div>

        <div class="w3-section">
          <label>Comment</label>
          <input class="w3-input w3-border" type="text" name="comment" required>
        </div>
        <button type="submit" class="w3-button w3-block w3-black w3-margin-bottom">Send</button>
      </form>


    </div>

  <div class="w3-content w3-card w3-padding" style="max-width:600px">
    <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $subject;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $news;
        echo "<br>";
        $msg="Hello ".$name.",\r\n";
        $msg.="you have quoted the following \r\n".$comment;
        $msg.="\r\n We value you input and will get back to you in due course";
        $msg.="\r\n\r\nWarm regards \r\nRonnie";
        echo nl2br($msg);

        //$to = 'ronnie@elatt.org.uk';
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: webmaster@elatt.com" . "\r\n" .
        "CC:youremail@yoursite.com";
    

    mail($email,$subject,$msg,$headers)
    ?>
</div>

</body>
</html>