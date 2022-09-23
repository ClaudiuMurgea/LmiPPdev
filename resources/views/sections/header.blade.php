<div class='py-1 text-light' id='header'>
    <div class="d-flex justify-content-between align-items-center header_wrapper">
        <div>
            &nbsp;
        </div>
        <div class='full_width d-flex justify-content-center align-items-center'>
            <img src='header-images/userlogo2.png' class='header-img_bigger mx_8'>
            <h4 style="line-height:1.25;padding-right:34px;" class="dark_text header_info">{{ $userName }}</h4>
        </div>
        <div style="position:absolute; top:6px; right:16px;" class="d-flex justify-content-end">
            <div class='d-flex align-items-center'>
                <img src='header-images/cardlogo.png' class='header-img_bigger'>
                <h4 class="dark_text header_info mx-2">{{ Translate($userCardColor) }}</h4>
            </div>
            <div class='d-flex align-items-center justify-content-end'>
                <img style="margin-top:0 !important;margin-bottom:2px;margin-left:0.7rem;margin-right:5px;" src='header-images/star.png' class='header-img'>
                <div style="position:relative;overflow:hidden;width:auto;">
                        <ul class="pre-loader">
                        <!-- <span>{{ number_format(intval($userPoints), 0, ',', '.') }}</span> -->
                        <?php $chars = str_split($userPoints); ?>
                            @foreach($chars as $char)
                                <li>{{ $char }}</li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>