<?php
/*
Plugin Name:  Add Learner Fields
Description:  Adding Learner fields within the checkout page to give companies an option to provide information on who they are purchasing for. 
Version:      1.0
Author:       NMI
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

/* Testing if purchase for someone else Button was clicked */
	if (isset($_POST['submit'])) {
		$learner_num = $_POST['learners'];
		add_action( 'woocommerce_checkout_before_customer_details', 'custom_checkout_fields_before_billing_details', 20 );
	}

/* Adding Learners Field */
function custom_checkout_fields_before_billing_details($order){
		$learner_num = $_POST['learners'];
		
		// Hidden field to save learner_num for order details
		echo '<input type="hidden" name="_count" value="' . $learner_num . '">';

		$domain = 'woocommerce';
		$checkout = WC()->checkout;

		echo '<div id="learner_information_field">';

		echo '<h3>' . __('Learner Information') . '</h3>';
		echo '<p>' . __("Please make sure to fill in the fields below with the information of the individual(s) taking the course(s). If you do not know all of the required information for your Learner(s), please contact our Registrar's office. If you are purchasing courses for more than one person, please 	ensure that you include the information of all students.") . '</p>';
		echo '<p>' . __('*If you are purchasing for multiple individuals on behalf of a company, we recommend that you reach out to our Registrar to complete your purchase so we can provide the best service possible. To contact our Registrar, please email <b>registration@northeastmartime.com </b> or call <b>(508) 992-4025</b>.') . '</p>';
	
		for ($l = 0 ; $l < $learner_num; $l++){ 
			echo '<h3 id="learner_counter">' . __('Learner ') . __($l + 1) . '</h3>';
			echo '<div id="learner_information_wrapper">';

				woocommerce_form_field( '_learner_first_name'.$l, array(
				'type'          => 'text',
				'label'         => __('Learner First Name', $domain ),
				'placeholder'   => __('First Name', $domain ),
				'class'         => array('my-field-class form-row-first learner-row-first'),
				'required'      => true, // or false
			), $checkout->get_value( '_learner_first_name'.$l ) );

			woocommerce_form_field( '_learner_last_name'.$l, array(
				'type'          => 'text',
				'label'         => __('Learner Last Name', $domain ),
				'placeholder'   => __('Last Name', $domain ),
				'class'         => array('my-field-class form-row-last learner-row-last'),
				'required'      => true, // or false
			), $checkout->get_value( '_learner_last_name'.$l ) );

			woocommerce_form_field( '_learner_email'.$l, array(
				'type'          => 'text',
				'label'         => __('Learner Email', $domain ),
				'placeholder'   => __('Email Address', $domain ),
				'class'         => array('my-field-class form-row-first learner-row-first'),
				'required'      => true, // or false
			), $checkout->get_value( '_learner_email'.$l ) );

			woocommerce_form_field( '_learner_course'.$l, array(
				'type'          => 'text',
				'label'         => __('Learner Course(s)', $domain ),
				'placeholder'   => __('Course(s) Learner Is Taking', $domain ),
				'class'         => array('my-field-class form-row-first learner-row-last'),
				'required'      => true, // or false
			), $checkout->get_value( '_learner_course'.$l ) );

			echo '</div>';
		}
		echo '</div>';	
}

	// Custom checkout fields validation
	add_action( 'woocommerce_checkout_process', 'custom_checkout_field_process' );
	function custom_checkout_field_process() {
			if ( isset($_POST['_learner_first_name0']) && empty($_POST['_learner_first_name0']) || isset($_POST['_learner_last_name0']) && empty($_POST['_learner_last_name0']) || 	isset($_POST['_learner_email0']) && empty($_POST['_learner_email0']) || isset($_POST['_learner_course0']) && empty($_POST['_learner_course0']))
			wc_add_notice( __( 'Please fill in "Learner 1" Information.' ), 'error' );
		
			if ( isset($_POST['_learner_first_name1']) && empty($_POST['_learner_first_name1']) || isset($_POST['_learner_last_name1']) && empty($_POST['_learner_last_name1']) || 	isset($_POST['_learner_email1']) && empty($_POST['_learner_email1']) || isset($_POST['_learner_course1']) && empty($_POST['_learner_course1']))
			wc_add_notice( __( 'Please fill in "Learner 2" Information.' ), 'error' );
		
			if ( isset($_POST['_learner_first_name2']) && empty($_POST['_learner_first_name2']) || isset($_POST['_learner_last_name2']) && empty($_POST['_learner_last_name2']) || 	isset($_POST['_learner_email2']) && empty($_POST['_learner_email2']) || isset($_POST['_learner_course2']) && empty($_POST['_learner_course2']))
			wc_add_notice( __( 'Please fill in "Learner 3" Information.' ), 'error' );
		
			if ( isset($_POST['_learner_first_name3']) && empty($_POST['_learner_first_name3']) || isset($_POST['_learner_last_name3']) && empty($_POST['_learner_last_name3']) || 	isset($_POST['_learner_email3']) && empty($_POST['_learner_email3']) || isset($_POST['_learner_course3']) && empty($_POST['_learner_course3']))
			wc_add_notice( __( 'Please fill in "Learner 4" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name4']) && empty($_POST['_learner_first_name4']) || isset($_POST['_learner_last_name4']) && empty($_POST['_learner_last_name4']) || 	isset($_POST['_learner_email4']) && empty($_POST['_learner_email4']) || isset($_POST['_learner_course4']) && empty($_POST['_learner_course4']))
			wc_add_notice( __( 'Please fill in "Learner 5" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name5']) && empty($_POST['_learner_first_name5']) || isset($_POST['_learner_last_name5']) && empty($_POST['_learner_last_name5']) || 	isset($_POST['_learner_email5']) && empty($_POST['_learner_email5']) || isset($_POST['_learner_course5']) && empty($_POST['_learner_course5']))
			wc_add_notice( __( 'Please fill in "Learner 6" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name6']) && empty($_POST['_learner_first_name6']) || isset($_POST['_learner_last_name6']) && empty($_POST['_learner_last_name6']) || 	isset($_POST['_learner_email6']) && empty($_POST['_learner_email6']) || isset($_POST['_learner_course6']) && empty($_POST['_learner_course6']))
			wc_add_notice( __( 'Please fill in "Learner 7" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name7']) && empty($_POST['_learner_first_name7']) || isset($_POST['_learner_last_name7']) && empty($_POST['_learner_last_name7']) || 	isset($_POST['_learner_email7']) && empty($_POST['_learner_email7']) || isset($_POST['_learner_course7']) && empty($_POST['_learner_course7']))
			wc_add_notice( __( 'Please fill in "Learner 8" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name8']) && empty($_POST['_learner_first_name8']) || isset($_POST['_learner_last_name8']) && empty($_POST['_learner_last_name8']) || 	isset($_POST['_learner_email8']) && empty($_POST['_learner_email8']) || isset($_POST['_learner_course8']) && empty($_POST['_learner_course8']))
			wc_add_notice( __( 'Please fill in "Learner 9" Information.' ), 'error' );
		
		if ( isset($_POST['_learner_first_name9']) && empty($_POST['_learner_first_name9']) || isset($_POST['_learner_last_name9']) && empty($_POST['_learner_last_name9']) || 	isset($_POST['_learner_email9']) && empty($_POST['_learner_email9']) || isset($_POST['_learner_course9']) && empty($_POST['_learner_course9']))
			wc_add_notice( __( 'Please fill in "Learner 10" Information.' ), 'error' );
	}

	// Save custom checkout fields the data to the order
	add_action( 'woocommerce_checkout_create_order', 'custom_checkout_field_update_meta', 10, 2 );
	function custom_checkout_field_update_meta( $order, $data ){
		if ( isset( $_POST['_count'] ) ) {    
			// Update meta data for count
			$order->update_meta_data( '_count', sanitize_text_field( $_POST['_count'] ) );
		}
		$learner_num = $order->get_meta( '_count' );
		for ($l = 0 ; $l < $learner_num; $l++){
			if( isset($_POST['_learner_first_name'.$l]) && ! empty($_POST['_learner_first_name'.$l]) )
				$order->update_meta_data( '_learner_first_name'.$l, sanitize_text_field( $_POST['_learner_first_name'.$l] ) );

			if( isset($_POST['_learner_last_name'.$l]) && ! empty($_POST['_learner_last_name'.$l]) )
				$order->update_meta_data( '_learner_last_name'.$l, sanitize_text_field( $_POST['_learner_last_name'.$l] ) );

			if( isset($_POST['_learner_email'.$l]) && ! empty($_POST['_learner_email'.$l]) )
				$order->update_meta_data( '_learner_email'.$l, sanitize_text_field( $_POST['_learner_email'.$l] ) );

			if( isset($_POST['_learner_course'.$l]) && ! empty($_POST['_learner_course'.$l]) )
				$order->update_meta_data( '_learner_course'.$l, sanitize_text_field( $_POST['_learner_course'.$l] ) );
		}
	}

	//Adding Fields to Order Details Table
	function learner_information_display( $order) {
		$learner_num = $order->get_meta( '_count' );
		if($learner_num){
			echo '<h2 class="woocommerce-order-details__title">' .  'Learner Information'  . '</h2>';
		echo '<table class="woocommerce-table woocommerce-table--order-details">';
		for ($l = 0 ; $l < $learner_num; $l++){
				echo '<tr class="woocommerce-table__line-item">' . '<td>' . $order->get_meta( '_learner_first_name'.$l) . '</td>' . '<td>' . $order->get_meta( '_learner_last_name'.$l) . '</td>' . '<td>' . $order->get_meta( '_learner_email'.$l) . '</td>' . '<td>' . $order->get_meta( '_learner_course'.$l) . '</td>' . '</tr>';
		}  
		echo '</table>';
		}
	}

	//Adding Fields to Confirmation Email
	function learner_information_display_email( $order) {
		$learner_num = $order->get_meta( '_count' );
		if($learner_num){
			echo '<h2 class="woocommerce-order-details__title">' .  'Learner Information'  . '</h2>';
		echo '<table style="width: 100%; margin-bottom: 2rem; border: 2px solid rgb(229, 229, 229);" class="woocommerce-table woocommerce-table--order-details">';
		for ($l = 0 ; $l < $learner_num; $l++){
				echo '<tr class="woocommerce-table__line-item">' . '<td style="border-bottom: 1px solid rgb(229, 229, 229)">' . $order->get_meta( '_learner_first_name'.$l) . '</td>' . '<td style="border-left: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229)">' . $order->get_meta( '_learner_last_name'.$l) . '</td>' . '<td style="border-left: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229)">' . $order->get_meta( '_learner_email'.$l) . '</td>' . '<td style="border-left: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229)">' . $order->get_meta( '_learner_course'.$l) . '</td>' . '</tr>';
		}  
		echo '</table>';
		}
	}


	add_action( 'woocommerce_order_details_after_order_table', 'learner_information_display' );
	add_action( 'woocommerce_email_after_order_table', 'learner_information_display_email' );

