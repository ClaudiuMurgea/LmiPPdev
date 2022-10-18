<div style="min-height:35px; max-height:35px;" class='py-1 text-light' id='header'>
    <div class="d-flex justify-content-between align-items-center header_wrapper">
        <div>
            &nbsp;
        </div>
        <div style="position:absolute; top:2px; right:16px;max-width:71%;min-width:71%;" class="d-flex justify-content-end">
            <div class='d-flex align-items-center justify-content-start flex_el header_el1'>
                <img src='images/header-images/user.png' class='header-img_bigger mx_7'>
                <div class="wrapper">
                    <h4 class="dark_text header_info @if($nameAnimation) target @endif">
                        @if(isset($userName[0])) {{ ucfirst($userName[0]) }} @endif 
                        @if(isset($userName[1])) {{ ucfirst($userName[1]) }} @endif 
                    </h4>
                </div>
            </div>
            <div class='d-flex align-items-center justify-content-end flex_el header_el2'>
                <img src='images/header-images/cardlogo.png' class='header-img_bigger mx-1'>
                <h4 class="dark_text header_info mx-1">{{ Translate($userCardColor) }}</h4>
            </div>
            <div class='d-flex align-items-center justify-content-end flex_el header_el3'>
                <img style="margin-top:0 !important;margin-bottom:2px;margin-left:0.7rem;margin-right:5px;" src='images/header-images/star.png' class='header-img'>
                <div class="pre-loader_wrapper">
                    <ul class="pre-loader">
                    <!-- <span>{{ number_format(intval($userPoints), 0, ',', '.') }}</span> -->
                    <?php  $characters = str_split($userPoints); ?>
                        @foreach($characters as $character)
                            <li>{{ $character }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>