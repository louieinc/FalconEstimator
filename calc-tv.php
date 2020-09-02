<?php
	$performers = [
		'actor_on_camera' => 'On-Camera Principal',
		'stunt_performer' => 'Stunt Performer',
		'pilot' => 'Pilot',
		'speciality_act' => 'Speciality Act',
		'dancer' => 'Dancer',
		'actor_off_camera' => 'Off-Cameral Principal',
		'singer' => 'Singer',
		'extra' => 'Extra Performer',
	];
?>
<div class="question" id="tv_made_in_played_in">
	<h4>Is this a Made-in/Played-in (local)?</h4>
	<div class="answer" data-set="made_in_played_in" data-value="1" data-follow="thank-you final above_scale contributions agent tv_mipi-stop tv_prod_full_term">Yes</div>
	<div class="answer" data-set="made_in_played_in" data-value="0" data-follow="thank-you final above_scale contributions agent tv-stop tv_performers">No</div>
</div>

<div class="question" id="tv_performers">	
	<h4>What type of performer will you be hiring for?</h4>
	<?php
		foreach ($performers as $type => $label) {
			FalconEstimator::slider($type, $label);
		}
	?>
	<div class="answer special">Continue</div>
</div>
<?php foreach ($performers as $type => $label): $default = $type=='actor_off_camera' ? 2 : 8; ?>
<div class="question" id="tv_<?php echo $type ?>_hours" >
	<h4>How many hours for <span><?php echo $label ?></span>?</h4>
	<?php FalconEstimator::slider( $type.'_hours', '', $default, $default, 12 ); ?>
	<div class="answer" data-show="tv">Continue</div>
</div>
<?php endforeach; ?>

<?php foreach ($performers as $type => $label): ?>

<div class="question" id="tv_<?php echo $type ?>_weekend">
	<h4>Weekend or Holiday work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="tv_<?php echo $type ?>_weekend_days" data-set="<?php echo $type ?>_weekend" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_weekend" data-value="0">No</div>
