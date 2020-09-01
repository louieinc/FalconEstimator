<?php 
$performers = [
	'actor_on_camera' => 'On-Camera Principal',
	'actor_off_camera' => 'Voicover',
	'speciality_act' => 'Speciality Act',
	'print_model' => 'Print Model',
	'featured_extra' => 'Featured Extra',
	'extra' => 'Extra',
];
?>

<div class="question" id="nonunion">
	<h4>What type of Non-Union production are you hiring for?</h4>
	<div class="answer" data-set="nonunion" data-follow="nu-broadcast-cost nu-usage-length nu-usage nu-performers" data-value="tv">TV Commercial</div>
    <div class="answer" data-set="nonunion" data-follow="nu-broadcast-cost nu-usage-length nu-usage nu-performers" data-value="radio">Radio Commercial</div>
    <div class="answer" data-set="nonunion" data-follow="nu-broadcast-cost nu-usage-length nu-usage nu-performers" data-value="print">Print Model</div>
    <div class="answer" data-set="nonunion" data-follow="nu-broadcast-cost nu-usage-length nu-usage nu-performers" data-value="instructional">Instructional/Educational Video: Not Intended for Broadcast</div>
</div>

<div id="nu-performers" class="question">
	<h4>What type of performer will you be hiring for?</h4>
	<?php foreach($performers as $type => $label): ?>
		<?php FalconEstimator::slider($type, $label, 0, 0, 10, 1); ?>
	<?php endforeach; ?>
	<div class="answer special">Continue</div>
</div>

<?php foreach($performers as $type => $label): ?>
	<div id="nu-<?php echo $type ?>-cost" class="question">
		<h4>How much would you estimate the session fees for <?php echo $label ?>?</h4>
		<input type="number" name="<?php echo $type ?>" value="0">
		<div class="answer">Continue</div>
	</div>
	<div id="nu-<?php echo $type ?>-wardrobe" class="question">
		<h4>Is there a wardrobe fitting for <?php echo $label ?>?</h4>
		<div class="answer" data-set="<?php echo $type ?>_wardrobe" data-value="yes">Yes</div>
		<div class="answer" data-set="<?php echo $type ?>_wardrobe" data-value="no">No</div>
	</div>
	<div id="nu-<?php echo $type ?>-other" class="question">
		<h4>Other costs for <?php echo $label ?>?</h4>
		<input type="number" name="<?php echo $type ?>_other" value="0">
		<div class="answer">Continue</div>
	</div>
	<div id="nu-<?php echo $type ?>-reimbursments" class="question">
		<h4>Reimbursments costs for <?php echo $label ?>?</h4>
		<input type="number" name="<?php echo $type ?>_reimbursments" value="0">
		<div class="answer">Continue</div>
	</div>
<?php endforeach; ?>

<div id="nu-usage" class="question">
	<h4>Usage right desired?</h4>
	<div class="answer" data-set="usage" data-follow="nu-cycle1" data-value="Only as a Television Broadcast">Only as a Television Broadcast</div>
	<div class="answer" data-set="usage" data-follow="nu-cycle1" data-value="Only as a Radio Commercial">Only as a Radio Commercial</div>
	<div class="answer" data-set="usage" data-follow="nu-cycle2" data-value="Only as Print Material">Only as Print Material</div>
	<div class="answer" data-set="usage" data-follow="nu-cycle3" data-value="Only as Non-Air Video">Only as Non-Air Video</div>
	<div class="answer" data-set="usage" data-value="A combination of Two">A combination of Two</div>
	<div class="answer" data-set="usage" data-value="A combination of Three">A combination of Three</div>
	<div class="answer" data-set="usage" data-value="All Non-union Material shall be Utilized">All Non-union Material shall be Utilized</div>
</div>

<div id="nu-cycle1" class="question">
	<h4>Select desired use cycle</h4>
	<div class="answer" data-set="usage-cycle" data-value="Broadcast">Broadcast</div>
	<div class="answer" data-set="usage-cycle" data-value="Cable">Cable</div>
	<div class="answer" data-set="usage-cycle" data-value="Combination">Combination</div>
	<div class="answer" data-set="usage-cycle" data-value="Internet/New Media">Internet/New Media</div>
</div>

<div id="nu-cycle2" class="question">
	<h4>Select desired use cycle</h4>
	<div class="answer" data-set="usage-cycle" data-value="Point of Sale">Point of Sale</div>
	<div class="answer" data-set="usage-cycle" data-value="Out-Of-Home">Out-Of-Home</div>
	<div class="answer" data-set="usage-cycle" data-value="Direct-To-Home">Direct-To-Home</div>
	<div class="answer" data-set="usage-cycle" data-value="Print Media">Print Media</div>
	<div class="answer" data-set="usage-cycle" data-value="Internet Banners">Internet Banners</div>
	<div class="answer" data-set="usage-cycle" data-value="Exclusivity">Exclusivity</div>
</div>

<div id="nu-cycle3" class="question">
	<h4>Select desired use cycle</h4>
	<div class="answer" data-set="usage-cycle" data-value="Corporate Video">Corporate Video</div>
	<div class="answer" data-set="usage-cycle" data-value="Educational">Educational</div>
	<div class="answer" data-set="usage-cycle" data-value="Airports/Shopping Mall, Public Places">Airports/Shopping Mall, Public Places</div>
	<div class="answer" data-set="usage-cycle" data-value="Designed to Sell">Designed to Sell</div>
</div>

<div id="nu-usage-length" class="question">
	<h4>How long would you like to use the material "The Initial Term"?</h4>
	<div class="answer" data-set="usage-length" data-value="One Year">One Year?</div>
	<div class="answer" data-set="usage-length" data-value="Two Years">Two Years?</div>
	<div class="answer" data-set="usage-length" data-value="Three Years">Three Years?</div>
	<div class="answer" data-set="usage-length" data-value="Buyout?">Buyout?</div>
</div>

<div id="nu-broadcast-cost" class="question">
	<h4>How much you estimate for the broadcasting rights?</h4>
	<input type="number" name="broadcast_cost" value="0">
	<div class="answer">Continue</div>
</div>