<?php
$faq_status_class = 'checked';
if(!isset($faq_status) || $faq_status == false){
    $faq_status_class = '';
}
    ?>
    <fieldset id="zeropixel_wp_faq_schema_automation_wrapper">
        
    <?php wp_nonce_field('zeropixel_wp_faq_schema_automation_form_nonce_action', 'zeropixel_wp_faq_schema_automation_form_nonce') ?>

        <div>
            <p>Include Schema
                <label>
                    <input id="faq_toggler" <?php echo $faq_status_class ?> name="faq_status"  type="checkbox">
                </label>
            </p>
        </div>
    </fieldset>
    <?php
?>