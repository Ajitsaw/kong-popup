<!-- .recent-popups-section starts -->
<div class="wrap recent-popups-section kg_primary_bg_color">
    <!-- .kong-container starts -->
    <div class="kong-container">
        <!-- .popup-listing starts -->
        <div class="popup-listing">
            <h2><?php echo __( 'What Do You Want To Create Today?', 'kong-popup' ); ?></h2>
            <?php
            // WP_Query for those popups which are not marked as template
            $get_popups_query = new WP_Query(
                array(
                    'post_type'         => 'popup', 
                    'post_status'       => 'publish',
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
                ?>
                <!-- .most-recent start -->
                <div class="listing-row most-recent">
                    <h3><?php echo __( 'Most Recent', 'kong-popup' ); ?></h3>
                    <!-- .listing-thumb start -->
                    <ul class="listing-thumb">
                    <?php 
                    while ( $get_popups_query->have_posts() ) {
                        $get_popups_query->the_post();
                        $slug = get_post_meta( get_the_ID(), 'template', true );
                        $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                        $src = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ?  wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugin_dir_url( __FILE__ ) . 'images/blank.png';
                        ?>
                        <!-- .template-item start -->
                        <li class="template-item">
                            <a href="<?php echo admin_url( 'admin.php' ) . '?page=edit-popup&id=' . get_the_ID() . '&template=' . get_post_meta( get_the_ID(), 'template', true ); ?>">
                                <!-- .listing-thumb-single start -->
                                <div class="listing-thumb-single">
                                    <img src="<?php echo $src; ?>" alt="<?php echo __( get_the_title(), 'kong-popup' ); ?>" class="template-img">
                                    <span><?php echo __( get_the_title(), 'kong-popup' ); ?></span>
                                </div>
                                <!-- .listing-thumb-single ends -->
                            </a>
                        </li>
                        <!-- .template-item ends -->
                        <?php 
                    }
                    wp_reset_postdata();
                    ?>
                    </ul>
                    <!-- .listing-thumb ends -->
                </div>
                <!-- .most-recent ends -->
                <?php
            }
            ?>

            <!-- .lead-generation starts -->
            <div class="listing-row lead-generation">
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
                    $src = ( get_term_meta( $popup_template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $popup_template_category->term_id, '_image_id', true ) ) : PLUGIN_BASE_URL . 'admin/images/blank.png'; 
                    $templates = $this->get_templates_by_term_slug( $popup_template_category->slug );
                    if ( $templates ) {
                        ?>
                        <h3><?php echo __( "Lead Generation: $popup_template_category->name", 'kong-popup' ); ?></h3>
                        <!-- .listing-thumb starts -->
                        <ul class="listing-thumb">
                        <?php
                        foreach ( $templates as $template ) {
                            ?>
                            <!-- .template-item start -->
                            <li class="template-item">
                                <a href="javascript:void(0);" class="target-clone" data-id="<?php echo $template->ID; ?>" data-template="<?php echo $template->slug; ?>">
                                    <!-- .listing-thumb-single starts -->
                                    <div class="listing-thumb-single">
                                        <img src="<?php echo $src; ?>" alt="<?php echo $template->name; ?>" class="template-img img-<?php echo $template->slug; ?>">

                                        <span>
                                            <?php echo __( $template->post_title, 'kong-popup' ); ?>
                                        </span>
                                    </div>
                                    <!-- .listing-thumb-single ends -->
                                </a>
                            </li>
                            <!-- .template-item ends -->
                            <?php
                        }
                        ?>
                        </ul>
                        <!-- .listing-thumb ends -->
                        <?php 
                    }
                }
            }
            ?>
            </div>
            <!-- .lead-generation ends -->
        </div>
        <!-- .popup-listing ends -->
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .recent-popups-section ends -->

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