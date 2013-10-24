# lemongrid
===========
```

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
```



	### LEMONGRID v4 - created by Michael Cook 2013 - mykeself.com
	==============================================================

	@license: http://opensource.org/licenses/MIT

	Lemongrid is a simple grid system for use on fixed width or fluid layouts.
	You create segments that are fractions of it's parent's width, or fixed width - 
	However, if it is a fluid layout site I recommend only using fractional widths.

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

