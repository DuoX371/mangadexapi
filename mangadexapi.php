<?php
if(!empty($_POST['manga'])){
	$query = $_POST['manga'];
	$json = file_get_contents("https://api.mangadex.org/manga?limit=100&title={$query}");
	$result = json_decode($json);
	if($result != ""){
		$i = 1;
		$html = "<table>";
		foreach($result->results as $resultss){
			if($i == 1){
				$id = $resultss->data->id;
				$html .=  "<tr><td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(" . $resultss->data->attributes->status . ")</td>";
			}else if($i == 2){
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(" . $resultss->data->attributes->status . ")</td>";
			}else{
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(" . $resultss->data->attributes->status . ")</td></tr>";
				$i = 0;
			}
			$i++;
		}
		$html .= "</table>";
		echo $html;
	}else{
		echo "Manga Not Found!";
	}
}else if(!empty($_GET['id'])){
	$query = $_GET['id'];
	$json = file_get_contents("https://api.mangadex.org/manga?limit=100&title={$query}");
	$result = json_decode($json);
	if($result != ""){
		$i = 1;
		$html = "<table>";
		foreach($result->results as $resultss){
			if($i == 1){
				$id = $resultss->data->id;
				$html .=  "<tr><td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(" . $resultss->data->status . ")</td>";
			}else if($i == 2){
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a>(" . $resultss->data->attributes->status . ")</td>";
			}else{
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a>(" . $resultss->data->attributes->status . ")</td></tr>";
				$i = 0;
			}
			$i++;
		}
		$html .= "</table>";
		echo $html;
	}else{
		echo "Manga Not Found!";
	}
}else{
	echo 0;
}
?>
