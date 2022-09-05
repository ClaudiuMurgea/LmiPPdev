<!-- <div class="max_width mt_2" 
     style="background: linear-gradient(20deg, rgba(0,0,0, 0.1),#000,rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000,rgba(0,0,0, 0.1), #000);
            animation: animatedgradient 100s ease alternate infinite;background-size: 500% 500%;border-radius:10px;">

    <div style="font-size:1.4rem; font-weight:600;background: linear-gradient(180deg, rgba(0,0,0, 0.1),#000,rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000,rgba(0,0,0, 0.1), #000);
            animation: animatedgradient 100s ease alternate infinite;background-size: 500% 500%;border-top-left-radius:10px; border-top-right-radius:10px;" class="full_width text-center text_white verdana">
            {{Translate('Language')}}
    </div>
        
    <div style="display:flex;justify-content:space-around;"> -->
        <div id="Romania" wire:click="languageStatus('Ro')" wire:key='1'>
            <img style="min-height:50px; min-width:100px; margin:1rem 0; border-radius:8px; border:1px solid #fff; outline:1px solid #ccc;" src='language-images/Romania.png' class="header-img mx-1 @if($langStatus == 'Ro') selected_wrapper @endif">
        </div>

        <!-- <div id="England" wire:click="languageStatus('En')" wire:key='2'>
            <img style="min-height:50px; min-width:100px; margin:1rem 0; border-radius:8px; border:1px solid #fff; outline:1px solid #ccc;" src='language-images/England.png' class="header-img mx-1 @if($langStatus == 'En') selected_wrapper @endif">
        </div>
    </div>

    <div style="font-size:1.4rem; font-weight:600;background: linear-gradient(180deg, rgba(0,0,0, 0.1),#000,rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000, rgba(0,0,0, 0.1), #000,rgba(0,0,0, 0.1), #000);
            animation: animatedgradient 100s ease alternate infinite;background-size: 500% 500%;" class="full_width text-center text_white verdana">
            Initial page 
    </div>
        
    <div style="display:flex;justify-content:space-around;">
        <div wire:click="slideStatus('jackpots')"   wire:key='3'>
            <img style="min-height:80px; min-width:80px; margin:0.5rem 0;" src='slide-images/jackpot.png' class="silver_border header-img mx-1 @if($slideStatus == 'jackpots')  selected_wrapper @endif">
        </div>

        <div wire:click="slideStatus('bonus')"      wire:key='4'>
            <img style="min-height:80px; min-width:80px; margin:0.5rem 0;" src='slide-images/bonus.png'   class="silver_border header-img mx-1 @if($slideStatus == 'bonus')     selected_wrapper @endif">
        </div>

        <div wire:click="slideStatus('cashouts')"   wire:key='5'>
            <img style="min-height:80px; min-width:80px; margin:0.5rem 0;" src='slide-images/cashout.png' class="silver_border header-img mx-1 @if($slideStatus == 'cashouts')  selected_wrapper @endif">
        </div>

        <div wire:click="slideStatus('tombola')"    wire:key='6'>
            <img style="min-height:80px; min-width:80px; margin:0.5rem 0;" src='slide-images/raffle.png'  class="silver_border header-img mx-1 @if($slideStatus == 'tombola')   selected_wrapper @endif">
        </div>
    </div>
</div> -->

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
