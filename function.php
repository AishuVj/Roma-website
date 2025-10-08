<?php
//function to establish connection to database
function kquery($connection,$myquery){
    $result = mysqli_query($connection,$myquery);
    if(mysqli_num_rows($result) > 0){
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
}
//function that has width, height and url end from database and specifying 'case' parameters to determine which website url to include -->

function video_get($width,$height,$url,$site){
    switch ($site){
        case '1': $front= "'https://www.youtube.com/embed/".$url."' title='YouTube video player'"; break;
        case '2': $front= "'https://wordwall.net/embed/".$url."'"; break;
       
    }
    ?>
    <div class="w3-container">
    <iframe class= "w3-mobile" width= "<?php echo $width;?>" height= "<?php echo $height;?>" src=<?php echo $front;?>  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
<?php 
}
//function that accepts the parameters lesson title and video URL
function generateLesson($lessonTitle, $videoUrl) {
    ?>
    <div class="w3-row">
        <div class="w3-container w3-padding w3-center">
            <h2>Lesson</h2>
            <h3> English+Romanian</h3>
            <!-- call 'video_get' function passing width, height and url end from database and specifying 'case' to determine which website url to include -->
            <?php video_get(600, 400, $lessonTitle, 1); ?>
            <hr>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-container w3-padding w3-center">
            <h3> English+Polish</h3>
            <!-- include the video with the source URL from the parameter passed in the function -->
            <iframe class="w3-mobile" width="600" height="400" src="<?php echo $videoUrl; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <hr>
        </div>
    </div>
    <?php
}
?>