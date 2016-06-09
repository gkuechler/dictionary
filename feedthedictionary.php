<!DOCTYPE html>
<?
    require 'dictionary.php';
    $dictionary = new dictionary;

	if ($_POST['submit']!="") {
		$result = $dictionary->expandTheDictionary($_POST['de'], $_POST['en'],$_POST['pl'],$_POST['ru'], $dictionary->dictionaryFileName );
		if ($result == false) {
			echo "<div class='error'>Es ist ein Fehler aufgetreten</div>";		
		} else {
			echo "<div class='ok'>Es wurden ".$result." Bytes übertragen. <br />Es gibt jetzt ".$dictionary->getNumberOfEntries($dictionary->dictionaryFileName )." Einträge </div>";		
		}
	}
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Füttere das Wörterbuch</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
		<h1>Vokabeln in das Wörterbuch eingeben</h1>
		<div class="startlist">
			<ul>
				<li>Wörterbuch bearbeiten</li>
				<li><a href="learning.php">Vokabelabfrage</a></li>
			</ul>
		</div>
		<br class="break">
		
		<form action="feedthedictionary.php" method="post">
		<div class="vocabulary">
			<div class="input-de">
				<input type="text" name="de" value="" />
			</div>		
			<div class="input-en">
				<input type="text" name="en" value="" />
			</div>		
			<div class="input-pl">
				<input type="text" name="pl" value="" />
			</div>		
			<div class="input-ru">
				<input type="text" name="ru" value="" />
			</div>		
		</div>
			<input type="submit" name="submit" value="auf in's Wörterbuch" />

		</form>

		<br class="break" />
					
		<a href="index.php">zurück zur Startseite</a>
		
	</body>
</html>
