<div id="jackpots_page" class="jackpots_grid max_width mt_2">
    @for ($i = 1; $i <= 48; $i++)
        <div wire:click="showJackpot({{ $i }})" class="jackpots_styles" 
             style="@if($i > 3) margin-top:1.5rem; @endif">
            <a class="custom_btn">
                <span style="background: linear-gradient(to bottom, #fede9a 1%, #000 60%, #000 100%);
                            animation: animatedgradient 20s ease alternate infinite;
                            background-size: 400% 400%;"> 
                            <!-- background: linear-gradient(60deg, #2c3e50, #000000, #2c3e50, #222); gradient span above -->
                    <span style=" background-image: linear-gradient(#fede9a 48%, #b07e29 47.9%,  #fede9a 100%);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;font-weight:900 !important;">
                              <strong class="superbold">jackpot {{ $i }}</strong>  
                    </span> 
                </span>
            </a>
        </div>
    @endfor
</div> 
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<script>
    var jackpots = document.getElementsByClassName('jackpots_grid')[0];
    var screenHeight = window.innerHeight;
    if (jackpots.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
    } 
</script>