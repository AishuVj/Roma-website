<!--javascript myfunction() to hide menu on large screens-->
<script>
function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function myFunction2() {
  var x = document.getElementById("Demo2");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function myFunction3() {
  var x = document.getElementById("Demo3");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function myFunction4() {
  var x = document.getElementById("Demo4");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<div class="w3-top" id="navbar">
    <div class="w3-bar w3-white w3-padding">
        <!-- display Roma and ELATT logos -->
        <a href="https://www.elattlearning.com/IswaryaV/Roma1/" class="w3-bar-item w3-button"><img src="romasg_logo.png" alt="roma_logo" class="w3-image" style="height:25px"></a>
        <a href="https://www.elatt.org.uk/life-skills" target="_blank" class="w3-bar-item w3-button"><img src="elatt_logo.png" alt="elatt_logo" class="w3-image" style="height:25px"></a>
      
        <!-- Google translate dropdown -->
        <div id='google_translate_element' class="w3-right"></div>
        <script>
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({
        // pageLanguage: 'en',
        autoDisplay: 'true',
        includedLanguages:'en,ro,pl',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');
        }
        </script>
        <script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
        <?php

      // Check if status parameter matches the assessment value
      if (($_REQUEST['status']) === 'assessment') {
              // Hide the translate dropdown
              echo '<script>document.getElementById("google_translate_element").style.display = "none";</script>';
          }
      ?>
              <!--  Navbar for large screens/ desktop (hide on small screens) -->
        <div class="w3-hide-small">
            <a href="https://www.elattlearning.com/IswaryaV/Roma1/" class="w3-bar-item w3-button">Home</a>
            <!--  to be updated when information received from Roma -->
            <a href="#" class="w3-bar-item w3-button">About</a>
            <!--  Dropdown menu displaying different units for Entry level 1 -->
            <div class="w3-dropdown-hover">
                <button class="w3-button">Entry 1<i class="fa fa-caret-down"></i> </button>
                    <div class="w3-dropdown-content w3-bar-block">
                        <?php
                        // for Entry 1, using kquery function to connect to database, select items under 'UnitName' field from the 'ketane' table, loop through each, display them in the dropdown and link to query string with the associated unit name
                        foreach(kquery($conn,"SELECT `UnitName` FROM `ketane`;") as $unitname){
                        ?>
                        <a href="?status=unit&level=1&unitname=<?php echo $unitname['UnitName'];?>" class="w3-bar-item w3-button"><?php echo $unitname['UnitName'];?></a>
                        <?php
                        }
                        ?>
                    </div>
            </div>
            <div class="w3-dropdown-hover">
                <button class="w3-button">Entry 3<i class="fa fa-caret-down"></i> </button>
                    <div class="w3-dropdown-content w3-bar-block">
                        <?php
                        // for Entry 3, using kquery function to connect to database, select items under 'UnitName' field from the 'ketane' table, loop through each, display them in the dropdown and link to query string with the associated unit name
                        foreach(kquery($conn,"SELECT `UnitName` FROM `ketane`;") as $unitname){
                        ?>
                        <a href="?status=unit&level=3&unitname=<?php echo $unitname['UnitName'];?>" class="w3-bar-item w3-button"><?php echo $unitname['UnitName'];?></a>
                        <?php
                        }
                        ?>
                    </div>
            </div>
          <!--  Dropdown menu displaying assessments for Entry level 1 and 3 -->
            <div class="w3-dropdown-hover">
                <button class="w3-button">Assessment <i class="fa fa-caret-down"></i> </button>
                    <div class="w3-dropdown-content w3-bar-block">
                      <!--  Link to assessment page-->
                        <a href="?status=assessment&level=1" class="w3-bar-item w3-button">Entry 1</a>
                        <a href="?status=assessment&level=3" class="w3-bar-item w3-button">Entry 3</a>
                    </div>
            </div>
            <!--  Link to contact page-->
            <a href="?status=contact" class="w3-bar-item w3-button">Contact</a>

            
        </div>
        <!--  calling javascript myfunction() to hide on large screens-->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
    </div>
    <!--  Hide on desktop/ larger screens and collapse to 'hamburger' menu on smaller screens -->
    <div id="demo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        <a href="https://www.elattlearning.com/IswaryaV/Roma1/" class="w3-bar-item w3-button">Home</a>
        
        <div class="w3-dropdown-click">
            <button onclick="myFunction2()" class="w3-button">Entry 1<i class="fa fa-caret-down"></i> </button>
                <div id="Demo2" class="w3-dropdown-content w3-bar-block">
                    <?php
                    foreach(kquery($conn,"SELECT `UnitName` FROM `ketane`;") as $unitname){
                    ?>
                    <a href="?status=unit&level=1&unitname=<?php echo $unitname['UnitName'];?>" class="w3-bar-item w3-button"><?php echo $unitname['UnitName'];?></a>
                    <?php
                    }
                    ?>
                </div>
        </div>

        <div class="w3-dropdown-click">
            <button onclick="myFunction3()" class="w3-button">Entry 3<i class="fa fa-caret-down"></i> </button>
                <div id="Demo3" class="w3-dropdown-content w3-bar-block">
                    <?php
                    foreach(kquery($conn,"SELECT `UnitName` FROM `ketane`;") as $unitname){
                    ?>
                    <a href="?status=unit&level=3&unitname=<?php echo $unitname['UnitName'];?>" class="w3-bar-item w3-button"><?php echo $unitname['UnitName'];?></a>
                    <?php
                    }
                    ?>
                </div>
        </div>
        <div class="w3-dropdown-click">
            <button onclick="myFunction4()" class="w3-button">Assessment <i class="fa fa-caret-down"></i> </button>
                <div id="Demo4" class="w3-dropdown-content w3-bar-block">
                    <a href="?status=assessment&level=1" class="w3-bar-item w3-button">Entry 1</a>
                    <a href="?status=assessment&level=3" class="w3-bar-item w3-button">Entry 3</a>
                </div>
        </div>

            <a href="?status=contact" class="w3-bar-item w3-button">Contact</a>

           
    </div>
</div>

