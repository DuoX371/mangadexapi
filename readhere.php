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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <style>
 html {
  scroll-behavior: smooth;
}
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
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: grey;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
 </style>
 </head>
 <script>
 </script>
 <body>

   <a href="index.php"> <img class="yeet"src="https://cdn.discordapp.com/emojis/720984944406429837.png?v=1"></img></a>  < GO HOME

   <button onclick="topFunction()" id="myBtn" title="Go to top">Back to Top</button>

   <label for="darkmode" class="switch" style="margin-left:90%;">
   <input type="checkbox" id="darkmode">
   <span class="slider round"></span>
   </label>

   <div class="container">
     <h2>Chapter ??</h2>
     <div style="text-align:center;margin-bottom: 20px;">
       <button>Prev Chapter</button>
       <button>Next Chapter</button>
   </div>

   <div>
     <img src="https://reh3tgm2rs8sr.xnvda7fch4zhr.mangadex.network/NZcRzq2QdjeGfwJLbKV9kTR9qsn9qrYfOvGcyZlOluv5lLy2C_EHoYR49V0E0_6MdJXqz_3PWTw-WXOcQxUlf6rki1m97cwJiRkaK_8EFII03luKh7d126Fr5a8MJtaIOqIPuHCkcng3cWAtliN7K-XOXA7KSwnP2ce14iPjida_zadRLB-csqvodsaxhvdJ/data/3e93255d7c9555ffb7446c6d180311fe/x1-92960e62168dbbfa85b86eaaa600e13a9416f6010500c5783e615a8e607e0bca.png" width=100%>
   </div>

   <div style="text-align:center;margin-top: 20px;">
     <button>Prev Chapter</button>
     <button>Next Chapter</button>
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

 //Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
 </script>


 </body>

 </html>
