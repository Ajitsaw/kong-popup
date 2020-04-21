<!-- .popup-lists-section starts -->
<div class="wrap popup-lists-section">
    <!-- .kong-container starts -->
    <div class="kong-container popup-wrap">
        <?php
        // WP_Query for those popups which are not marked as template
        $get_popups_query = new WP_Query(
            array(
                'post_type'         => 'popup', 
                // 'post_status'       => 'publish',
                'orderby'           => 'modified',
                'order'             => 'DESC',
                'posts_per_page'    => -1,
                'meta_query'        => array(
                    array(
                        'key'       => 'is_template',
                        'compare'   => 'NOT EXISTS'
                    ),
                ),
            )
        );
        // if get_popups_query exists
        if ( $get_popups_query->have_posts() ) {
            while ( $get_popups_query->have_posts() ) {
                $get_popups_query->the_post();
                $slug = get_post_meta( get_the_ID(), 'template', true );
                $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                ?>
                <!-- .popup-item starts -->
                <div class="popup-item">
                    <!-- .popup-item-inner starts -->
                    <div class="popup-item-inner">
                        <!-- .popup-thumb starts -->
                        <div class="popup-thumb">
                            <h3><?php echo __( get_the_title(), 'kong-popup' ); ?></h3>
                            <img src="<?php echo PLUGIN_BASE_URL . 'templates/' . get_post_meta( get_the_ID(), 'template', true ) . '/thumbnail.png'; ?>" alt="<?php echo __( get_the_title(), 'kong-popup' ); ?>">
                        </div>
                        <!-- .popup-thumb ends -->

                        <!-- .popup-bottom starts -->
                        <div class="popup-bottom">
                            <a href="javascript:void(0);" class="btn-setting btn-setting--item kg_secondary_bg"><i class="fa fa-cog" aria-hidden="true"></i></a>
                            <!-- .popup-details starts -->
                            <div class="popup-details">
                                <!-- ul starts -->
                                <ul>
                                    <!-- .popup-view starts -->
                                    <li class="popup-view">
                                        <span><?php echo ( get_post_meta( get_the_ID(), 'kong_popup_analytics', true ) ) ? count( unserialize( get_post_meta( get_the_ID(), 'kong_popup_analytics', true ) ) ) : 0; ?></span>
                                        <?php echo __( 'views', 'kong-popup' ); ?>
                                    </li>
                                    <!-- .popup-view ends -->

                                    <!-- .popup-hits starts -->
                                    <li class="popup-hits">
                                        <span>3</span>
                                        <?php echo __( 'hits', 'kong-popup' ); ?>
                                    </li>
                                    <!-- .popup-hits ends -->

                                    <!-- .popup-ctrl starts -->
                                    <li class="popup-ctrl">
                                        <span>20</span>
                                        <?php echo __( 'ctr%', 'kong-popup' ); ?>
                                    </li>
                                    <!-- .popup-ctrl ends -->

                                    <!-- .popup-type starts -->
                                    <li class="popup-type">
                                        <span>
                                            <?php echo __( $template_category->name, 'kong-popup' ); ?>
                                        </span>
                                    </li>
                                    <!-- .popup-type ends -->
                                </ul>
                                <!-- ul ends -->
                            </div>
                            <!-- .popup-details ends -->

                            <!-- .action-panel starts -->
                            <div class="action-panel">
                                <!-- .action-panel--btns starts -->
                                <ul class="action-panel--btns">
                                    <li>
                                        <!-- .action-btn starts -->
                                        <a class="action-btn" href="<?php echo admin_url( 'admin.php' ) . '?page=edit-popup&id=' . get_the_ID() . '&template=' . get_post_meta( get_the_ID(), 'template', true ); ?>">
                                            <?php echo __( 'Edit', 'kong-popup' ); ?>
                                        </a>
                                        <!-- .action-btn ends -->
                                    </li>

                                    <li>
                                        <!-- .action-btn starts -->
                                        <a class="action-btn" href="<?php echo admin_url( 'admin-ajax.php' ) . '?action=preview&popup_id=' . get_the_ID(); ?>" target="_blank">
                                            <?php echo __( 'Preview', 'kong-popup' ); ?>
                                        </a>
                                        <!-- .action-btn ends -->
                                    </li>

                                    <li>
                                        <!-- .action-btn starts -->
                                        <a href="#" class="action-btn clone-popup target-clone" data-id="<?php echo get_the_ID(); ?>">
                                            <?php echo __( 'Clone', 'kong-popup' ); ?>
                                        </a>
                                        <!-- .action-btn ends -->
                                    </li>

                                    <li>
                                        <!-- .action-btn starts -->
                                        <a href="#" class="action-btn trash-popup" data-id="<?php echo get_the_ID(); ?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <!-- .action-btn ends -->
                                    </li>

                                    <!-- <li> -->
                                        <!-- .change-status starts -->
                                        <!-- <select name="popup_status" class="change-status" data-id="<?php //echo get_the_ID(); ?>">
                                            <option value="draft" <?php //if( get_post_status() == "draft" ) echo "selected='selected'"; ?>>Draft</option>
                                            <option value="publish" <?php //if( get_post_status() == "publish" ) echo "selected='selected'"; ?>>Publish</option>
                                        </select> -->
                                        <!-- .change-status ends -->
                                    <!-- </li> -->
                                </ul>
                                <!-- .action-panel--btns ends -->
                            </div>
                            <!-- .action-panel ends -->
                        </div>
                        <!-- .popup-bottom ends -->
                    </div>
                    <!-- .popup-item-inner ends -->
                </div>
                <!-- .popup-item ends -->
                <?php 
            }
            wp_reset_postdata();
        } else {
            ?>
            <p><?php echo __( 'No popup created yet', 'kong-popup' ); ?></p>
            <?php 
        } 
        ?>
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .popup-lists-section ends -->

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