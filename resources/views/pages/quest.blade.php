<div id="quest" class="max_width quest_page">
    @for($i = 1; $i < 4; $i++)
        <div class="quest_wrapper surround_shadow">
            <div class="quest_animation quest_outer">
                Quest
            </div>
            <div class="quest_animation quest_inner">
                Quest 
            </div>
            <div class="quest_animation quest_outer">
                Quest
            </div>
        </div>
    @endfor
</div>
<!-- <div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<script>
    var questpage = document.getElementsByClassName('quest_page')[0];
    var screenHeight = window.innerHeight;
    if (questpage.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
    } 
</script> -->