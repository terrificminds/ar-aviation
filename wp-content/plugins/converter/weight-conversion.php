<?php
/*
Plugin Name: Weight Conversion Plugin
Plugin URI: http://example.com
Description: Simple wordpress plugin for the conversion operations
Version: 1.0
Author: Nithin Mohan A
Author URI: http://www.terrificminds.com
*/

function html_form_code() {
	echo '<div class="aviation-calculation-wrapper">';
    echo '<select class="aviation-calculation">';
    echo '<option value="COW">CONVERTION OF WEIGHTS</option>';
    echo '<option value="VOW">TOTAL VOLUME OF WEIGHTS</option>';
    echo '<option value="NAC">NAC THC CALCULATION</option>';
	echo '</select>';
	echo '<span class="hr-line">underline</span>';
	echo '';
	// echo '<form method="post">';
	echo '<div class="weight-calc">';
	echo '<div class="box-wrapper full">';
    echo '<select class="weight-calculation">';
    echo '<option value="CTI">Centimetres To Inches</option>';
    echo '<option value="CTM">Centimetres To Metres</option>';
    echo '<option value="FTC">Feet To Centimetres</option>';
    echo '<option value="FTM">Feet To Metres</option>';
    echo '<option value="FTI">Feet To Inches</option>';
    echo '<option value="ITC">Inches To Centimetres</option>';
    echo '<option value="MTC">Metres To Centimetres</option>';
    echo '<option value="CTK">CBM to Kgs</option>';
	echo '</select>';
	echo '</div>';
	echo '<div class="box-wrapper half first">';
	echo '<label for="convert-from" class="from-measurement">Centimetres</label>';
	echo '<input type="text" name="convert-from" class ="convert-from" placeholder="To Convert">';
	echo '</div>';
	echo '<div class="box-wrapper half">';
	echo '<label for="convert-into" class="into-measurement">Inches</label>';
	echo '<input type="text" name="convert-into" class ="convert-into" placeholder="Into">';
	echo '</div>';
	echo '<input type="button" value="convert" class="convert-weight" />';
	echo '</div>';
	echo '<div class="cbm-calculation">';
	echo '<div class="cbm-table">';
	echo '<div class="cbm-row cbm-row-1">';
		echo '<span>';
		echo '<label for="cbmlength-1">Length</label>';
		echo '<input type="text" name="cbmlength-1" class ="cbmlength-1" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbmbreadth-1">Breadth</label>';
		echo '<input type="text" name="cbmbreadth-1" class ="cbmbreadth-1" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbmwidth-1">Width</label>';
		echo '<input type="text" name="cbmwidth-1" class ="cbmwidth-1" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbmpieces-1">Pieces</label>';
		echo '<input type="text" name="cbmpieces-1" class ="cbmpieces-1" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbmvolume-1">Volume</label>';
		echo '<input type="text" name="cbmvolume[]" class ="cbmvolume-1" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbmcbm-1">CBM</label>';
		echo '<input type="text" name="cbmcbm-1" class ="cbmcbm-1" placeholder="100">';
		echo '</span>';
	echo '</div>';
	echo '</div>';
		echo '<a href="#" class="remove_field">Remove</a>';
		echo '<input type="button" value="Add Row" class="cbm-add-row" />';
		echo '<input type="button" data-id="1" value="Calculate" class="cbm-calculate" />';
		echo '<div class="cbm-bottom">';
		echo '<span>';
		echo '<label for="cbm-total-volume">Total volume of weight</label>';
		echo '<input type="text" name="cbm-total-volume" class ="cbm-total-volume" placeholder="2.000">';
		echo '</span>';
		echo '<span>';
		echo '<label for="cbm-total">Total CBM</label>';
		echo '<input type="text" name="cbm-total" class ="cbm-total" placeholder="2.000">';
		echo '</span>';
		echo '</div>';
	echo '</div>';
	echo '<div class="nas-calc">';
		echo '<div class="nas-top">';
		echo '<span>';
		echo '<label for="weight-in-kg">Chargeable Weight in KG</label>';
		echo '<input type="text" name="weight-in-kg" class ="weight-in-kg" placeholder="100">';
		echo '</span>';
		echo '<span>';
		echo '<label for="nas-formula">Formula</label>';
		echo '<input type="text" name="nas-formula" class ="nas-formula" placeholder="2.000">';
		echo '<span>';
		echo '</div>';	
		echo '<input type="button" value="Calculate" class="nas-calculate"/>';
		echo '<div class="nas-bottom">';
		echo '<span>';
		echo '<label for="thc-in-kd">Total THC in KD</label>';
		echo '<input type="text" name="thc-in-kd" class ="thc-in-kd" placeholder="2.000">';
		echo '</span>';
		echo '</div>';
		echo '</div>';
	echo '</div>';
}


function calculator_shortcode() {
	ob_start();
	//deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'aviation_calculator', 'calculator_shortcode' );

add_action('wp_enqueue_scripts','aviation_js_init');

function aviation_js_init() {
    wp_enqueue_script( 'aviation-conversion-js', plugins_url( '/js/conversion.js', __FILE__ ));
}

?>