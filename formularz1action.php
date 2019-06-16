<table>
	<?php
		if(isset($_POST['imie']) && isset($_POST['nazwisko']) 
			&& isset($_POST['miasto']) && isset($_POST['jezyk']) && isset($_POST['plec'])) {
			$anonimowosc = isset($_POST['anonimowo']) ? $_POST['anonimowo'] : 'off';
			
			echo "<tr><th class='tytul_tabeli'>Wykonany formularz</th></tr>";
			if($anonimowosc != 'on') {
				echo "<tr><td style='text-align: left;'>Imię: ".$_POST['imie']."</td></tr>";
				echo "<tr><td style='text-align: left;'>Nazwisko: ".$_POST['nazwisko']."</td></tr>";
				echo "<tr><td style='text-align: left;'>Płeć: ".$_POST['plec']."</td></tr>";
			}
			echo "<tr><td style='text-align: left;'>Miasto: ".$_POST['miasto']."</td></tr>";
			echo "<tr><td style='text-align: left;'>Ulubiony jezyk: ".$_POST['jezyk']."</td></tr>";
		}
		else {
			echo "Nie wszystkie wymagane informacje zostały przesłane<br>";
		}
	?>
</table>