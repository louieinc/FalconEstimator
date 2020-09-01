<div class="question" id="industrial_category">
	<h4>What is the category of the production?</h4>
	<div class="answer" data-set="category" data-follow="industrial_performers" data-value="category1">Category I</div>
    <div class="answer" data-set="category" data-follow="industrial_performers" data-value="category2">Cagegory II</div>
    <div class="answer" data-set="category" data-follow="ivr_options" data-value="ivr">IVR/Phone Prompts</div>
    <div class="answer" data-set="category" data-follow="storecast_cycle storecast_clients" data-value="storecast">Storecast</div>
</div>

<div class="question" id="industrial_performers">
	<h4>What type of performer will you be hiring for?</h4>
	<div class="answer" data-set="performer" data-value="on">On-Camera Performer - 1 Day</div>
	<div class="answer" data-set="performer" data-value="on_half">On-Camera Performer - Half-Day</div>
	<div class="answer" data-set="performer" data-value="on_3">On-Camera Performer - 3 Days</div>
	<div class="answer" data-set="performer" data-value="on_w">On-Camera Performer - Weekly</div>
    <div class="answer" data-set="performer" data-follow="spokesperson_days" data-value="spokesperson">On-Camera Spokesperson</div>
    <div class="answer" data-set="performer" data-follow="offcamera_addl" data-value="off">Off-Camera, 1st Hour</div>
    <div class="answer" data-set="performer" data-follow="" data-value="off_short">Off-Camera, 3 mins or less, half hour</div>
    <div class="answer" data-set="performer" data-follow="offcamera_retakes_addl" data-value="off_retakes">Off-Camera, Retakes Entire Script, (One Hour)</div>
    <div class="answer" data-set="performer" data-value="off_retakes2">Off-Camera, Retakes Partial Script (30 Minutes)</div>
</div>

<div class="question" id="ivr_options">
	<h4>How long is the recording?</h4>
	<div class="answer" data-set="ivr_hours" data-value="1">1 hour</div>
	<div class="answer" data-set="ivr_hours" data-value="0.5">1/2 hour</div>
	<div class="answer" data-set="ivr_hours" data-follow="ivr_overtime" data-value="1">Overtime</div>
</div>

<div class="question" id="ivr_overtime">
	<h4>How much overtime?</h4>
	<?php FalconEstimator::slider('ivr_hours', '', 1, 1, 5, 0.5); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="storecast_clients">
	<h4>Are there multiple clients?</h4>
	<div class="answer" data-set="storecast_client" data-value="1.4795">Yes</div>
	<div class="answer" data-set="storecast_client" data-value="1">No</div>
</div>

<div class="question" id="storecast_cycle">
	<h4>How long will you use the recording for?</h4>
	<div class="answer" data-set="storecast_cycle" data-value="3">3 month</div>
    <div class="answer" data-set="storecast_cycle" data-value="6">6 month</div>
</div>

<div class="question" id="spokesperson_days">
	<h4>How many days?</h4>
	<?php FalconEstimator::slider('spokesperson_addl', '', 1, 1, 10, 1); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="oncamera_days">
	<h4>How many days days?</h4>
	<?php FalconEstimator::slider('on_addl', '', 1, 1, 10, 1); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="offcamera_addl">
	<h4>How long is the recording?</h4>
	<?php FalconEstimator::slider('off_addl', '', 1, 1, 5, 0.5); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="offcamera_retakes_addl">
	<h4>How long is the recording?</h4>
	<?php FalconEstimator::slider('off_retakes_addl', '', 0.5, 0.5, 5, 0.5); ?>
	<div class="answer">Continue</div>
</div>
