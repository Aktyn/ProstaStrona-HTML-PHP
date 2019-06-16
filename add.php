<form action="index.php?id=31" method="POST">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr><th colspan="2" class='tytul_tabeli'>Dodawanie studenta</th></tr>
		<tr><td>Imię: </td><td width="200"><input type="text" name="imie" /></td></tr>
		<tr><td>Nazwisko: </td><td width="200"><input type="text" name="nazwisko" /></td></tr>
		<tr><td>Płeć: </td>
			<td><select name='plec'>
				<option value="Brak">Brak</option>
				<option value="Mężczyzna">Mężczyzna</option>
				<option value="Kobieta">Kobieta</option>
			</select></td>
		</tr>
		<tr><td>Nr.&nbsp;indeksu: </td><td width="200"><input type="number" name="nr_indeks"/></td></tr>
		<tr><td>Wydział: </td><td width="200"><input type="text" name="wydzial" /></td></tr>
		<tr><td>Kierunek: </td><td width="200"><input type="int" name="kierunek" /></td></tr>

		<tr><td colspan="2"><input type="submit" value="Dodaj osobę" /></td></tr>
	</table>
</form>