//Display field value on the order edit page
	function learner_information_display_admin( $order) {
		$learner_num = $order->get_meta( '_count' );
		if($learner_num){
			echo '<h2 class="woocommerce-order-details__title">' .  'Learner Information'  . '</h2>';
		echo '<table style="background-color: lightgray; border-radius: 4px;" class="x_td woocommerce-table woocommerce-table--order-details">';
		for ($l = 0 ; $l < $learner_num; $l++){
				echo '<tr style="background-color: white;" class="x_order_item woocommerce-table__line-item">' . '<td class="x_td" style="text-align: center; padding: 0.2rem;">' . $order->get_meta( '_learner_first_name'.$l) . '</td>' . '<td class="x_td" style="text-align: center; padding: 0.2rem;">' . $order->get_meta( '_learner_last_name'.$l) . '</td>' . '<td class="x_td" style="text-align: center; padding: 0.2rem;">' . $order->get_meta( '_learner_email'.$l) . '</td>' . '<td class="x_td" style="text-align: center; padding: 0.2rem;">' . $order->get_meta( '_learner_course'.$l) . '</td>' . '</tr>';
		}  
		echo '</table>';
		}
	}
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'learner_information_display_admin', 10, 1 );

// Register a new column that will show if for another User
add_filter( 'manage_edit-shop_order_columns', 'register_is_company_order_column', 10, 1 );
function register_is_company_order_column( $columns ) {
	$columns['_count'] = 'Company Order';
	return $columns;
}

