<section class="verdana font_size-1-2" style="width:90%; margin:0 auto; display:flex; flex-direction:column;">
    <div style="text-shadow:1px 1px #000;letter-spacing:1px;
                background:-webkit-gradient(
                        linear,
                        left bottom,
                        left top,
                        color-stop(0.2,  rgba(255,255,255, 1)),
                        color-stop(0.6,  rgba(0,0,0, 0.1)),
                        color-stop(0.8,  rgba(0,0,0, 0.5)),
                        color-stop(0.14, rgba(255,255,255, 0.7)),
                        color-stop(0.28, rgba(0,0,0, 0.7)),
                        color-stop(0.27, transparent),
                        color-stop(0.98, rgba(0,0,0, 0.7)),
                        color-stop(1,    rgba(255,255,255, 1))
                        );
            padding-left:1rem;line-height:1.9;font-size:1.3rem;border-top-left-radius:10px; border-top-right-radius:10px;padding-bottom:5px;" class="mt_2 text-white">
        {{Translate('Language')}}
    </div>
    <section style="min-height:100px; max-height:100px;display:flex; justify-content:center;
    background:-webkit-gradient(
            linear,
            left bottom,
            left top,
            color-stop(0.2,  rgba(255,255,255, 0.6)),
            color-stop(0.6,  rgba(255,255,255, 0.4)),
            color-stop(0.8,  rgba(255,255,255, 0.7)),
            color-stop(0.14, rgba(255,255,255, 0.7)),
            color-stop(0.28, rgba(255,255,255, 0.2)),
            color-stop(0.27, rgba(255,255,255, 1)),
            color-stop(0.98, rgba(255,255,255, 1)),
            color-stop(1,    rgba(255,255,255, 0.6))
            );">
        <div id="Romania" wire:click="languageStatus('Ro')" wire:key='1' style="display:flex; flex-direction:column;margin-right:2rem;">
            <div class="text-center">
                <img style="min-height:55px; min-width:55px; opacity:0.5; margin-top:0.5rem;" src='language-images/ro.png' class="header-img mx-1 @if($langStatus == 'Ro') selected_wrapper @endif">
            </div>
            <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:12px" class="text-center">
                {{Translate('Romanian')}}
            </div>
        </div>
        <div id="England" wire:click="languageStatus('En')" wire:key='2' style="display:flex; flex-direction:column;margin-left:2rem;">
            <div class="text-center">
                <img style="min-height:55px; min-width:55px; opacity:0.5; margin-top:0.5rem;" src='language-images/en.png' class="header-img mx-1 @if($langStatus == 'En') selected_wrapper @endif">
            </div>
            <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:12px" class="text-center">
                {{Translate('English')}}
            </div>
        </div>
    </section>
</section>
<section class="verdana font_size-1-2" style="width:90%; margin:0 auto; display:flex; flex-direction:column;margin-top:5px;">
    <div style="text-shadow:1px 1px #000;letter-spacing:1px;
                background:-webkit-gradient(
                    linear,
                    left bottom,
                    left top,
                    color-stop(0.2,  rgba(255,255,255, 1)),
                    color-stop(0.6,  rgba(0,0,0, 0.1)),
                    color-stop(0.8,  rgba(0,0,0, 0.5)),
                    color-stop(0.14, rgba(255,255,255, 0.7)),
                    color-stop(0.28, rgba(0,0,0, 0.7)),
                    color-stop(0.27, transparent),
                    color-stop(0.98, rgba(0,0,0, 0.7)),
                    color-stop(1,    rgba(255,255,255, 1))
                    );
            padding-left:1rem;margin-top:1rem;line-height:1.9;font-size:1.3rem;border-top-left-radius:10px; border-top-right-radius:10px;padding-bottom:5px;" class="text-white">
        {{Translate('Landing page')}}
    </div>
    <section style="min-height:100px; max-height:100px;display:flex; justify-content:space-around;background:-webkit-gradient(
            linear,
            left bottom,
            left top,
            color-stop(0.2,  rgba(255,255,255, 0.6)),
            color-stop(0.6,  rgba(255,255,255, 0.4)),
            color-stop(0.8,  rgba(255,255,255, 0.7)),
            color-stop(0.14, rgba(255,255,255, 0.7)),
            color-stop(0.28, rgba(255,255,255, 0.2)),
            color-stop(0.27, rgba(255,255,255, 1)),
            color-stop(0.98, rgba(255,255,255, 1)),
            color-stop(1,    rgba(255,255,255, 0.6))
            );">
       
        @foreach($availablePages as $index => $page)
            @switch(preg_replace("@\n@","",$page))
                @case('Jackpots')
                    <div style="display:flex; flex-direction:column;" wire:click="slideStatus('Jackpots')" wire:key='4'>
                        <div class="text-center moveup">
                            <img style="min-height:80px; min-width:80px; opacity:0.5; margin-bottom:0;" src='slide-images/jackpot.png' class="header-img mx-1 @if($slideStatus == 'Jackpots') selected_wrapper @endif">
                        </div>
                        <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:8px" class="text-center no_line_height">
                            {{Translate('Jackpots')}}
                        </div>
                    </div>
                    @break 
                @case('Personal Jackpot')
                    <div style="display:flex; flex-direction:column;" wire:click="slideStatus('Personal Jackpot')" wire:key='3'>
                        <div class="text-center moveup">
                            <img style="margin-left:15px !important;min-height:80px; min-width:80px; opacity:0.5; margin-bottom:0;" src='slide-images/personal.png' class="header-img mx-1 @if($slideStatus == 'Personal Jackpot') selected_wrapper @endif">
                        </div>
                        <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:8px" class="text-center no_line_height">
                            {{Translate('Personal Jackpot')}}
                        </div>
                    </div>
                    @break 
            
                @case('Bonus')
                    <div style="display:flex; flex-direction:column;" wire:click="slideStatus('Bonus')" wire:key='5'>
                        <div class="text-center moveup">
                            <img style="min-height:80px; min-width:80px; opacity:0.5; margin-bottom:0;" src='slide-images/bonus.png' class="header-img mx-1 @if($slideStatus == 'Bonus') selected_wrapper @endif">
                        </div>
                        <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:8px" class="text-center no_line_height">
                            {{Translate('Bonus')}}
                        </div>
                    </div>
                    @break

                @case('Cashouts')
                    <div style="display:flex; flex-direction:column;" wire:click="slideStatus('Cashouts')" wire:key='6'>
                        <div class="text-center moveup">
                            <img style="min-height:80px; min-width:80px; opacity:0.5; margin-bottom:0;" src='slide-images/cashout.png' class="header-img mx-1 @if($slideStatus == 'Cashouts') selected_wrapper @endif">
                        </div>
                        <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:8px" class="text-center no_line_height">
                            {{Translate('Cashouts')}}
                        </div>
                    </div>
                    @break 

                @case('Account Level')
                    <div style="display:flex; flex-direction:column;" wire:click="slideStatus('Account Level')" wire:key='7'>
                        <div class="text-center moveup">
                            <img style="min-height:80px; min-width:80px; opacity:0.5; margin-bottom:0;" src='slide-images/ranking.png' class="header-img mx-1 @if($slideStatus == 'Account Level') selected_wrapper @endif">
                        </div>
                        <div style="text-shadow:1px 0px #fff;font-weight:600;margin-top:8px" class="text-center no_line_height">
                            {{Translate('Account Level')}}
                        </div>
                    </div>
                    @break 
                @default
            @endswitch
        @endforeach
    </section>
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
