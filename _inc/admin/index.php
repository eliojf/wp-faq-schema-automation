<?php

function zeropixel_wp_faq_schema_automation_admin_init() {

    function zeropixel_wp_faq_schema_automation_add_visibility() {
        $post_types = array_values(get_post_types( array('public' => true) ));
        add_meta_box(
            'zeropixel_wp_faq_schema_automation_visibility_id',
            'WP FAQ Schema',
            'zeropixel_wp_faq_schema_automation_add_visibility_html',
            $post_types
        );
    }

    //Render HTML Box from form
    function zeropixel_wp_faq_schema_automation_add_visibility_html($post) {
        global $post;
        $faq_status = get_post_meta($post->ID, 'faq_status', true);
        include('faq-views.php');
    }

    //Save Meta Data from form
    function zeropixel_wp_faq_schema_automation_save_faq_status($post_id, $post) {

        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['zeropixel_wp_faq_schema_automation_form_nonce'] ) ? $_POST['zeropixel_wp_faq_schema_automation_form_nonce'] : '';
        $nonce_action = 'zeropixel_wp_faq_schema_automation_form_nonce_action';

        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
 
        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        if ($_POST['faq_status']) {
            update_post_meta($post->ID, 'faq_status', 1);
        } else {
            update_post_meta($post->ID, 'faq_status', 0);
        }
    }

    add_action('add_meta_boxes', 'zeropixel_wp_faq_schema_automation_add_visibility');
    add_action('save_post', 'zeropixel_wp_faq_schema_automation_save_faq_status', 1, 2);

}
