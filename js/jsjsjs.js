/* Welcome Welcome To Ugly JS */
/* Created at: 5:34 PM 23 May 2021 */
$('document').ready(function(){
	id = findGetParameter("id");
	console.log("Manga ID: "+id);
	html = "";
	$.ajax({
		type: "POST",
		url: "mangadexapi.php",
		dataType: "json",
		data: {
			"id" : id
		},
		success: function(data){
			mangaurl = data[0];
			mangaurl.forEach(function (item) {
				this.loadImgAsBase64(item, (dataURL) => {
				   // show pic
				   $("#mangacover").append(`<img src="${dataURL}" onerror="console.log("error")">`);
				});
			});
		},
		error: function(){
			alert("An error occured!");
			window.location.replace("index.php");
		}
	});
});

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

function loadImgAsBase64(url, callback) {
	const corsurl = ["https://cors-mangadex2.herokuapp.com/","https://cors-mangadex.herokuapp.com/"];
	const random = Math.floor(Math.random() * corsurl.length);
	var startTime = new Date().getTime();
	let canvas = document.createElement('CANVAS');
	let img = document.createElement('img');
	img.setAttribute('crossorigin', 'anonymous');
	img.src = corsurl[random] + url;

	img.onload = () => {
		var loadtime = new Date().getTime() - startTime;
		console.log("image took " + loadtime + "ms to load");
		canvas.height = img.height;
		canvas.width = img.width;
		let context = canvas.getContext('2d');
		context.drawImage(img, 0, 0);
		let dataURL = canvas.toDataURL('image/png');
		canvas = null;
		callback(dataURL);
		var head = 'data:image/png;base64,';
		var imgFileSize = Math.round((dataURL.length - head.length)*3/4) ;
		console.log("IMG Size: "+imgFileSize);
		$.ajax({
			type: "POST",
			url: "mangadexapi.php",
			data: {
				"url": url,
				"success": true,
				"size": imgFileSize,
				"time": loadtime
			},
			success: function(data){
				console.log("if status report is {} means report has been successfully send");
				console.log("Status Report: "+data);
			},
			error: function(){
				console.log("An error occured!");
			}
		});
	};
}
