<?php
// Switch statement based on unitname
switch ($_REQUEST['unitname']) {
    //if the unit is covid check the level and call the function generateLesson and display the respective videos
    case "Covid":
        if ($_REQUEST['level'] == "1") {
            generateLesson($lesson, "https://www.youtube.com/embed/tDNn4CcDjAI");
        } else {
            generateLesson($lesson, "https://www.youtube.com/embed/772x7PfDjBc");
        }
        break;
    //if the unit is Universal Credit check the level and call the function generateLesson and display the respective videos
    case "Universal Credit":
        if ($_REQUEST['level'] == "1") {
            generateLesson($lesson, "https://www.youtube.com/embed/CxMT0sLkFxc");
        } else {
            generateLesson($lesson, "https://www.youtube.com/embed/CxMT0sLkFxc");
        }
        break;
    //if the unit is Domestic Violence check the level and disply the respective videos
    case "Domestic Violence":
        if ($_REQUEST['level'] == "3") {
    ?>
        <div class="w3-row">
            <div class="w3-container w3-padding w3-center">
                <h2>Lesson</h2>
                <h3> Part 1</h3>
                <iframe class="w3-mobile" width="600" height="400" src="https://www.youtube.com/embed/9hQqpNCz7SM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                
                <hr>
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-container w3-padding w3-center">
                <h3> Part2</h3>
                <iframe class="w3-mobile" width="600" height="400" src="https://www.youtube.com/embed/qxzMdpcR4Vw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                
                <hr>
            </div>
        </div>
    <?php
        } else{
        ?>
            <div class="w3-row">
            <div class="w3-container w3-padding w3-center">
            <h2>Lesson</h2>
                <!--  call 'video_get' function passing width, height and url end from database and specifying 'case' to determine which website url to include -->
                <?php video_get(600,400,$lesson,1); ?>
                <hr>
            </div>
            </div>
        <?php
        }
        break;
    //if none of the case ids true display the default video
    default:
    ?>
    <div class="w3-row">
    <div class="w3-container w3-padding w3-center">
     <h2>Lesson</h2>
        <!--  call 'video_get' function passing width, height and url end from database and specifying 'case' to determine which website url to include -->
        <?php video_get(600,400,$lesson,1); ?>
        <hr>
    </div>
    </div>
<?php
}
?>

