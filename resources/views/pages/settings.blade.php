<link rel="stylesheet" type="text/css" href="{{ asset('css/settings.css') }}">
<section style="width:90%; margin:0 auto;" class="verdana font_size-1-2" class="d-flex flex-column">
    <div class="mt_2 text-white setting_wrapper">
        {{Translate('Language')}}
    </div>
    <section class="d-flex justify-content-center setting_bg">
        <div id="Romania" wire:click="languageStatus('Ro')" wire:key='1' style="display:flex; flex-direction:column;margin-right:2rem;">
            <div class="text-center">
                <img src='images/language-images/ro.webp' class="language-img header-img mx-1 @if($langStatus == 'Ro') selected_wrapper @endif">
            </div>
            <div class="text-center settings_text mt_12">
                {{Translate('Romanian')}}
            </div>
        </div>
        <div id="England" wire:click="languageStatus('En')" wire:key='2' style="display:flex; flex-direction:column;margin-left:2rem;">
            <div class="text-center">
                <img src='images/language-images/en.webp' class="language-img header-img mx-1 @if($langStatus == 'En') selected_wrapper @endif">
            </div>
            <div class="text-center settings_text mt_12">
                {{Translate('English')}}
            </div>
        </div>
    </section>
</section>
<section style="width:90%; margin:0 auto;" class="verdana font_size-1-2"  class="d-flex flex-column">
    <div class="text-white setting_wrapper mt-3">
        {{Translate('Landing page')}}
    </div>
    <section class="d-flex justify-content-around setting_bg">
        @foreach($availablePages as $index => $page)
            @switch(preg_replace("@\n@","",$page))
                @case('Jackpots')
                    <div class="d-flex d-flex flex-column" wire:click="slideStatus('Jackpots')" wire:key='3'>
                        <div class="text-center moveup">
                            <img src='images/slide-images/jackpot.webp' class="landing_page-img header-img mx-1 @if($slideStatus == 'Jackpots') selected_wrapper @endif">
                        </div>
                        <div class="text-center no_line_height settings_text mt_05">
                            {{Translate('Jackpots')}}
                        </div>
                    </div>
                    @break 
                @case('Personal Jackpot')
                    <div class="d-flex d-flex flex-column" wire:click="slideStatus('Personal Jackpot')" wire:key='4'>
                        <div class="text-center moveup">
                            <img src='images/slide-images/personal.webp' class="ml_13 landing_page-img header-img mx-1 @if($slideStatus == 'Personal Jackpot') selected_wrapper @endif">
                        </div>
                        <div class="text-center no_line_height settings_text mt_05">
                            {{Translate('Personal Jackpot')}}
                        </div>
                    </div>
                    @break 
            
                @case('Bonus')
                    <div class="d-flex d-flex flex-column" wire:click="slideStatus('Bonus')" wire:key='5'>
                        <div class="text-center moveup">
                            <img src='images/slide-images/bonus.webp' class="landing_page-img header-img mx-1 @if($slideStatus == 'Bonus') selected_wrapper @endif">
                        </div>
                        <div class="text-center no_line_height settings_text mt_05">
                            {{Translate('Bonus')}}
                        </div>
                    </div>
                    @break

                @case('Cashouts')
                    <div class="d-flex d-flex flex-column" wire:click="slideStatus('Cashouts')" wire:key='6'>
                        <div class="text-center moveup">
                            <img src='images/slide-images/cashout.webp' class="landing_page-img header-img mx-1 @if($slideStatus == 'Cashouts') selected_wrapper @endif">
                        </div>
                        <div class="text-center no_line_height settings_text mt_05">
                            {{Translate('Cashouts')}}
                        </div>
                    </div>
                    @break 

                @case('Account Level')
                    <div class="d-flex d-flex flex-column" wire:click="slideStatus('Account Level')" wire:key='7'>
                        <div class="text-center moveup">
                            <img src='images/slide-images/ranking.webp' class="landing_page-img header-img mx-1 @if($slideStatus == 'Account Level') selected_wrapper @endif">
                        </div>
                        <div class="text-center no_line_height settings_text mt_05">
                            {{Translate('Account Level')}}
                        </div>
                    </div>
                    @break 
                @default
            @endswitch
        @endforeach
    </section>
    <div class="padding_bottom">
    </div>

    <script>
        $('#Romania').click(function() {  
            $("#personalSlide").text("{{Translate('Personal Jackpot','Ro')}}");
            $("#rankingSlide").text("{{Translate('Account Level','Ro')}}");
            $("#jackpotsSlide").text("{{Translate('Jackpots','Ro')}}");
            $("#bonusSlide").text("{{Translate('Bonus','Ro')}}");
            $("#cashoutsSlide").text("{{Translate('Cashouts','Ro')}}");
            $("#settingsSlide").text("{{Translate('Settings','Ro')}}");
        });

        $('#England').click(function() {  
            $("#personalSlide").text("{{Translate('Personal Jackpot','En')}}");
            $("#rankingSlide").text("{{Translate('Account Level','En')}}");
            $("#jackpotsSlide").text("{{Translate('Jackpots','En')}}");
            $("#bonusSlide").text("{{Translate('Bonus','En')}}");
            $("#cashoutsSlide").text("{{Translate('Cashouts','En')}}");
            $("#settingsSlide").text("{{Translate('Settings','En')}}");
        });
    </script>
</section>


