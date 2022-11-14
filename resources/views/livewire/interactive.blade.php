<div>
    <div class="bghandler">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/interactive.css') }}">
        <style>
            #welcome {
                display:none !important;
            }
            .bghandler {
                background: url("{{ asset('images/background-images/interactive.webp') }}");
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
                @includeWhen($cashouts,     'pages.cashout')
            </div>
            <div class="wrapp">
                <div class="custom_back-button" wire:click="previous()">Go back</div>
            </div>
        @elseif($jackpots)
            <div style="max-height:90vh;" class="d-flex flex-column overflow app_wrapper custom_scrollbar">
                @includeWhen($jackpots,     'pages.jackpots')
            </div> 
            <div class="wrapp">
                <div class="custom_back-button" wire:click="previous()">Go back</div>
            </div>
        @elseif($showJackpot)
            <div style="max-height:90vh;" class="d-flex flex-column overflow app_wrapper custom_scrollbar">
                @includeWhen($showJackpot,  'pages.showjackpot')
            </div> 
            <div class="wrapp">
                <div class="custom_back-button" wire:click="previous('jackpots')">Go back</div>
            </div>
        @endif
            
        @if($menu)
            <div style="width:100vw; height:100vh;" class="d-flex flex-column">
                <div style="height:25vh; width:100vw;align-items:baseline;" class="d-flex justify-content-center">
                    <img style="width:auto; height:130px;" src='images/header-images/PYRAMID.webp'>
                </div>
                
                <div style="transform:translateY(-35px);height:65vh; width:80vh;align-items:center;margin:0 auto;" class="d-flex justify-content-between">
                    <div wire:click="showThis('cashouts')" style="position:relative;z-index:1000;height:auto;width:auto;text-decoration:none;margin-top:3rem;" class="d-flex flex-column">
                        <img style="width:110px; height:110px;" src='images/slide-images/cashout.webp'>
                        <div class="text-center text-effect">
                            {{ Translate('Cashouts') }}
                        </div>
                    </div>
                    <div wire:click="showThis('jackpots')" style="position:relative;z-index:1000;height:auto;width:auto;text-decoration:none;margin-top:3rem;" class="d-flex flex-column">
                        <img style="width:110px; height:110px;" src='images/slide-images/jackpot.webp'>
                        <div class="text-center text-effect">
                            {{ Translate('Jackpots') }}
                        </div>
                    </div>
                </div>
                @if($initial)
                    <div style="width:100%;height:10vh;display:flex; justify-content:center;">
                        <div id="initial-loading" style="display:flex; flex-direction:column; justify-content:center;z-index:1000">
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
    <script type="text/javascript">
        //script 1
        // Remembers last user click on the whole page, and after 30000ms if there are no more clicks(actions), the user is returned to Idle page.
        timeNow = 0;
        lastTime = 0;
        let lmiMac = <?php echo "'$mac'"; ?>;
        
        setInterval(function(){
            timeNow++;
            if (timeNow - lastTime > 5)
                window.location.href = "idle?MAC=" + lmiMac;
        }, 5000);
        $('body').click(function(){
            lastTime = timeNow;
        });

        //script 2
        // When the user comes from Idle page to Interactive page, he sees a loading state for 4.5seconds( 4500ms ), as Jackptos and Cashouts buttons are not working due loading processes.
        setTimeout(function() {
            $('#initial-loading').addClass('hidden');
        },4500);

        //script 3
        // If the user is on interactive pages, if a player card is used, than the applicatio redirects the user to welcome page.
        setInterval(() => {
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    url:"pidquery/" + lmiMac ,
                    dataType: 'json',
                    type:'POST',
                    data: {},
                    contentType: false,
                    processData: false,
                    success : function(data){
                        if(data.success > 0)
                        {
                            window.location.href = "app?MAC=" + lmiMac;
                        }
                    },
                });
        }, 5000);
    </script>
</div>

