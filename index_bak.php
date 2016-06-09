<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>einfaches Vokabel Training</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
	<?
	if ($_GET['init']=="go") {
			$dom = new SimpleXMLElement('1.0', 'utf-8');
			$root = $dom->createElement('dictionaire');
			$dom->appendChild($root);
			$root->appendChild($firstNode = $dom->createElement('vocabulaire'));
			$firstNode->setAttribute("version", 42); //place e.g. the actual date
			$firstNode->appendChild($dom->createElement("de","deutsch"));
			$firstNode->appendChild($dom->createElement("en","german"));
			$firstNode->appendChild($dom->createElement("pl","niemcy"));
			$firstNode->appendChild($dom->createElement("ru","неме́цкий"));
			
			$dom->saveXML();
			
			$handle = fopen("dictionary.xml", "wb"); 
			fwrite($handle, $dom->asXML());
			fclose($handle);

	}
	?>
		<h1>Vokabel Test</h1>
		<div class="startlist">
			<ul>
				<li><a href="feedthedictionary.php">Wörterbuch bearbeiten</a></li>
				<li><a href="learning.php">Vokabelabfrage</a></li>
			</ul>
		</div>
		<br class="break">
		<div class="languages">
			<div class="flag de">
				<a href="">deutsch</a>
			</div>		
			<div class="flag en">
				<a href="">englisch</a>
			</div>		
			<div class="flag pl">
				<a href="">polnisch</a>
			</div>		
			<div class="flag ru">
				<a href="">russisch</a>
			</div>		
		</div>
		<br class="break" />
		<a href="index.php?init=go">neues Wörterbuch anlegen</a>
	</body>
</html>
