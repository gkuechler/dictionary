<?

class dictionary {

	//todo: place in separat file
	var $dictionaryFileName="dictionary.xml";
	//end todo
	
	function createDictionary() {
		
		if (file_exists($dictionaryFileName)) {
			$dom = new DOMDocument('1.0', 'utf-8');
			$root = $dom->createElement('dictionaire');
			$dom->appendChild($root);
			$root->appendChild($firstNode = $dom->createElement('vocabulaire'));
			$firstNode->setAttribute("version", 42); //place e.g. the actual date
			$firstNode->appendChild($dom->createElement("de","deutsch"));
			$firstNode->appendChild($dom->createElement("en","german"));
			$firstNode->appendChild($dom->createElement("pl","niemcy"));
			$firstNode->appendChild($dom->createElement("ru","неме́цкий"));
			
			header('Content-type: text/xml; charset=utf-8');
			$dom->saveXML();
			$dom->save($dictionaryFileName);
			return false;
		} else {
			return true;
		} 
	}

	function expandTheDictionary($de, $en, $pl, $ru, $dictFile) {
		$dom = new DOMDocument('1.0', 'utf-8');
		$dictionaryFile =$dictFile;
		$dom->load($dictFile);
		
		$root = $dom->getElementsByTagName('dictionaire')->item(0); 

		$nextNode = $dom->createElement('vocabulaire');
		$nextNode->setAttribute("version", 43); //place e.g. the actual date or an id
		$nextNode->appendChild($dom->createElement("de",$de));
		$nextNode->appendChild($dom->createElement("en",$en));
		$nextNode->appendChild($dom->createElement("pl",$pl));
		$nextNode->appendChild($dom->createElement("ru",$ru));
		
		$root->appendChild($nextNode); 
		$dom->saveXML();
		return $dom->save($dictFile);
	}
	
	function getNumberOfEntries($dictFile) {
		$dom = new DOMDocument('1.0', 'utf-8');
		$dictionaryFile =$dictFile;
		$dom->load($dictFile);
		return $dom->getElementsByTagName('de')->length;
	}
	
	function getRandomEntry($dictFile, $lang) {
		$dictionary = new dictionary;
		$dom = new DOMDocument('1.0', 'utf-8');
		$dictionaryFile =$dictFile;
		$dom->load($dictFile);
		$numberOfVocabularies=dictionary::getNumberOfEntries($dictFile);
		$nrOfRandVocabulary=rand(1,numberOfVocabularies);
		
		$myRandom=rand(0,$numberOfVocabularies-1);
		$selectedVocabulary=$dom->getElementsByTagName("vocabulaire")->item($myRandom);
		return $selectedVocabulary->getElementsByTagName($lang)->item(0); //->nodeValue;
	}
	
	function compareWithDictionary($cL, $de, $en, $pl, $ru, $dictFile) {
		$dictionary = new dictionary;
		$dom = new DOMDocument('1.0', 'utf-8');
		$dictionaryFile =$dictFile;
		$dom->load($dictFile);

		$numberOfVocabularies=dictionary::getNumberOfEntries($dictFile);
		for ($i; $i<$numberOfVocabularies; $i++) {
			$selectedVocabulary=$dom->getElementsByTagName("vocabulaire")->item($i);
			var_dump($selectedVocabulary);
			if ($selectedVocabulary->getElementsByTagName($cL)->item(0)->nodeValue == $de) {
				echo "<br>gefunden! ; de=".$de;
				echo $selectedVocabulary->getElementsByTagName($cL)>item(0)->nodeValue;
				echo "<br>";			
			}					
		}
		echo "end for-loop";
		$result = array(
			"a", "b", "c", "d"
		);
	
		return $inputIsCorrect;
	}

}
?>