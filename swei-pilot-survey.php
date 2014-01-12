<?php
error_reporting(E_PARSE);
?>
<!doctype html>
<html>
<head>
	<title>WEI Pilot</title>
	<style>
		body {
			font-family: serif;
			max-width: 800px;
		}

		table {
			max-width: 800px;
		}

		table, th, td {
			border: 1px solid #ccc;
		}

		th {
			white-space: nowrap;
		}

		th:first-of-type, td:first-of-type {
			text-align: left;
		}

		td {
			text-align: center;
		}

		input[type=text] {
			width: 50px;
		}

		#conflict-scale tr > td {
			width: 11%;
		}
		#conflict-scale tr > td:first-child {
			width: 34%;
		}
		.heading-agree-text { display: none; }
	</style>
</head>
<body>

<h1>The Stressful Work Event Inventory</h1>

<p>Each of us experience different events in our work lives, many of which are "stressful."
	Some people find certain events easy to adjust to, while others find adjusting to the same event difficult.
	Occupational readjustment measures how much and how long it will take for a person to adjust or deal with a
	"stressful" work event.</p>

<p>This event must happen to you. This is different then it happening to someone you know or you witnessing the event
	happen to someone else.
	For example, you lose your job versus seeing a coworker be fired.</p>

<p>For each event listed below, indicate YOUR estimate about the amount of adjustment YOU would need in order to deal
	with that event.
	Indicate your response using any number on a 100 point scale, with "1" being the least adjustment needed and "100"
	being the most adjustment needed.</p>

<p>For example, if YOU THINK little adjustment in your life would be needed to deal with the event, write in a low
	number.
	If YOU THINK a lot of adjustment would be needed to deal with the event, write in a high number.</p>

<p>Using the same list of work events, please indicate now THE FREQUENCY with which YOU have experienced each work event
	during the last 12 months.
	This is your personal experience of the event.</p>

<p>If you have HAVE NOT experienced the event in the last 12 months, place "0" in frequency column.</p>

<table cellpadding="5">
	<tr>
		<th>Event</th>
		<th>Adjustment Rating</th>
		<th>Frequency</th>
	</tr>

	<?php
	ob_start();
	?>
	Loss of job-forced retirement
	Loss of job-unemployed
	Transferred to a new position
	Major business readjustment (e.g., merger, reorganization, consolidation of customer companies)
	Quit job-now retired
	Quit job-now unemployed
	Acquired new job with another company
	Relocation
	New boss/coworkers/team
	Major conflict with boss
	Major conflict with coworkers/team
	Major conflict with customer/client
	Pay cut, furlough, or loss of benefits
	Major change in responsibilities at work (e.g., promotion,demotion, lateral transfer)
	Mandatory overtime
	Major change in working hours or conditions
	Viewing a workplace death (e.g., death of a coworker/boss/customer)
	Work injury/disability
	Job redesign or change in workload (e.g., traveling, shift change, hours)
	Sexual harassment
	Discrimination
	Poor performance evaluation
	IF SELF-EMPLOYED: business readjustment (e.g., merger, reorganization, bankruptcy)
	Entry into workforce (first job)
	Reentry into workforce
	Changed to a different line of work
	Job search
	Nonwork demands required change in work status/schedule
	Unethical work assignment
	Being the victim of workplace violence (e.g., being robbed,coworker abuse)
	Working while on vacation
	<?php
	$event_list = ob_get_contents();
	$event_list = preg_replace("|\n\n|", '', $event_list);
	ob_end_clean();
	$event_listArr = explode("\n", $event_list);
	$max = count($event_listArr);
	for ($x = 0; $x < $max; $x++) {
		if (trim($event_listArr[$x]) != '') {
			$n = $x + 1; // For display and reference
			?>
			<tr>
				<td><?php echo $n . '. ' . trim($event_listArr[$x]); ?></td>
				<td><input type="text" name="Event<?php echo $n; ?>Adjustment"/></td>
				<td><input type="text" name="Event<?php echo $n; ?>Frequency"/></td>
			</tr>
		<?php
		}
	}
	?>
</table>


<h1>Work-Family Conflict Scale</h1>

<p>Please indicate your agreement to the following statements.</p>

<strong>Rating Scale (1-6): (1) Strongly Disagree; (2) Disagree; (3) Slightly Disagree; (4) Slightly
	Agree; (5) Agree; (6) Strongly Agree</strong>

<table cellpadding="5" id="conflict-scale">
	<tr>
		<th>Event</th>
		<th>(1)<br/><span class="heading-agree-text">(Strongly Disagree)</span></th>
		<th>(2)<br/><span class="heading-agree-text">(Disagree)</span></th>
		<th>(3)<br/><span class="heading-agree-text">(Slightly Disagree)</span></th>
		<th>(4)<br/><span class="heading-agree-text">(Slightly Agree)</span></th>
		<th>(5)<br/><span class="heading-agree-text">(Agree)</span></th>
		<th>(6)<br/><span class="heading-agree-text">(Strongly Agree)</span></th>
	</tr>
	<?php
	ob_start();
	?>
	The demands of my work interfere with my home and family life.
	The amount of time my job takes up makes it difficult to fulfill family responsibilities.
	Things I want to do at home do not get done because of the demands my job puts on me.
	My job produces strain that makes it difficult to fulfill family duties.
	Due to work-related duties, I have to make changes to my plans for family activities.
	<?php
	$conflict_list = ob_get_contents();
	ob_end_clean();
	$conflict_listArr = explode("\n", $conflict_list);
	$max = count($conflict_listArr);
	for ($x = 0; $x < $max; $x++) {
		if (trim($conflict_listArr[$x]) != '') {
			?>
			<tr>
				<td><?php echo ($x + 1) . '. ' . $event_listArr[$x]; ?></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="1"/></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="2"/></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="3"/></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="4"/></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="5"/></td>
				<td><input type="radio" name="Event<?php echo $x; ?>Conflict" value="6"/></td>
			</tr>
		<?php
		}
	}
	?>
</table>
</body>
</html>