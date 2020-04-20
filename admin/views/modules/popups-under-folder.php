<!-- .popups-under-folder-section starts -->
<div class="wrap popups-under-folder-section">
    <!-- .kong-container starts -->
    <div class="kong-container create-folder">
        <!-- .project-title starts -->
        <div class="project-title">
        <?php 
            $folder_slug = $_REQUEST[ 'folder' ];
            $popup_folder_category = get_term_by( 'slug', $folder_slug, 'popup-folder' );
            if ( $popup_folder_category ) echo __( $popup_folder_category->name, 'kong-popup' ); 
        ?>
        </div>
        <!-- .project-title ends -->
        <?php 
        // WP_Query for those popups which are belongs to requested folder
        $get_popups_query = new WP_Query(
            array(
                'post_type'         => 'popup',
                'post_status'       => array(
                    'publish',
                    'draft'
                ),
                'posts_per_page'    => -1,
                'tax_query'         => array(
                    array(
                        'taxonomy'  => 'popup-folder',
                        'field'     => 'slug',
                        'terms'     => $folder_slug
                    )
                )
            )
        );
        // if get_popups_query exists
        if ( $get_popups_query->have_posts() ) {
            while ( $get_popups_query->have_posts() ) {
                $get_popups_query->the_post();
                $slug = get_post_meta( get_the_ID(), 'template', true );
                $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                ?>
                <!-- .template-box starts -->
                <div class="template-box" name="mailchimp">
                    <!-- .template-box__temp starts -->
                    <div class="template-box__temp">
                        <!-- figure starts -->
                        <figure>
                            <a href="javascript:void(0);"><img src="<?php echo PLUGIN_BASE_URL . 'templates/' . get_post_meta( get_the_ID(), 'template', true ) . '/thumbnail.png'; ?>" alt=""></a>

                            <figcaption><?php __( get_the_title(), 'kong-popup' );?></figcaption>

                            <!-- .btn-setting starts -->
                            <a href="javascript:void(0);" class="btn-setting kg_secondary_bg">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <!-- .btn-setting ends -->
                        </figure>
                        <!-- figure ends -->

                        <!-- .template-box__cnt starts -->
                        <div class="template-box__cnt">
                            <!-- .template-box__topinfo starts -->
                            <ul class="template-box__topinfo">
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
                            <!-- .template-box__topinfo ends -->

                            <!-- .template-box__btns starts -->
                            <ul class="template-box__btns">
                               <li>
                                    <!-- .action-btn starts -->
                                    <a class="action-btn" href="<?php echo admin_url( 'admin.php' ) . '?page=edit-popup&id=' . get_the_ID(); ?>">
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
                                    <a href="#" class="action-btn trash-popup" data-id="<?php echo get_the_ID(); ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <!-- .action-btn ends -->
                                </li>

                                <li>
                                    <!-- .change-status starts -->
                                    <select name="popup_status" class="change-status" data-id="<?php echo get_the_ID(); ?>">
                                        <option value="draft" <?php if( get_post_status() == "draft" ) echo "selected='selected'"; ?>>Draft</option>
                                        <option value="publish" <?php if( get_post_status() == "publish" ) echo "selected='selected'"; ?>>Publish</option>
                                    </select>
                                    <!-- .change-status ends -->
                                </li>
                            </ul>
                            <!-- .template-box__btns ends -->
                        </div>
                        <!-- .template-box__cnt ends -->
                    </div>
                    <!-- .template-box__temp ends -->
                </div>
                <!-- .template-box ends -->
                <?php
            }
            wp_reset_postdata();
        } else {
            echo __( 'No popup found', 'kong-popup' );
        }
        ?>        
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .popups-under-folder-section ends -->