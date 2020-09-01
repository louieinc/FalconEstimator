<?php
    $groups = [
        'announcer' => 'Announcer',
        'solo_duo' => 'Solo or Duo',
        'group_3' => 'Groups 3-5',
        'group_6' => 'Groups 6-8',
        'group_9' => 'Groups 9+',
    ];
?>

<div id="fpe" class="wrap">
    <h2>Radio Broadcast Rates</h2>
    <form action="" method="post">
        <section>
            <?php foreach ($groups as $group => $label): ?>
            <h1><?php echo $label ?></h1>
            <h3>Wild Spot 13 weeks cycle</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('Wild Spot units 2-25', "_radio_wild_spot_{$group}_13week_2_25");
                    FalconEstimator::field('Wild Spot units 26+', "_radio_wild_spot_{$group}_13week_26_60");

                    FalconEstimator::field('Wild Spot NY Alone 1st unit', "_radio_wild_spot_{$group}_13week_ny");
                    FalconEstimator::field('Wild Spot NY Alone add\'l unit', "_radio_wild_spot_{$group}_13week_ny_addl_unit");

                    FalconEstimator::field('Wild Spot CHI Alone 1st unit', "_radio_wild_spot_{$group}_13week_chi");
                    FalconEstimator::field('Wild Spot CHI Alone add\'l unit', "_radio_wild_spot_{$group}_13week_chi_addl_unit");

                    FalconEstimator::field('Wild Spot LA Alone 1st unit', "_radio_wild_spot_{$group}_13week_la");
                    FalconEstimator::field('Wild Spot LA Alone add\'l unit', "_radio_wild_spot_{$group}_13week_la_addl_unit");

                    FalconEstimator::field('Wild Spot 2 of NY/CHI/LA 1st unit', "_radio_wild_spot_{$group}_13week_2_major");
                    FalconEstimator::field('Wild Spot 2 of NY/CHI/LA add\'l unit', "_radio_wild_spot_{$group}_13week_2_major_addl_unit");

                    FalconEstimator::field('Wild Spot all 3 of NY/CHI/LA 1st unit', "_radio_wild_spot_{$group}_13week_3_major");
                    FalconEstimator::field('Wild Spot 3 of NY/CHI/LA add\'l unit', "_radio_wild_spot_{$group}_13week_3_major_addl_unit");
                ?>
            </table>
            <h3>Wild Spot 8 weeks cycle</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('Wild Spot units 2-25 ea.', "_radio_wild_spot_{$group}_8week_2_25");
                    FalconEstimator::field('Wild Spot units 26+', "_radio_wild_spot_{$group}_8week_26_60");
                    //FalconEstimator::field('Wild Spot units 61-125 ea.', "_radio_wild_spot_{$group}_8week_61_125");
                    //FalconEstimator::field('Wild Spot units 126+ ea.', "_radio_wild_spot_{$group}_8week_126");

                    FalconEstimator::field('Wild Spot NY Alone 1st unit', "_radio_wild_spot_{$group}_8week_ny");
                    FalconEstimator::field('Wild Spot NY Alone add\'l unit', "_radio_wild_spot_{$group}_8week_ny_addl_unit");

                    FalconEstimator::field('Wild Spot CHI Alone 1st unit', "_radio_wild_spot_{$group}_8week_chi");
                    FalconEstimator::field('Wild Spot CHI Alone add\'l unit', "_radio_wild_spot_{$group}_8week_chi_addl_unit");

                    FalconEstimator::field('Wild Spot LA Alone 1st unit', "_radio_wild_spot_{$group}_8week_la");
                    FalconEstimator::field('Wild Spot LA Alone add\'l unit', "_radio_wild_spot_{$group}_8week_la_addl_unit");

                    FalconEstimator::field('Wild Spot 2 of NY/CHI/LA 1st unit', "_radio_wild_spot_{$group}_8week_2_major");
                    FalconEstimator::field('Wild Spot 2 of NY/CHI/LA add\'l unit', "_radio_wild_spot_{$group}_8week_2_major_addl_unit");

                    FalconEstimator::field('Wild Spot all 3 of NY/CHI/LA 1st unit', "_radio_wild_spot_{$group}_8week_3_major");
                    FalconEstimator::field('Wild Spot 3 of NY/CHI/LA add\'l unit', "_radio_wild_spot_{$group}_8week_3_major_addl_unit");
                ?>
            </table>

            <h3>Dealer Commercial</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('26 weeks', "_radio_dealer_{$group}_26w");
                    FalconEstimator::field('8 weeks', "_radio_dealer_{$group}_8w");
				    if ($group == 'principal') {
						FalconEstimator::field('26 weeks_effects', "_radio_dealer_{$group}_8w_effects");
						FalconEstimator::field('26 weeks', "_radio_dealer_{$group}_26w_effects");
					}
                ?>
            </table>

            <h3>Regional Network Program</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('1 Week Unlimited Use', "_radio_network_{$group}_1w_unlimited");
                    FalconEstimator::field('4 Week Unlimited Use', "_radio_network_{$group}_4w_unlimited");
                    FalconEstimator::field('8 Week Unlimited Use', "_radio_network_{$group}_8w_unlimited");
                    FalconEstimator::field('13 Week Unlimited Use', "_radio_network_{$group}_13w_unlimited");
                    FalconEstimator::field('13 Week 26 Uses', "_radio_network_{$group}_13w_26u");
                    FalconEstimator::field('13 Week 39 Uses', "_radio_network_{$group}_13w_39u");
                    FalconEstimator::field('13 Week Across', "_radio_network_{$group}_13w_a");
                ?>
            </table>

            <?php
            $internet = [
                'internet' => 'Made for Internet',
                'newmedia' => 'Made for New-Media',
                'internet2' => 'Move Over Internet',
                'newmedia2' => 'Move Over New-Media',
            ];
            ?>
			<?php foreach ($internet as $key => $ilabel): ?>
                <h3><?php echo "{$ilabel}" ?></h3>
                <table class="form-table">
					<?php
					FalconEstimator::field("4 weeks", "_radio_{$group}_{$key}_4_week");
					FalconEstimator::field("8 weeks", "_radio_{$group}_{$key}_8_week");
					FalconEstimator::field("1 year", "_radio_{$group}_{$key}_1_year");
					?>
                </table>
			<?php endforeach; ?>

            <?php if ($group == 'principal'): ?>
            <h3>Single Market</h3>
            <table class="form-table">
                <?php
                    FalconEstimator::field('13 weeks', "_radio_single_{$group}_13w");
                    FalconEstimator::field('1 year', "_radio_single_{$group}_1y");
                ?>
            </table>
            <?php endif; ?>

            <h3>Made-In/Played-In</h3>
            <table class="form-table">
                <?php
                FalconEstimator::field('Actor/Announcer', "_radio_mipi_actor_announcer_{$group}");
                ?>
            </table>

            <h3>Other Rates</h3>
            <table class="form-table">
                <?php
                    if ($group == 'principal') {
						FalconEstimator::field('Demo', "_radio_{$group}_demo");
					}
				    FalconEstimator::field('Regional', "_radio_{$group}_regional");
				    FalconEstimator::field('Program', "_radio_{$group}_program");
				    FalconEstimator::field('Local', "_radio_{$group}_local");
				    FalconEstimator::field('Foreign', "_radio_{$group}_foreign");
				    FalconEstimator::field('PSA', "_radio_{$group}_psa");
                ?>
            </table>

            <?php endforeach; ?>

            <h3>Others</h3>
            <table class="form-table">
                <?php
				FalconEstimator::field('Creative Session', "_radio_creative_session");
				FalconEstimator::field('Singers Contractors', "_radio_singers_contractors");
                ?>
            </table>

        </section>
    </form>
</div>
