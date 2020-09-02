<?php
/*
Plugin Name: Falcon Estimator 1.1
Description: Estimator plugin for Falcon Paymasters
Author: Radu Dragomir
*/

global $fpe;
$fpe = new FalconEstimator();

class FalconEstimator {

	protected $prefix = '_fpe_';

	public $markets = array('Atlanta','Austin','Baltimore','Boston','Charlotte','Cincinnati','Cleveland','Columbus OH','Dallas-Fort Worth','Denver','Detroit','Grand Rapids-Kalamazoo-Battle Creek','Greenville-Spartanburg-Asheville-Anderson NC','Hartford-New Haven','Houston','Indianapolis','Kansas City','Las Vegas','Mexico/Mexico City','Miami','Milwaukee','Minneapolis - St. Paul','Montreal','Nashville','Norfolk-Portsmouth-Newport News','Oklahoma City','Orlando-Daytona Beach','Philadelphia','Phoenix','Pittsburgh','Portland, OR','Puerto Rico','Raleigh-Durham','Sacramento-Stockton','Salt Lake City','San Antonio','San Diego','San Francisco','Seattle-Tacoma','St. Louis','Tampa-St. Petersburg','Toronto','Vancouver B.C.','Washington D.C.','West Palm Beach - Ft. Pierce',);

	public function __construct() {
		add_action('admin_menu', array($this, 'menu'));
		add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
		add_action('wp_ajax_fpe_save_field', array($this, 'save_field'));
		add_action('init', array($this, 'posttypes'));
		add_action('save_post', array($this, 'store_hash'));
		add_action('add_meta_boxes', array($this, 'meta_boxes'));
		add_action('wp_enqueue_scripts', [$this, 'frontend_scripts']);

		add_filter('enter_title_here', array($this, 'placeholder'), 20, 2);
		add_filter('the_content', array($this, 'content'), 99, 1);
		
	}

	public function menu() {
		add_menu_page('Estimator', 'Estimator', 'activate_plugins', 'fpe', array($this, 'markets'));
		add_submenu_page('fpe', 'Markets', 'Markets', 'activate_plugins', 'fpe', array($this, 'markets'));
		add_submenu_page('fpe', 'Fees', 'Fees', 'activate_plugins', 'fpe-fees', array($this, 'fees'));
		add_submenu_page('fpe', 'TV Rates', 'TV Rates', 'activate_plugins', 'fpe-tv-rates', array($this, 'tv_rates'));
		add_submenu_page('fpe', 'Radio Rates', 'Radio Rates', 'activate_plugins', 'fpe-radio-rates', array($this, 'radio_rates'));
		add_submenu_page('fpe', 'Settings', 'Settings', 'activate_plugins', 'fpe-settings', array($this, 'settings'));
		
	}

	public function admin_scripts() {
		wp_enqueue_script('fpe-scripts', plugin_dir_url(__FILE__).'/admin-scripts.js', array('jquery'), '1.0', true);
		wp_enqueue_style( 'fpe-styles', plugins_url('admin-styles.css', __FILE__) );
	}
	
	public function fees() {
		include dirname(__FILE__).'/fees.php';
	}
	
	public function markets() {
		include dirname(__FILE__).'/markets.php';
	}

	public function tv_rates() {
		include dirname(__FILE__).'/tv-rates.php';
	}

	public function radio_rates() {
		include dirname(__FILE__).'/radio-rates.php';
	}

	public function frontend_scripts() {
		global $post;
		if (!$post) return;
		$page = get_option('_fpe_page');
		if ($post->ID == $page) {
			wp_enqueue_script('fpe-autocomplete', plugin_dir_url(__FILE__).'autocomplete/jQuery.tagify.min.js', array('jquery'));
			wp_enqueue_script('fpe-polyfills', plugin_dir_url(__FILE__).'autocomplete/tagify.polyfills.js', array('jquery'));
			
			// wp_enqueue_script('fpe-vars', plugin_dir_url(__FILE__).'variables.js.php?v='.rand(0, 1000), array());
			wp_enqueue_script('fpe-vars', plugin_dir_url(__FILE__).'variables-js.php?v='.rand(0, 1000), array());

			wp_enqueue_script('fpe-scripts', plugin_dir_url(__FILE__).'frontend.js?v='.rand(0, 1000), array('jquery', 'jquery-ui-core', 'jquery-ui-slider', 'fpe-vars'));
			wp_enqueue_style('fpe-styles', plugin_dir_url(__FILE__).'frontend.css?v='.rand(0, 1000));
			wp_enqueue_script('fpe-touch', '//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', array('jquery', 'jquery-ui-core', 'jquery-ui-slider'));

		}
	}

