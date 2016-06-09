<!DOCTYPE html>
<?php
    require 'dictionary.php';
    $dictionary = new dictionary;
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>einfaches Vokabel Training</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
	<?
	if ($_GET['init']=="go") {
		$dictionaryExists = $dictionary->createDictionary();
		if ($dictionaryExists) {
			echo "<div class='dictInfo'>Das Wörterbuch '".$dictionary->dictionaryFileName."' existiert schon.</div>";		
		} else {
			echo "<div class='dictInfo'>Das Wörterbuch '".$dictionary->dictionaryFileName."' wurde eben angelegt.</div>";		
		}
	}
	?>
		<h1>Vokabel Test</h1>
		<div class="startlist">
			<ul>
				<li><a href="feedthedictionary.php">Wörter hinzufügen</a></li>
				<li><a href="editdictionary.php">Wörterbuch bearbeiten</a></li>
			</ul>
		</div>
		<br class="break">
		<div class="languages">
			<h2>Vokabelabfrage</h2>
			In welcher Sprache soll das Wort vorgegeben werden?
			<br class="break" />
			<div class="flag">
				<a href="check.php?lang=de">deutsch<br />
				<img src="img/flag-de.gif" alt="DE"></a>
			</div>		
			<div class="flag">
				<a href="check.php?lang=en">englisch<br />
				<img src="img/flag-en.gif" alt="EN"></a>
			</div>		
			<div class="flag">
				<a href="check.php?lang=pl">polnisch<br />
				<img src="img/flag-pl.gif" alt="PL"></a>

			</div>		
			<div class="flag">
				<a href="check.php?lang=ru">russisch<br />
				<img src="img/flag-ru.gif" alt="RU"></a>

			</div>		
		</div>
		<br class="break" />
		<a href="index.php?init=go">neues Wörterbuch anlegen</a>
	</body>
</html>

