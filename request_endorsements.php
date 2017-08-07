<?php
 echo '
 	<script type="text/javascript">
		$(document).ready(function(){
			$(".datepicker").pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 100, // Creates a dropdown of 15 years to control year
				max: true
			});
			
			$("select").material_select();
				
			$(".timepicker").pickatime({
				//default: "now", // Set default time; do not set default time in viewing of time
				fromnow: 0,       // set default time to * milliseconds from now (using with default = "now")
				twelvehour: true, // Use AM/PM or 24-hour format
				donetext: "DONE", // text for done-button
				cleartext: "Clear", // text for clear-button
				canceltext: "Cancel", // Text for cancel-button
				autoclose: false, // automatic close timepicker
				ampmclickable: false, // make AM PM clickable
				aftershow: function(){} //Function for after opening timepicker  
			});
		});
 	</script>
 	<h4 class="center">BAPTISMAL</h4>
	<div class="row">
		<div class="input-field col s12">
			<input type="date" class="datepicker" id="BaptismalDate" name="BaptismalDate" disabled>
			<label for="BaptismalDate" class>When were you baptized?</label>
		</div>
		<div class="input-field col s12">
			<input type="text" name="BaptismalPlace" id="BaptismalPlace" data-length="50" maxlength="50" disabled>
			<label for="BaptismalPlace">Where were you baptized?</label>
		</div>
		<h4 class="center">DGROUP</h4>
			<div class="input-field col s12">
				<select id="DgroupType" name="DgroupType" disabled>
					<option value="" disabled selected>Choose your option...</option>
					<option value="Youth">Youth</option>
					<option value="Singles">Singles</option>
					<option value="Single_Parents">Single Parents</option>
					<option value="Married">Married</option>
					<option value="Couples">Couples</option>
				</select>
				<label>Type of Dgroup</label>
			</div>
		<div class="input-field col s12">
			<input type="text" name="AgeBracket" id="AgeBracket" data-length="5" maxlength="5" placeholder="ex. 13-25" onkeypress='."'".'return event.charCode == 45 || ( event.charCode >= 48 && event.charCode <= 57 )//only numbers on keypress'."'".' disabled>
			<label for="AgeBracket">Age Bracket</label>
		</div>
		<h4 class="center">MEETING</h4>
			<div class="input-field col s12">
				<select id="MeetingDay" name="MeetingDay" disabled>
					<option value="" disabled selected>Choose your option...</option>
					<option value="Sunday">Sunnday</option>
					<option value="Monday">Monday</option>
					<option value="Tuesday">Tuesday</option>
					<option value="Wednesday">Wednesday</option>
					<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
					<option value="Saturday">Saturday</option>
				</select>
				<label>Day</label>
			</div>
		<div class="input-field col s6">
			<label for="timepicker1opt1">Start Time</label>
			<input type="date" class="timepicker" name="timepicker1opt1" id="timepicker1opt1" disabled>
		</div>
		<div class="input-field col s6">
			<label for="timepicker1opt2">End Time</label>
			<input type="date" class="timepicker" name="timepicker1opt2" id="timepicker1opt2" disabled>
		</div>
		<div class="input-field col s12">
			<input type="text" name="MeetingPlace" id="MeetingPlace" data-length="50" maxlength="50" disabled>
			<label for="MeetingPlace">Place</label>
		</div>
	</div>
	';
?>