<style>
    .bghandler{
        background: url("{{ asset('/header-images/bg4.jpg') }}");
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
<div id="cashouts_page" class="full_width">
    <table class="table custom_table_background max_width text-white bolder radius_10 cashout_page mt_2 no_border_b">
        <thead>
            <tr>                                                   
                <th class="cashouts_slot-wrapper text-left" scope="col">            {{ Translate('Slot') }}         </th>
                <th class="cashouts_value-wrapper text-left" scope="col">           {{ Translate('Value') }}        </th>
                <th style="padding-left:10px;" scope="col">                         {{ Translate('Timestamp') }}    </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashoutValues as $index => $cashout)
                <tr>
                    <td class="@if($loop->last) no_border_b @endif text-left pl_2"> {{ $cashout->Slot }}            </td>
                    <td class="@if($loop->last) no_border_b @endif text-left" >     {{ $cashout->Value }}           </td>
                    <td class="@if($loop->last) no_border_b @endif">                {{ $cashout->Timestamp }}       </td>
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
