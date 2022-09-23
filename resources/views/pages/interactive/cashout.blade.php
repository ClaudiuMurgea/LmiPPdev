<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')         }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')  }}">
<style>
    .mystyle{
            background: url("{{ asset('/header-images/a5.jpg') }}");
            min-height:100vh;
            max-height:100vh;
            min-width:100vw;
            max-width:100vw;
            background-repeat: no-repeat;
            background-position: contain;
            background-size: cover;
        }
</style>  
<div style="width:100%;" class="mystyle">

<div class="d-flex justify-content-center">
    <div style="font-size:1.8rem;" class="text-center text-effect mt-2">
        Cashouts
    </div>
</div>

<table style="width:80% !important; margin-left:8rem;" class="table custom_table_background max_width text-white bolder radius_10 cashout_page mt_2 no_border_b">
    <thead>
        <tr>                                                   
            <th class="cashouts_slot-wrapper text-left" scope="col">           Slot         </th>
            <th class="cashouts_value-wrapper text-left" scope="col">          Value        </th>
            <th style="padding-left:10px;" scope="col">                        Timestmap    </th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" text-left pl_2"> 1       </td>
                <td class=" text-left" >     23      </td>
                <td class="">                ts      </td>
            </tr>
            <tr>
                <td class=" no_border_b text-left pl_2"> 1       </td>
                <td class=" no_border_b text-left" >     23      </td>
                <td class=" no_border_b">                ts      </td>
            </tr>
    </tbody>
</table>
</div>

<script>
    let timeNow = 0;
    let lastTime = 0;

    $('body').click(function(){
        lastTime = timeNow;
    });
    
    setInterval(function(){
                    timeNow++;
                    if (timeNow - lastTime > sessionTime)
                        $('#logout').click();
                }, 1000);
</script>