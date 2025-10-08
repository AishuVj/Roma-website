<!-- javascript function to open a seperate window for downloading the certificate-->
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
        }
</script>
<div class="w3-center">
    <button class="w3-button w3-round-xlarge roma_green w3-hover" onclick="PrintDiv();">Download Certificate</button>
</div>
 <!-- div for certificate template-->
<div id='divToPrint' style='display:none;'>
    <div style="width:900px; height:700px; padding:20px; text-align:center; border: 8px solid blue" >
        <div style="width:850px; height:650px; padding:20px;  text-align:center; border: 5px solid green">
                <!--Display the Logos-->
                    <img src="romasg_logo.png" alt="roma_logo" class="w3-image" style="height:40px">
                    <img src="elatt_logo.png" alt="elatt_logo" class="w3-image" style="height:40px">
                <div class="w3-row-padding">
                    <h1>CERTIFICATE</h1>
                    <p >OF ACHIEVEMENT</p>
                    <hr style="width: 25%;margin: auto;">
                    <p>This is to certify that</p>
                <!--Echoing the name using $_REQUEST-->
                    <b><p><?php echo ($_REQUEST["fname"]). " " . $_REQUEST["lname"]; ?></p></b>
                    <p>Has successfully completed</p>
                    <b><p> Essential English Skills: Steps to ESOL<br>
                <!--Echoing the level using $_REQUEST-->
                    Entry <?php echo ($_REQUEST["level"]); ?></p></b>
                    <p>on 
                <!--Echoing the name current date using date()function-->
                    <?php echo  date('d-m-Y');?></p>
                </div>
                    <br>
                    <!--div for subscripts and signatures-->
                <div class="w3-row-padding" style="display: flex; justify-content: space-between;">
                    <div class="w3-quarter">
                        <br>
                        <img src="sign1.png" alt="signature" >
                        <hr style="width: 75%;margin: auto;">
                        <p style="font-size:small;">TANIA GESSI</p>
                        <p style="font-size:small;">Roma Project Lead</p>
                    </div>
                    <div class="w3-quarter">
                        <img src="sign2.png" alt="signature" style="width:75%;height:65px">
                        <hr style="width: 75%;margin: auto;">
                        <p style="font-size:small;">YVONNE BIZAYI</p>
                        <p style="font-size:small;">Head of Life Skills and Community Projects</p>
                    </div>
                </div><br>
                <p style="font-weight: lighter;color:gray;font-size:smaller;">EAST LONDON ADVANCED TECHNOLOGY TRAINING</p>
                <p style="font-weight: lighter;color:gray;font-size:smaller;">ELATT at Kingsland Road: 260 – 264 Kingsland Road London – E8 4DG | Phone: 0800-0420-184</p>
        </div>
    </div>
</div>

</html>