// Show a checkmark emoji in the column if it's true
add_action( 'manage_shop_order_posts_custom_column', 'display_is_company_order_column', 10, 1 );
function display_is_company_order_column( $column ) {
	global $post;

	if ( '_count' === $column ) {
		$company_order = get_post_meta( $post->ID, '_count', true );
	
		if ( false !== $company_order && strlen( $company_order ) > 0 ) {
			echo "✔️";
		}
	}
}

// Display custom checkbox near the default WooCommerce filter options
add_action( 'restrict_manage_posts', 'show_is_company_order_checkbox' );
function show_is_company_order_checkbox() {
	?>

	<label class="company-filter-label">
		Company Order
		<input type="checkbox" name="_count" id="_count" <?php echo isset( $_GET['_count'] ) ? 'checked' : ''; ?>>
	</label>
	<style>
		.company-filter-label{
			color: #162C53;
			font-family: "Open Sans", Sans-serif;
			font-weight: 500;
			font-size: 1.1rem;
			margin-right: 0.8rem;
		}
		
		.company-filter-label input[type="checkbox"]{
			/*background-color: darkgray;*/
			border-color: gray;
			font-size: 1.1rem;
			margin: 0;
			margin-left: 0.3rem;
			height: 17px;
			transform: scale(1.5);
		}
		
		input[type="checkbox"]:checked{
			border-color: #99c8ff;
			background-color: #99c8ff;
			box-shadow: none;
		}
		
		#_count, .column-_count{
			text-align: right;
		}
		
	</style>

	<?php
}

// Modify a query if the checkbox was checked
add_action( 'pre_get_posts', 'filter_woocommerce_orders_in_the_table', 99, 1 );
function filter_woocommerce_orders_in_the_table( $query ) {
	if ( ! is_admin() ) {
		return;
	}
	
	global $pagenow;

	if ( 'edit.php' === $pagenow && 'shop_order' === $query->query['post_type'] ) {
		
		// We don't need to modify a query if a checkbox wasn't checked
		if ( ! isset( $_GET['_count'] ) ) {
			return $query;
		}
		
		$meta_query = array(
			array(
				'key' => '_count',
				'value' =>  array(1,2,3,4,5,6,7,8,9,10),
				'compare' => '='
			)
		);
		
		$query->set( 'meta_query', $meta_query );
	}
	
	return;
}

/* Purchase for someone else button */
add_theme_support('woocommerce');
?>
