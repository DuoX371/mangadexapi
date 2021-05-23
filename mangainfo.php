<?php
if(!empty($_GET['id'])){
	$query = $_GET['id'];
	//get name and alt
	$json = file_get_contents("https://api.mangadex.org/manga/{$query}");
	$result = json_decode($json);
	if($result != ""){
		$title = "<h1>" . $result->data->attributes->title->en . "</h1>";
		$altTitle = "<p>Alt: ";
		foreach($result->data->attributes->altTitles as $altTitles){
			$altTitle .= $altTitles->en . ", ";
		}
		$altTitle .= "</p>";
		$description = "<p>" . $result->data->attributes->description->en . "</p>";
	}
	//get chapter
	$json = file_get_contents("https://api.mangadex.org/manga/{$query}/feed?limit=500");
	$result = json_decode($json);
	if($result != ""){
		$i = 1;
		$html = "<table>";
		foreach($result->results as $results){
			if($results->data->attributes->translatedLanguage == "en"){
				if($i == 1){
						$chapter = $results->data->attributes->chapter;
						$html .= "<tr><td><a href='readhere.php?chapter={$chapter}&id={$query}'>{$chapter}</a></td>";
				}else if($i > 1 && $i < 10){
					$chapter = $results->data->attributes->chapter;
					$html .= "<td><a href='readhere.php?chapter={$chapter}&id={$query}'>{$chapter}</a></td>";
				}else if($i == 10){
					$chapter = $results->data->attributes->chapter;
					$html .= "<td><a href='readhere.php?chapter={$chapter}&id={$query}'>{$chapter}</a></td></tr>";
					$i = 0;
				}
				$i++;
			}
		}
		$html .= "</tr>";
		$html .= "</table>";
	}else{
		echo "<script> alert('Something went wrong!'); window.location.replace('index.php'); </script>";
		die();
	}
}else{
	echo "<script> window.location.replace('index.php'); </script>";
	die();
}
?>

 <!DOCTYPE html>
 <html>
 <head>
 <title>MangaDex API Usage</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="js/jsjsjs.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <style>
 body {
   padding: 25px;
   transition: 0.2s;
   color:blue;
 }

 .dark-mode {
   transition: 0.5s;
   background-color: #272524;
   color: white;
 }

 .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
 }

 .switch input {
   opacity: 0;
   width: 0;
   height: 0;
 }

 .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
 }

 .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
 }

 input:checked + .slider {
   background-color: #2196F3;
 }

 input:focus + .slider {
   box-shadow: 0 0 1px #2196F3;
 }

 input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
 }

 /* Rounded sliders */
 .slider.round {
   border-radius: 34px;
 }

 .slider.round:before {
   border-radius: 50%;
 }
 table {
   font-family: arial, sans-serif;
   border-collapse: collapse;
   width: 100%;
 }

 td, th {
   border: 1px solid #dddddd;
   background-color: #87ceeb;
   text-align: center;
   padding: 8px;
 }
 .yeet{
   width: 100px;
   height: 100px;
   transition: width 0.6s, height 0.6s;
 }
 .yeet:hover {
  width: 150px;
  height: 150px;
}
 </style>
 </head>
 <script>
 </script>
 <body>

   <a href="index.php"> <img class="yeet"src="https://cdn.discordapp.com/emojis/720984944406429837.png?v=1"></img></a>  < GO BACK


   <label for="darkmode" class="switch" style="margin-left:90%;">
   <input type="checkbox" id="darkmode">
   <span class="slider round"></span>
   </label>

   <div class="container">
     <div class="row">
       <div class="col-sm-4"><img id="mangacover" src="<?php echo $coverurl; ?>" style="max-width:90%;max-height:90%"></img></div>
       <div class="col-sm-8"><?php echo $title . $altTitle . $description; ?></div>
     </div>
     <br>
     <div class="row">
       <h1>Chapter List</h1>
	   <?php echo $html; ?>
     </div>
   </div>




 <div style="text-align:center; margin-top: 10px;" id="query_result"></div>
 <script>
 var checkbox = document.getElementById("darkmode");
 if (sessionStorage.getItem("mode") == "dark") {
   darkmode();
 } else {
   nodark();
 }

 checkbox.addEventListener("change", function() {
   if (checkbox.checked) {
     darkmode();
   } else {
     nodark();
   }
 });

 function darkmode() {
   document.body.classList.add("dark-mode");
   checkbox.checked = true;
   sessionStorage.setItem("mode", "dark");
 }

 function nodark() {
   document.body.classList.remove("dark-mode");
   checkbox.checked = false;
   sessionStorage.setItem("mode", "light");
 }
 </script>


 </body>

 </html>
