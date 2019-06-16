<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="gr/styl.css" rel="stylesheet" type="text/css">
		<title>Projekt strony</title>
	</head>
	<body>
		<div class='naglowek'>Prosta strona html/php</div>
		<div class='srodek'>
			<ul>
				<li><a href="index.php?id=1">O mnie</a></li>
				<li><a href="index.php?id=2">Pokaż studentów</a></li>
				<li><a href="index.php?id=3">Dodaj studenta</a></li>
				<li><a href="index.php?id=4">Edytuj studenta</a></li>
				<li><a href="index.php?id=5">Usuń studenta</a></li>
				<li><a href="index.php?id=6">Szukaj</a></li>
				<li><a href="index.php?id=7">Formularz</a></li>
			</ul>
			<div class='zawartosc'>
				<?php
					//obsluga wykonanych formularzy (akcji)
					if(isset($_POST["action"])) {
						$action = $_POST["action"];
						$akcje = array("formularz1action.php");

						@include($akcje[$action-1]);
					}
					else {//obsluga podstron menu
						$index = 1;
						if(!empty($_GET["id"]))
							$index = $_GET["id"];

						$opcje = array(
							"main.php",
							"show.php",
							"add.php",
							"edit.php",
							"delete.php",
							"search.php",
							"formularz1.php"
						);

						if($index <= count($opcje)) //opcje menu
							@include($opcje[$index-1]);
						else { //operacje na bazie danych

							@include('baza.php');
							switch($index) {
								case 31: dodaj(); break;//dodaj studenta do bazy
								case 51: usun_potwierdz(); break;//potwierdzenie usuniecia studenta z bazy
								case 52: 
									usun();
									break;//ostateczne usuniecie wybranego studenta z bazy
							}
						}
					}
				?>
			</div>
		</div>
		<div class='stopka'>stopka</div>
		<script>
			"use strict";

			//funkcja wywolywana kliknieciem na napis "jazda na rowerze" w menu "O mnie"
			var run_flinston_run = function() {
				var side = Math.random() > 0.5;//losowo z lewej lub prawej
				var x = -150, y = 0;

				var body = document.getElementsByTagName('body')[0];
				var flinston = document.createElement("DIV");
				flinston.className = side ? 'flinston' : 'flinston flipped';
				body.appendChild(flinston);

				//usuwa po minucie
				setTimeout(function() {
					body.removeChild(flinston);
				}, 60000);

				var frame_request = window.requestAnimationFrame || setTimeout(callback, 1000/60);

				var tick = function() {
					if(side)
						flinston.style.left = "" + parseInt(x) + "px";
					else {
						flinston.style.width = "-110px";
						flinston.style.right = "" + parseInt(x) + "px";
					}
					x += 2;
					y = (Math.sin(x/30) - 0.2) * 20;
					if(y < 0) y = 0;

					flinston.style.bottom = "" + parseInt(y) + "px";

					frame_request(tick);
				};
				frame_request(tick);
			};
		</script>
	</body>
</html>