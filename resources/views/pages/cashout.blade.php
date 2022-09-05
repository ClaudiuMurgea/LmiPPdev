@if($keyboard)
    <div id="container">  
        <ul style="text-align:center;margin-top:2rem;" id="keyboard">
            <!-- <img class="hide_keyboard" src='/header-images/close.png' wire:click="hideKeyboard()"> -->
            <div contenteditable="true" data-placeholder="Search by slot number" style="caret-color: transparent;outline:1px solid #fff;background: linear-gradient(60deg, #444, #333, #222, #333, #444, #333);
                        box-shadow: 0px 0px 10px 0px #444, 0px 0px 16px 0px #ccc !important;
                        animation: animatedgradient 40s ease alternate infinite;position:relative;
                        background-size: 500% 500%; width:316px;border-radius: 5px;height:60px;border:1px solid #fff;text-align:center;font-size:24px;line-height:60px;color:#fff;font-weight:600
                        ">@if(count($property) <= 1)</div>
                        @else
                            @foreach($property as $index => $value)
                                @if($index != 0)
                                    {{ $value }}
                                @endif
                            @endforeach<span style="height:100%; color:red; float: right;width:90px;margin-right:7px;" wire:click="keyboard('back')">            
                                            <img src='slide-images/back.png' class='header-img mx-1'>
                                       </span> </div>
                        @endif
            
            <li wire:click="keyboard(1)"       class="letter mr_8">1</li>  
            <li wire:click="keyboard(2)"       class="letter mr_8">2</li>  
            <li wire:click="keyboard(3)"       class="letter">3</li>  
            <li wire:click="keyboard(4)"       class="letter clearl mr_8">4</li>  
            <li wire:click="keyboard(5)"       class="letter mr_8">5</li>  
            <li wire:click="keyboard(6)"       class="letter">6</li> 
            <li wire:click="keyboard(7)"       class="letter clearl mr_8">7</li>  
            <li wire:click="keyboard(8)"       class="letter mr_8">8</li>  
            <li wire:click="keyboard(9)"       class="letter">9</li>  
            <li wire:click="keyboard('del')"   class="letter clearl mr_8">
                Delete
            </li>
            <li wire:click="keyboard(0)"       class="letter mr_8">0</li>  
            <li  class="letter lastitem" wire:click="hideKeyboard()">Close</li>
            @if($message)
            <div style="margin-top:0.5rem; text-shadow:1px 1px #fff;">
                {{ $message }}
            </div>
            @endif
        </ul>  
    </div>  
@endif

@if(isset($cashouts))
    <table class="table custom_table_background max_width text-white bolder radius_10 cashout_page mt_2 no_border_b">
        <thead>
            <tr>
                <th style="width:100px;text-align:center;border-top:none !important;" scope="col">ID</th>
                <th scope="col" style="position:relative;z-index:1;display:flex;"  wire:click="showKeyboard()">Slot
                <!-- <img style="position:absolute; height:30px; width:30px;object-fit:contain;left:-10%;top:15%;z-index:1;" class="hide_keyboard" src="{{url('/header-images/magnify.png')}}"> -->
                </th>
                <th scope="col">{{ Translate('Value') }}</th>
                <th scope="col">{{ Translate('MaxInactiveMin') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashouts as $value)
                <tr>
                    <th @if($loop->last) style="border-bottom: none; text-align:center;"  @else style="text-align:center;" @endif    scope="row">1</th>
                    <td @if($loop->last) style="border-bottom: none;" @endif>2</td>
                    <td @if($loop->last) style="border-bottom: none;" @endif> {{ $value->Login }} </td>
                    <td @if($loop->last) style="border-bottom: none;" @endif> {{ $value->MaxInactiveMin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<script>
    var cashoutpage = document.getElementsByClassName('cashout_page')[0];
    var screenHeight = window.innerHeight;
    if (cashoutpage.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
    } 
</script>
