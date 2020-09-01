<?php
	$performers = [
		'announcer' => 'Announcer',
		'solo_duo' => 'Solo or Duo',
		'group_3' => 'Group 3-5',
		'group_6' => 'Group 6-8',
		'group_9' => 'Group 9 or more',
		'creative_session' => 'Creative Session Calls',
		'singers_contractors' => 'Singers Contractors',
	];
?>

<div class="question" id="radio_made_in_played_in">
	<h4>Is this a Made-in/Played-in (local)?</h4>
	<div class="answer" data-set="made_in_played_in" data-value="1" data-follow="thank-you final agent contributions radio_mipi-stop radio_multitracking radio_sweetening radio_prod_full_term">Yes</div>
	<div class="answer" data-set="made_in_played_in" data-value="0" data-follow="thank-you final agent contributions radio-stop radio_multitracking radio_sweetening radio_performers">No</div>
</div>

<div class="question" id="radio_performers">
	<h4>What type of performer will you be hiring for?</h4>
	<?php
		foreach ($performers as $type => $label) {
			if ($type == 'creative_session') {
				FalconEstimator::slider($type, $label, 0, 0, 10, 0.5);
			} else {
				FalconEstimator::slider($type, $label);	
			}
		}
	?>
	<div class="answer special">Continue</div>
</div>

<div class="question" id="radio_creative_sessions">
	<h4>How many hours for creative session?</h4>
	<?php FalconEstimator::slider('creative_hours', '', 1, 1, 10, 0.5); ?>
	<div class="answer">Continue</div>
</div>

<?php foreach ($performers as $type => $label): ?>
<div class="question" id="radio_<?php echo $type ?>_weekend">
	<h4>Weekend or Holiday work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="radio_<?php echo $type ?>_weekend_days" data-set="<?php echo $type ?>_weekend" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_weekend" data-value="0">No</div>
