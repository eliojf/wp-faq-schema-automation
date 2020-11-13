<?php
function zeropixel_wp_faq_schema_automation_init() {

    // Add Faq schema to header
    function zeropixel_wp_faq_schema_automation_add_header_to_post() {

        global $post;

        $post_data = get_post($post->ID); //retrieves the post via the ID
        $faq_status = get_post_meta($post->ID, 'faq_status', true); //retrieves if we display the FAQ schema

        if ($faq_status == true) {
            $titleFAQ = trim(strip_tags($post_data->post_title));
            $contentFAQ = trim(strip_tags($post_data->post_content));
            if (!empty($titleFAQ) && !empty($contentFAQ)) {
                $dataSchemaFAQ = array();
                $dataSchemaFAQ[] = array(
                    "@type" => "Question", 
                    "name" => stripslashes($titleFAQ),
                    "acceptedAnswer" => array(
                        "@type" => "Answer", 
                        "text" => stripslashes($contentFAQ)
                    )
                );

                ?>
                <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "FAQPage",
                        "mainEntity": <?php echo json_encode($dataSchemaFAQ); ?>
                    }
                </script>
                <?php
            }
        }
    }

    add_action( 'wp_head', 'zeropixel_wp_faq_schema_automation_add_header_to_post' );
}