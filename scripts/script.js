src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">

$(document).ready(function()
{

	// Getting the track options from the database
	$.getJSON("getTracks.php", success = function(data) {
		var options = "";

		//Adding buttons onto the page based on the track info in the database
		for (var i = 0; i < data.length - 1; i++) {
			options += "<button class='track-option' id='button" + (i + 1) + "' value='" + data[i].toLowerCase() + "' onclick=\"populateList(this.innerHTML);\" type='button'>" + data[i] + "</button>";
		}

		options += "<button class='track-option track-option-last' id='button" + (data.length + 1) + "' value='" + data[data.length - 1].toLowerCase() + "' onclick=\"populateList(this.innerHTML);\" type='button'>" + data[data.length - 1] + "</button>";

		$("#slctTrack").append(options);

	});

	// Getting the course options from the database
	$("#slctTrack").on("click",".track-option", function(e)
		{

			// Separating courses into different difficulty sections for filtering purposes
			$("#intro-options").html("");
			$("#intermediate-options").html("");
			$("#expert-options").html("");

			// Let the user know the information is being fetched from the database
			$("#loading-1").fadeIn("fast", "swing");

			var idClicked = this;

			$.getJSON("getCourses.php?tracks=" + $(idClicked).val(), success = function(data)
			{
				// Let the user know the information has been fetched from the database
				$("#loading-1").fadeOut("fast", "swing");

				var introOptions = "";
				var intermediateOptions = "";
				var expertOptions = "";

				/* Go through every course in the database and put them into the respective difficulty section
				   based on the following keywords seperated by underbar:

					 nameOfCourse_difficultyLevel_partOfCourse

					 Following restrictions apply:
					 		difficultyLevel can only be either "intro", "med", or "exp"
					 		partOfCourse can only be "p1", "p2", "p3", etc.
				*/
				for (var i = 0; i < data.length; i++) {

					var dataValues = data[i].split('_');

					for (var j = 0; j < dataValues.length; j++) {
						dataValues[j] = dataValues[j].toLowerCase();
					}

					if (dataValues[1] == "intro") {

						introOptions += "<li id=course" + (i + 1) + " value='" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

						introOptions += "<p class=\"course-title\">" + idClicked.innerHTML + "</p>";

						introOptions += "<p class=\"course-part\"> Part " + dataValues[2].charAt(dataValues[2].length - 1) + " </p>"

						introOptions += "</li>";


					} else if (dataValues[1] == "med") {

						intermediateOptions += "<li id=course" + (i + 1) + " value='" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

						intermediateOptions += "<p class=\"course-title\">" + idClicked.innerHTML + "</p>";

						intermediateOptions += "<p class=\"course-part\"> Part " + dataValues[2].charAt(dataValues[2].length - 1) + " </p>"

						intermediateOptions += "</li>";


					} else if (dataValues[1] == "exp") {

						expertOptions += "<li id=course" + (i + 1) + " value='" + data[i].toLowerCase() + "' class='course' onclick=\"displayCourse(this);\" >";

						expertOptions += "<p class=\"course-title\">" + idClicked.innerHTML + "</p>";

						expertOptions += "<p class=\"course-part\"> Part " + dataValues[2].charAt(dataValues[2].length - 1) + " </p>"

						expertOptions += "</li>";

					}

				}

				// Remove all the courses already in the section so as to not add onto previously fetched courses
				$("#intro-options").html("");
				$("#intermediate-options").html("");
				$("#expert-options").html("");

				$("#intro-options").append(introOptions);
				$("#intermediate-options").append(intermediateOptions);
				$("#expert-options").append(expertOptions);

				// Indicate to the user if the difficulty section doesn't have any courses
				if (!introOptions) {
					$("#intro-options").append("<p class=\"no-course\"> No Courses Available Here </p>");
				}

				if (!intermediateOptions) {
					$("#intermediate-options").append("<p class=\"no-course\"> No Courses Available Here </p>");
				}

				if (!expertOptions) {
					$("#expert-options").append("<p class=\"no-course\"> No Courses Available Here </p>");
				}

			});
		});

	// Getting the course details from the database
	$("#slctCourse").on("click",".course", function(e)
	{
		var idClicked = this.getAttribute("value");
		$("#loading-2").fadeIn("fast", "swing");

		// Remove all previous elements from display
		$("#course-description").fadeOut("fast", "swing");

		$.getJSON("getDate.php?courses=" + idClicked, success = function(data)
		{
			$("#loading-2").fadeOut("fast", "swing");

			// Redisplay the course description after loading with new attributes
			$("#course-description").fadeIn("fast", "swing");

			// Extract the data fetched from the database to display onto the page
			var stringData = data.toString();
			var date = "<p> " + data[0] + "</p>";
			$("#courseDate").html("");
			$("#courseDate").append(date);

			if (data[3] == null)
			{
				var duration = "<p> N/A </p>";
			}
			else
			{
				var duration = "<p>" + data[3] + " days </p>";
			}
			$("#courseDuration").html("");
			$("#courseDuration").append(duration);

			if (data[4] == null)
			{
				var trainer = "<p> N/A </p>";
			}
			else
			{
				var trainer = "<p> " + data[4].toLowerCase() + " </p>";
			}
			$("#courseTrainer").html("");
			$("#courseTrainer").append(trainer);
		});

	});
});
