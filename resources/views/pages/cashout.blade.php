<div id="cashouts_page" style="width:100%;">
    <table class="table custom_table_background max_width text-white bolder radius_10 cashout_page mt_2 no_border_b">
        <thead>
            <tr>                                                    <!-- position:relative;z-index:1;display:flex; -->
                <th class="cashouts_slot-wrapper text-left" scope="col">{{ Translate('Slot') }}
                <!-- <img style="position:absolute; height:30px; width:30px;object-fit:contain;left:-10%;top:15%;z-index:1;" class="hide_keyboard" src="{{url('/header-images/magnify.png')}}"> -->
                </th>
                <th class="cashouts_value-wrapper text-left" scope="col">       {{ Translate('Value') }}</th>
                <th style="padding-left:10px;" scope="col">                     {{ Translate('Timestamp') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashoutValues as $index => $cashout)
                <tr>
                    <td style="@if($loop->last) border-bottom: none;@endif text-align:left;padding-left:2rem;"> {{ $cashout->Slot }}</td>
                    <td style="@if($loop->last) border-bottom: none;@endif text-align:left;" >                  {{ $cashout->Value }} </td>
                    <td style="@if($loop->last) border-bottom: none;@endif">                                    {{ $cashout->Timestamp }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="arrow">
    <span></span>
    <span></span>
    <span></span>
</div>

<div class="padding_bottom">
</div>

<script>
    var cashoutpage = document.getElementsByClassName('cashout_page')[0];
    var screenHeight = window.innerHeight;
    if (cashoutpage.scrollHeight > screenHeight) { 
        document.querySelector("div.arrow").style.display = "block"; 
        // document.querySelector("div#cashouts_page").classList.add("plifscroll");
    } 
</script>
