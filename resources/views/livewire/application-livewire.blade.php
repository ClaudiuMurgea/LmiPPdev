<div>
    @include('utility.language')
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
    <script type="text/javascript">
        let lmiMac = <?php echo "'$mac'"; ?>;

        let lmiDevice = <?php echo json_encode($DeviceID) ?>;
        
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
                        if(data.success < 1)
                        {

                            window.location.href = "idle?MAC=" + lmiMac;
                        }
                    },
                });
        }, 5000);
    </script>
</div>
