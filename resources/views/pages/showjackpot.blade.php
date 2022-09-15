<section>
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
    <table style="margin-top:1.5rem;" class="table1 text-center max_width font_size-1-2">
        <thead>
            <tr>
                <th style="border-top-left-radius:16px;text-align:left;padding-left:4rem;" class="opacity_0-9 ">{{ Translate('Slot')  }}</th>
                <th style="text-align:left;padding-left:1rem;" class="opacity_0-9">{{ Translate('Value') }}</th>
                <th style="border-top-right-radius:16px;text-align:left;" class="opacity_0-9">{{ Translate('Date')  }}</th>
            </tr>
        </thead>
        <tbody >
            @if(!count($jackpotValue))
                <tr>
                    <td colspan="3" class="text-center">
                        This <span style="text-decoration: underline">Jackpot</span> has not been won yet!
                    </td>
                </tr>
            @endif
            @foreach($jackpotValue as $value)
                <tr @if($loop->last) style="box-shadow: 0 2px 6px -2px #000;" @endif class="opacity_0-9">
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:4rem;">{{ $value->Slot }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:1rem;">{{ $value->Value }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;">                  {{ $value->Timestamp }}</td>
                </tr>
                <tr @if($loop->last) style="box-shadow: 0 2px 6px -2px #000;" @endif class="opacity_0-9">
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:4rem;">{{ $value->Slot }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:1rem;">{{ $value->Value }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;">                  {{ $value->Timestamp }}</td>
                </tr>
                <tr @if($loop->last) style="box-shadow: 0 2px 6px -2px #000;" @endif class="opacity_0-9">
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:4rem;">{{ $value->Slot }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;padding-left:1rem;">{{ $value->Value }}</td>
                    <td style="border:none;border-bottom:3px solid transparent;border-top:3px solid transparent;text-align:left;">                  {{ $value->Timestamp }}</td>
                </tr>
            @endforeach
        <!-- style="border-top: 2px solid #fbb117" -->
        </tbody>
    </table>
</section>
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>
<div class="padding_bottom">
</div>
<script>
    var showjackpot = document.getElementsByTagName('section')[0];
    var screenHeight = window.innerHeight;
    if (showjackpot.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
        document.querySelector("section").classList.add("plifscroll");
    } 
</script>