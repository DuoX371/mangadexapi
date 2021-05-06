<?php
if(!empty($_POST['manga'])){
	$query = $_POST['manga'];
	$json = file_get_contents("https://api.mangadex.org/manga?limit=100&title={$query}");
	$result = json_decode($json);
	if($result != ""){
		foreach($result->results as $resultss){
			$id = $resultss->data->id;
			$html =  "<a href='manga?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>";
			echo $html;
		}
	}else{
		echo "Manga Not Found!";
	}
}else{
	echo 0;
}
?>