	public static function field($label, $name, $type='number', $size='small') {
		$prefix = '_fpe';
		$name = $prefix.$name;
		$value = get_option($name);
		printf('<tr><th><label>%s</label></th><td><input type="%s" name="%s" lang="en" class="%s-text" value="%s"></td></tr>', $label, $type, $name, $size, $value);
	}

	public function save_field() {
		$name = $_POST['name'];
		$value = $_POST['value'];
		update_option($name,str_replace(',', '.', $value));
		die(json_encode(array('status' => 'success')));
	}

	public function posttypes() {
		register_post_type('estimator', array(
			'labels' => array(
				'name' => 'Access',
				'singular' => 'Access',
				'not_found' => 'No access entries found',
				'not_found_in_trash' => 'No access entries found',
				'add_new_item' => 'Add new access entry',
			),
			'public' => false,
			'has_archive' => false,
			'show_ui' => true,
			'show_in_menu' => 'fpe',
			'menu_position' => 100,
			'supports' => array('title'),
		));

		register_post_type('definition', array(
			'labels' => array(
				'name' => 'Definitions',
				'singular' => 'Definition',
				'not_found' => 'No definitions found',
				'not_found_in_trash' => 'No definintions found',
				'add_new_item' => 'Add new definition',
			),
			'public' => false,
			'has_archive' => false,
			'show_ui' => true,
			'show_in_menu' => 'fpe',
			'menu_position' => 100,
			'supports' => array('title', 'editor', 'page-attributes'),
		));
	}

	public function placeholder($title, $post) {
		if( $post->post_type == 'estimator' ){
			$my_title = "Enter email for the person to use this";
			return $my_title;
		}

		return $title;
	}

	public function store_hash($post_id) {
		if ( wp_is_post_revision( $post_id ) ) return;
		$post_title = get_the_title( $post_id );
		$hash = md5($post_title.$post_id);
		update_post_meta($post_id, '_fpe_hash', $hash);
	}

	public function meta_boxes() {
		add_meta_box('fpe-hash', 'Link to share', array($this, 'display_hash'), 'estimator', 'normal');
	}

	public function display_hash() {
		global $post;
		$page = get_option('_fpe_page');
		if (!$page) {
			$text = 'Select the page for estimator in settings first';
		} else {
			$text = get_permalink($page).'?ua='.get_post_meta($post->ID, '_fpe_hash', true);
		}
		printf('<input type="text" value="%s" style="width:100%%;" locked readonly>', $text);
	}

	public function settings() {
		include dirname(__FILE__).'/settings.php';
	}

	public function content($content) {
		global $post, $wpdb, $options;
		$fpe_page = get_option('_fpe_page');
		if ($post->ID == $fpe_page) {
			$hash = $_GET['ua'];
			$access = get_posts([
				'post_type' => 'estimator',
				'meta_query' => [
					[
						'key' => '_fpe_hash',
						'value' => $hash,
					]
				]
			]);
			if (count($access) > 0) {
				ob_start();
				$options = $wpdb->get_results("select * from {$wpdb->prefix}options where option_name like '_fpe%';");
				//var_dump($options);
				echo '<script> window.fpeOptions = {';
				foreach ($options as $option) {
					printf('"%s": "%s",', str_replace('_fpe_', '', $option->option_name), $option->option_value);
				}
				echo '}; </script>';
				include plugin_dir_path(__FILE__).'calculator.php';
				$c = ob_get_clean();
				return $c;
			}
		}
		return $content;
	}

	public static function slider($handle, $label=null, $default=0, $min=0, $max=10, $step=1) {
		?>
        <div class="slider-wrap">
            <?php if ($label): ?>
    		<h4><?php echo $label ?></h4>
            <?php endif; ?>
    		<input style="display:none;" type="number"  name="<?php echo $handle ?>" value="<?php echo $default ?>">
    		<div id="" data-update="<?php echo $handle ?>" data-step="<?php echo $step ?>" data-default="<?php echo $default ?>" data-min="<?php echo $min ?>" data-max="<?php echo $max ?>" class="numeric-slider">
                <div class="ui-slider-handle custom-handle"></div>
                <span>Use slider to select number</span>
    		</div>
        </div>
		<?php 
	}

}