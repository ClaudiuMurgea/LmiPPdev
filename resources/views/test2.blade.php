<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animated Speedmetre Progress</title>
	<link rel="stylesheet" href="./style.css">
	<!-- S-Tech04 -->
</head>
<style>
    *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #333;
}
.box
{
    position: relative;
    margin: 50px;
}
.box .text
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    color: #fff;
}
.box .text h2
{
    font-size: 38px;
    font-weight: 400;
    letter-spacing: 1px;
}
.box .text small
{
    font-size: 18px;
    display: block;
}
.circle
{
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.circle .points
{
    width: 3px;
    height: 15px;
    background: #0007;
    position: absolute;
    border-radius: 3px;
    transform: rotate(calc(var(--i)*var(--rot))) translateY(-100px);
    
}
.points.marked
{
    animation: glow 0.04s linear forwards;
    animation-delay: calc(var(--i)*0.05s);
}
@keyframes glow
{
    0%
    {
        background: #0007;
        box-shadow: none;
    }
    100%
    {
        background: var(--bgColor);
        box-shadow: 0 0 10px var(--bgColor);
    }
}
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
</style>
<body>
	<div class="box">
		<div class="circle" data-dots="60" data-percent="100" style="--bgColor: #0f0"></div>
	</div>
<script>

const circles = document.querySelectorAll('.circle');
setInterval(function() {
    circles.forEach(elem => {
    var dots    = elem.getAttribute('data-dots');
    var marked  = elem.getAttribute('data-percent');
    var percent = Math.floor(dots * marked / 100);
    var rotate  = 360 / dots;
    var points  = "";

    for (let i = 0; i < dots; i++) {
            points += `<div class="points" style="--i: ${i}; --rot: ${rotate}deg"></div>`;
        }
        elem.innerHTML = points;
        const pointsMarked = elem.querySelectorAll('.points');
    
        for (let i = 0; i < percent; i++) {
                pointsMarked[i].classList.add('marked')
            }

    })
} , 1000);







        
</script>
</body>
</html>