<?php
	$performers = [
		'announcer' => 'Actor/Announcer',
	];
?>

<div class="question" id="radio_prod_full_term">	
	<h4>Production only or full term (signatory)?</h4>
	<div class="answer" data-set="prod_full_term" data-value="prod_only" data-follow="radio_mipi_performers">Production Only</div>
	<div class="answer" data-set="prod_full_term" data-value="full_term" data-follow="radio_mipi_performers">Full Term (signatory)</div>
</div>

<div class="question" id="radio_mipi_performers">	
	<h4>What type of performer will you be hiring for?</h4>
	<?php
		foreach ($performers as $type => $label) {
			FalconEstimator::slider($type, $label);
		}
	?>
	<div class="answer special">Continue</div>
</div>



<div id="radio_mipi-stop" class="question">
    <h4>Would you like to estimate performer usage costs?</h4>
    <div class="answer" data-follow="radio_mipi_cycle">Yes</div>
    <div class="answer">No, estimate for talent session fees only</div>
</div>

<div id="radio_mipi_cycle" class="question">
	<h4>Select desired use cycle for Made-in/Played in (local)</h4>
	<div class="answer" data-set="mipi_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="13week">13 Week Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="1year">1 year Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="21month">21 months Option</div>
</div>

