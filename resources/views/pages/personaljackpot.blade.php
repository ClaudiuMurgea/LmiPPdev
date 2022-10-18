<?php //dd(file_get_contents("http://10.109.254.38/PlayerJPNou/CC/progress_bar/MasterOnlyAutoCardCheck.php?PID=1")); ?>
    
    <iframe id="personalJackpot" height="100%" width="100%" scrolling="yes" frameborder="0" marginwidth="0" marginheight="0"
        class="scroll-pane" src="http://{{ $MasterIp }}/PlayerJPNou/CC/progress_bar/MasterOnlyAutoCardCheck.php?PID={{$pid}}" >
    </iframe>

<script type='text/javascript'>
    setInterval(function () {
        document.getElementById('personalJackpot').src += '';
    }, 60000);
</script>