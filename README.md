LEMONGRID
---

<pre>

  	            	;+#+#@@@#+#@++#;;;:,,;;;.
				  :++##@@++####+;++##++;;::;;;
				 ++###+#####+#+;: :+####;    :;
			   +++######+'':+###############  ;.
			  +'####+' .::######:############: +
			 ++##+;+##'; :+##++###'##########:; +
		   '++###:'+'#'.##@@@#++'##;#########;+ ;
		  +'++++#..;';#####@#++'';.:########+ +: :
		 +';;@+++;:;.########''';:: #######+: +: ;
		+:;;.#+@++ . #######:;;::: :.:::.++   ;: ;
	   +..;:;+#++#+ '##############'::;''++ .. . ;
	######'  ##+###.'#############;+:;''++.. ;   ;
 .@@@#######;#+;++#::# ###########.++:':..   ..  :
@@@@@#######+ +;++@;:;+;####+; :.+++..... : ;: . .
@@@@########++.':;;+; ;  ####+++:  ..... ;::  :;:              .-.
@@@#########+++ +;.#;    . .. ......: . ;: .:;.:;             /  .\
###########+++++++; #;  ... ..... :. : ;; ..;:; ;           .' .  .'.
##########+###++++.+.+::.  . ... :  : ;; ..;;:; .        .-'. .    . .-._
##################+ ..; ::: '  ..  ; ;;  ;;;.; ;       .' .L    . . . .  '.
####################++.; ::::.'':.: :;: ;;:;:;        /. E    .    .   . ..\
#####+++++###########++;..:;..::'.. ;: ;; ;;;        / .M . .     . .. . . .\
###++;+''++.######### ++++.+++.:++:.. ;; :;.        |. O  .      .  . . ... .\
#+++ ++++++++#########++: +.++++::++++: .; :       | . N     .       .  .  . .\
+.::;:+######+#########++:+ ++++++.::++++:         | . . .        .  . .  . ..|
 ; ;;:+############@### +:++++++++'.:::+++::       |   .           .   . .  ..|
 ;  :;.+##########@@@###+:+++++++++: .:::::::.     |. .   .        . ..   . ..|
'   .:  +###############+++++++;+++:: .::::::.     |.  .          .     .   ..|
	..  .+#;############;'++++++++'::  ::::::.     | .  .          . . . . . .|
		   #;##########++::++++++::::  .:::::      |. .G  .      .. .   .  ...|
		   .#++########.+:::::::::::   :::::        \  R          .  . .  . ../
			##++++###++'::::::::::::  :::::         \  .I .      .  .  . ... |
			 ##:++++++ +::::::::::::  :::            \. .D   .   . .  .. . .'
			 ### .+++++::::::::::::  ::               \  ..      .. .  .. /
			  ####   .;:::'.:: :::: .:                 ':_ .  .  . ... _.'
			  .##### +:::'.;:..:.:  :.                    '-.. . .  .-'
			   ####:+:::':::: :::: : : 
			   ###'.'::': ;:  : : . :.:

</pre>


# LEMONGRID - created by Michael Cook 2013 - http://mykeself.com

@license: http://opensource.org/licenses/MIT

Lemongrid is a simple grid system for use on fixed width or fluid layouts.
Supports all modern browsers, and ie7 onwards (with some minor javascript)
(This system requires Sass).

#### Sass Initialisation example:
```
$columns: 12;
$gutterwidth: 20;
$segmentwidth: 60;

$grid-outer-width: lemonGridOuterWidth($columns, $segmentwidth, $gutterwidth, true, true);

.grid-outer {
	position: relative;
	overflow: hidden;
	margin: 0 auto;
	width: $grid-outer-width + px;
}
.grid {
	@include LemonGridGen($columns, $segmentwidth, $gutterwidth);
}
```

#### Fractional width example:
```
	<div class='grid'>
		<div class='segment segment--1_2'>
			<div>
				1/2
			</div>
		</div>
		<div class='segment segment--1_2'>
			<div>
				1/2
			</div>
		</div>
	</div>
```

#### Fixed width example:
```
	<div class='grid'>
		<div>
			<div class='segment segment--3'>3</div>
			<div class='segment segment--3'>3</div>
			<div class='segment segment--3'>3</div>
		</div>
	</div>
```

@todo: Prevent first and last segments from having gutter-left/right respectively,
	   - unless they have the necessary edge gutters

 lemonGrid Mixin:
 @param $columns 			Number of main columns (int)
 @param $segment-width 		Width of those columns (int)
 @param $gutter-width 		Width of gutters in between (int)
 @param $edge-gutter-left 	(Optional) Left edge gutter (boolean)
 @param $edge-gutter-right 	(Optional) Right edge gutter (boolean)
 @param $edge-gutter-size 	(Optional) edge gutter width as a multiple of gutter-width

