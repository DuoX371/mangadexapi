<?php

?>

<!DOCTYPE html>
<html>
<head>
<title>MangaDex API Usage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/js.js"></script>
<style>
body {
  padding: 25px;
  transition: 0.2s;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
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

</style>
</head>
<script>
</script>
<body>
  <img src="https://cdn.discordapp.com/emojis/720984944406429837.png?v=1"></img>

  <label for="darkmode" class="switch" style="margin-left:90%;">
  <input type="checkbox" id="darkmode">
  <span class="slider round"></span>
  </label>

<form class="example" id="query_manga" action="mangadexapi.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search manga.." name="manga" id="manga">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

<div id="query_result"></div>

<script>
var checkbox = document.getElementById("darkmode");
var element = document.body;
checkbox.addEventListener("change", function() {
  localStorage.setItem("dark-mode",this.checked);
  if (checkbox.checked) {
    element.classList.add("dark-mode");
  } else {
    element.classList.remove("dark-mode");
  }
});

</script>


</body>

</html>