</div>
<div class="question" id="radio_<?php echo $type ?>_weekend_days">
	<h4>How many days?</h4>
    <?php FalconEstimator::slider($type.'_weekend_days', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="radio_<?php echo $type ?>_nightwork">
	<h4>Nightwork work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="radio_<?php echo $type ?>_nightwork_time" data-set="<?php echo $type ?>_nightwork" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_nightwork" data-value="0">No</div>
</div>
<div class="question" id="radio_<?php echo $type ?>_nightwork_time">
	<h4>How many hours?</h4>
	<?php FalconEstimator::slider($type.'_nightwork_time', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="radio_<?php echo $type ?>_travel">
	<h4>Travel reimbursements work for <span><?php echo $label ?></span>?</h4>
	<input type="number" name="<?php echo $type ?>_travel" value="0" placeholder="value in $">
	<div class="answer">Continue</div>
</div>
<?php endforeach; ?>

<div class="question" id="radio_multitracking">
	<h4>Session with multi-tracking?</h4>
	<div class="answer" data-set="radio_multitracking" data-value="1">Yes</div>
    <div class="answer" data-set="radio_multitracking" data-value="0">No</div>
</div>

<div class="question" id="radio_sweetening">
	<h4>Session with sweetening?</h4>
	<div class="answer" data-set="radio_sweetening" data-value="1">Yes</div>
    <div class="answer" data-set="radio_sweetening" data-value="0">No</div>
</div>

<div id="radio-stop" class="question">
    <h4>Would you like to estimate perform usage costs?</h4>
    <div class="answer" data-follow="radio_broadcast">Yes</div>
    <div class="answer">No, estimate for talent session fees only</div>
</div>

<div class="question" id="radio_broadcast">
	<h4>How will the commercial air?</h4>
	<div class="answer multi" data-set="wildspot" data-value="1">Wildspot</div>
	<div class="answer multi" data-set="network" data-value="1">Network Program Commercial</div>
	<div class="answer multi" data-set="regional" data-value="1">Regional Network with at least one major</div>
	<div class="answer multi" data-set="program" data-value="1">Program Commercial - 13 weeks no Majors</div>
	<div class="answer multi" data-set="local" data-value="1">Local Program Uses</div>
	<div class="answer multi" data-set="radio_dealer" data-value="1">Dealer</div>
	<div class="answer multi" data-set="internet" data-value="1">Move Over for Internet</div>
	<div class="answer multi" data-set="newmedia" data-value="1">Move Over for New Media</div>
	<div class="answer multi" data-set="internet2" data-value="1">Made for Internet</div>
	<div class="answer multi" data-set="newmedia2" data-value="1">Made Over for New Media</div>
	<div class="answer multi" data-set="radio_foreign" data-value="1">Foreign Use - 18 months </div>
	<div class="answer multi" data-set="single_market" data-value="1">Single Market Commercial</div>
	<div class="answer multi" data-set="demo" data-value="1">Demos, Copy Tests, Non-Air (1 hour session)</div>
	<div class="answer special">Continue</div>
</div>

<div id="radio_wildspot_weeks" class="question">
	<h4>How many weeks for wildspot?</h4>
	<div class="answer" data-set="wildspot_weeks" data-value="8">8 Weeks</div>
	<div class="answer" data-set="wildspot_weeks" data-value="13">13 Weeks</div>
</div>

<div class="question" id="radio_wildspot_cycles">
	<h4>How many cycles for Wildspot?</h4>
	<?php FalconEstimator::slider('radio_wildspot_cycles', '', 1, 1, 7); ?>
	<div class="answer">Continue</div>
</div>

<div id="radio_wildspot_markets" class="question">
	<h4>In which market(s) will your spot air?</h4>
    <input type="text" class="js-autocomplete" style="display:none" name="markets" placeholder="Add markets...">
    <div class="answer">Continue</div>
</div>
<div id="radio_wildspot_markets_nonmajor" class="question">
	<h4>How many non-major markets?</h4>
    <?php FalconEstimator::slider('markets_nonmajor', '', 0, 0, 50); ?>
    <div class="answer">Continue</div>
</div>

<div id="radio_network_weeks" class="question">
	<h4>Select desired use cycle for Network Program Commercial?</h4>
	<div class="answer" data-set="network_cycle" data-value="1_week_unlimited">1 week unlimited use</div>
	<div class="answer" data-set="network_cycle" data-value="4_week_unlimited">4 weeks unlimited use</div>
	<div class="answer" data-set="network_cycle" data-value="8_week_unlimited">8 weeks unlimited use</div>
	<div class="answer" data-set="network_cycle" data-value="13_week_unlimited">13 weeks unlimited use</div>
	<div class="answer" data-set="network_cycle" data-value="13_week_26_uses">26 uses in 13 weeks</div>
	<div class="answer" data-set="network_cycle" data-value="13_week_39_uses">39 uses in 13 weeks</div>
	<div class="answer" data-set="network_cycle" data-value="13_week_accross">13 weeks use on across-the-board programs</div>
</div>

<div id="radio_dealer_cycle" class="question">
	<h4>Select desired use cycle Dealer?</h4>
	<div class="answer" data-set="radio_dealer_cycle" data-value="26_weeks">26 weeks</div>
	<div class="answer" data-set="radio_dealer_cycle" data-value="8_weeks">8 weeks</div>
	<div class="answer" data-set="radio_dealer_cycle" data-value="26_weeks_effects">Sound Effects Perfomers - Session + Initial 26-weeks' use</div>
	<div class="answer" data-set="radio_dealer_cycle" data-value="8_weeks_effects">Sound Effects Perfomers - Session + Initial 8-weeks' use</div>
</div>

<div id="radio_internet_cycle" class="question">
	<h4>Select desired use cycle for Move over Internet?</h4>
	<div class="answer" data-set="internet_cycle" data-value="4week">4 weeks</div>
	<div class="answer" data-set="internet_cycle" data-value="8week">8 weeks</div>
	<div class="answer" data-set="internet_cycle" data-value="1year">1 Year Option</div>
</div>

<div id="radio_newmedia_cycle" class="question">
	<h4>Select desired use cycle for Move over New Media?</h4>
	<div class="answer" data-set="newmedia_cycle" data-value="4week">4 weeks</div>
	<div class="answer" data-set="newmedia_cycle" data-value="8week">8 weeks</div>
	<div class="answer" data-set="newmedia_cycle" data-value="1year">1 Year Option</div>
</div>

<div id="radio_internet2_cycle" class="question">
	<h4>Select desired use cycle for Move over Internet?</h4>
	<div class="answer" data-set="internet2_cycle" data-value="4week">4 weeks</div>
	<div class="answer" data-set="internet2_cycle" data-value="8week">8 weeks</div>
	<div class="answer" data-set="internet2_cycle" data-value="1year">1 Year Option</div>
</div>

<div id="radio_newmedia2_cycle" class="question">
	<h4>Select desired use cycle for Move over New Media?</h4>
	<div class="answer" data-set="newmedia2_cycle" data-value="4week">4 weeks</div>
	<div class="answer" data-set="newmedia2_cycle" data-value="8week">8 weeks</div>
	<div class="answer" data-set="newmedia2_cycle" data-value="1year">1 Year Option</div>
</div>

<div id="radio_single_market_cycle" class="question">
	<h4>Select desired use cycle for Single Market?</h4>
	<div class="answer" data-set="single_market_cycle" data-value="13_week">13 Week Option</div>
	<div class="answer" data-set="single_market_cycle" data-value="1_year">1 Year PREPAID Use</div>
</div>