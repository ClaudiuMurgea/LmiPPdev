<section>
    <style>
        .bghandler {
            background: url("{{ asset('images/background-images/jackpots.jpg') }}");
            min-height:100vh;
            max-height:100vh;
            min-width:100vw;
            max-width:100vw;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>
    <div class="text-effect mt-4">
        <span>{{ $jackpotTitle }}</span>
    </div> 
    <div style="position:relative;display:flex; justify-content:center;" >
        <div class="custom-shape-divider-top-1662723266">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <table class="table1 text-center max_width mt_1-5">
        <thead>
            <tr>
                <th style="border-top-left-radius:16px;text-align:left;padding-left:5rem;" colspan="2" class="opacity_0-9 font_size-1-4"> {{ Translate('Slot')  }}        </th>
                <th style="text-align:left;padding-left:1rem;"                             colspan="2" class="opacity_0-9 font_size-1-4"> {{ Translate('Value') }}        </th>
                <th style="border-top-right-radius:16px;text-align:left;"                  colspan="3" class="opacity_0-9 font_size-1-4"> {{ Translate('Timestamp')  }}   </th>
            </tr>
        </thead>
        <tbody>
            @if(!count($jackpotValue))
                <tr>
                    <td colspan="7" class="text-center">
                        {{ Translate('This Jackpot has not been won yet!') }}
                    </td>
                </tr>
            @endif
            @foreach($jackpotValue as $value)
                <tr @if($loop->last) style="box-shadow: 0 2px 6px -2px #000;" @endif class="opacity_0-9">
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:5rem;" colspan="2" class="font_size-1-4"> {{ $value->Slot }}      </td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:1rem;" colspan="2"   class="font_size-1-4"> {{ $value->Value }}     </td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;"                   colspan="3"   class="font_size-1-4"> {{ $value->Timestamp }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="padding_bottom">
    </div>

</section>
