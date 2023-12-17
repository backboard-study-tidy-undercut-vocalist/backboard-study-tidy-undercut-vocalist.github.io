<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex">
	<title> Password Generator - Sujoy </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  width: 100%;
  height: 100vh;
  background-image: linear-gradient(to top, #209cff 100%, #68e0cf 200%);
  display: flex;
  justify-content: center;
  align-items: center;
}

button {
  border: 0;
  outline: 0;
}

.container {
  margin: 40px 0;
  width: 400px;
  height: 600px;
  padding: 10px 25px;
  background: #0a0e31;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.45), 0 4px 8px rgba(0, 0, 0, 0.35), 0 8px 12px rgba(0, 0, 0, 0.15);
  font-family: "Montserrat";
}
.container h2.title {
  font-size: 1.75rem;
  margin: 10px -5px;
  margin-bottom: 30px;
  color: #fff;
}

.result {
  position: relative;
  width: 100%;
  height: 65px;
  overflow: hidden;
}
.result__info {
  position: absolute;
  bottom: 4px;
  color: #fff;
  font-size: 0.8rem;
  transition: all 150ms ease-in-out;
  transform: translateY(200%);
  opacity: 0;
}
.result__info.right {
  right: 8px;
}
.result__info.left {
  left: 8px;
}
.result__viewbox {
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 8px;
  color: #fff;
  text-align: center;
  line-height: 65px;
}
.result #copy-btn {
  position: absolute;
  top: var(--y);
  left: var(--x);
  width: 38px;
  height: 38px;
  background: #fff;
  border-radius: 50%;
  opacity: 0;
  transform: translate(-50%, -50%) scale(0);
  transition: all 350ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
  cursor: pointer;
  z-index: 2;
}
.result #copy-btn:active {
  box-shadow: 0 0 0 200px rgba(255, 255, 255, 0.08);
}
.result:hover #copy-btn {
  opacity: 1;
  transform: translate(-50%, -50%) scale(1.35);
}

.field-title {
  position: absolute;
  top: -10px;
  left: 8px;
  transform: translateY(-50%);
  font-weight: 800;
  color: rgba(255, 255, 255, 0.5);
  text-transform: uppercase;
  font-size: 0.65rem;
  pointer-events: none;
  user-select: none;
}

.options {
  width: 100%;
  height: auto;
  margin: 50px 0;
}

.range__slider {
  position: relative;
  width: 100%;
  height: calc(65px - 10px);
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 8px;
  margin: 30px 0;
}
.range__slider::before, .range__slider::after {
  position: absolute;
  color: #fff;
  font-size: 0.9rem;
  font-weight: bold;
}
.range__slider::before {
  content: attr(data-min);
  left: 10px;
}
.range__slider::after {
  content: attr(data-max);
  right: 10px;
}
.range__slider .length__title::after {
  content: attr(data-length);
  position: absolute;
  right: -16px;
  font-variant-numeric: tabular-nums;
  color: #fff;
}

#slider {
  -webkit-appearance: none;
  width: calc(100% - (70px));
  height: 2px;
  border-radius: 5px;
  background: rgba(255, 255, 255, 0.314);
  outline: none;
  padding: 0;
  margin: 0;
  cursor: pointer;
}
#slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: white;
  cursor: pointer;
  transition: all 0.15s ease-in-out;
}
#slider::-webkit-slider-thumb:hover {
  background: #d4d4d4;
  transform: scale(1.2);
}
#slider::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: white;
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}
#slider::-moz-range-thumb:hover {
  background: #d4d4d4;
}

.settings {
  position: relative;
  height: auto;
  widows: 100%;
  display: flex;
  flex-direction: column;
}
.settings .setting {
  position: relative;
  width: 100%;
  height: calc(65px - 10px);
  background: rgba(255, 255, 255, 0.08);
  border-radius: 8px;
  display: flex;
  align-items: center;
  padding: 10px 25px;
  color: #fff;
  margin-bottom: 8px;
}
.settings .setting input {
  opacity: 0;
  position: absolute;
}
.settings .setting input + label {
  user-select: none;
}
.settings .setting input + label::before, .settings .setting input + label::after {
  content: "";
  position: absolute;
  transition: 150ms cubic-bezier(0.24, 0, 0.5, 1);
  transform: translateY(-50%);
  top: 50%;
  right: 10px;
  cursor: pointer;
}
.settings .setting input + label::before {
  height: 30px;
  width: 50px;
  border-radius: 30px;
  background: rgba(214, 214, 214, 0.434);
}
.settings .setting input + label::after {
  height: 24px;
  width: 24px;
  border-radius: 60px;
  right: 32px;
  background: #fff;
}
.settings .setting input:checked + label:before {
  background: #5d68e2;
  transition: all 150ms cubic-bezier(0, 0, 0, 0.1);
}
.settings .setting input:checked + label:after {
  right: 14px;
}
.settings .setting input:focus + label:before {
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
}
.settings .setting input:disabled + label:before, .settings .setting input:disabled + label:after {
  cursor: not-allowed;
}
.settings .setting input:disabled + label:before {
  background: #4f4f6a;
}
.settings .setting input:disabled + label:after {
  background: #909090;
}

