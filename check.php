<!DOCTYPE html>
<?
    require 'dictionary.php';
    $dictionary = new dictionary;

	if ($_GET['submit']!="") {
		$result = $dictionary->compareWithDictionary($_POST['cL'],$_POST['de'], $_POST['en'],$_POST['pl'],$_POST['ru'], $dictionary->dictionaryFileName );
		if ($result == false) {
			echo "<div class='error'>Es ist ein Fehler aufgetreten</div>";		
		} else {
			echo "<div class='ok'>Es wurden ".$result." Bytes übertragen.</div>";		
		}
	}

	$choosedLanguage="";	
	$cL=$_GET['lang'];
	$languageIsSet=false;
	if ($_GET['lang']=="de") {
		$choosedLanguage="deutsch";
		$languageIsSet=true;
	} elseif($_GET['lang']=="en") {
		$choosedLanguage="englisch";
		$languageIsSet=true;
	} elseif($_GET['lang']=="pl") {
		$choosedLanguage="polnisch";
		$languageIsSet=true;
	} elseif($_GET['lang']=="ru") {
		$choosedLanguage="russisch";
		$languageIsSet=true;
	} else {
		$choosedLanguage="englisch";
		$cL="en";
	}
	

	$vocabularyToCheck=$dictionary->get

?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Vokabelabfrage</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
		<h1>Vokabelabfrage</h1>
		<div class="startlist">
			<ul>
				<li><a href="feedthedicitonary.php">Wörterbuch bearbeiten</li>
				<li><a href="check.php">Vokabelabfrage</a></li>
			</ul>
		</div>
		<br class="break">
		<div>
		<? if($languageIsSet) {
			echo "Du hast Dich für die Vokabelvorgabe <strong>".$choosedLanguage."</strong> entschieden.";
		} else {
			echo "Du hast keine Vokabelvorgabe gemacht, daher wird <strong>englisch</strong> genommen.";
		}
		$myVocabulary=$dictionary->getRandomEntry($dictionary->dictionaryFileName, $cL);
		?>
		</div>
		
		<form action="check.php" method="get">
		<div class="vocabulary">
		
			<?
			echo '<input type="hidden" name="cl" value="'.$cL.'">';
			$languages=array("de", "en", "pl", "ru");
			for($i=0;$i<sizeOf($languages);$i++) {
				echo '			<div class="input-'.$languages[$i].'"><img src="img/flag-'.$languages[$i].'">';			
				if ($cL==$languages[$i]) {
					echo '				<input type="hidden" name="'.$languages[$i].'" value="'.$myVocabulary->nodeValue.'">'.$myVocabulary->nodeValue.'';					
				} else {
					echo '				<input type="text" name="'.$languages[$i].'"value="" />';
				}
				echo '			</div>';
			}
			?>
		</div>
			<input type="submit" name="submit" value="auf in's Wörterbuch" />

		</form>

		<br class="break" />
					
		<a href="index.php">zurück zur Startseite</a>
		
	</body>
</html>
