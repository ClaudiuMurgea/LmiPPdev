<section class="verdana font_size-1-2" style="width:90%; margin:0 auto; display:flex; flex-direction:column;">
    <div style="background: #333;padding-left:1rem;" class="mt_2 text-white">
        Language
    </div>
    <section style="min-height:100px; max-height:100px;display:flex; justify-content:center;background: linear-gradient(to right, rgba(255,255,255, 0.5) 1%, rgba(255,255,255, 0.4) 60%, rgba(255,255,255, 0.5) 100%);">
        <div style="display:flex; flex-direction:column;margin-right:2rem;">
            <div class="text-center" id="Romania" wire:key='1'>
                <img style="min-height:55px; min-width:55px;opacity:0.6;margin-top:0.5rem;" src='language-images/ROx.png' class="header-img mx-1 @if($langStatus == 'Ro') selected_wrapper @endif">
            </div>
            <div class="text-center">
                Romanian
            </div>
        </div>

        <div style="display:flex; flex-direction:column;margin-left:2rem;">
            <div class="text-center" id="England" wire:click="languageStatus('En')" wire:key='2'>
                <img style="min-height:55px; min-width:55px;opacity:0.6;margin-top:0.5rem;" src='language-images/UKx.png' class="header-img mx-1 @if($langStatus == 'En') selected_wrapper @endif">
            </div>
            <div class="text-center">
                English
            </div>
        </div>

    </section>
</section>
<section class="verdana font_size-1-2" style="width:90%; margin:0 auto; display:flex; flex-direction:column;">
    <div style="background: #333;padding-left:1rem;margin-top:1rem;" class="text-white">
        Landing page
    </div>
    <section style="min-height:100px; max-height:100px;display:flex; justify-content:space-around;background: linear-gradient(to right, rgba(255,255,255, 0.5) 1%, rgba(255,255,255, 0.4) 60%, rgba(255,255,255, 0.5) 100%);">
       
        <div style="display:flex; flex-direction:column;">
            <div class="text-center moveup" wire:click="slideStatus('personaljackpot')" wire:key='3'>
                <img style="margin-left:15px !important;min-height:80px; min-width:80px; opacity:0.6; margin-bottom:0;" src='slide-images/personal.png' class="header-img mx-1 @if($slideStatus == 'personal') selected_wrapper @endif">
            </div>
            <div class="text-center no_line_height">
                Personal Jackpot
            </div>
        </div>

        <div style="display:flex; flex-direction:column;">
            <div class="text-center moveup" wire:click="slideStatus('jackpots')" wire:key='4'>
                <img style="min-height:80px; min-width:80px; opacity:0.6; margin-bottom:0;" src='slide-images/jackpot.png' class="header-img mx-1 @if($slideStatus == 'jackpots') selected_wrapper @endif">
            </div>
            <div class="text-center no_line_height">
                Jackpots
            </div>
        </div>

        <div style="display:flex; flex-direction:column;">
            <div class="text-center moveup" wire:click="slideStatus('bonus')" wire:key='5'>
                <img style="min-height:80px; min-width:80px; opacity:0.6; margin-bottom:0;" src='slide-images/bonus.png' class="header-img mx-1 @if($slideStatus == 'bonus') selected_wrapper @endif">
            </div>
            <div class="text-center no_line_height">
                Bonus
            </div>
        </div>

        <div style="display:flex; flex-direction:column;">
            <div class="text-center moveup" wire:click="slideStatus('cashouts')" wire:key='6'>
                <img style="min-height:80px; min-width:80px; opacity:0.6; margin-bottom:0;" src='slide-images/cashout.png' class="header-img mx-1 @if($slideStatus == 'cashouts') selected_wrapper @endif">
            </div>
            <div class="text-center no_line_height">
                Cashouts
            </div>
        </div>

        <div style="display:flex; flex-direction:column;">
            <div class="text-center moveup" wire:click="slideStatus('tombola')" wire:key='7'>
                <img style="min-height:80px; min-width:80px; opacity:0.6; margin-bottom:0;" src='slide-images/raffle.png' class="header-img mx-1 @if($slideStatus == 'tombola') selected_wrapper @endif">
            </div>
            <div class="text-center no_line_height">
                Tombola
            </div>
        </div>

    </section>
</section>


    

<script>
    $('#Romania').click(function() {  
        $("#jackpotsSlide").text("Jackpoturi")
        $("#bonusSlide").text("Bonus")
        $("#cashoutsSlide").text("Plati")
        $("#tombolaSlide").text("Tombola")
        $("#settingsSlide").text("Setari")
    });
    $('#England').click(function() {  
        $("#jackpotsSlide").text("Jackpots")
        $("#bonusSlide").text("Bonus")
        $("#cashoutsSlide").text("Cashouts")
        $("#slideQuest").text("Quest")
        $("#tombolaSlide").text("Tombola")
        $("#settingsSlide").text("Settings")
    });
</script>
