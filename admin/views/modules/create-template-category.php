<!-- .create-template-category starts -->
<div class="wrap create-template-category settings-section kg_primary_bg_color">
    <!-- .kong-container-settings starts -->
    <div class="kong-container-settings create-folder">
        <!-- .project-title starts -->
        <div class="project-title project-title--folder">
            <span><?php echo __( 'Create A Template Category', 'kong-popup' ); ?></span> 
            <input type="text" id="template-category-name" placeholder="Template Category Name" required />
            <span class="error-message" id="tcn-error-message"></span> 
            <input type="button" class="kg_secondary_bg btn" id="template-category-image-btn" value="Upload" />
            <input type="hidden" id="template-category-image" />
            <button class="kg_secondary_bg btn" id="create-template-category"><?php echo __( 'Create', 'kong-popup' ); ?></button>
        </div>
        <!-- .project-title ends -->

        <!-- .template-category-container starts -->
        <div class="template-category-container">
            <!-- .template-category starts -->
            <ul class="template-category clearfix">
            <?php 
            // get all items which belongs to popup-template category
            $popup_template_categories = get_terms( 
                array(
                    'taxonomy'      => 'popup-template',
                    'hide_empty'    => false
                )
            );
            // if popup_template_categories exists
            if ( count( $popup_template_categories ) ) {
                foreach ( $popup_template_categories as $popup_template_category ) {
                    ?>
                    <!-- .template-category-item starts -->
                    <li class="template-category-item">
                        <a href="<?php echo admin_url( 'admin.php' ) . '?page=template-lists&category=' . $popup_template_category->slug; ?>">
                        	<?php
                        	$src = ( get_term_meta( $popup_template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $popup_template_category->term_id, '_image_id', true ) ) : PLUGIN_BASE_URL . 'admin/images/blank.png';
                        	?>
                            <img src="<?php echo $src; ?>" alt="<?php echo __( $popup_template_category->name, 'kong-popup' ); ?>" />
                            
                            <!-- .template-category-name starts -->
                            <span class="template-category-name">
                                <?php echo __( $popup_template_category->name, 'kong-popup' ); ?>
                            </span>
                            <!-- .template-category-name ends -->
                        </a>
                    </li>
                    <!-- .template-category-item ends -->
                    <?php
                }
            }
            ?>
            </ul>
            <!-- .template-category ends -->
        </div>
        <!-- .template-category-container ends -->
    </div>
    <!-- .kong-container-settings ends -->
</div>
<!-- .create-template-category ends -->

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