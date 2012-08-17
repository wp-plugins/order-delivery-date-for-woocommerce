<?php 

/*
Plugin Name: Order Delivery Date for Woocommerce (Lite version)
Plugin URI: http://www.tychesoftwares.com/store/free-plugin/order-delivery-date-on-checkout/
Description: This plugin allows customers to choose their preferred Order Delivery Date during checkout.
Author: Ashok Rane
Version: 1.0
Author URI: http://www.tychesoftwares.com/about
Contributor: Tyche Softwares, http://www.tychesoftwares.com/
*/

$wpefield_version = '1.0';



add_action('woocommerce_after_checkout_billing_form', 'my_custom_checkout_field'); 

function my_custom_checkout_field( $checkout ) {	

	print(' <link rel="stylesheet" type="text/css" href="' . plugins_url() . '/order-delivery-date-woo/datepicker.css">				

			<script type="text/javascript" src="' . plugins_url() . '/order-delivery-date-woo/datepicker.js"></script>'

		);		

	print('<script type="text/javascript" src="' . plugins_url() . '/order-delivery-date-woo/initialize-datepicker.js"></script>');

	echo '<div id="my_custom_checkout_field" style="width: 202%; float: left;">';     

	woocommerce_form_field( 'e_deliverydate', array(        

				'type'          => 'text',        

				'label'         => __('Delivery Date'),		

				'required'  	=> false,		

				'placeholder'       => __('Delivery Date'),        

				), 

				$checkout->get_value( 'e_deliverydate' ));     

				echo '</div>'; 

}

add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta'); 

function my_custom_checkout_field_update_order_meta( $order_id ) {    

	if ($_POST['e_deliverydate']) {

		update_post_meta( $order_id, 'Delivery Date', esc_attr($_POST['e_deliverydate']));

	}
	
}

?>