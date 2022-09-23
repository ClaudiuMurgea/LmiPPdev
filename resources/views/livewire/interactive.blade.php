<div>
    <div class="bghandler">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/interactive.css') }}">
        <style>
            .bghandler {
                background: url("{{ asset('/header-images/bg8.jpg') }}");
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
        @include('utility.language')
        @if($cashouts)
        <div style="max-height:90vh;" class="d-flex flex-column overflow app_wrapper custom_scrollbar">
            @includeWhen($cashouts,         'pages.cashout')
        </div>
        @if($showReturn)
            <div style="display:flex; justify-content:center;width:100%;align-items: center; 
                                 background: linear-gradient(0deg,transparent, rgba(152, 151, 169, 0.4),rgba(2, 2, 2, 0.3),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4), rgba(4, 4, 4, 0.4),rgba(2, 2, 2, 0.3), rgba(152, 151, 169, 0.4), transparent);

                        height:50px;position:absolute;bottom:0;">
                <div class="custom_back-button" wire:click="previous()">Go back</div>
            </div>
        @endif
        @elseif($jackpots)
            <div style="max-height:90vh;" class="d-flex flex-column overflow app_wrapper custom_scrollbar">
                @includeWhen($jackpots,         'pages.jackpots')
            </div> 
                @if($showReturn)
                    <div style="display:flex; justify-content:center;width:100%;align-items: center;  
                                background: linear-gradient(0deg,transparent, rgba(152, 151, 169, 0.4),rgba(2, 2, 2, 0.3), rgba(4, 4, 4, 0.4), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4), rgba(4, 4, 4, 0.4),rgba(2, 2, 2, 0.3), rgba(152, 151, 169, 0.4), transparent);
                                height:50px;position:absolute;bottom:0;" >
                        <div class="custom_back-button" wire:click="previous()">Go back</div>
                    </div>
                @endif
        @elseif($showJackpot)
            <div style="max-height:90vh;" class="d-flex flex-column overflow app_wrapper custom_scrollbar">
                @includeWhen($showJackpot,       'pages.showjackpot')
            </div> 
            @if($showReturn)
            <!-- background: linear-gradient(0deg,transparent, transparent,transparent,transparent, #fff,rgba(4, 4, 4, 0.4), #fff, rgba(4, 4, 4, 0.4), #fff,rgba(4, 4, 4, 0.4), #fff, rgba(4, 4, 4, 0.4), #fff, transparent,transparent, transparent, transparent); -->
                <div style="display:flex; justify-content:center;width:100%;align-items: center;      
                            background: linear-gradient(0deg,transparent, rgba(152, 151, 169, 0.4),rgba(2, 2, 2, 0.3),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4),rgba(0, 0, 0, 0.5), rgba(4, 4, 4, 0.4),rgba(4, 4, 4, 0.4), rgba(4, 4, 4, 0.4),rgba(2, 2, 2, 0.3), rgba(152, 151, 169, 0.4), transparent);
                            height:50px;position:absolute;bottom:0;">
                    <div class="custom_back-button" wire:click="previous('jackpots')">Go back</div>
                </div>
            @endif
        @endif
        @if($noLoading)
            <div style="width:100vw; height:100vh;" class="d-flex flex-column">
                <div style="height:25vh; width:100vw;align-items:baseline;" class="d-flex justify-content-center">
                    <img style="width:auto; height:130px;" src='header-images/PYRAMID.png'>
                </div>
                
                <div style="transform:translateY(-35px);height:65vh; width:80vh;align-items:center;margin:0 auto;" class="d-flex justify-content-between">
                    <div wire:click="showThis('cashouts')" style="position:relative;z-index:1000;height:auto;width:auto;text-decoration:none;margin-top:3rem;" class="d-flex flex-column">
                        <img style="width:110px; height:110px;" src='slide-images/cashout.png'>
                        <div class="text-center text-effect">
                        {{ Translate('Cashouts') }}
                        </div>
                    </div>
                    <div wire:click="showThis('jackpots')" style="position:relative;z-index:1000;height:auto;width:auto;text-decoration:none;margin-top:3rem;" class="d-flex flex-column">
                        <img style="width:110px; height:110px;" src='slide-images/jackpot.png'>
                        <div class="text-center text-effect">
                        {{ Translate('Jackpots') }}
                        </div>
                    </div>
                </div>
                @if(!$initial)
                    <div style="width:100%;height:10vh;display:flex; justify-content:center;">
                        <div id="loading2" style="display:flex; flex-direction:column; justify-content:center;z-index:1000">
                            <div class="waviy">
                                <span style="--i:1">L</span>
                                <span style="--i:2">o</span>
                                <span style="--i:3">a</span>
                                <span style="--i:4">d</span>
                                <span style="--i:5">i</span>
                                <span style="--i:6">n</span>
                                <span style="--i:7">g</span>
                            </div>
                            <div style="display:flex; justify-content:center;">
                                <div style="display:flex; justify-content:center;" class="la-ball-pulse la-2x">
                                <div></div>
                                <div></div>
                                <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
<script>
    // Remembers last user click on the whole page, and after 30000ms if there are no more clicks(actions), the user is returned to Idle page.
    timeNow = 0;
    lastTime = 0;
    setInterval(function(){
        timeNow++;
        if (timeNow - lastTime > 5)
            window.location.href = "idle";
    }, 30000);
    $('body').click(function(){
        lastTime = timeNow;
    });

    // When the user comes from Idle page to Interactive page, he sees a loading state for 3900ms, as Jackptos and Cashouts buttons are not working due loading processes.
    setTimeout(function() {
        $('#loading2').addClass('hidden');
    },4000);
</script>
