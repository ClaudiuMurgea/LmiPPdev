<div>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/idle.css') }}">

  <div style="display:none;" wire:poll.5000ms.keep-alive>
      &nbsp;
  </div>

  <div style="width:100vw; height:100vh;z-index:10000;position:relative;" wire:click="showIdlePages()">
    <div id="image">
        <div id="top">
            <div id="sky">&nbsp;</div>
        </div>

        <div id="bottom">
            <div id="ground">&nbsp;</div>
        </div>

        <div id="text">
          <div class="sign">
            @if($lang == 'Ro')
              <span class="fast-flicker">m</span>o<span class="flicker">d</span>
              </div>
                  <h1 style="margin-top:12rem !important;letter-spacing:2px; font-size:50px;padding-left:0;" class="Blazing">ASTEPTARE</h1>
              </div>
            @else
              <span class="fast-flicker">m</span>o<span class="flicker">d</span>e
              </div>
                  <h1 style="margin-top:12rem !important;" class="Blazing">IDLE</h1>
              </div>
            @endif
          </div>
        </div>

    </div>
  </div>

</div>