.btn.generate {
  user-select: none;
  position: relative;
  width: 100%;
  height: 50px;
  margin: 10px 0;
  border-radius: 8px;
  color: #fff;
  border: none;
  background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  letter-spacing: 1px;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 150ms ease;
}
.btn.generate:active {
  transform: translateY(-3%);
  box-shadow: 0 4px 8px rgba(255, 255, 255, 0.08);
}

.support {
  position: fixed;
  right: 7px;
  bottom: 7px;
  padding: 7px;
  display: flex;
}

a {
  margin: 0 20px;
  color: #fff;
  font-size: 2rem;
  transition: all 400ms ease;
}

a:hover {
  color: #222;
}

.github-corner svg {
  position: absolute;
  right: 0;
  top: 0;
  mix-blend-mode: darken;
  color: #eeeeee;
  fill: #353535;
  clip-path: polygon(0 0, 100% 0, 100% 100%);
}

.github-corner:hover .octo-arm {
  animation: octocat-wave 0.56s;
}

@keyframes octocat-wave {
  0%, 100% {
    transform: rotate(0);
  }
  20%, 60% {
    transform: rotate(-20deg);
  }
  40%, 80% {
    transform: rotate(10deg);
  }
}
	</style>
</head>
<body>



	<div class="container">
	<h2 class="title">Password Generator</h2>
	<div class="result">
		<div class="result__title field-title">Generated Password</div>
		<div class="result__info right">click to copy</div>
		<div class="result__info left">copied</div>
		<div class="result__viewbox" id="result"> </div>
		<button id="copy-btn" style="--x: 0; --y: 0"><i class="fa fa-copy"></i></button>
	</div>
	<div class="length range__slider" data-min="8" data-max="64">
		<div class="length__title field-title" data-length='0'>length:</div>
		<input id="slider" type="range" min="8" max="64" value="16" />
	</div>

	<div class="settings">
		<span class="settings__title field-title">settings</span>
		<div class="setting">
			<input type="checkbox" id="uppercase" checked />
			<label for="uppercase">Include Uppercase</label>
		</div>
		<div class="setting">
			<input type="checkbox" id="lowercase" checked />
			<label for="lowercase">Include Lowercase</label>
		</div>
		<div class="setting">
			<input type="checkbox" id="number" checked />
			<label for="number">Include Numbers</label>
		</div>
		<div class="setting">
			<input type="checkbox" id="symbol" />
			<label for="symbol">Include Symbols</label>
		</div>
	</div>

	<button class="btn generate" id="generate">Generate Password</button>
</div>


<div class="support">
    <a href="https://sujoy.me" target="_blank"><i class="fa fa-home"></i></a>
	<!--<a href="https://facebook.com/theSujoySarkar" target="_blank"><i class="fa fa-facebook-square"></i></a>-->
	<!--<a href="https://instagram.com/theSujoySarkar" target="_blank"><i class="fa fa-instagram"></i></a>-->
	<!--<a href="https://twitter.com/theSujoySarkar" target="_blank"><i class="fa fa-twitter-square"></i></a>-->
	<!--<a href="https://linkedin.com/in/theSujoySarkar" target="_blank"><i class="fa fa-linkedin"></i></a>-->
</div>


<script type="text/javascript">
	// This is a simple Password Generator App that will generate random password maybe you can you them to secure your account.
// I tried my best to make the code as simple as possible please dont mind the variable names.
// Also this idea came in my mind after checking Traversy Media's latest video.

// Clear the concole on every refresh
console.clear();
// set the body to full height
// document.body.style.height = `${innerHeight}px`

// Range Slider Properties.
// Fill : The trailing color that you see when you drag the slider.
// background : Default Range Slider Background
const sliderProps = {
	fill: "#0B1EDF",
	background: "rgba(255, 255, 255, 0.214)",
};

// Selecting the Range Slider container which will effect the LENGTH property of the password.
const slider = document.querySelector(".range__slider");

// Text which will show the value of the range slider.
const sliderValue = document.querySelector(".length__title");

// Using Event Listener to apply the fill and also change the value of the text.
slider.querySelector("input").addEventListener("input", event => {
	sliderValue.setAttribute("data-length", event.target.value);
	applyFill(event.target);
});
// Selecting the range input and passing it in the applyFill func.
applyFill(slider.querySelector("input"));
// This function is responsible to create the trailing color and setting the fill.
function applyFill(slider) {
	const percentage = (100 * (slider.value - slider.min)) / (slider.max - slider.min);
	const bg = `linear-gradient(90deg, ${sliderProps.fill} ${percentage}%, ${sliderProps.background} ${percentage +
			0.1}%)`;
	slider.style.background = bg;
	sliderValue.setAttribute("data-length", slider.value);
}

// Object of all the function names that we will use to create random letters of password
const randomFunc = {
	lower: getRandomLower,
	upper: getRandomUpper,
	number: getRandomNumber,
	symbol: getRandomSymbol,
};

