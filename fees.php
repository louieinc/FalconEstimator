<div id="fpe" class="wrap">
    <h2>Rates</h2>
    <form action="" method="post">
        <section>
            <h3>Session Fees for On-Air Commercials</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('Principal Actor On-Camera', '_principal_actor_on_camera');
                    FalconEstimator::field('Principal Actor Off-Camera', '_principal_actor_off_camera');
                    FalconEstimator::field('General Extra On-Camera', '_extra_actor');
                    FalconEstimator::field('Radio Actor/announcer', '_radio_actor');
                    FalconEstimator::field('Radio Singer', '_radio_singer');
				    FalconEstimator::field('Pilot', '_pilot');
				    FalconEstimator::field('Radio Groups 3-5', '_radio_group_3');
				    FalconEstimator::field('Radio Groups 6-8', '_radio_group_6');
				    FalconEstimator::field('Radio Groups 9+', '_radio_group_9');
                ?>
            </table>

            <?php /*
            <h3>Session Fees for Demo Commercials</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('Principal Actor On-Camera', '_principal_actor_on_camera_demo');
                    FalconEstimator::field('Radio Actor/announcer', '_radio_actor_demo');
                    FalconEstimator::field('Radio Singer', '_radio_singer_demo');
                ?>
            </table>
            */ ?>

            <h3>Session Fees For Corporate Commercials: Category 1</h3>
            <table class="form-table">
				<?php
				FalconEstimator::field('On-Camera - 1 Day', '_psa_category1_on');
				FalconEstimator::field('On-Camera - Half Day', '_psa_category1_on_half');
				FalconEstimator::field('On-Camera - 3 Days', '_psa_category1_on_3');
				FalconEstimator::field('On-Camera - Weekly', '_psa_category1_on_w');
				FalconEstimator::field('Off-Camera - 1st hour', '_psa_category1_off');
				FalconEstimator::field('Off-Camera - Additional 1/2 hr', '_psa_category1_off_addl');
				FalconEstimator::field('Off-Camera, 3 mins or less, half hour', '_psa_category1_off_short');
				FalconEstimator::field('Off-Camera, Retakes Entire Script, (One Hour)', '_psa_category1_retakes');
				FalconEstimator::field('Off-Camera, Retakes Entire Script, (additional)', '_psa_category1_retakes_addl');
				FalconEstimator::field('On-Camera Spokesperson', '_psa_category1_spokesperson');
				FalconEstimator::field('On-Camera Spokesperson (Additional)', '_psa_category1_spokesperson_add');
				?>
            </table>

            <h3>Session Fees For Corporate Commercials: Category 2</h3>
            <table class="form-table">
				<?php
				FalconEstimator::field('On-Camera - 1 Day', '_psa_category2_on');
				FalconEstimator::field('On-Camera - Half Day', '_psa_category2_on_half');
				FalconEstimator::field('On-Camera - 3 Days', '_psa_category2_on_3');
				FalconEstimator::field('On-Camera - Weekly', '_psa_category2_on_w');
				FalconEstimator::field('Off-Camera - 1st hour', '_psa_category2_off');
				FalconEstimator::field('Off-Camera - Additional 1/2 hr', '_psa_category2_off_addl');
				FalconEstimator::field('Off-Camera, 3 mins or less, half hour', '_psa_category2_off_short');
				FalconEstimator::field('Off-Camera, Retakes Entire Script, (One Hour)', '_psa_category2_retakes');
				FalconEstimator::field('Off-Camera, Retakes Entire Script, (additional)', '_psa_category2_retakes_addl');
				FalconEstimator::field('On-Camera Spokesperson', '_psa_category2_spokesperson');
				FalconEstimator::field('On-Camera Spokesperson (Additional)', '_psa_category2_spokesperson_add');
				?>
            </table>

            <h3>Session Fees For Corporate Commercials: IVR</h3>
            <table class="form-table">
                <?php
				FalconEstimator::field('1 Hour', '_psa_ivr_first');
				FalconEstimator::field('1/2 Hour', '_psa_ivr_half');
				FalconEstimator::field('Overtime', '_psa_ivr_over');
                ?>
            </table>
            <h3>Session Fees For Corporate Commercials: Storecast</h3>
            <table class="form-table">
				<?php
				FalconEstimator::field('3 Month', '_psa_storecast_3');
				FalconEstimator::field('6 Month', '_psa_storecast_6');
				?>
            </table>

            <h3>Session Fees for Made-In/Played-In TV Commercial</h3>
            <table class="form-table">
                <?php
                FalconEstimator::field('On-Camera Principal (One Production Only)', '_mipi_tv_oncam_prin_prod');
                FalconEstimator::field('On-Camera Principal (Full Term)', '_mipi_tv_oncam_prin_full');
                FalconEstimator::field('Off-Camera Principal (One Production Only)', '_mipi_tv_offcam_prin_prod');
                FalconEstimator::field('Off-Camera Principal (Full Term)', '_mipi_tv_offcam_prin_full');
                FalconEstimator::field('Extra Performer (One Production Only)', '_mipi_tv_extra_perf_prod');
                FalconEstimator::field('Extra Performer (Full Term)', '_mipi_tv_extra_perf_full');
                ?>
            </table>

            <h3>Session Fees for Made-In/Played-In Radio Commercial</h3>
            <table class="form-table">
                <?php
                FalconEstimator::field('Radio Actor/announcer (One Production Only)', '_mipi_radio_actor_prod');
                FalconEstimator::field('Radio Actor/announcer (Full Term)', '_mipi_radio_actor_full');
                ?>
            </table>

            <?php /*
            <h3>Session Fees for PSA</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('PSA Actor/announcer', '_psa_actor_demo');
                    FalconEstimator::field('PSA Singer', '_psa_singer_demo');
                ?>
            </table>
            */ ?>

            <h3>Other</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('Wardrobe Fittings', '_wardrobe_fittings');
                    FalconEstimator::field('Television Additional Tags', '_tv_tags');
                    FalconEstimator::field('Radio Additional Tags', '_radio_tags');
                    FalconEstimator::field('% Pension & Health Contribution Rate', '_pension_health');
                    FalconEstimator::field('% Agent Fee', '_agent_fee');
                    FalconEstimator::field('% Falcon Fee', '_falcon_fee');
                ?>
            </table>
        </section>
    </form>
</div>