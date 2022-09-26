<div id="loading">
    <style>
        #text3d {
        color: #fff;
        letter-spacing: 3px;
        text-shadow: 
            -1px -1px 1px #efede3, 
            0px 1px 0 #2e2e2e, 
            0px 2px 0 #2c2c2c, 
            0px 3px 0 #2a2a2a, 
            0px 4px 0 #282828, 
            0px 5px 0 #262626, 
            0px 6px 0 #242424, 
            0px 7px 0 #222, 
            0px 8px 0 #202020, 
            0px 9px 0 #1e1e1e, 
            0px 10px 0 #1c1c1c, 
            0px 11px 0 #1a1a1a, 
            0px 12px 0 #181818, 
            0px 13px 0 #161616, 
            0px 14px 0 #141414, 
            0px 15px 0 #121212,
            2px 20px 5px rgba(0, 0, 0, 0.9),
            5px 23px 5px rgba(0, 0, 0, 0.3),
            8px 27px 8px rgba(0, 0, 0, 0.5),
            8px 28px 35px rgba(0, 0, 0, 0.9);
            line-height: 280px;
            font-size: 11.5rem;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    @if($pid)
        <!-- <div id="text3d">Welcome</div> -->
        <img class="welcome_background" src='images/background-images/welcome.jpg'>    
        <div class="welcome_wrapper">
            @if($lang == 'Ro')
                <img style="width:550px; height:auto;" class="welcome_img"  src='images/welcome-images/romanian.png'> 
            @else
                <img style="width:550px; height:auto;" class="welcome_img"  src='images/welcome-images/english.png'> 
            @endif
            <a class="custom_btn2">
                <span> 
                    <span class="welcome_info-wrapper">
                        <strong class="superbold full_width">
                            <div class="full_width d-flex justify-content-between">
                                <div class="welcome_info pl_1-5">
                                    {{ $userName }}
                                </div>
                                <div class="d-flex">
                                    <img style="width:40px; height:auto;"  src='images/header-images/bonus.png'> 
                                    <div class="welcome_info pr_1-5">
                                        {{ number_format(intval($userPoints), 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </strong>  
                    </span> 
                </span>
            </a>
        </div>
    @endif
</div>
