src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">

$(document).ready(function()
{
	$.getJSON("getTracks.php", success = function(data)
	{
		var options ="";

		for(var i = 0; i < data.length; i++)
		{
			options += "<button class='option track-1'  id= 'button"+ (i+1) +"' value='" + data[i].toLowerCase() + "' >" + data[i] + "</button>";
		}

		$("#slctTrack").append(options);

		//$("#slctTrack").change();
	});



	

	//$("#slctTrack").click(function()
	//{
	//	alert(this.id + "Heeeeeeeeeeeeeey");
	//});

$("#slctTrack").on("click", function(e)
	{
		//alert($(e.id));
		var idClicked = this;
		console.log(this);
		alert("idClicked");

		//alert($("#slctButton").val());
		$.getJSON("getCourses.php?tracks=" + $(idClicked).val(), success = function(data)
		{
			var options ="";

			for(var i = 0; i < data.length; i++)
			{
				options += "<button value='" + data[i].toLowerCase() + "' class='option track-1' onclick=\"populateList(this.id);document.getElementById('second-step').scrollIntoView();\" type='button'>" + data[i] + "</button>";
			}

			$("#slctCourse").html("");
			$("#slctCourse").append(options);
		});
	});

/*$('#slctTrack').click(function()
	{
		alert($("#slctButton").val());
		$.getJSON("getCourses.php?tracks=" + $("button").val(), success = function(data)
		{
			var options ="";

			for(var i = 0; i < data.length; i++)
			{
				options += "<button value='" + data[i].toLowerCase() + "'>" + data[i] + "</button>";
			}

			$("#slctCourse").html("");
			$("#slctCourse").append(options);
		});
	});*/
});