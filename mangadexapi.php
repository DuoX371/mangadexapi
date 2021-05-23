<?php
if(!empty($_POST['manga'])){
	$query = $_POST['manga'];
	$query = str_replace(' ', '-', $query);
	$json = file_get_contents("https://api.mangadex.org/manga?limit=100&title='{$query}'");
	$result = json_decode($json);
	if($result != ""){
		$i = 1;
		$html = "<table>";
		foreach($result->results as $resultss){
			if($i == 1){
				$id = $resultss->data->id;
				$html .=  "<tr><td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(Last Chapter: " . $resultss->data->attributes->lastChapter . ")</td>";
			}else if($i == 2){
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(Last Chapter: " . $resultss->data->attributes->lastChapter . ")</td>";
			}else{
				$id = $resultss->data->id;
				$html .=  "<td><a href='mangainfo.php?id={$id}'>" . $resultss->data->attributes->title->en . "</a><br>(Last Chapter: " . $resultss->data->attributes->lastChapter . ")</td></tr>";
				$i = 0;
			}
			$i++;
		}
		$html .= "</table>";
		echo $html;
	}else{
		echo "Manga Not Found!";
	}
}else if(!empty($_POST['chapter']) && !empty($_POST['id'])){
	$chapter = $_POST['chapter'];
	$query = $_POST['id'];
	$json = file_get_contents("https://api.mangadex.org/manga/{$query}/feed?limit=500");
	$result = json_decode($json);
	if($result != ""){
		$html = "";
		$i = 0;
		$k = 0;
		$j = 0;
		$chapter2 = 10000;
		$chapter0 = 0;
		$data1 = Array();
 		foreach($result->results as $results){
			if($results->data->attributes->translatedLanguage == "en" && $results->data->attributes->chapter == $chapter){
				$dataId = $results->data->id;
				$hash = $results->data->attributes->hash;
				$getServer = file_get_contents("https://api.mangadex.org/at-home/server/{$dataId}");
				$server = json_decode($getServer);
				foreach($results->data->attributes->data as $data){
					$data1[0][$i] = $server->baseUrl . "/data/" . $hash . "/" . $data;
					$i++;
				}
			}
			if($results->data->attributes->chapter > $chapter && $results->data->attributes->chapter < $chapter2){
				$chapter2 = $results->data->attributes->chapter;
			}
			if($results->data->attributes->chapter < $chapter && $results->data->attributes->chapter > $chapter0){
				$chapter0 = $results->data->attributes->chapter;
			}
			if($results->data->attributes->translatedLanguage == "en" && $results->data->attributes->chapter == $chapter0){
				//previous button
				$data1[2] = "<button onclick='location.href= " . '"readhere.php?chapter=' . $chapter0 . '&id=' . $query . '"' . ";'>Prev Chapter ({$chapter0})</button>";
				$j = 1;
			}
			if($results->data->attributes->translatedLanguage == "en" && $results->data->attributes->chapter == $chapter2){
				//next button
				$data1[1] = "<button onclick='location.href= " . '"readhere.php?chapter=' . $chapter2 . '&id=' . $query . '"' . ";'>Next Chapter ({$chapter2})</button>";
				$k = 1;
			}
		}
		if($k == 0){
			$data1[1] = "<button disabled>Next Chapter</button>";
		}
		if($j == 0){
			$data1[2] = "<button disabled>Prev Chapter</button>";
		}
		echo json_encode($data1);
	}else{
		echo "<script> alert('Something went wrong!'); window.location.replace('index.php'); </script>";
		die();
	}
}else if(!empty($_POST['url']) && !empty($_POST['success']) && !empty($_POST['size']) && !empty($_POST['time'])){
	$url = $_POST['url'];
	$success = $_POST['success'];
	if($success == "true"){
		$success = true;
	}else{
		$success = false;
	}
	$size = (int)$_POST['size'];
	$time = (int)$_POST['time'];
	$postData = [
		'url' => $url,
		'success' => $success,
		'bytes' => $size,
		'duration' => $time,
		'cached' => false
	];

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'http://api.mangadex.network/report');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

	$headers = array();
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		$data = 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	echo $result;
}else if(!empty($_POST['id'])){
	$query = $_POST['id'];
	//get coverurl
	$json = file_get_contents("https://api.mangadex.org/cover?manga[]={$query}");
	$result = json_decode($json);
	if($result != ""){
		$coverurl = "https://uploads.mangadex.org/covers/{$query}/" . $result->results[0]->data->attributes->fileName;
	}
	echo $coverurl;
}else{
	echo 0;
}

?>
