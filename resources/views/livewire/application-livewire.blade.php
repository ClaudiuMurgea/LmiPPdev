@include('utility.language')
<div>

    @include('sections.header')

    <!-- Pages Includes -->
    <div class="custom_title">{{ Translate($title) }} {{ $titleExtra }}</div>
    <div style="position:absolute; top:35px; bottom:0;width:100vw;" class='d-flex flex-column overflow'>
        @includeWhen($account,       'pages.accountlevel')
        @includeWhen($settings,      'pages.settings')
        @includeWhen($bonus,         'pages.bonus')
        @includeWhen($cashout,       'pages.cashout')
        @includeWhen($jackpots,      'pages.jackpots')
        @includeWhen($market,        'pages.market')
        @includeWhen($news,          'pages.news')
        @includeWhen($okto,          'pages.okto')
        @includeWhen($pyramid,       'pages.pyramid')
        @includeWhen($quest,         'pages.quest')
        @includeWhen($showJackpot,   'pages.showjackpot')
        @includeWhen($tombola,       'pages.tombola')
        @includeWhen($personal,      'pages.personaljackpot')
        <div class="padding_bottom">

        </div>
    </div>

    @include('sections.slide')  
    <script>
        setTimeout(function() {
            $('#loading').addClass('hidden');
        }, 10);
    </script>
</div>
    