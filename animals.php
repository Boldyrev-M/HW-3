<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$enganimals = array(
"Africa" => array ("Loxodonta africana","Panthera pardus"),
"Europe" => array ("Cygnus olor","Canis lupus"),
"Asia" => array ("Elephas maximus","Camelus","Camponotus"),
"North America" => array ("Mammuthus columbi","Machairodus"),
"South America" => array ("Panthera onca","Caluromys"),
"Australia" => array ("Cygnus atratus","Macropus","Wallabia","Phascolarctos cinereus", "Ornithorhynchus anatinus"),
"Antarctica" => array("Aptenodytes forsteri","Pygoscelis adeliae","Leptonychotes weddellii")
);
$rusanimals = array(
"Африка" => array ("Слон саванный", "Леопард"),
"Европа" => array ("Лебедь шипун", "Волк"),
"Азия" => array ("Слон индийский", "Верблюд двугорбый", "Муравeй древоточец"),
"Северная Америка" => array ("Мамонт Колумба","Махайрод"),
"Южная Америка" => array ("Ягуар", "Опоссум пушистый"),
"Австралия" => array ("Лебедь чёрный", "Кенгуру", "Валлаби", "Коала", "Утконос"),
"Антарктида" => array("Пингвин императорский", "Пингвин Адели", "Тюлень Уэдделла")
);


$stre = <<<HTML
<html>
<head>
	<meta charset="UTF-8">
	<title>Список животных</title>
</head>
<body>
<h1>Codex Animalia</h1>
HTML;
echo $stre;

// echo "<table>";// табличка исходного массива
foreach ($rusanimals as $cont => $zver) {
	//echo "\n<tr><td>{$cont}</td><td>";// табличка исходного массива
	foreach ($zver as $zv) {
        //echo "- $zv <br />";			// табличка исходного массива
		$probel = strpos($zv, " ");
		if ($probel !== false) {// строим новый массив для двухсловных
			$twowords[] = $zv;
			$newanimals[$cont][] = substr($zv,0,$probel);// первое слово
			$aniproperty[] = substr($zv,$probel+1,strlen($zv));// второе слово
		}
    } 
//echo "</td></tr>";// табличка исходного массива
}
//echo "</table>";// табличка исходного массива
//echo "<pre>".print_r($newanimals,true)."</pre>"; // что получилось
//echo "<pre>".print_r($aniproperty,true)."</pre>"; // что получилось
shuffle ($aniproperty);// перемешиваем вторые слова
foreach ($newanimals as $k => $v) { // добавляем второе слово
	echo "<h2>{$k}</h2>";
	foreach ($v as $kluch => $animal) {
		$newanimals[$k][$kluch] = $animal." ".array_shift($aniproperty);
	}
	echo implode(", ",$newanimals[$k]);
}
// echo "<pre>".print_r($newanimals,true)."</pre>";


echo "</body></html>";
?>













