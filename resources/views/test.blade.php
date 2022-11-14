<style>
    circle {
  transition: all 1s linear;
}
#c1{
  transition: all 1s linear;
  stroke: #DDDEDF;
  stroke-width: 3;
  stroke-linecap: round;
  fill: transparent;
}

#c2 {
  transition: all 1s linear;
  stroke: #545557;
  stroke-width: 3;
  stroke-linecap: round;
  fill: transparent;
}

#counterText {
  -webkit-animation: heartBeat 1s infinite;
  animation: heartBeat 1s infinite;
}

@-webkit-keyframes heartBeat {
  0%   {
    opacity: 0;
  }
  5%   {
    opacity: 1;
  }
  95% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@keyframes heartBeat {
  0%   {
    opacity: 0;
  }
  5%   {
    opacity: 1;
  }
  95% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

body {
  margin: 0;
  padding: 25px;
}

.demo-container {
  width: 300px;
  margin: auto;
}

.progress-bar {
  height: 4px;
  background-color: rgba(5, 114, 206, 0.2);
  width: 100%;
  overflow: hidden;
}

.progress-bar-value {
  width: 100%;
  height: 100%;
  background-color: rgb(5, 114, 206);
  animation: indeterminateAnimation 60s infinite linear;
  transform-origin: 0% 50%;
}

@keyframes indeterminateAnimation {
  0% {
    transform:  translateX(0) scaleX(0);
  }
  40% {
    transform:  translateX(0) scaleX(0.4);
  }
  100% {
    transform:  translateX(100%) scaleX(0.5);
  }
}



ol.tens, .digits, .first {
  list-style-type: none;
  margin:0;
  padding:3px;
  position: relative;
  display: inline-block;
}
ol.first {
  margin-right: 12px;
}
.tens li, .digits li, .first li {
  display: inline-block;
  position: absolute;
  top: 0;
  left: 0;
  background: #fff;
}
.first li:nth-of-type(2) {
  animation: minutecount 60s ease-in-out 0s 1;
}

.tens li:nth-of-type(2) {
  animation: tenscount 60s ease-in-out 51s 1;
}
.tens li:nth-of-type(3) {
  animation: tenscount 60s ease-in-out 41s 1;
}
.tens li:nth-of-type(4) {
  animation: tenscount 60s ease-in-out 31s 1;
}

.tens li:nth-of-type(5) {
  animation: tenscount 60s ease-in-out 21s 1;
}

.tens li:nth-of-type(6) {
  animation: tenscount 60s ease-in-out 11s 1;
}

.tens li:nth-of-type(7) {
  animation: tenscount 60s ease-in-out 1s 1;
}


.digits li:nth-of-type(1) {
  animation: digitcount 10s ease-in-out 10s 6;
}

.digits li:nth-of-type(2) {
  animation: digitcount 10s ease-in-out 9s 6;
}

.digits li:nth-of-type(3) {
  animation: digitcount 10s ease-in-out 8s 6;
}

.digits li:nth-of-type(4) {
  animation: digitcount 10s ease-in-out 7s 6;
}

.digits li:nth-of-type(5) {
  animation: digitcount 10s ease-in-out 6s 6;
}

.digits li:nth-of-type(6) {
  animation: digitcount 10s ease-in-out 5s 6;
}

.digits li:nth-of-type(7) {
  animation: digitcount 10s ease-in-out 4s 6;
}

.digits li:nth-of-type(8) {
  animation: digitcount 10s ease-in-out 3s 6;
}

.digits li:nth-of-type(9) {
  animation: digitcount 10s ease-in-out 2s 6;
}

.digits li:nth-of-type(10) {
  animation: digitcount 10s ease-in-out 0.7s 6;
}

@keyframes digitcount {
  0% {
    opacity: 1
  }
  9.9% {
    opacity: 1
  }
  10% {
    opacity: 0
  }
  100% {
    opacity: 0
  }
}

@keyframes tenscount {
  0% {
    opacity: 1
  }
  0.9% {
    opacity: 1
  }
  2% {
    opacity: 0
  }
  100% {
    opacity: 0
  }
}
@keyframes minutecount {
  0% { opacity: 1; }
  2.8% { opacity: 1; }
  2.9% { opacity: 0; }
  100% { opacity: 0; }
}
</style>

<svg width="100px" height="100px" viewBox="0 0 42 42" class="donut">
    <circle id="c1" cx="21" cy="21" r="15.91549430918954" stroke-dasharray="100 0" stroke-dashoffset="100"></circle>
    <circle id="c2" cx="21" cy="21" r="15.91549430918954" stroke-dasharray="0 100" stroke-dashoffset="0"></circle>
    <g class="chart-text">
        <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" id="counterText">5</text>
    </g>
</svg>


<div class="demo-container">
  <div class="progress-bar">
    <div class="progress-bar-value"></div>
  </div>
</div>




<div class="clock">
  <ol class="first">
    <li>00:</li>
    <li>01:</li>
  </ol>
  <ol class="tens">
    <li>0</li>
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
    <li>0</li>
 </ol>
 <ol class="digits">
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
    <li>6</li>
    <li>7</li>
    <li>8</li>
    <li>9</li>
    <li>0</li>
 </ol>
</div>


<script>
        function startTimer(duration) {

var timeout = setTimeout(function () {
    var time = duration;
    var i = 1;
    var k = ((i/duration) * 100);
    var l = 100 - k;
    i++;
    document.getElementById("c1").style.strokeDasharray = [l,k];
    document.getElementById("c2").style.strokeDasharray = [k,l];
    document.getElementById("c1").style.strokeDashoffset = l;
    document.getElementById("counterText").innerHTML = duration;
    var interval = setInterval(function() {
        if (i > time) {
            clearInterval(interval);
            setTimeout(timeout);
            return;
        }
        k = ((i/duration) * 100);
        l = 100 - k;
        document.getElementById("c1").style.strokeDasharray  = [l,k];
        document.getElementById("c2").style.strokeDasharray  = [k,l];
        document.getElementById("c1").style.strokeDashoffset = l;
        document.getElementById("counterText").innerHTML = (duration +1)-i;
        i++;
        if(i == duration) {
            console.log(i);
        }
        console.log(k, 'the k');
        console.log(l, 'the l');
        console.log(i, 'the i');
        if(i == duration + 1) {
            i = 1;
        }

    }, 1000);
},0);
}
startTimer(5);
</script>