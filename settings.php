<?php 
    $pages = get_posts(array('post_type' => 'page', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1)); 
    $cur = get_option('_fpe_page');
?>
<div id="fpe" class="wrap">
    <h2>Falcon Estimator Settings</h2>
        <section>
            <table class="form-table show">
                <tr>
                    <th>Page for estimator</th>
                    <td>
                        <select name="_fpe_page">
                            <option value="">Please select</option>
                            <?php
                                foreach ($pages as $page) {
                                    printf('<option value="%s" %s>%s</option>', $page->ID, ($page->ID==$cur ? 'selected' : ''), apply_filters('the_title', get_the_title($page->ID)));
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </section>
</div>
