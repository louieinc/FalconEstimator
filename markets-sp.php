<div id="fpe" class="wrap">
    <h2>Spanish Markets Unit Weight</h2>
    <form action="" method="post">
        <section>
            <table class="form-table show" style="display: block;">
                <?php
                    global $fpe;
                    foreach ($fpe->markets as $market) {
                        $name = $fpe->prefix.preg_replace('/[^a-z]/', '-', strtolower($market), -1);
                        FalconEstimator::field($market, $name);
                    }
                ?>
            </table>
        </section>
    </form>
</div>
