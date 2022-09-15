<div id="loading">
    @if($pid)
        <img style="height:100%; width:100%;" src='header-images/welcome.jpg'>    
        <div style="position: absolute;top: 60%;left: 40%;transform: translate(-50%, -50%);color:#fff;font-size:1.3rem; font-weight:bold;">
        {{ $userName }}
        </div>
        <div style="position: absolute;top: 60%;right: 23%;transform: translate(-50%, -50%);
                    color:#fff;font-size:1.3rem; font-weight:bold; ">
        {{ number_format(intval($userPoints), 0, ',', '.') }}
        </div>
    @endif
</div>
