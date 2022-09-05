<!-- <div style="min-width:100vh; min-height:100vh; background: #ccc;z-index:9999999;" class="alert-success alert-dismissible alertDismissible">hai</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
<script>
$(document).ready(function(){ 
   $(".alertDismissible").fadeTo(2000, 500).slideUp(500, function(){
       $(".alertDismissible").slideUp(600);
     });
})
</script> -->
<style>
.button-up,
.button-down {
  position: relative;
  padding: 5px;
  margin: 30px auto;
  background: #000;
  height: 50px;
  width: 50px;
  border-radius: 50%;
  transition: all 0.2s linear;
}

.button-down:hover {
  transform: translate3d(0, 10px, 0);
}

.button-up:hover {
  transform: translate3d(0, -10px, 0);
}

.button-up::after,
.button-down::after {
  content: "";
  position: absolute;
  left: 17px;
  z-index: 11;
  display: block;
  width: 25px;
  height: 25px;
  border-top: 2px solid #fff;
  border-left: 2px solid #fff;
}
.button-up::after {
  top: 20px;
  transform: rotate(45deg);
}

.button-down::after {
  top: 10px;
  transform: rotate(225deg);
}
</style>
<div class="button-up"></div>
<div class="button-down"></div>
