<?php

/**
 * Add Bootstrap form styling to WooCommerce fields
 */
function woocommerce_bootstrap_input ($args, $key, $value) {
  $args['input_class'][] = 'form-control';
  return $args;
}
add_filter('woocommerce_form_field_args','woocommerce_bootstrap_input', 10, 3);

/**
 * Checkout fields class
 */
function woocommerce_checkout_name_class( $f ) {
  $f['billing']['billing_first_name']['class'][0] = 'col-md-6';
  $f['billing']['billing_last_name']['class'][0] = 'col-md-6';
  $f['billing']['billing_email']['class'][0] = 'col-md-6';
  $f['billing']['billing_address_1']['class'][0] = 'col-md-6';
  $f['billing']['billing_address_2']['class'][0] = 'col-md-6';
  $f['billing']['billing_phone']['class'][0] = 'col-md-6';
  $f['billing']['billing_country']['class'][0] = 'col-md-12';
  $f['billing']['billing_postcode']['class'][0] = 'col-md-4';
  $f['billing']['billing_state']['class'][0] = 'col-md-4';
  $f['billing']['billing_city']['class'][0] = 'col-md-4';
  return $f;
}
add_filter( 'woocommerce_checkout_fields' , 'woocommerce_checkout_name_class', 9000 );

add_filter('woocommerce_form_field_country', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_state', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_textarea', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_checkbox', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_password', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_text', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_email', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_tel', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_number', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_select', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_radio', 'clean_checkout_fields_class_attribute_values', 20, 4);

function clean_checkout_fields_class_attribute_values( $field, $key, $args, $value ){
  if( is_checkout() ){
    // remove "form-row"
    $field = str_replace( array('<p class="form-row ', '<p class="form-row'), array('<p class="', '<p class="'), $field);
  }
  return $field;
}

add_filter('woocommerce_checkout_fields', 'custom_checkout_fields_class_attribute_value', 20, 1);
function custom_checkout_fields_class_attribute_value( $fields ){
  foreach( $fields as $fields_group_key => $group_fields_values ){
    foreach( $group_fields_values as $field_key => $field ){
      // Remove other classes (or set yours)
      $fields[$fields_group_key][$field_key]['class'] = array();
    }
  }
  return $fields;
}

/**
 * Add Bootstrap form styling to WooCommerce Checkout Form
 */
function woocommerce_bootstrap_checkout($fields) {
  foreach ($fields as &$fieldset) {
    foreach ($fieldset as &$field) {
      // if you want to add the form-group class around the label and the input
      $field['class'][] = 'form-group';
      $field['input_class'][] = 'form-control';
    }
  }
  return $fields;
}
add_filter('woocommerce_checkout_fields', 'woocommerce_bootstrap_checkout' );

/**
 * Default city on checkout
 */
function woocommerce_default_city($fields) {
  $fields['billing']['billing_city']['default'] = 'Toronto';
  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'woocommerce_default_city' );

/**
 * Default city on checkout
 */
function woocommerce_default_province($fields) {
  return 'ON';
}
add_filter( 'default_checkout_billing_state', 'woocommerce_default_province' );

/**
 * Change Email positioning
 */
function woocommerce_move_checkout_email( $fields ) {
  $fields['billing_email']['priority'] = 25;
  $fields['billing_phone']['priority'] = 27;
  $fields['billing_country']['priority'] = 65;
  return $fields;
}
add_filter( 'woocommerce_billing_fields', 'woocommerce_move_checkout_email', 10, 1 );

/**
 * Remove company field
 */
function remove_company_field( $fields ) {
  unset($fields['billing']['billing_company']);
  return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'remove_company_field' );




?>