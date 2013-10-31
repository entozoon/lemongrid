<?php 
// 									LEMONGRID TEST PAGE
//									-------------------
//				These php calculations and variables are only for test purposes


	/* **** VARIABLES **** */

		$columns = 4;
		$gutterwidth = 20;
		$segmentwidth = 280;

	/* ******************* */


?><!DOCTYPE html>
<html>
<head>
	<link media='all' rel='stylesheet' type='text/css' href='css/site.css' />

	<style>
		html, body {
			padding: 0;
			margin: 0;
		}
		.grid, strong { font-family: tahoma }
		.title { font-size: 30px; line-height:65%; }
		.title, .title .segment { overflow: visible; }
		.title .segment {
			margin: 5px 0 10px!important;
			border-radius: 10px;
			box-shadow: 10px 10px 14px -7px rgba(0,0,0,0.75);
		}
		.title .segment > div {
			display:block;
			height: 80px;
			line-height: 80px;
			width:100%;
		}
		.title + .grid { border-radius: 10px 10px 0 0;}
		pre {text-align: left;font-size: 12px;line-height: 120%;}
	</style>
</head>



<body class='debug debug--citrus debug--gaps debug--text-center'>

<div id='wrapper'>

	<div class='grid-outer'>
		<div class='grid' style='overflow: visible;'>
		<div>

			<div class='grid title' style='padding:0;'>
				<div class='segment segment--1_10' style='z-index:10'><div><strong>L</strong></div></div>
				<div class='segment segment--1_10' style='z-index:9'><div><strong>E</strong></div></div>
				<div class='segment segment--1_10' style='z-index:8'><div><strong>M</strong></div></div>
				<div class='segment segment--1_10' style='z-index:7'><div><strong>O</strong></div></div>
				<div class='segment segment--1_10' style='z-index:6'><div><strong>N</strong></div></div>
				<div class='segment segment--1_10' style='z-index:5'><div>&nbsp;</div></div>
				<div class='segment segment--1_10' style='z-index:4'><div><strong>G</strong></div></div>
				<div class='segment segment--1_10' style='z-index:3'><div><strong>R</strong></div></div>
				<div class='segment segment--1_10' style='z-index:2'><div><strong>I</strong></div></div>
				<div class='segment segment--1_10' style='z-index:1'><div><strong>D</strong></div></div>
			</div>
		</div>
		</div>

		<div class='grid'>
			<div>
				<pre>
	$columns: <?php echo $columns; ?>;
	$gutterwidth: <?php echo $gutterwidth; ?>;
	$segmentwidth: <?php echo $segmentwidth; ?>;

	$grid-outer-width: lemonGridOuterWidth($columns, $segmentwidth, $gutterwidth, true, true);
	$grid-main-width: lemonGridMainWidth($columns, $segmentwidth, $gutterwidth);

	.grid-outer {
		position: relative;
		margin: 0 auto;
		min-width: $minwidth + px;
		max-width: $grid-outer-width + px;
		width: 100%;

		> .grid {
			max-width: $grid-main-width + px;
			margin: 0 auto;
		}

	}
	.grid {
		@include LemonGridGen($columns, $segmentwidth, $gutterwidth);
	}




	// Or alternative version (used):
	$grid-main-width: lemonGridMainWidth($columns, $segmentwidth, $gutterwidth);
	$grid-outer-width: lemonGridOuterWidth($columns, $segmentwidth, $gutterwidth, true, true);

	$minwidth: 1024 - $gutterwidth * 2;

	$headerheight: 95px;
	$footerheight: 380px;

	.grid-outer {
		position: relative;
		overflow: hidden;
		margin: 0 auto;
		padding: 0 $gutterwidth + px;

		min-width: $minwidth - $gutterwidth * 2 + px;
		max-width: $grid-outer-width - $gutterwidth * 2 + px;

		width: 100%;
		/*
		> .grid {
			width: 100%;
			min-width: $minwidth + px;
			max-width: $grid-outer-width + px;
			margin: 0 auto;
		}
		*/
	}
	.grid {
		@include LemonGridGen($columns, $segmentwidth, $gutterwidth);
	}</pre>
			</div>
		</div>
			
		<!--
		<div class='grid grid--edgeless'>
			<div><div>Edgeless grid:</div></div>
			<div><div>&nbsp;</div></div>
			
			<div>
				<div class='segment segment--1_1 grid grid--no-debug-gaps'>
					<div>
						<div class='segment segment--1_1'>grid--edgeless</div>
					</div>
					<div>
						<div class='segment segment--1_6'>&nbsp;</div>
						<div class='segment segment--1_6'>&nbsp;</div>
						<div class='segment two-sixths'>&nbsp;</div>
						<div class='segment segment--1_6'>&nbsp;</div>
						<div class='segment segment--1_6'>&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
		-->




		<div class='grid'>
			<div>

				<div class='grid'><div><!-- spacer -->&nbsp;</div></div>
				<div class='grid'><div>Fractional Widths:</div></div>
				<div class='grid'><div><!-- spacer -->&nbsp;</div></div>
			</div>

			<div>
				<div class='segment segment--1_1 grid'>
					<div>
						<div class='segment segment--1_1'>
							<div>
								segment segment--1_1
							</div>
						</div>
					</div>

					<div>
						<div class='segment segment--1_2'>
							<div>
								segment segment--1_2
							</div>
						</div>
						<div class='segment segment--1_2'>
							<div>
								segment segment--1_2
							</div>
						</div>
					</div>
					
					<div>
						<div class='segment segment--1_4'>
							<div>
								segment segment--1_4
							</div>
						</div>
						<div class='segment segment--1_4'>
							<div>
								segment segment--1_4
							</div>
						</div>
						<div class='segment segment--1_4'>
							<div>
								segment segment--1_4
							</div>
						</div>
						<div class='segment segment--1_4'>
							<div>
								segment segment--1_4
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div>
				<div class='segment segment--1_1 grid'>
					<div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
						<div class='segment segment--1_6'>
							<div>
								segment segment--1_6
							</div>
						</div>
					</div>
				</div>
			</div>

			<div>
				<div class='segment segment--1_1 grid'>
					<div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
						<div class='segment segment--1_12'>
							<div>
								segment segment--1_12
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>


		<div class='grid'>
			<div>

				<div class='grid'><div><!-- spacer -->&nbsp;</div></div>
				<div class='grid'><div>Fractional Widths with Fixed Gutters (Experimental - bleeds edges):</div></div>
				<div class='grid'><div><!-- spacer -->&nbsp;</div></div>
			</div>
		</div>

		<div class='grid'>
			<div>
				<pre style='text-align:center'><?php
					echo htmlentities("<div class='grid grid--edgeless grid--internalgutters'>");
				?></pre>
			</div>
		</div>
				
		<div class='grid'>
			<div>
				<div class='segment segment--1_1 grid'>
					<div>
						<div class='segment segment--1_3'>
							<div>Normal 1/3</div>
						</div>

						<div class='segment segment--1_3'>
							<div>Normal 1/3</div>
						</div>

						<div class='segment segment--1_3'>
							<div>Normal 1/3</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class='grid grid--edgeless grid--internalgutters'>
			<div>
				<div class='segment segment--1_3'>
					<div style='background: green;'>
						segment segment--1_3
					</div>
				</div>

				<div class='segment segment--1_3'>
					<div style='background: green;'>
						segment segment--1_3
					</div>
				</div>

				<div class='segment segment--1_3'>
					<div style='background: green;'>
						segment segment--1_3
					</div>
				</div>
			</div>
		</div>


		<div><br />Alternative (used):</div>
	</div>
				

	<div class='grid-outer grid'>
		<div>
			<div class='segment segment--1_1 grid'>
				<div>
					<div class='segment segment--1_3'>
						<div>Normal 1/3</div>
					</div>

					<div class='segment segment--1_3'>
						<div>Normal 1/3</div>
					</div>

					<div class='segment segment--1_3'>
						<div>Normal 1/3</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='grid-outer grid grid--edgeless grid--internalgutters'>
		<div>
			<div class='segment segment--1_3'>
				<div style='background: green;'>
					segment segment--1_3
				</div>
			</div>

			<div class='segment segment--1_3'>
				<div style='background: green;'>
					segment segment--1_3
				</div>
			</div>

			<div class='segment segment--1_3'>
				<div style='background: green;'>
					segment segment--1_3
				</div>
			</div>
		</div>
	</div>

</div>
</body>

</html>