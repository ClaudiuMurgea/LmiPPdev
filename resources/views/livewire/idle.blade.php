<div>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/idle.css') }}">

  <!-- This div with wire:poll is forcing the Livewire Component refresh every 5 seconds -->
  <div class="d-none" wire:poll.5000ms.keep-alive>
      PID : {{ $activePID }}
  </div>

  <div style="width:100vw; height:100vh;z-index:10000;position:relative;" wire:click="showIdlePages()">
    <div> <!-- id="image"  -->
        <div> <!-- id="top"  -->
            <div>&nbsp;</div> <!-- id="sky"  -->
        </div>

        <div> <!-- id="bottom"  -->
            <div >&nbsp;</div> <!-- id="ground"  -->
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
  <div class="verdana version">
      Version 1.0.0
  </div>
</div>