<div id="jackpots_page" class="max_width mt-2">
    <style>
        .bghandler{
            background: url("{{ asset('images/background-images/jackpots.jpg') }}");
            min-height:100vh;
            max-height:100vh;
            min-width:100vw;
            max-width:100vw;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>
    @if($showSystemJackpots == "Yes" && count($getInternalJackpots))
        <div class="text-effect mt-3">
            <span>{{Translate('System Jackpots')}}</span>
        </div> 
        <div class="position-relative d-flex justify-content-center">
            <div class="custom-shape-divider-top-1662723266">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    @endif

    <div class="jackpots_grid ">
        @if($showSystemJackpots == "Yes")
            @foreach($getInternalJackpots as $index => $internalJackpots)
                <div wire:click="showJackpot('{{ $internalJackpots->Name }}')" class="jackpots_styles mt_1-5">
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

    @if($showExternalJackpots == "Yes" && count($getExternalJackpots))
        <div class="text-effect mt-3">
            <span>{{Translate('System Jackpots')}}</span>
        </div> 
        <div class="position-relative d-flex justify-content-center">
            <div class="custom-shape-divider-top-1662723266">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    @endif

    <div class="jackpots_grid">
        @if($showExternalJackpots == "Yes")
            @foreach($getExternalJackpots as $index => $externalJackpots)
                <div wire:click="showJackpot('{{ $externalJackpots->Name }}', '{{ $externalJackpots->ID }}' )" class="jackpots_styles mt_1-5">
                    <a class="custom_btn">
                        <span style="background: linear-gradient(to bottom, #fede9a 1%, #000 60%, #000 100%);
                                    animation: animatedgradient 20s ease alternate infinite;
                                    background-size: 400% 400%;"> 
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