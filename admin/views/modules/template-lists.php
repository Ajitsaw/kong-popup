<?php
// check whether user wants to show a secific category templates or not.
if ( isset( $_REQUEST[ 'category' ] ) ) {
    $request = $this->get_templates_by_term_slug( $_REQUEST[ 'category' ] );
    $templates = new WP_Query();
    $templates->parse_query( $request );
    $templates = $templates->query;
} else {
    $templates = $this->get_templates()->get_posts();
}
?>

<!-- .template-lists-section starts -->
<div class="wrap template-lists-section">
    <!-- .kong-container starts -->
    <div class="kong-container">
        <!-- .section-header starts -->
        <div class="section-header">
            <h2 class="page-title"><?php echo __( 'What Do You Want To Create Today??', 'kong-popup' ); ?></h2>
            <!-- .search-box starts -->
            <div class="search-box">
                <input type="text" name="search_template" id="search-template" placeholder="Search Templates" />
            </div>
            <!-- .search-box ends -->
        </div>
        <!-- .section-header ends -->

        <!-- .template-wrap starts -->
        <div class="template-wrap">
            <!-- .template-box starts -->
            <div class="template-box">
                <div class="template-box__browse">
                    <h3><?php echo __( 'Browse Templates' , 'kong-popup' ); ?></h3>
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
                        ?>
                        <div class="template-cat" id="template-cat">
                            <ul>
                                <?php
                                foreach ( $popup_template_categories as $popup_template_category ) {
                                    // WP_Query for those popups which are marked as template and also belongs to the recent popup-template category
                                    $args = array(
                                        'post_type'         => 'popup', 
                                        'post_status'       => 'publish',
                                        'meta_query'        => array(
                                            array(
                                                'key'       => 'is_template',
                                                'value'     => 'on',
                                                'compare'   => '=',
                                            ),
                                        ),
                                        'tax_query'         => array(
                                            array(
                                                'taxonomy'  => 'popup-template',
                                                'field'     => 'slug',
                                                'terms'     => $popup_template_category->slug,
                                            ),
                                        ),
                                    );
                                    $has_template = new WP_Query( $args );
                                    // if recent query has found atleast one post
                                    if ( $has_template->found_posts ) {
                                        ?>
                                        <li class="category-item<?php if ( $popup_template_category->slug == $_REQUEST[ 'category' ] ) echo " selected-category"; ?>" id="<?php echo $popup_template_category->slug; ?>" data-template="<?php echo $popup_template_category->slug; ?>">
                                            <a href="javascript:void(0);"><?php echo __( $popup_template_category->name, 'kong-popup' ); ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- .template-box ends -->

            <?php 
            // if templates exists
            if ( $templates ) {
                ?>
                <!-- .template-listing starts -->
                <div class="template-listing" id="template-listing">
                    <?php
                    foreach ( $templates as $template ) { 
                        $slug = get_post_meta( $template->ID, 'template', true );
                        $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                        $src = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugin_dir_url( __FILE__ ) . 'images/blank.png';
                        ?>
                        <!-- .template-box starts -->
                        <div class="template-box" id="<?php echo $template_category->term_id; ?>">
                            <!-- .template-box__temp starts -->
                            <div class="template-box__temp">
                                <!-- figure starts -->
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="<?php echo $src; ?>" alt="<?php echo $template_category->name; ?>">
                                    </a>

                                    <figcaption><?php echo $template->post_title; ?></figcaption>

                                    <!-- .btn-setting starts -->
                                    <a href="javascript:void(0);" class="btn-setting">
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
                                            <span><?php echo ( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ? count( unserialize( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ) : 0; ?></span>
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
                                        <li><button class="tem-btn">Edit</button></li>
                                        <li><button class="tem-btn">Preview</button></li>
                                        <li><button class="tem-btn">Clone</button></li>
                                        <li><button class="tem-btn"><i class="fa fa-trash" aria-hidden="true"></i></button></li>
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
                    ?>
                </div>
                <!-- .template-listing ends -->
                <?php
            } else {
                ?>
                <p><?php echo __( 'No template found', 'kong-popup' ); ?></p>
                <?php
            }
            ?>
        </div>
        <!-- .template-wrap ends -->
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .template-lists-section ends -->