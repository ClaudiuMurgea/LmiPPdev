<div class='py-1 text-light' id='header'>
    <div class="d-flex justify-content-between align-items-center header_wrapper">
        <div style="min-width:33%;">
            &nbsp;
        </div>
        <div style="text-align:center;" class='d-flex justify-content-center align-items-center mx-2'>
            <img src='header-images/userlogo3.png' class='header-img_bigger mx_8'>
            <h4 class="dark_text header_info">{{ $userName }}</h4>
        </div>
        <div style="min-width:33%;" class="d-flex justify-content-end">
            <div class='d-flex align-items-center'>
                <img src='header-images/cardlogo.png' class='header-img_bigger'>
                <h4 class="dark_text header_info mx-2">{{ Translate($userCardColor) }}</h4>
            </div>
            <div class='d-flex align-items-center mx-2'>
            <!-- <span class="line">&nbsp;</span>  -->
                <img style="margin-top:0 !important;margin-bottom:2px;" src='header-images/star.png' class='header-img mx-2'>
                <h4 class="dark_text header_info header_points">{{ number_format(intval($userPoints), 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>
</div>