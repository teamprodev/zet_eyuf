<?php
require '../../../../../../../../configs/ALL/Boot.php';





?>

<!DOCTYPE html>
<!-- saved from url=(0035)https://maxwellito.github.io/vivus/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>vivus.js - svg animation</title>
		<meta name="title" content="SVG Drawing Animation">

		<style type="text/css">

			/* Base style */
			html {
				font-size: 24px;
			}
			body {
				margin: 0 0 40px;
				font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
				font-weight: 200;
				color: #666666;
				background-color: #FFFFFF;
				word-break: break-word;
			}
			a, a:visited, a:hover, a:link {
				color: inherit;
				outline: 0;
			}
			small {
				font-weight: 100;
			}
			p {
				font-size: 1rem;
				line-height: 1.4rem;
			}
			button, .button {
				margin: 0; padding: 3px 6px;
				border-radius: 6px;
				border: 1px solid currentColor;
				color: inherit;
				background-color: rgba(0,0,0,0);
				font-size: 0.6rem;
				font-weight: 300;
				text-decoration: none;
				cursor: pointer;
				outline: 0;
			}
			button.active, .button.active {
				background-color: currentColor;
			}
			button.active span, .button.active span {
				color: #FFFFFF;
			}
			i {
				background-color: rgba(0, 0, 0, 0.05);
				border-radius: 4px;
			}
			svg * {
				fill: none;
				stroke: currentColor;
			}

			/* Common components */
			.bloc {
				color: #f9f9f9;
				padding: 1px 0 30px;
				clear: both;
			}
			.content {
				margin: auto;
				max-width: 960px;
				padding: 0 20px;
			}
			.col3 {
				width: 33.33%;
				float: left;
				text-align: center;
				border-bottom-color: currentColor;
				border-bottom-style: solid;
			}
			.col-container {
				padding: 0 12px;
			}
			.col3 p {
				font-size: 0.75rem;
				line-height: 1.05rem;
			}

			/* Text */
			.bigger {
				font-size: 1rem;
				font-weight: 100;
				line-height: 1.4rem;
			}
			.center {
				text-align: center;
			}
			.clearer {
				clear: both;
			}
			.striked {
				text-decoration: line-through;
			}
			.italic {
				font-style: italic;
			}

			/* Blocs */
			.bloc-head     { color: #5aa8c5; padding: 30px; }
			.bloc-demo     { color: #FF495F; }
			.bloc-timing   { color: #F7A800; }
			.bloc-scenario { color: #4fe084; }
			.bloc-doc      { color: #69B0CA; }

			/* Custom */
			#hi-there {
				width: 100%;
				stroke-width:4;
			}
			.intro-links {
				text-align: right;
			}
			.example-title {
				margin-left: 440px;
			}
			.timing-title {
				min-height: 200px;
				margin-right: 240px;
			}
			.obturateur {
				stroke-width: 3;
				stroke-miterlimit: 10;
			}
			#polaroid {
				float: left;
				width: 400px; height: 320px;
				stroke: #f9f9f9;
				stroke-width: 3;
				stroke-linecap: round;
				stroke-linejoin: round;
				stroke-miterlimit: 10;
			}
			#timing-example {
				float: right;
				width: 175px; height: 175px;
			}
			.goodbye-head {
				font-size: 1.5rem;
				text-align: center;
				margin-bottom: 0;
			}
			.goodbye-sub {
				font-size: 0.875rem;
				text-align: center;
				margin: 0 0 20px;
			}

			/* Media queries */
			@media (max-width: 960px) {
				.button-group { display: block; line-height: 1.8em; }
			}

			@media (min-width: 768px) {
				.col3 { border-bottom: none; }
			}

			@media (max-width: 767px) {
				#polaroid { width: 100%; max-height: 300px; }
				.example-title { margin-left: 0; }
				.timing-title { margin-right: 0; }
				#timing-example { float: none; width: 100%; }

				.col3 { width: 100%; float: none; margin-bottom: 25px; padding-bottom: 25px; border-bottom-width: 1px; min-height: 200px; }
				.col3:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom-width: 0px; }
			}

			@media (min-width: 481px) and (max-width: 767px) {
				#polaroid { width: 100%; max-height: 300px; }
				.example-title { margin-left: 0; }
				.timing-title { margin-right: 0; }

				.col3:nth-child(2n) svg {
					width: 200px;
					float: right;
				}
				.col3:nth-child(2n) .col-container {
					text-align: right;
					margin-right: 200px;
				}
				.col3:nth-child(2n+1) svg {
					width: 200px;
					float: left;
				}
				.col3:nth-child(2n+1) .col-container {
					text-align: left;
					margin-left: 200px;
				}
			}

			@media (max-width: 480px) {
				.col-container { padding: 0px; }
				#polaroid { width: 100%; max-height: 260px; }
			}

		</style>
	</head>
	<body cz-shortcut-listen="true">

		<!-- Head: HI THERE -->
		<div class="bloc bloc-head">
			<svg height="300" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 404.7 354" enable-background="new 0 0 404.7 354" id="hi-there" onclick="hi.reset().play();">

				<!-- HI -->
				<path data-duration="10" d="M324.6,61.2c16.6,0,29.5-12.9,29.5-29.5c0-16.6-12.9-29.5-29.5-29.5c-16.6,0-29.5,12.9-29.5,29.5C295.1,48.4,308,61.2,324.6,61.2z" style="stroke-dasharray: 186, 226; stroke-dashoffset: 0;"></path>
        <path data-duration="130" d="M366.2,204.2c-9.8,0-15-5.6-15-15.1V77.2h-85v28h19.5c9.8,0,8.5,2.1,8.5,11.6v72.4c0,9.5,0.5,15.1-9.3,15.1H277h-20.7c-8.5,0-14.2-4.1-14.2-12.9V52.4c0-8.5,5.7-12.3,14.2-12.3h18.8v-28h-127v28h18.1c8.5,0,9.9,2.1,9.9,8.9v56.1h-75V53.4c0-11.5,8.6-13.3,17-13.3h11v-28H2.2v28h26c8.5,0,12,2.1,12,7.9v142.2c0,8.5-3.6,13.9-12,13.9h-21v33h122v-33h-11c-8.5,0-17-4.1-17-12.2v-57.8h75v58.4c0,9.1-1.4,11.6-9.9,11.6h-18.1v33h122.9h5.9h102.2v-33H366.2z" style="stroke-dasharray: 2216, 2256; stroke-dashoffset: 0;"></path>

        <path data-async="" data-delay="20" d="M358.8,82.8c11.1-4.2,18.8-14.7,18.8-27.5c0-8.5-3.4-16-8.9-21.3" style="stroke-dasharray: 60, 100; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M124.2,105.7V77c0-11.5,9.1-13.8,17.5-13.8h10.5V44.7" style="stroke-dasharray: 84, 124; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M147.9,40.2L171.2,63.2L175.7,63.2" style="stroke-dasharray: 38, 78; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M295.1,32.1L275.2,12.2" style="stroke-dasharray: 29, 69; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M266.2,204.7V75.9c0-8.5,5.2-12.8,13.7-12.8h18.3V44.7" style="stroke-dasharray: 187, 227; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M265.9,105.2L289.2,129.2L293.7,129.2" style="stroke-dasharray: 38, 78; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M374.2,204.7L374.2,94.2L358.8,82.8L351.2,77.2" style="stroke-dasharray: 140, 180; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M148.2,237.2L171.2,261.2L294.6,261.2L300.5,261.2L402.2,261.2L402.2,228.2L379.2,204.2" style="stroke-dasharray: 331, 371; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M124.2,204.7L124.2,157.2L175.7,157.2" style="stroke-dasharray: 99, 139; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M147.7,228.2L129.2,204.2" style="stroke-dasharray: 31, 71; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M7.2,237.3L30.2,261.2L152.2,261.2L152.2,241.7" style="stroke-dasharray: 175, 215; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M1.9,40.2L26,63.2L39.7,63.2" style="stroke-dasharray: 48, 88; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M129.2,12.2L148.2,33.2" style="stroke-dasharray: 29, 69; stroke-dashoffset: 0;"></path>
				<path data-async="" d="M303.9,53L328.1,77.2" style="stroke-dasharray: 35, 75; stroke-dashoffset: 0;"></path>

				<path d="M345.1,10.5L368.7,34" style="stroke-dasharray: 34, 74; stroke-dashoffset: 0;"></path>

				<!-- there -->
				<path data-delay="30" data-duration="60" stroke-linecap="round" stroke-linejoin="round" d="M76.8,337.3c0,0,1.9,12.2,13.1,12.2c22.1,0,23.8-1.8,59-66.4c-19.7,35.7-36.4,66.2-19.3,66.2c15.2,0,22.9-14.2,28.3-23.7c3.3-0.5,24-3.2,35-25.5c4-8.1,4.1-17.8-8.1-15.2c-5.6,1.2-13.1,14.8-15.7,19.2c-7.6,12.7-22.4,45.2-22.4,45.2s10.3-22.4,21.5-22.4c15.5,0-9.4,22.4,4.7,22.4c4.9,0,11.7-11.4,16.6-20.9c7.5,4.7,19.7,1.7,24.5-8.1c10.1-20.4-14.4-12.8-24.5,8.1c-5.5,11.3-2.2,21.1,11.2,21.1c16.4,0,26.1-28.3,30.5-37.5c9.9,2.5,14,2.5,22.7-1.1c-3.5,5.1-24,38.1-8.3,38.1c6.7,0,11.7-11.4,16.6-20.9c7.5,4.7,19.7,1.7,24.5-8.1c10.1-20.4-14.4-12.8-24.5,8.1c-5.5,11.3-2.2,21.1,11.2,21.1c16.4,0,20.6-4,24.7-10.5" style="stroke-dasharray: 851, 891; stroke-dashoffset: 0;"></path>

				<path stroke-linecap="round" stroke-linejoin="round" d="M157.3,300.8c3.8-2.3-29,0.8-35.6,3.2" style="stroke-dasharray: 37, 77; stroke-dashoffset: 0;"></path>
			</svg>
		</div>

		<!-- Intro -->
		<div class="content">
			<h1>vivus<small>, bringing your SVGs to life</small></h1>
			<p>Vivus is a lightweight JavaScript class (with no dependencies) that allows you to animate SVGs, giving them the appearence of being drawn. There are a variety of different animations available, as well as the option to create a custom script to draw your SVG in whatever way you like.</p>
			<p class="intro-links">
				<a href="https://github.com/maxwellito/vivus" class="button bigger">View on GitHub</a>
			</p>

		</div>

		<!-- Animation examples/demo -->
		<div class="bloc bloc-demo">
			<div class="content">

				<h2>Animation types</h2>
				<div>
					<div class="col3">
						<svg id="obturateur1" class="obturateur" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100%" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" onclick="obt1.reset().play();">
							<path d="M10,100A90,90 0,1,1 190,100A90,90 0,1,1 10,100" style="stroke-dasharray: 566, 568; stroke-dashoffset: 0;"></path>
							<path d="M14.260000000000005,100A85.74,85.74 0,1,1 185.74,100A85.74,85.74 0,1,1 14.260000000000005,100" style="stroke-dasharray: 539, 541; stroke-dashoffset: 0;"></path>
							<path d="M27.052999999999997,100A72.947,72.947 0,1,1 172.947,100A72.947,72.947 0,1,1 27.052999999999997,100" style="stroke-dasharray: 459, 461; stroke-dashoffset: 0;"></path>
							<path d="M60.26,100A39.74,39.74 0,1,1 139.74,100A39.74,39.74 0,1,1 60.26,100" style="stroke-dasharray: 250, 252; stroke-dashoffset: 0;"></path>
							<path d="M34.042,131.189L67.047,77.781" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M31.306,75.416L92.41,60.987" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M68.81,34.042L122.219,67.046" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M124.584,31.305L139.013,92.409" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M165.957,68.809L132.953,122.219" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M168.693,124.584L107.59,139.012" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M131.19,165.957L77.781,132.953" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M75.417,168.693L60.987,107.59" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
						</svg>
						<div class="col-container">
							<h3>Delayed</h3>
							<p>Every path element is drawn at the same time with a small delay at the start. This is currently the default animation.</p>
							<button onclick="obt1.reset().play();">replay</button>
						</div>
					</div>

					<div class="col3">
						<svg id="obturateur2" class="obturateur" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100%" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" onclick="obt2.reset().play();">
							<path d="M10,100A90,90 0,1,1 190,100A90,90 0,1,1 10,100" style="stroke-dasharray: 566, 568; stroke-dashoffset: 0;"></path>
							<path d="M14.260000000000005,100A85.74,85.74 0,1,1 185.74,100A85.74,85.74 0,1,1 14.260000000000005,100" style="stroke-dasharray: 539, 541; stroke-dashoffset: 0;"></path>
							<path d="M27.052999999999997,100A72.947,72.947 0,1,1 172.947,100A72.947,72.947 0,1,1 27.052999999999997,100" style="stroke-dasharray: 459, 461; stroke-dashoffset: 0;"></path>
							<path d="M60.26,100A39.74,39.74 0,1,1 139.74,100A39.74,39.74 0,1,1 60.26,100" style="stroke-dasharray: 250, 252; stroke-dashoffset: 0;"></path>
							<path d="M34.042,131.189L67.047,77.781" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M31.306,75.416L92.41,60.987" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M68.81,34.042L122.219,67.046" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M124.584,31.305L139.013,92.409" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M165.957,68.809L132.953,122.219" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M168.693,124.584L107.59,139.012" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M131.19,165.957L77.781,132.953" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M75.417,168.693L60.987,107.59" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
						</svg>
						<div class="col-container">
							<h3>Sync</h3>
							<p>Each line is drawn synchronously. They all start and finish at the same time, hence the name `sync`.</p>
							<button onclick="obt2.reset().play();">replay</button>
						</div>
					</div>

					<div class="col3">
						<svg id="obturateur3" class="obturateur" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100%" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" onclick="obt3.reset().play();">
							<path d="M10,100A90,90 0,1,1 190,100A90,90 0,1,1 10,100" style="stroke-dasharray: 566, 568; stroke-dashoffset: 0;"></path>
							<path d="M14.260000000000005,100A85.74,85.74 0,1,1 185.74,100A85.74,85.74 0,1,1 14.260000000000005,100" style="stroke-dasharray: 539, 541; stroke-dashoffset: 0;"></path>
							<path d="M27.052999999999997,100A72.947,72.947 0,1,1 172.947,100A72.947,72.947 0,1,1 27.052999999999997,100" style="stroke-dasharray: 459, 461; stroke-dashoffset: 0;"></path>
							<path d="M60.26,100A39.74,39.74 0,1,1 139.74,100A39.74,39.74 0,1,1 60.26,100" style="stroke-dasharray: 250, 252; stroke-dashoffset: 0;"></path>
							<path d="M34.042,131.189L67.047,77.781" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M31.306,75.416L92.41,60.987" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M68.81,34.042L122.219,67.046" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M124.584,31.305L139.013,92.409" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M165.957,68.809L132.953,122.219" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M168.693,124.584L107.59,139.012" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M131.19,165.957L77.781,132.953" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
							<path d="M75.417,168.693L60.987,107.59" style="stroke-dasharray: 63, 65; stroke-dashoffset: 0;"></path>
						</svg>
						<div class="col-container">
							<h3>OneByOne</h3>
							<p>Each path element is drawn one after the other. This animation gives the best impression of live drawing.</p>
							<button onclick="obt3.reset().play();">replay</button>
						</div>
					</div>
				</div>
				<div class="clearer"></div>
			</div>
		</div>

		<!-- Scripting -->
		<div class="bloc bloc-timing">
			<div class="content">

				<h2>Timing function</h2>
				<p>To give more freedom, it's possible to override the animation of each path and/or the entire SVG. It works a bit like the CSS animation timing function. But instead of using a cubic-bezier function, it use a simple JavaScript function. It must accept a number as parameter (between 0 to 1), then return a number (also between 0 and 1). It's a hook.</p>
				<p>Here an example test to play around with the different properties available.</p>

				<div>
					<svg id="timing-example" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve" onclick="timing&amp;&amp;timing.reset().play();">
						<g stroke-width="4" stroke-linecap="round" stroke-miterlimit="10">
							<line x1="68.18066" y1="68.18066" x2="131.81934" y2="131.81934"></line>
							<line x1="68.18066" y1="131.82031" x2="131.81934" y2="68.17969"></line>
							<circle cx="100" cy="100" r="65"></circle>
							<circle cx="100" cy="100" r="75"></circle>
							<circle cx="100" cy="100" r="85"></circle>
							<circle cx="100" cy="100" r="95"></circle>
						</g>
					</svg>
					<div class="timing-title">
						<p>Type
							<span class="button-group">
								<button onclick="timingTest(this,&#39;type&#39;,&#39;delayed&#39;);" class="active"><span>delayed</span></button>
								<button onclick="timingTest(this,&#39;type&#39;,&#39;sync&#39;);"><span>sync</span></button>
								<button onclick="timingTest(this,&#39;type&#39;,&#39;oneByOne&#39;);"><span>oneByOne</span></button>
							</span>
						</p>
						<p>Path timing function
							<span class="button-group">
								<button onclick="timingTest(this,&#39;path&#39;,&#39;LINEAR&#39;);" class="active"><span>linear</span></button>
								<button onclick="timingTest(this,&#39;path&#39;,&#39;EASE&#39;);"><span>ease</span></button>
								<button onclick="timingTest(this,&#39;path&#39;,&#39;EASE_IN&#39;);"><span>ease-in</span></button>
								<button onclick="timingTest(this,&#39;path&#39;,&#39;EASE_OUT&#39;);"><span>ease-out</span></button>
								<button onclick="timingTest(this,&#39;path&#39;,&#39;EASE_OUT_BOUNCE&#39;);"><span>ease-out bounce</span></button>
							</span>
						</p>
						<p>Anim timing function
							<span class="button-group">
								<button onclick="timingTest(this,&#39;anim&#39;,&#39;LINEAR&#39;);" class="active"><span>linear</span></button>
								<button onclick="timingTest(this,&#39;anim&#39;,&#39;EASE&#39;);"><span>ease</span></button>
								<button onclick="timingTest(this,&#39;anim&#39;,&#39;EASE_IN&#39;);"><span>ease-in</span></button>
								<button onclick="timingTest(this,&#39;anim&#39;,&#39;EASE_OUT&#39;);"><span>ease-out</span></button>
								<button onclick="timingTest(this,&#39;anim&#39;,&#39;EASE_OUT_BOUNCE&#39;);"><span>ease-out bounce</span></button>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Scripting example -->
		<div class="bloc bloc-scenario">
			<div class="content">

				<div class="script-example">
					<svg id="polaroid" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 200 160" enable-background="new 0 0 200 160" onclick="pola.reset().play();">

				 		<!-- Case -->
				 		<!-- The case items will be drawn at the same time (attribute `data-async` on each tag) with a custom duration of 40 frames (attribute `data-duration`). WARNING: When you want to draw a bloc asynchronously (like here), the last item need to be `data-async` free. Otherwise the following tags will also start at the same time. I know it's a bit confusing, play a bit with it and you'll see. -->
						<path data-async="" data-duration="40" d="
							M106.725,104.742c-0.773,2.498-3.586,4.229-6.285,3.867L12.473,96.802c-2.699-0.363-4.262-2.682-3.49-5.18l25.164-81.436
							c0.771-2.496,3.584-4.229,6.283-3.866l87.966,11.808c2.699,0.362,4.264,2.68,3.49,5.179L106.725,104.742z" style="stroke-dasharray: 379, 381; stroke-dashoffset: 0;"></path>
						<path data-async="" data-duration="40" d="
							M101.02,123.207c-0.773,2.5-3.587,4.23-6.286,3.867L6.766,115.27c-2.699-0.363-4.26-2.682-3.488-5.182l2.91-9.417
							c0.771-2.499,3.585-4.23,6.285-3.87l87.967,11.809c2.699,0.361,4.261,2.682,3.49,5.18L101.02,123.207z" style="stroke-dasharray: 228, 230; stroke-dashoffset: 0;"></path>
						<path data-async="" data-duration="40" d="M103.377,128.225L154.768,155.32" style="stroke-dasharray: 59, 61; stroke-dashoffset: 0;"></path>
						<path data-async="" data-duration="40" d="M109.852,112.684L155.035,136.906" style="stroke-dasharray: 52, 54; stroke-dashoffset: 0;"></path>
						<path data-async="" data-duration="40" d="
							M9.096,120.207l47.932,21.994c0,0,98.06,12.414,97.74,13.119c-0.318,0.709,5.426-16.205,5.426-16.205l-2.646-96.842
							c-1.098-7.587-2.467-11.8-8.559-15.024l-12.635-6.604" style="stroke-dasharray: 298, 300; stroke-dashoffset: 0;"></path>
						<path data-async="" data-duration="40" d="
							M161.586,38.135l30.717,16.085c0,0,5.295,2.323,4.543,6.504l-3.215,10.527c-0.648,2.621-2.939,4.988-8.229,2.798l-9.154-4.701
							l-11.834,56.441" style="stroke-dasharray: 133, 135; stroke-dashoffset: 0;"></path>
						<path data-duration="40" d="
							M183.148,49.518c0,0,5.295,2.324,4.543,6.506l-3.215,10.526c-0.648,2.622-2.938,4.988-8.229,2.798" style="stroke-dasharray: 30, 32; stroke-dashoffset: 0;"></path>

						<!-- Lens -->
						<!-- All item will be drawn line by line, with an exception for the first one, a little delay (attribute `data-delay) to make a break between the drawing of the case and the start of the lens part -->
						<path data-delay="20" d="
							M87.176,56.143C83.274,68.78,69.043,77.538,55.395,75.706S33.846,62.146,37.75,49.511c3.903-12.637,18.135-21.392,31.783-19.562
							C83.181,31.782,91.081,43.51,87.176,56.143z" style="stroke-dasharray: 154, 156; stroke-dashoffset: 0;"></path>
						<path d="
							M92.745,56.891c-4.785,15.48-22.219,26.213-38.942,23.969C37.079,78.615,27.4,64.245,32.184,48.763
							c4.783-15.48,22.218-26.211,38.94-23.968C87.848,27.041,97.528,41.411,92.745,56.891z" style="stroke-dasharray: 188, 190; stroke-dashoffset: 0;"></path>
						<path d="
							M78.99,26.933c16.169,7.426,19.398,10.989,22.026,20.105c1.283,4.449,1.271,9.411-0.3,14.489
							c-4.783,15.479-22.217,26.213-38.941,23.969c-8.68-1.165-21.171-7.963-25.613-14.055" style="stroke-dasharray: 126, 128; stroke-dashoffset: 0;"></path>
						<path d="
							M42.602,50.162c3.137-10.157,14.573-17.193,25.543-15.722" style="stroke-dasharray: 33, 35; stroke-dashoffset: 0;"></path>

						<!-- Flash -->
						<!-- This tag does not have any extra attribute. So it will start when the previous tag is finished. His duration and delay will be the one given in the options. -->
						<path d="
							M103.789,29.275c-0.568,1.841,0.582,3.549,2.57,3.818l12.807,1.72c1.988,0.266,4.062-1.012,4.633-2.851l1.66-5.38
							c0.568-1.843-0.582-3.551-2.57-3.816l-12.807-1.72c-1.988-0.268-4.062,1.01-4.633,2.85L103.789,29.275z" style="stroke-dasharray: 60, 62; stroke-dashoffset: 0;"></path>

						<!-- Output -->
						<!-- Same case as Flash -->
						<path d="
							M11.129,105.791c-0.297,0.965,0.305,1.855,1.346,1.994l81.446,10.932c1.038,0.141,2.123-0.527,2.42-1.49l0,0
							c0.298-0.961-0.304-1.855-1.343-1.996l-81.447-10.93C12.51,104.16,11.426,104.828,11.129,105.791L11.129,105.791z" style="stroke-dasharray: 177, 179; stroke-dashoffset: 0;"></path>

						<!-- Design (color lines on the front) -->
						<!-- All the lines will start at the same time, because they all have the attribute `data-async` -->
						<path data-async="" d="M47.583,101.505L51.561,88.267" style="stroke-dasharray: 14, 16; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M53.391,102.326L57.047,90.125" style="stroke-dasharray: 13, 15; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M59.224,103.068L62.749,91.295" style="stroke-dasharray: 13, 15; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M65.057,103.814L69.015,90.637" style="stroke-dasharray: 14, 16; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M72.87,19.969L75.497,11.082" style="stroke-dasharray: 10, 12; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M78.512,21.325L81.317,11.868" style="stroke-dasharray: 10, 12; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M83.833,23.718L87.16,12.582" style="stroke-dasharray: 12, 14; stroke-dashoffset: 0;"></path>
						<path data-async="" d="M89.145,26.141L92.939,13.498" style="stroke-dasharray: 14, 16; stroke-dashoffset: 0;"></path>

					</svg>
					<div class="example-title">
						<h2>Scenarize</h2>
						<p>This feature allows you to script the animation of your SVG. To do this, the custom values will be set directly in the DOM of the SVG.</p>
						<p>Here is an example using <i>scenario-sync</i>.<br>I would recommend you look at the source code and the readme file for more information.</p>
						<button onclick="pola.reset().play();">replay</button>
						<button onclick="pola.play(-3);">rewind</button>
					</div>
					<div class="clearer"></div>

				</div>
			</div>
		</div>

		<!-- Info and documentation link -->
		<div class="bloc bloc-doc">
			<div class="content">
				<p class="center">Play with it on <a href="https://maxwellito.github.io/vivus-instant/">Vivus instant</a>.</p>
				<p class="center">More information and documentation on <a href="https://github.com/maxwellito/vivus#vivusjs">GitHub</a>.</p>
			</div>
		</div>

		<!-- Goodbye -->
		<div class="content">
			<p class="goodbye-head">Thanks for watching.</p>
			<p class="goodbye-sub">Made with <span class="striked">love</span> <span class="italic">a keyboard</span></p>
		</div>

		<!-- Le scripts -->
		<script src="<?= Yarner?>/vivus/dist/vivus.js"></script>
		<script>
			function easeOutBounce (x) {
				var base = -Math.cos(x * (0.5 * Math.PI)) + 1;
				var rate = Math.pow(base,1.5);
				var rateR = Math.pow(1 - x, 2);
				var progress = -Math.abs(Math.cos(rate * (2.5 * Math.PI) )) + 1;
				return (1- rateR) + (progress * rateR);
			}

			var timing,
				timingProps = {
					type: 'delayed',
					duration: 150,
					start: 'autostart',
					pathTimingFunction: Vivus.LINEAR,
					animTimingFunction: Vivus.LINEAR
				};

			function timingTest (buttonEl, property, type) {
				var activeSibling = buttonEl.parentNode.querySelector('button.active');
				activeSibling.classList.remove('active');
				buttonEl.classList.add('active');

				timingProps.type = (property === 'type') ? type : timingProps.type;
				timingProps.pathTimingFunction = (property === 'path') ? Vivus[type] : timingProps.pathTimingFunction;
				timingProps.animTimingFunction = (property === 'anim') ? Vivus[type] : timingProps.animTimingFunction;

				timing && timing.stop().destroy();
				timing = new Vivus('timing-example', timingProps);
			}

			var hi = new Vivus('hi-there', {type: 'scenario-sync', duration: 20, start: 'autostart', dashGap: 20, forceRender: false},
				function () {
					if (window.console) {
						console.log('Animation finished. [log triggered from callback]');
					}
				}),
				obt1 = new Vivus('obturateur1', {type: 'delayed', duration: 150}),
				obt2 = new Vivus('obturateur2', {type: 'sync', duration: 150}),
				obt3 = new Vivus('obturateur3', {type: 'oneByOne', duration: 150}),
				pola = new Vivus('polaroid', {type: 'scenario-sync', duration: 20, forceRender: false});
		</script>
	

</body></html>
