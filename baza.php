<?php
	// Plik zawiera funkcje sluzace do operacji na bazie danych

	function polacz_z_baza() {
		$error = null;
		$baza = mysqli_connect("localhost", "radoslaw", "prostehaslo") or ($error = "Nie można połączyć się z bazą");
		if($baza) {
			mysqli_select_db($baza, "radoslaw") or ($error = "Nie można wybrać bazy danych: ".mysql_error());
		}

		if($error != null) {
			echo "Błąd (".$error.")<br>";
			exit;
		}
		return $baza;
	}

	function zakoncz_polaczenie($baza) {
		mysqli_close($baza);
	}

	function pobierz_studentow() {//zwraca wynik zapytania o wszystkie rekordy z tabeli studenci
		$baza = polacz_z_baza();

		$zapytanie = 'select * from studenci';
		$wynik = mysqli_query($baza, $zapytanie);

		zakoncz_polaczenie($baza);

		return $wynik;
	}

	function dodaj() {//dodaje studenta do bazy na podstawie danych z formularza (POST)
		$baza = polacz_z_baza();

		if(!isset($_POST["imie"]) || $_POST["imie"] == "" || 
			!isset($_POST["nazwisko"]) || $_POST["nazwisko"] == "" ||
			!isset($_POST["nr_indeks"]) || $_POST["nr_indeks"] == "" ||
			!isset($_POST["wydzial"]) || $_POST["wydzial"] == "" ||
			!isset($_POST["kierunek"]) || $_POST["kierunek"] == "") {

			echo "Formularz nie został poprawnie wypełniony, należy wypełnić każde pole.<br>";
			return;
		}
		
		$zapytanie = "INSERT INTO `studenci` (`id`, `imie`, `nazwisko`, `plec`, `nr_indeks`, `wydzial`, `kierunek`) 
			VALUES (NULL, '".$_POST["imie"]."', '".$_POST["nazwisko"]."', 
			'".$_POST["plec"]."', '".$_POST["nr_indeks"]."', 
			'".$_POST["wydzial"]."', '".$_POST["kierunek"]."');";
					  
		$wynik = mysqli_query($baza, $zapytanie);
		
		if($wynik)
			echo "Student został dopisany do listy<br>";
        else  
			echo "Student nie został dopisany do listy (".mysql_error().")<br>";
		
		zakoncz_polaczenie($baza);
	}

	function usun_potwierdz() {//pyta o podtwierdzenie usuniecia danego studenta
		if(!isset($_POST['student_id'])) {
			echo "Błędnie wywołany formularz<br>";
			return;
		}
		$baza = polacz_z_baza();

		$zapytanie = 'SELECT * FROM studenci WHERE `id`='.$_POST['student_id'];
		$wynik = mysqli_query($baza, $zapytanie);
		$line = mysqli_fetch_array($wynik);//powinien istniec tylko tylko jeden znaleziony rekord

		echo "<div>Czy na pewno chcesz usunąć studenta: <i>".
			$line['imie']." ".$line['nazwisko']." (nr indeksu: ".$line['nr_indeks'].")</i> ?</div>";

		//potwierdzenie
		echo "<form action='index.php?id=52' method='POST' style='display: inline-block;'>
				<input type='hidden' value='".$_POST['student_id']."' name='student_id' />
				<input type='submit' value='Potwierdź usuwanie' />
			</form>";

		//anulowanie
		echo "<form action='index.php?id=5' method='POST' style='display: inline-block;'>
				<input type='submit' value='Anuluj' />
			</form>";

		zakoncz_polaczenie($baza);
	}

	function usun() {//usuwa studenta z bazy na podstawie danych z formularza (POST)
		$baza = polacz_z_baza();

		if(!isset($_POST['student_id'])) {
			echo "Błędnie wywołany formularz<br>";
			return;
		}
		$zapytanie = "DELETE FROM `studenci` WHERE `id` = ".$_POST['student_id'];
		$wynik = mysqli_query($baza, $zapytanie);

		if($wynik)
			echo "Student został usunięty z bazy<br>";
        else  
			echo "Błąd podczas próby usunięcia studenta z bazy (".mysql_error().")<br>";

		zakoncz_polaczenie($baza);
	}
?>