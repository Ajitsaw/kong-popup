<?php
$templates = array();
// get all items which belongs to popup-template category
$popup_template_categories = get_terms( 
    array(
        'taxonomy'      => 'popup-template',
        'hide_empty'    => false,
    ) 
);
// if popup_template_categories exists
if ( $popup_template_categories ) {
    foreach ( $popup_template_categories as $popup_template_category ) {
        $templates[] = $popup_template_category->slug;
    }
}
$slug = get_post_meta( $popup->ID, 'template', true );
// print_data( $templates );
?>

<!-- .edit-popup-section starts -->
<div class="wrap edit-popup-section">
    <!-- .kong-container starts -->
    <div class="kong-container">
        <div class="project-title"><?php echo __( $popup->post_title, 'kong-popup' ); ?></div>
        <div class="success-message" id="success-message"></div>
        <!-- .form-conainer starts -->
        <div class="form-conainer">
            <!-- .tabs-container starts -->
            <div class="tabs-container">
                <!-- #tabs starts -->
                <ul id="tabs">
                    <li data-href="#appearance"><?php echo __( 'Appearance', 'kong-popup' ); ?></li>
                    <li data-href="#content"><?php echo __( 'Content', 'kong-popup' ); ?></li>
                    <?php
                    if ( in_array( $slug, array( 'contact', 'subscribe' ) ) ) {
                        ?>
                        <li data-href="#success-page"><?php echo __( 'Success Page', 'kong-popup' ); ?></li>
                        <?php
                    }
                    ?>
                    <li data-href="#behavior"><?php echo __( 'Behavior', 'kong-popup' ); ?></li>
                    <li data-href="#targeting"><?php echo __( 'Targeting', 'kong-popup' ); ?></li>
                </ul>
                <!-- #tabs ends -->

                <!-- .is-template-block starts -->
                <div class="is-template-block">
                    <input type="checkbox" name="is_template" class="is-template-box option-checkbox" id="is-template-box" <?php if ( isset( $popup_meta[ 'is_template' ] ) == 'on' ) echo 'checked'; ?> />
                    <label>
                        <span><?php echo __( 'Mark as Template?', 'kong-popup' ); ?></span>
                    </label>
                </div>
                <!-- .is-template-block ends -->

                <!-- #template starts -->
                <span id="template">
                <?php 
                    $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                    echo __( $template_category->name, 'kong-popup' ); 
                ?>
                </span>
                <!-- #template ends -->
            </div>
            <!-- .tabs-container ends -->

            <!-- .tab-container starts -->
            <div class="tab-container">
                <!-- #appearance starts -->
                <div class="tab-content" id="appearance">
                    <?php require_once PLUGIN_BASE_DIR . 'admin/views/tabs/appearance.php'; ?>
                </div>
                <!-- #appearance ends -->

                <!-- #content starts -->
                <div class="tab-content" id="content">
                    <?php require_once PLUGIN_BASE_DIR . 'admin/views/tabs/content.php'; ?>
                </div>
                <!-- #content ends -->

                <?php
                if ( in_array( $slug, array( 'contact', 'subscribe' ) ) ) {
                    ?>
                    <!-- #success-page starts -->
                    <div class="tab-content" id="success-page">
                        <?php require_once PLUGIN_BASE_DIR . 'admin/views/tabs/success-page.php'; ?>
                    </div>
                    <!-- #success-page ends -->
                    <?php
                }
                ?>

                <!-- #behavior starts -->
                <div class="tab-content" id="behavior">
                    <?php require_once PLUGIN_BASE_DIR . 'admin/views/tabs/behavior.php'; ?>
                </div>
                <!-- #behavior ends -->

                <!-- #targeting starts -->
                <div class="tab-content" id="targeting">
                    <?php require_once PLUGIN_BASE_DIR . 'admin/views/tabs/targeting.php'; ?>
                </div>
                <!-- #targeting ends -->
            </div>
            <!-- .tab-container ends -->
        </div>
        <!-- .form-conainer ends -->
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .edit-popup-section ends -->

<script>
    var popupData = {};
    <?php
    if ( isset( $_REQUEST[ 'id' ] ) && $_REQUEST[ 'id' ] > 0 ) {
        ?>
        popupData.popup_id = <?php echo $_REQUEST[ 'id' ]; ?>;
        <?php 
        foreach ( $popup_meta as $key => $value ) {
            if ( is_array( $value ) ) {
                if ( $key != "publish_popup_date" ) {
                    ?>
                    popupData.<?php echo $key; ?> =  [<?php echo '"' . implode( '","',  $value ) . '"' ?>];
                    <?php 
                }
            } else { 
                ?>
                popupData.<?php echo $key; ?> = '<?php echo trim( $value ); ?>';
                <?php 
            }
        }
    }
    ?>
</script>