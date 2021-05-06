<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
  transition: 0.5s;
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
</style>
</head>
<body>
  <img src="https://cdn.discordapp.com/emojis/720984944406429837.png?v=1"></img>
  <button onclick="myFunction()" style="margin-left:90%">Toggle dark mode</button>
<form class="example" action="" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search manga.." name="manga">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

</body>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
</html>
