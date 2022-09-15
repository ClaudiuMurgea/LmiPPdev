@include('utility.language')
<div >
    @include('sections.header')
    <!-- Pages Includes -->
    <div class="custom_title">{{ Translate($title) }}</div>
    <img class="bg_wrapper" src="data:image/png;base64,{{ chunk_split(base64_encode($cardBackgrounds->BackgroundImage)) }}" alt="image" width="100" />

    <div class="d-flex flex-column overflow app_wrapper custom_scrollbar">
        @includeWhen($AccountLevel,     'pages.accountlevel')
        @includeWhen($Settings,         'pages.settings')
        @includeWhen($Bonus,            'pages.bonus')
        @includeWhen($Cashouts,         'pages.cashout')
        @includeWhen($Jackpots,         'pages.jackpots')
        @includeWhen($ShowJackpot,      'pages.showjackpot')
        @includeWhen($PersonalJackpot,  'pages.personaljackpot')
            <div class="d-none" wire:poll.5000ms>
                &nbsp;
            </div>
    </div>
    @include('sections.slide')  
</div>
