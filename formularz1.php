<form action="index.php" method="POST">
	<input type='hidden' name='action' value='1' />
	<table cellspacing="0" cellpadding="0">
		<tr><th colspan="2" class='tytul_tabeli'>Formularz - ankieta</th></tr>
		<tr><td>Imię: </td> <td><input type="text" name="imie"/></td></tr>
		<tr><td>Nazwisko: </td><td><input type="text" name="nazwisko"/></td></tr>
		<tr><td>Miasto: </td><td><input type="text" name="miasto"/></td></tr>
		
		<tr><td>Ulubiony język programowania: </td>
			<td><select name='jezyk'>
				<option value="cpp">C++</option>
				<option value="c">C</option>
				<option value="JavaScript">JavaScript</option>
				<option value="Python">Python</option>
				<option value="Pascal">Pascal</option>
				<option value="PHP">PHP</option>
			</select></td>
		</tr>
		
		<tr><td>Płeć: </td><td style='text-align: left;'>
			<input type="radio" name="plec" value="Kobieta"/>Kobieta<br>
			<input type="radio" name="plec" value="Mężczyzna"/>Mężczyzna<br>
		</td></tr>
		<tr><td>Chcę pozostać anonimowy: </td><td><input type='checkbox' name='anonimowo' /></td></tr>
		<!-- Po wybraniu opcji anonimowosci nie zostana wyswietlone: imie i nazwisko w odpowiedzi !-->
		<tr><td colspan="2"><input style='width: 50%;' type=submit value="Wyślij"/></td></tr>
	</table>
</form>
