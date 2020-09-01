<?php global $fpe; ?>
<div id="fpe">
    <div class="project-title print-only">
        <h5>Project title: <span id="project_title"></span></h5>
        <h5>Project ID: <span id="project_id"></span></h5>
        <h5>Project Notes:</h5>
        <div class="notes print-only">
            <pre id="project_notes"></pre>
        </div>
    </div>
    <div class="question" id="commercial-type" style="display: block;">
        <h4>What kind of production are you hiring for?</h4>
        <div class="answers">
            <div class="answer" data-follow="tv_made_in_played_in" data-type="tv">Television Commercial (union)</div>
            <div class="answer" data-follow="radio_made_in_played_in" data-type="radio">Radio Commercial (union)</div>
            <div class="answer" data-follow="thank-you final agent contributions industrial_category" data-type="industrial">Corporate/Educational Non-Broadcast (union)</div>
            <div class="answer" data-follow="thank-you final agent contributions nonunion" data-type="nonunion">Non-union</div>            
        </div>
    </div>
    <?php include dirname(__FILE__).'/calc-tv.php'; ?>
    <?php include dirname(__FILE__).'/calc-radio.php'; ?>
    <?php include dirname(__FILE__).'/calc-corporate.php'; ?>
    <?php include dirname(__FILE__).'/calc-nonunion.php'; ?>
    <?php include dirname(__FILE__).'/calc-madeinplayedin_tv.php'; ?>
    <?php include dirname(__FILE__).'/calc-madeinplayedin_radio.php'; ?>
    <div id="agent" class="question">
        <h4>Talent Agent Service Fee (percent)</h4>
        <?php FalconEstimator::slider('agent_fee', '', 10, 0, 25, 0.5); ?>
        <div class="answer">Continue</div>
    </div>
    <div id="contributions" class="question">
        <h4>Shoot location?</h4>
        <div class="answer" data-set="contributions" data-value="23">California</div>
        <div class="answer" data-set="contributions" data-value="18">All Other States</div>
    </div>

    <div id="above_scale" class="question">
        <h4>Are there any performers above scale</h4>
        <div class="answer" data-set="above_scale" data-value="1" data-follow="above_scale_handle above_scale_count">Yes</div>
        <div class="answer" data-set="above_scale" data-value="0">No</div>
    </div>
    <div id="above_scale_count" class="question">
        <h4>How many above scale?</h4>
        <?php FalconEstimator::slider('above_scale_count', '', 1, 1, 100); ?>
        <div class="answer">Continue</div>
    </div>
    <div id="above_scale_handle" class="question">
        <h4>How are Above Scale estimates handled?</h4>
        <?php FalconEstimator::slider('above_scale_rate', '', 1, 1, 10000); ?>
        <div class="answer">Continue</div>
    </div>
    <div id="legal">
        <div class="inner">
            <p><strong>NOTICE:</strong> All of the contents of this website are protected from copying under U.S. and international copyright laws and treatises.  Any unauthorized copying, alteration, distribution, transmission, performance, display or other use of this material is prohibited.  This website and the contents therein are the sole, confidential and proprietary property of Falcon Enterprises, Inc. d/b/a Falcon Paymasters.  The privileged information contained therein is for the sole use by authorized users.  If you are not an authorized user be advised you are prohibited from disseminating, disclosing, copying or taking action on the information contained within the estimator.  If you are an authorized user, please be advised that the estimator is for estimating purposes only, and the employees, officers, or associates of Falcon Paymasters, cannot be held liable for any proposed estimate unless reviewed and confirmed by Falcon Paymasters.  </p>
            <p>Falcon Paymasters controls and operates this website from its offices within the State of Ohio.  Falcon Paymasters does not imply that the materials published on this website are appropriate for use outside of the United States.  If you access this website from outside of the United States, you do so on your own initiative and are responsible for compliance with local laws.  The terms of this website shall be governed by the laws of the state of Ohio.</p>
            <div style="text-align: center;">
                <button style="visibility: visible;" class="nectar-button regular extra-color-3 regular-button">I agree</button>
            </div>
        </div>
    </div>

    <div id="final" class="question">
        <h4>Project Name</h4>
        <input type="text" name="project_title">
        <h4>Project ID</h4>
        <input type="text" name="project_id">
        <h4>Project Notes</h4>
        <textarea name="project_notes"></textarea>
        <div class="answer">Continue</div>
    </div>
    <div class="question" id="thank-you">
        <h1 class="text-center">Thank you</h1>
    </div>
    <a href="#" class="back" style="display: none;"><i class="fa fa-angle-left"></i> back</a>
    <div class="totals">
        <div class="container rel">
            <div class="disclaimer">
                <small>By using this estimator you agree with our <a href="#">terms and conditions</a></small>
            </div>
            <div class="detailed">
                <div class="actions fpe-row">
                    <div class="half">
                        <?php /*<a href="#" id="email-estimation"><i class="fas fa-envelope"></i> Email this estimate</a><br>*/?>
                        <a href="#" id="print-estimation"><i class="fas fa-print"></i> Print or save this estimate</a>
                    </div>
                    <div class="half text-right">
                        <a href="#" id="reset-estimator"><i class="fas fa-undo"></i> Start over</a>
                    </div>
                </div>
                <div class="session-fees">
                    <h6>Session fees</h6>
                </div>
                <div class="broadcast-fees">
                </div>
                <div class="other-fees"></div>
            </div>
            <div class="general d-flex">
                <a class="expand flex-g"><span>View details <i class="fa fa-angle-up"></i></span></a>
                <div class="text-right text-bold">
                        Subtotal Wages:<br>
                        Balance Due: 
                </div>
                <div class="values text-right text-bold">
                    <span class="subtotal">$0</span><br>
                    <span class="total">$0</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var all_markets = [ {value: 'New York', primary: true, code: 'ny'}, {value: 'Chicago', primary: true, code: 'chi'}, {value: 'Los Angeles', primary: true, code: 'la'},
        <?php foreach($fpe->markets as $market) {
            printf('{value: "%s", code: "%s", primary: false}, ', $market, preg_replace('/[^a-z]/', '-', strtolower($market), -1));
        } ?>
    ]
</script>