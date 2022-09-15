<div>
<style>
  :root {
  --navy: #0c0c4a;
  --dark-navy: #060726;
  --pink: rgba(213, 84, 213, 1);
  --pink2: rgba(213, 84, 213, 0.7);
}
* {
  margin: 0;
  padding: 0;
}
*::before,
::after {
  content: "";
  position: absolute;
}
body {
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  position:relative;
  background: black;
  display: grid;
  place-items: center;
  filter: saturate(130%) contrast(125%);
}
#image {
  position:fixed;
  top:0;
  right:0;
  left:0;
  bottom:0;
  overflow: hidden !important;
  min-width: 100vw;
  max-width: 100vw;
  min-height: 100vh;
  max-height: 100vh;
  background: var(--navy);
  display: grid;
  position: relative;
  /* border: 8px solid;
  border-color: darkmagenta magenta;
  outline: 8px ridge cyan;
  outline-offset: 4px; */
}

#top {
  height: 67%;
  background: linear-gradient(transparent 50%, hotpink 160%);
  box-shadow: 0 15px 50px 1px white;
  position: relative;
}
#sky {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;

  background: repeating-linear-gradient(
      pink 2px,
      transparent 3px,
      transparent 30px
    ),
    repeating-linear-gradient(90deg, #fff 2px, transparent 3px, transparent 40px)
      10px 0;
  filter: drop-shadow(0 0 1px #fff) drop-shadow(0 0 3px #fff)
    drop-shadow(0 0 7px cyan);
  animation: move 40s linear infinite;
  opacity: 0.2;
}
#bottom {
  position: absolute;
  z-index: 2;
  width: 100%;
  height: 100%;
  transform: perspective(500px) rotateX(65deg);
  bottom: -15%;
  background: linear-gradient(
    90deg,
    steelblue -60%,
    transparent 40%,
    transparent 60%,
    steelblue 140%
  );
  clip-path: polygon(0 100%, 0 55%, 100% 55%, 100% 100%);
}

#ground {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 55%;
  background: repeating-linear-gradient(
      white 2px,
      transparent 3px,
      transparent 30px
    ),
    repeating-linear-gradient(90deg, white 2px, transparent 3px, transparent 40px);
  filter: drop-shadow(0 0 1px cyan) drop-shadow(0 0 3px cyan)
    drop-shadow(0 0 7px cyan);
  animation: move 100s linear infinite;
}

#text {
  position: absolute;
  z-index: 10;
  width: 100%;
  height: 100%;
  top: 0;
  display: flex;
  flex-direction: column;
  place-items: center;
  justify-content: center;
}
h1 {
  color: transparent;
  font-family: "Russo One", sans-serif;
  text-transform: uppercase;
  font-size: 5em;
  transform: translatey(25px);
  background: linear-gradient(
    #FDE08D 30%,
    white,
    #DF9F28 60%,
    #FDE08D 100%
  );

  background-size: contain;
  -webkit-background-clip: text;
  -webkit-text-stroke: 1px silver;
  filter: drop-shadow(5px 5px 1px black) drop-shadow(1px 1px 1px magenta);
  animation: bg-shift 5s ease-in-out infinite alternate;
}
h2 {
  color: white;
  font-family: "Yellowtail", cursive;
  font-weight: 100;
  font-size: 4em;
  transform: translatey(-10px) rotatez(-5deg);
  text-shadow: 0 0 3px magenta, 0 0 7px magenta, 0 0 15px black, 0 0 15px black;
  animation: hover 5s ease-in-out infinite;
}
@keyframes move {
  to {
    background-position-y: 2000px;
  }
}
@keyframes bg-shift {
  0% {
    background-position: 0 -25px;
  }
  100% {
    background-position: 0 25px;
  }
}

@keyframes hover {
  0% {
    transform: translatey(-10px) rotatez(-5deg) perspective(200px) translatez(0);
  }
  50% {
    transform: translatey(-10px) rotatez(-5deg) perspective(200px)
      translatez(50px);
  }
  100% {
    transform: translatey(-10px) rotatez(-5deg) perspective(200px) translatez(0);
  }
}

.Blazing {
	display: inline-block;
	margin: 0;
    padding-left:3rem;
    color: rgb(255, 115, 0);
    font-size: 100px;
	line-height: 50px;
	min-width: 50px;
	outline: none;
	vertical-align: middle;
    letter-spacing:40px;
	text-shadow:
        0 3px 20px red,
        0 0 20px red,
		0 0 10px orange,
		4px -5px 6px yellow,
		-4px -10px 10px yellow,
		0 -10px 30px yellow;
	animation: 2s Blazing infinite alternate linear;
}

@keyframes Blazing {
	0%   { text-shadow: 0 3px 20px red, 0 0 20px red,
		0 0 10px orange,
		0 0 0 yellow,
		0 0 5px yellow,
		-2px -5px 5px yellow,
		4px -10px 10px yellow; }
	25%   { text-shadow: 0 3px 20px red, 0 0 30px red,
		0 0 20px orange,
		0 0 5px yellow,
		-2px -5px 5px yellow,
		3px -10px 10px yellow,
		-4px -15px 20px yellow; }
	50%   { text-shadow: 0 3px 20px red, 0 0 20px red,
		0 -5px 10px orange,
		-2px -5px 5px yellow,
		3px -10px 10px yellow,
		-4px -15px 20px yellow,
		2px -20px 30px rgba(255,255,0,0.5); }
	75%   { text-shadow: 0 3px 20px red, 0 0 20px red,
		0 -5px 10px orange,
		3px -5px 5px yellow,
		-4px -10px 10px yellow,
		2px -20px 30px rgba(255,255,0,0.5),
		0px -25px 40px rgba(255,255,0,0)}
	100%   { text-shadow: 0 3px 20px red, 0 0 20px red,
		0 0 10px orange,
		0 0 0 yellow,
		0 0 5px yellow,
		-2px -5px 5px yellow,
		4px -10px 10px yellow; }
}

#header {
	display:none !important;
}
#slide {
	display:none !important;
}
#menu_title {
	display:none !important;
}
.invisible {
    visibility:none;
}
</style>
    <div style="display:none" wire:poll.5000ms.keep-alive>
        PID:{{ $activePID }}
    </div>
    <div id="image">
        <div id="top">
            <div id="sky"></div>
        </div>
        <div id="bottom">
            <div id="ground"></div>
        </div>
        <div id="text">
            <h1>Mode</h1>
            <h2 class="Blazing">IDLE</h2>
        </div>
    </div>
</div>
