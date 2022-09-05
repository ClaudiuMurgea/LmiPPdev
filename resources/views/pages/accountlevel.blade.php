<iframe style="min-height:150vh !important;" width="100%" scrolling="yes" frameborder="0" marginwidth="0" marginheight="0"
        class="scroll-pane" src="http://10.109.254.122/PlayerJPNou/CC/progress_bar/MasterOnlyAutoCardProgress.php?PID=44" 
        title="W3Schools Free Online Web Tutorials">
</iframe>

<?php 
    // $data = strip_tags(file_get_contents("http://10.109.254.122/PlayerJPNou/CC/progress_bar/MasterOnlyAutoCardProgress.php?PID=44"));
    // $expData = explode("\r\n", $data);
    // dd($expData);
?>
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<script>
    var autolevelpage = document.getElementsByClassName('scroll-pane')[0];
    var screenHeight = window.innerHeight;
    if (autolevelpage.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
    } 
</script>