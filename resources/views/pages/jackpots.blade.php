<div id="jackpots_page" class="max_width mt-2">

    <!-- <div style="background: -webkit-linear-gradient(top, #8f6B29, #FDE08D, #DF9F28);
	background: linear-gradient(top, #8f6B29, #FDE08D, #DF9F28);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;font-size:1.3rem">
            Internal
    </div> -->
    <div class="text-effect mt-3">
        <span>{{Translate('Internal')}}</span>
    </div> 
    <div style="position:relative;display:flex; justify-content:center;">
        <div class="custom-shape-divider-top-1662723266">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <div class="jackpots_grid ">
        @if($showSystemJackpots == "Yes")
            @foreach($getInternalJackpots as $index => $internalJackpots)
                <div wire:click="showJackpot('{{ $internalJackpots->Name }}')" class="jackpots_styles" 
                    style="margin-top:1.5rem;">
                    <a class="custom_btn">
                        <span style="background: linear-gradient(to bottom, orange 1%, #000 60%, #000 100%);
                                    animation: animatedgradient 20s ease alternate infinite;
                                    background-size: 400% 400%;"> 
                                    <!-- background: linear-gradient(60deg, #2c3e50, #000000, #2c3e50, #222); gradient span above -->
                            <span style=" background-image: linear-gradient(#fede9a 48%, #b07e29 47.9%,  #fede9a 100%);
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;font-weight:900 !important;">
                                    <strong class="superbold">{{ucfirst($internalJackpots->Name)}}</strong>  
                            </span> 
                        </span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

    <div class="text-effect mt-3">
        <span>{{Translate('External')}}</span>
    </div> 
    <div style="position:relative;display:flex; justify-content:center;">
        <div class="custom-shape-divider-top-1662723266">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    
    <div style="box-shadow:  box-shadow: 0px 15px 10px -15px #111;" class="jackpots_grid">
        @if($showExternalJackpots == "Yes")
            @foreach($getExternalJackpots as $index => $externalJackpots)
                <div wire:click="showJackpot('{{ $externalJackpots->Name }}', '{{ $externalJackpots->ID }}' )" class="jackpots_styles" 
                    style="margin-top:1.5rem;">
                    <a class="custom_btn">
                        <span style="background: linear-gradient(to bottom, #fede9a 1%, #000 60%, #000 100%);
                                    animation: animatedgradient 20s ease alternate infinite;
                                    background-size: 400% 400%;"> 
                                    <!-- background: linear-gradient(60deg, #2c3e50, #000000, #2c3e50, #222); gradient span above -->
                            <span style=" background-image: linear-gradient(#fede9a 48%, #b07e29 47.9%,  #fede9a 100%);
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;font-weight:900 !important;">
                                    <strong class="superbold">{{ucfirst($externalJackpots->Name)}}</strong>  
                            </span> 
                        </span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>  
</div> 
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>

<div class="padding_bottom">
</div>

<script>
    var jackpots = document.getElementsByClassName('jackpots_grid')[0];
    var screenHeight = window.innerHeight;
    if (jackpots.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
        document.querySelector("div#jackpots_page").classList.add("plifscroll");
    } 
</script>