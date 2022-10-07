<div class="bonus_page">

    <div class="max_width d-flex mt_2 bonus_wrapper">
        <div class="bonus_left">
            {{ Translate('Redeemed today') }}
        </div>
        <div class="bonus_right">
            {{ number_format(intval($dayRedeemedPoints), 0, ',', '.') }}
        </div>
    </div>

    <div class="max_width d-flex mt-3 bonus_wrapper">
        <div class="bonus_left">
            {{ Translate('Redeemed current month') }}
        </div>
        <div class="bonus_right">
            {{ number_format(intval($monthRedeemedPoints), 0, ',', '.') }}
        </div>
    </div>

    <div class="max_width d-flex mt-3 bonus_wrapper">
        <div class="bonus_left">
            {{ Translate('Collected today') }}
        </div>
        <div class="bonus_right">
            {{ number_format(intval($dayCollectedPoints), 0, ',', '.') }}
        </div>
    </div>

    <div class="max_width d-flex mt-3 bonus_wrapper">
        <div class="bonus_left">
            {{ Translate('Collected current month') }}
        </div>
        <div class="bonus_right">
            {{ number_format(intval($monthCollectedPoints), 0, ',', '.') }}
        </div>
    </div>

    <div class="max_width d-flex mt-3 bonus_wrapper">
        <div class="bonus_left">
            <!-- @include('utility.shape') -->
            {{ Translate('Current points from benefit ') . $BonusShowCurrentBenefit}}
        </div>
        <div class="bonus_right">
            {{ number_format(intval($totalPoints), 0, ',', '.') }}
        </div>
    </div>
    
    <div class="padding_bottom">
    </div>

</div>





