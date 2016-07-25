src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">

$(document).ready(function()
{
	$.getJSON("getTracks.php", success = function(data)
	{
		var options = "";

		for(var i = 0; i < data.length - 1; i++)
		{
			options += "<button class='track-option'  id= 'button"+ (i+1) +"' value='" + data[i].toLowerCase() + "' onclick=\"populateList(this.innerHTML);\" type= 'button' >" + data[i] + "</button>";
		}

		options += "<button class='track-option track-option-last'  id= 'button"+ (data.length + 1) +"' value='" + data[data.length - 1].toLowerCase() + "' onclick=\"populateList(this.innerHTML);\" type= 'button' >" + data[data.length - 1] + "</button>";

		$("#slctTrack").append(options);

	});



$("#slctTrack").on("click",".track-option", function(e)
	{
		$("#intro-options").html("");
		$("#intermediate-options").html("");
		$("#expert-options").html("");

		$("#loading").fadeIn("fast", "swing");

		var idClicked = this;

		$.getJSON("getCourses.php?tracks=" + $(idClicked).val(), success = function(data)
		{
			$("#loading").fadeOut("fast", "swing");

			var introOptions = "";
			var intermediateOptions = "";
			var expertOptions = "";

			for(var i = 0; i < data.length; i++)
			{
				var dataValues = data[i].split('_');

				for(var j = 0; j < dataValues.length; j++)
				{
					dataValues[j] = dataValues[j].toLowerCase();
				}

				if (dataValues[1] == "intro") {

					introOptions += "<li id=course" + (i + 1) + " value='" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

					introOptions += "<p class=\"course-title\">" + dataValues[0] + "</p>";

					if (dataValues[2] == "p1") {
						introOptions += "<p class=\"course-part\"> Part 1 </p>"
					} else if (dataValues[2] == "p2") {
						introOptions += "<p class=\"course-part\"> Part 2 </p>"
					} else if (dataValues[2] == "p3") {
						introOptions += "<p class=\"course-part\"> Part 3 </p>"
					}

					introOptions += "</li>";


				} else if (dataValues[1] == "intermediate") {

					intermediateOptions += "<li id=course" + (i + 1) + " value='" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

					intermediateOptions += "<p class=\"course-title\">" + dataValues[0] + "</p>";

					if (dataValues[2] == "p1") {
						intermediateOptions += "<p class=\"course-part\"> Part 1 </p>"
					} else if (dataValues[2] == "p2") {
						intermediateOptions += "<p class=\"course-part\"> Part 2 </p>"
					} else if (dataValues[2] == "p3") {
						intermediateOptions += "<p class=\"course-part\"> Part 3 </p>"
					}

					intermediateOptions += "</li>";


				} else if (dataValues[1] == "expert") {

					expertOptions += "<li id=course" + (i + 1) + " value=" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

					expertOptions += "<p class=\"course-title\">" + dataValues[0] + "</p>";

					if (dataValues[2] == "p1") {
						expertOptions += "<p class=\"course-part\"> Part 1 </p>"
					} else if (dataValues[2] == "p2") {
						expertOptions += "<p class=\"course-part\"> Part 2 </p>"
					} else if (dataValues[2] == "p3") {
						expertOptions += "<p class=\"course-part\"> Part 3 </p>"
					}

					expertOptions += "</li>";

				}

			}

			$("#intro-options").html("");
			$("#intermediate-options").html("");
			$("#expert-options").html("");

			$("#intro-options").append(introOptions);
			$("#intermediate-options").append(intermediateOptions);
			$("#expert-options").append(expertOptions);
		});
	});

$("#slctCourse").on("click",".course", function(e)
	{
		var idClicked = this.getAttribute("value");
		console.log(idClicked);
		//console.log($(e.target).text());
		//window.alert($(this).text());
		//console.log($(idClicked).text());
		//alert($(idClicked).text());
		$.getJSON("getDate.php?courses=" + $(idClicked), success = function(data)
		{
			alert(data[0]);
			console.log($(data));
			var stringData = data.toString();
			alert($(stringData));
			var date = "<p> The Date is "+data[0]+"</p>";

			$("#courseDate").html("");
			$("#courseDate").append(date);
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