</div>
<div class="question" id="tv_<?php echo $type ?>_weekend_days">
	<h4>How many days?</h4>
    <?php FalconEstimator::slider($type.'_weekend_days', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="tv_<?php echo $type ?>_nightwork">
	<h4>Nightwork work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="tv_<?php echo $type ?>_nightwork_time" data-set="<?php echo $type ?>_nightwork" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_nightwork" data-value="0">No</div>
</div>
<div class="question" id="tv_<?php echo $type ?>_nightwork_time">
	<h4>How many hours?</h4>
	<?php FalconEstimator::slider($type.'_nightwork_time', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="tv_<?php echo $type ?>_travel">
	<h4>Travel reimbursments work for <span><?php echo $label ?></span>?</h4>
	<input type="number" name="<?php echo $type ?>_travel" value="0" placeholder="value in $">
	<div class="answer">Continue</div>
</div>

<?php if (in_array($type, ['actor_on_camera', 'actor_off_camera'])): ?>
	<div class="question" id="tv_<?php echo $type ?>_lift1">
		<h4>1st lift for <span><?php echo $label ?></span>?</h4>
		<div class="answer" data-follow="tv_<?php echo $type ?>_lift2" data-set="<?php echo $type ?>_lift1" data-value="1">Yes</div>
    	<div class="answer" data-set="<?php echo $type ?>_lift1" data-value="0">No</div>
	</div>
	<div class="question" id="tv_<?php echo $type ?>_lift2">
		<h4>2nd lift for <span><?php echo $label ?></span>?</h4>
		<div class="answer" data-set="<?php echo $type ?>_lift2" data-value="1">Yes</div>
    	<div class="answer" data-set="<?php echo $type ?>_lift2" data-value="0">No</div>
	</div>
<?php endif; ?>

<?php endforeach; ?>

<div class="question" id="tv_on_camera_tags">
	<h4>How many on camera tags will you need?</h4>
	<input type="number" name="tv_on_camera_tags" value="1" placeholder="1">
    <div class="answer">Continue</div>
</div>

<div class="question" id="tv_off_camera_tags">
	<h4>How many tags will you need?</h4>
	<input type="number" name="tv_off_camera_tags" value="1" placeholder="1">
    <div class="answer">Continue</div>
</div>

<div class="question" id="tv_singers">
	<h4>How many singers will you need?</h4>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="solo">Solo or Duo</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_3">Group 3-5</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_6">Group 6-8</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_9">Group 9 or more</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="solo_signature">Signature - Solo or Duo</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_3_signature">Group Signature 3-5</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_6_signature">Group Signature 6-8</div>
	<div class="answer" data-set="<?php echo $type ?>_singers" data-value="group_9_signature">Group Signature 9+</div>
    <div class="answer">Continue</div>
</div>

<div class="question" id="tv_multitracking">
	<h4>Session with multi-tracking?</h4>
	<div class="answer" data-set="tv_multitracking" data-value="1">Yes</div>
    <div class="answer" data-set="tv_multitracking" data-value="0">No</div>
</div>

<div class="question" id="tv_travel_days_actor_on_camera">
	<h4>How many travel days for on-camera principal?</h4>
	<?php FalconEstimator::slider('actor_on_camera_travel_days', '', 0, 0, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="tv_travel_days_stunt_performer">
	<h4>How many travel days for stunt performer?</h4>
	<?php FalconEstimator::slider('stunt_performer_travel_days', '', 0, 0, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="tv_sweetening">
	<h4>Session with sweetening?</h4>
	<div class="answer" data-set="tv_sweetening" data-value="1">Yes</div>
    <div class="answer" data-set="tv_sweetening" data-value="0">No</div>
</div>

<div id="tv-stop" class="question">
    <h4>Would you like to estimate usage costs?</h4>
    <div class="answer" data-follow="tv_broadcast">Yes</div>
    <div class="answer">No, estimate for talent session fees only</div>
</div>

<div class="question" id="tv_broadcast">
	<h4>How will the commercial air?</h4>
	<div class="answer multi" data-set="wildspot" data-value="1">Wildspot 13-weeks</div>
	<div class="answer multi" data-set="program_a" data-value="1">Program Class A ":30"</div>
	<div class="answer multi" data-set="cable" data-value="1">Cable Only</div>
	<div class="answer multi" data-set="local_cable" data-value="1">Local Cable</div>
	<div class="answer multi" data-set="spanish" data-value="1">Spanish Language Program</div>
	<div class="answer multi" data-set="spanish_wildspot" data-value="1">Spanish Language Wild Spot</div>
	<div class="answer multi" data-set="dealer" data-value="1">Dealer Commercial</div>
	<div class="answer multi" data-set="internet" data-value="1">Move Over for Internet</div>
	<div class="answer multi" data-set="newmedia" data-value="1">Move Over for New Media</div>
	<div class="answer multi" data-set="internet2" data-value="1">Made for Internet</div>
	<div class="answer multi" data-set="newmedia2" data-value="1">Made for New Media</div>
	<div class="answer multi" data-set="demo" data-value="1">Demo</div>
	<div class="answer multi" data-set="psa" data-value="1">PSA</div>
	<div class="answer multi" data-set="foreign" data-value="1">Foreign Use</div>
	<div class="answer multi" data-set="theatrical" data-value="1">Theatrical/Industrial use</div>	
	<div class="answer special">Continue</div>
</div>

<div id="tv_wildspot_cycles" class="question">
	<h4>How many cycles for Wildspot?</h4>
	<?php FalconEstimator::slider('tv_wildspot_cycles', '', 1, 1, 7); ?>
	<div class="answer">Continue</div>
</div>

<div id="tv_wildspot_markets" class="question">
	<h4>In which market(s) will your spot air?</h4>
    <input type="text" class="js-autocomplete" style="display:none" name="markets" placeholder="Add markets...">
    <div class="answer" data-follow="tv_wildspot_markets_nonmajor">Continue</div>
</div>

<div id="tv_wildspot_markets_nonmajor" class="question">
	<h4>How many non-major markets?</h4>
    <?php FalconEstimator::slider('markets_nonmajor', '', 0, 0, 50); ?>
    <div class="answer">Continue</div>
</div>

<div id="tv_spanish_wildspot_markets" class="question">
	<h4>In which market(s) will your spot air?</h4>
    <input type="text" class="js-autocomplete2" style="display:none" name="markets" placeholder="Add markets...">
    <div class="answer">Continue</div>
</div>

<div id="tv_program_a_uses_guarantee" class="question">
	<h4>Guaranteed 13 uses?</h4>
	<div class="answer" data-follow="tv_program_a_uses_quarantee_count" data-set="tv_program_a_guarantee" data-value="1">Yes</div>
    <div class="answer" data-follow="tv_program_a_uses" data-set="tv_program_a_guarantee" data-value="0">No</div>
</div>

<div id="tv_program_a_uses" class="question">
	<h4>How many total uses?</h4>
	<?php FalconEstimator::slider('tv_program_a_uses', '', 1, 1, 500); ?>
	<div class="answer">Continue</div>
</div>

<div id="tv_program_a_uses_quarantee_count" class="question">
	<h4>How many uses above 13?</h4>
	<?php FalconEstimator::slider('tv_program_a_uses', '', 13, 13, 500); ?>
	<div class="answer">Continue</div>
</div>

<div id="tv_cable" class="question">
	<h4>How many cable units for Cable Only?</h4>
	<?php FalconEstimator::slider('cable_units', '', 1, 1, 3000); ?>
	<div class="answer">Continue</div>
</div>

<div id="tv_local_cable" class="question">
	<h4>How many subscribers for local cable?</h4>
	<div class="answer" data-set="local_cable_subscribers" data-value="50k">1 - 50,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="100k">50,001 - 100,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="150k">100,001 - 150,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="200k">150,001 - 200,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="250k">200,001 - 250,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="500k">250,001 - 500,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="750k">500,001 - 750,000</div>
    <div class="answer" data-set="local_cable_subscribers" data-value="1000k">750,001 - 1,000,000</div>
</div>

<div id="tv_spanish" class="question">
	<h4>Spanish program with additional units?</h4>
	<div class="answer" data-set="tv_spanish_additional" data-value="1">Yes</div>
    <div class="answer" data-set="tv_spanish_additional" data-value="0">No</div>
</div>

<div id="tv_dealer_type" class="question">
	<h4>Dealer A or B?</h4>
	<div class="answer" data-set="dealer" data-value="A">A</div>
    <div class="answer" data-set="dealer" data-value="B">B</div>
</div>

<div id="tv_dealer_cycle" class="question">
	<h4>Select desired use cycle for Dealer Commercial</h4>
	<div class="answer" data-set="dealer_cycle" data-value="6m_ny">6 Months W/ New York</div>
    <div class="answer" data-set="dealer_cycle" data-value="6m">6 Months W/O New York</div>
</div>

<div id="tv_internet_cycle" class="question">
	<h4>Select desired use cycle for Move over for Internet</h4>
	<div class="answer" data-set="internet_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="internet_cycle" data-value="8week">8 Week Option</div>
    <div class="answer" data-set="internet_cycle" data-value="1year">1 year Option</div>
</div>

<div id="tv_newmedia_cycle" class="question">
	<h4>Select desired use cycle for Move over for New Media</h4>
	<div class="answer" data-set="newmedia_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="newmedia_cycle" data-value="8week">8 Week Option</div>
    <div class="answer" data-set="newmedia_cycle" data-value="1year">1 year Option</div>
</div>

<div id="tv_internet2_cycle" class="question">
	<h4>Select desired use cycle for Move over for Internet</h4>
	<div class="answer" data-set="internet2_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="internet2_cycle" data-value="8week">8 Week Option</div>
    <div class="answer" data-set="internet2_cycle" data-value="1year">1 year Option</div>
</div>

<div id="tv_newmedia2_cycle" class="question">
	<h4>Select desired use cycle for Move over for New Media</h4>
	<div class="answer" data-set="newmedia2_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="newmedia2_cycle" data-value="8week">8 Week Option</div>
    <div class="answer" data-set="newmedia2_cycle" data-value="1year">1 year Option</div>
</div>

<div id="tv_foreign" class="question">
	<h4>Select countries for foreign use</h4>
	<div class="answer" data-set="foreign_modifier" data-value="9">Worldwide</div>
	<div class="answer" data-set="foreign_modifier" data-value="3">U.K.</div>
	<div class="answer" data-set="foreign_modifier" data-value="2">Europe</div>
	<div class="answer" data-set="foreign_modifier" data-value="2">Asia/Pacific</div>
	<div class="answer" data-set="foreign_modifier" data-value="1">Rest of the World</div>
	<div class="answer" data-set="foreign_modifier" data-value="1">Japan</div>
</div>

