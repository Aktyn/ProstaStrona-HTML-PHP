<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<th width="40">ID</th>
		<th width="90">Imię</td>
		<th width="90">Nazwisko</th>
		<th width="120">Płeć</th>
		<th width="80">Nr.&nbsp;Indeksu</th>
		<th width="40">Wydział</th>
		<th width="60">Kierunek</th>
		<th>Akcja</th>
	</tr>

<?PHP
	@include('baza.php');

	$studenci = pobierz_studentow();
	while ($line = mysqli_fetch_array($studenci)) {
		echo "<tr>
		<td>".$line['id']."</td>
		<td>".$line['imie']."</td>
		<td>".$line['nazwisko']."</td>
		<td>".$line['plec']."</td>
		<td>".$line['nr_indeks']."</td>
		<td>".$line['wydzial']."</td>
		<td>".$line['kierunek']."</td>
		<td>
			<form action='index.php?id=51' method='POST'>
				<input type='hidden' value='".$line['id']."' name='student_id' />
				<input type='submit' value='Usuń' />
			</form>
		</td>

		</tr>";
	}
?>


</table>