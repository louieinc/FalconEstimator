<?php global $fpe; ?>
<div id="fpe">
    <h2>Online Calculator</h2>
    <div class="question" id="commercial-type" style="display: block;">
        <h4>What kind of production are you hiring for?</h4>
        <div class="answers">
            <div class="answer" data-type="tv" data-set="type:tv" data-show="tv-performers">Television Commercial (union)</div>
            <div class="answer" data-type="radio" data-set="type:radio" data-show="radio-type">Radio Commercial (union)</div>
            <div class="answer" data-type="industrial" data-set="type:industrial" data-show="psa-type">Non-Broadcast/Industrials (union)</div>
            <div class="answer" data-type="nonunion" data-set="type:nonunion" data-show="psa-type">Non-Broadcast/Industrials Contract (non-union)</div>
        </div>
    </div>
    <?php include dirname(__FILE__).'/calc-tv.php'; ?>
    <?php include dirname(__FILE__).'/calc-radio.php'; ?>
    <?php include dirname(__FILE__).'/calc-industrial.php'; ?>
    <?php include dirname(__FILE__).'/calc-nonunion.php'; ?>
    <div class="question" id="radio-type">
        <h4>Where will the commercial be used?</h4>
        <div class="answers">
            <div class="answer" data-air="1" data-set="air:true" data-show="radio-broadcast">Radio broadcast</div>
            <div class="answer" data-air="1" data-set="air:true" data-show="radio-internet">On internet or new media</div>
            <div class="answer" data-air="1" data-set="air:true" data-show="radio-broadcast radio-internet">Both as radio broadcast and on internet or new media</div>
            <div class="answer" data-air="0" data-set="air:false" data-show="radio">Non-air commercial (demo)</div>
        </div>
    </div>
    <div class="question" id="psa-type">
        <h4>What kind of commercial is it?</h4>
        <div class="answers">
            <div class="answer" data-air="1" data-psa="audio" data-show="psa">Audio only</div>
            <div class="answer" data-air="1" data-psa="on_camera" data-show="tv">On camera</div>
            <div class="answer" data-air="1" data-psa="off_camera" data-show="tv">Off camera</div>
        </div>
    </div>
    <div class="question" id="tv-type">
        <h4>What kind of commercial is it?</h4>
        <div class="answers">
            <div class="answer" data-air="1" data-camera="on_camera" data-set="air:true camera:true" data-value="true" data-show="tv-market">On camera</div>
            <div class="answer" data-air="1" data-camera="off_camera" data-set="air:true camera:false" data-show="tv-market">Off camera</div>
            <div class="answer" data-air="0" data-camera="off_camera" data-set="air:false camera:false" data-show="tv">Off camera, non-air</div>
        </div>
    </div>
    <div class="question" id="tv-market">
        <h4>Where will the commercial air?</h4>
        <div class="answers">
            <div class="answer" data-show="tv-broadcast">Only as television broadcast</div>
            <div class="answer" data-show="tv-internet">On internet of new media</div>
            <div class="answer" data-show="tv-broadcast tv-internet">Both TV broadcast and internet or new media</div>
        </div>
    </div>
    <div class="question" id="radio-market">
        <h4>Where will the commercial air?</h4>
        <div class="answers">
            <div class="answer" data-show="radio-broadcast">Only as television broadcast</div>
            <div class="answer" data-show="radio-internet">On internet of new media</div>
            <div class="answer" data-show="radio-broadcast radio-internet">Both TV broadcast and internet or new media</div>
        </div>
    </div>
    <div class="question" id="tv-broadcast">
        <h4>It will broadcast as a </h4>
        <div class="answers">
            <div class="answer" data-broadcast="wild_spot" data-set="broadcast:wild_spot" data-show="tv-markets">Wildspot - 13 week cycle</div>
            <div class="answer" data-broadcast="local_cable" data-set="broadcast:local_cable" data-show="tv-local_cable">Local cable - 13 week cycle</div>
            <div class="answer" data-broadcast="national_cable" data-set="broadcast:national_cable" data-show="tv-national_cable">National cable - 13 week cycle</div>
            <div class="answer" data-broadcast="network_program" data-set="broadcast:network_program" data-show="tv-network_program">Network program commercial</div>
        </div>
    </div>
    <div class="question" id="tv-local_cable">
        <h4>It will be broadcast on a local station with </h4>
        <div class="answers">
            <div class="answer" data-subs="up_50k" data-set="subs:up_50k" data-show="tv">1 - 50,000 subscribers</div>
            <div class="answer" data-subs="up_100k" data-set="subs:up_100k" data-show="tv">50,001 - 100,000 subscribers</div>
            <div class="answer" data-subs="up_150k" data-set="subs:up_150k" data-show="tv">100,001 - 150,000 subscribers</div>
            <div class="answer" data-subs="up_200k" data-set="subs:up_200k" data-show="tv">150,001 - 200,000 subscribers</div>
            <div class="answer" data-subs="up_250k" data-set="subs:up_250k" data-show="tv">200,001 - 250,000 subscribers</div>
        </div>
    </div>
    <div class="question" id="tv-network_program">
        <h4>In over 20 cities, with how many uses?</h4>
        <input type="number"  name="uses" value="2" class="inline input-answer" data-show="tv">
    </div>
    <div class="question" id="tv-national_cable">
        <h4>It will be broadcast on a national station with </h4>
        <div class="answers">
            <div class="answer" data-subs="1_50" data-set="subs:1_50" data-show="tv">minimum subscribers</div>
            <div class="answer" data-subs="max" data-set="subs:max" data-show="tv">maximum subscribers (3,000 units)</div>
        </div>
    </div>
    <div class="question" id="radio-broadcast">
        <h4>It will broadcast as a </h4>
        <div class="answers">
            <div class="answer" data-broadcast="wild_spot_13week" data-set="broadcast:wild_spot_13week" data-show="radio-markets">Wildspot - 13 week cycle</div>
            <div class="answer" data-broadcast="wild_spot_8week" data-set="broadcast:wild_spot_8week" data-show="radio-markets">Wildspot - 8 week cycle</div>
            <div class="answer" data-broadcast="dealer_6month" data-set="broadcast:dealer_6month" data-show="radio">Dealer commercial (6 month use)</div>
            <div class="answer" data-broadcast="network" data-set="broadcast:network" data-show="radio-network">Network program commercial</div>
            <div class="answer" data-broadcast="regional" data-set="broadcast:regional" data-show="radio">Regional Network program commercial</div>
        </div>
    </div>
    <div class="question" id="radio-network">
        <h4>It will broadcast as a thirteen week cycle, with a</h4>
        <div class="answers">
            <div class="answer" data-length="1week" data-set="length:1week" data-show="radio">1 week use</div>
            <div class="answer" data-length="4week" data-set="length:4week" data-show="radio">4 week use</div>
            <div class="answer" data-length="8week" data-set="length:8week" data-show="radio">8 week use</div>
            <div class="answer" data-length="13week" data-set="length:13week" data-show="radio">13 week use</div>
            <div class="answer" data-length="13week_limited" data-set="length:13week" data-show="radio">13 week limited use (26 uses)</div>
        </div>
    </div>
    <div class="question" id="tv-internet">
        <h4>It will be used on the Internet or in new media with the </h4>
        <div class="answers">
            <div class="answer" data-length="4_week" data-set="length:4week" data-show="tv">4 week option</div>
            <div class="answer" data-length="8_week" data-set="length:8week" data-show="tv">8 week option</div>
            <div class="answer" data-length="1_year" data-set="length:1year" data-show="tv">1 year option</div>
        </div>
    </div>
    <div class="question" id="radio-internet">
        <h4>It will be used on the Internet or in new media with the </h4>
        <div class="answers">
            <div class="answer" data-length="4_week" data-set="length:4week" data-show="radio">4 week option</div>
            <div class="answer" data-length="8_week" data-set="length:8week" data-show="radio">8 week option</div>
            <div class="answer" data-length="1_year" data-set="length:1year" data-show="radio">1 year option</div>
        </div>
    </div>
    <div class="question" id="tv-markets">
        <h4>In which market(s) will your spot air?</h4>
        <input type="text" class="js-autocomplete" style="display:none" name="markets" placeholder="Add markets...">
        <div class="answer dont-show" data-show="tv" style="display:none;">Continue</div>
    </div>
    <div class="question" id="radio-markets">
        <h4>In which market(s) will your spot air?</h4>
        <input type="text" class="js-autocomplete" style="display:none" name="markets" placeholder="Add markets...">
        <div class="answer dont-show" data-show="radio" style="display:none;">Continue</div>
    </div>
    <div class="question" id="tv">
        <h4>How many principal actors do you need?</h4>
        <div id="" data-update="principal_actor" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input style="display:none;" type="number"  name="principal_actor" value="0">
        <h4>How many general extras do you need?</h4>
        <div id="" data-update="extra_actor" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input  style="display:none;" type="number"  name="extra_actor" value="0">
        <h4>How many wardrobe fittings do you need?</h4>
        <div id="" data-update="wardrobe_fittings" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input  style="display:none;" type="number"  name="wardrobe_fittings" value="0">
    </div>
    <div class="question" id="radio">
        <h4>How many actor/announcer do you need?</h4>
        <input style="display:none;" type="number"  name="radio_actor" value="0">
        <div id="" data-update="radio_actor" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <h4>How many singer(s) do you need?</h4>
        <input style="display:none;" type="number"  name="radio_singer" value="0">
        <div id="" data-update="radio_singer" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <h4>How many versions of the script do you need?</h4>
        <input style="display:none;" type="number"  name="scripts" value="1">
        <div id="" data-update="scripts" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <h4>How many tags do you need?</h4>
        <div id="" data-update="radio_tags" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input style="display:none;" type="number"  name="radio_tags" value="0">
    </div>
    <div class="question" id="psa">
        <h4>How many actor/announcer do you need?</h4>
        <input style="display:none;" type="number"  name="psa_actor" value="0">
        <div id="" data-update="psa_actor" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <h4>How many singer(s) do you need?</h4>
        <input style="display:none;" type="number"  name="psa_singer" value="0">
        <div id="" data-update="psa_singer" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
        <h4>How many versions of the script do you need?</h4>
        <input style="display:none;" type="number"  name="scripts" value="1">
        <div id="" data-update="scripts" class="numeric-slider">
          <div class="ui-slider-handle custom-handle"></div>
        </div>
    </div>
    <div class="totals">
        <div class="container">
            <div class="detailed">
                <div class="actions fpe-row">
                    <div class="half">
                        <a href="#" id="email-estimation"><i class="fas fa-envelope"></i> Email this estimate</a><br>
                        <a href="#" id="print-estimation"><i class="fas fa-print"></i> Print this estimate</a>
                    </div>
                    <div class="half text-right">
                        <a href="#" id="reset-estimator"><i class="fas fa-undo"></i> Reset estimation</a>
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
                <a class="expand flex-g">View details <i class="fa fa-angle-up"></i></a>
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
    var markets = [ {value: 'New York', primary: true, code: 'ny'}, {value: 'Chicago', primary: true, code: 'chi'}, {value: 'Los Angeles', primary: true, code: 'la'},
        <?php foreach($fpe->markets as $market) {
            printf('{value: "%s", code: "%s", primary: false}, ', $market, preg_replace('/[^a-z]/', '-', strtolower($market), -1));
        } ?>
    ]
</script>