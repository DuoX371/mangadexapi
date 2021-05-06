/* Welcome Welcome To Ugly JS */
/* Created at: 4:01 AM 7 May 2021 */
$('document').ready(function(){
	$("#query_manga").submit(function(e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(), // serializes the form's elements.
			success: function(data){
				if(data != 0){
					$('#query_result').html(data);
				}else{
					$('#query_result').html("");
				}
			},
			error: function(){
				alert("An error occured!");
				window.location.replace("index.php");
			}
		});
	});
});