// Random more secure value
function secureMathRandom() {
	return window.crypto.getRandomValues(new Uint32Array(1))[0] / (Math.pow(2, 32) - 1);
}

// Generator Functions
// All the functions that are responsible to return a random value taht we will use to create password.
function getRandomLower() {
	return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
}
function getRandomUpper() {
	return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
}
function getRandomNumber() {
	return String.fromCharCode(Math.floor(secureMathRandom() * 10) + 48);
}
function getRandomSymbol() {
	const symbols = '!@#$%&*_+?.';
	return symbols[Math.floor(Math.random() * symbols.length)];
}

// Selecting all the DOM Elements that are necessary -->

// The Viewbox where the result will be shown
const resultEl = document.getElementById("result");
// The input slider, will use to change the length of the password
const lengthEl = document.getElementById("slider");

// Checkboxes representing the options that is responsible to create differnt type of password based on user
const uppercaseEl = document.getElementById("uppercase");
const lowercaseEl = document.getElementById("lowercase");
const numberEl = document.getElementById("number");
const symbolEl = document.getElementById("symbol");

// Button to generate the password
const generateBtn = document.getElementById("generate");
// Button to copy the text
const copyBtn = document.getElementById("copy-btn");
// Result viewbox container
const resultContainer = document.querySelector(".result");
// Text info showed after generate button is clicked
const copyInfo = document.querySelector(".result__info.right");
// Text appear after copy button is clicked
const copiedInfo = document.querySelector(".result__info.left");

// if this variable is trye only then the copyBtn will appear, i.e. when the user first click generate the copyBth will interact.
let generatedPassword = false;

// Update Css Props of the COPY button
// Getting the bounds of the result viewbox container
let resultContainerBound = {
	left: resultContainer.getBoundingClientRect().left,
	top: resultContainer.getBoundingClientRect().top,
};
// This will update the position of the copy button based on mouse Position
resultContainer.addEventListener("mousemove", e => {
	resultContainerBound = {
		left: resultContainer.getBoundingClientRect().left,
		top: resultContainer.getBoundingClientRect().top,
	};
	if(generatedPassword){
		copyBtn.style.opacity = '1';
		copyBtn.style.pointerEvents = 'all';
		copyBtn.style.setProperty("--x", `${e.x - resultContainerBound.left}px`);
		copyBtn.style.setProperty("--y", `${e.y - resultContainerBound.top}px`);
	}else{
		copyBtn.style.opacity = '0';
		copyBtn.style.pointerEvents = 'none';
	}
});
window.addEventListener("resize", e => {
	resultContainerBound = {
		left: resultContainer.getBoundingClientRect().left,
		top: resultContainer.getBoundingClientRect().top,
	};
});

// Copy Password in clipboard
copyBtn.addEventListener("click", () => {
	const textarea = document.createElement("textarea");
	const password = resultEl.innerText;
	if (!password || password == "CLICK GENERATE") {
		return;
	}
	textarea.value = password;
	document.body.appendChild(textarea);
	textarea.select();
	document.execCommand("copy");
	textarea.remove();

	copyInfo.style.transform = "translateY(200%)";
	copyInfo.style.opacity = "0";
	copiedInfo.style.transform = "translateY(0%)";
	copiedInfo.style.opacity = "0.75";
});

// When Generate is clicked Password id generated.
generateBtn.addEventListener("click", () => {
	const length = +lengthEl.value;
	const hasLower = lowercaseEl.checked;
	const hasUpper = uppercaseEl.checked;
	const hasNumber = numberEl.checked;
	const hasSymbol = symbolEl.checked;
	generatedPassword = true;
	resultEl.innerText = generatePassword(length, hasLower, hasUpper, hasNumber, hasSymbol);
	copyInfo.style.transform = "translateY(0%)";
	copyInfo.style.opacity = "0.75";
	copiedInfo.style.transform = "translateY(200%)";
	copiedInfo.style.opacity = "0";
});

// Function responsible to generate password and then returning it.
function generatePassword(length, lower, upper, number, symbol) {
	let generatedPassword = "";
	const typesCount = lower + upper + number + symbol;
	const typesArr = [{ lower }, { upper }, { number }, { symbol }].filter(item => Object.values(item)[0]);
	if (typesCount === 0) {
		return "";
	}
	for (let i = 0; i < length; i++) {
		typesArr.forEach(type => {
			const funcName = Object.keys(type)[0];
			generatedPassword += randomFunc[funcName]();
		});
	}
	return generatedPassword.slice(0, length)
									.split('').sort(() => Math.random() - 0.5)
									.join('');
}

// function that handles the checkboxes state, so at least one needs to be selected. The last checkbox will be disabled.
function disableOnlyCheckbox(){
	let totalChecked = [uppercaseEl, lowercaseEl, numberEl, symbolEl].filter(el => el.checked)
	totalChecked.forEach(el => {
		if(totalChecked.length == 1){
			el.disabled = true;
		}else{
			el.disabled = false;
		}
	})
}

[uppercaseEl, lowercaseEl, numberEl, symbolEl].forEach(el => {
	el.addEventListener('click', () => {
		disableOnlyCheckbox()
	})
})
</script>

</body>
</html>