<?php

class Kong_Popup_Admin_Ajax
{
    public function __construct() 
    {
        add_action( 'wp_ajax_get_all_templates_ajax', array( $this, 'get_all_templates' ) );

        add_action( 'wp_ajax_set_backend_popup_form_fields_value_ajax', array( $this, 'set_backend_popup_form_fields_value' ) );

        add_action( 'wp_ajax_set_frontend_popup_form_fields_value_ajax', array( $this, 'set_frontend_popup_form_fields_value' ) );
        
        add_action( 'wp_ajax_update_popup_info_ajax', array( $this, 'update_popup_info' ) );
        
        add_action( 'wp_ajax_get_filtered_report_ajax', array( $this, 'get_filtered_report' ) );

        add_action( 'wp_ajax_get_preview_popup_ajax', array( $this, 'get_preview_popup' ) );

        add_action( 'wp_ajax_add_click_target_ajax', array( $this, 'add_click_target' ) );
        add_action( 'wp_ajax_nopriv_add_click_target_ajax', array( $this, 'add_click_target' ) );

        add_action( 'wp_ajax_save_popup_feeds_ajax', array( $this, 'save_popup_feeds' ) );
        add_action( 'wp_ajax_nopriv_save_popup_feeds_ajax', array( $this, 'save_popup_feeds' ) );

        add_action( 'wp_ajax_update_popup_status_ajax', array( $this, 'update_popup_status' ) );
    }

    public function get_all_templates() {
        // get all items which belongs to popup-template category
        $popup_template_categories = get_terms( 
            array(
                'taxonomy'      => 'popup-template',
                'hide_empty'    => false,
            ) 
        );
        // if popup_template_categories exists
        if ( $popup_template_categories ) {
            ?>
            <option value=''><?php echo __( 'All', 'kong-popup' ); ?></option>
            <?php
            foreach ( $popup_template_categories as $popup_template_category ) {
                ?>
                <option value="<?php echo $popup_template_category->slug; ?>"><?php echo __( $popup_template_category->name, 'kong-popup' ); ?></option>
                <?php
            }
        }

        die();
    }

    public function set_backend_popup_form_fields_value() {
        echo get_post_meta( $_REQUEST[ 'popup_id' ], $_REQUEST[ 'field_name' ], true );

        die();
    }

    public function set_frontend_popup_form_fields_value() {
        $result = array();

        $popup_id = $_REQUEST[ 'popup_id' ];
        if ( $_REQUEST[ 'field_type' ] == "email" ) {
            $title_key = 'content_form_' . $_REQUEST[ 'field_type' ] . '_title_' . $_REQUEST[ 'field_id' ];
            $title = ( $this->get_preview_popup_meta( $popup_id, $title_key ) ) ? $this->get_preview_popup_meta( $_REQUEST[ 'popup_id' ], $title_key ) : '';

            $message_key = 'content_form_' . $_REQUEST[ 'field_type' ] . '_message_' . $_REQUEST[ 'field_id' ];
            $message = ( $this->get_preview_popup_meta( $popup_id, $message_key ) ) ? $this->get_preview_popup_meta( $popup_id, $message_key ) : '';

            $required_key = 'content_form_' . $_REQUEST[ 'field_type' ] . '_required_' . $_REQUEST[ 'field_id' ];
            $required = ( $this->get_preview_popup_meta( $popup_id, $required_key ) ) ? $this->get_preview_popup_meta( $popup_id, $required_key ) : '';
            
            $result = array( $title, $message, $required );
        }

        echo json_encode( $result );

        die();
    }

    public function update_popup_info() 
    {
        $meta_data = $_REQUEST[ 'popup_data' ];

        $post_id = $meta_data[ 'popup_id' ];
        unset( $meta_data[ 'popup_id' ] );  // remove the popup_id from array

        if ( $_REQUEST[ 'remove_fields' ] ) {
            foreach ( $_REQUEST[ 'remove_fields' ] as $remove_field ) {
                delete_post_meta( $post_id, $remove_field );                                
            }
        }

        // update post content
        $post = get_post( $post_id );
        $post->post_content = wp_unslash( $_REQUEST[ 'popup_html' ] );
        wp_update_post( $post );

        // update preview table
        $this->update_preview_popup_meta( $post_id, 'popup_structure', $_REQUEST[ 'popup_html' ] );

        // loop the remaining and put in post meta
        foreach ( $meta_data as $mdkey => $mdvalue ) {
            if ( $mdkey == "content_html_structures" ) {
                global $wpdb;

                $current_date = date( 'Y-m-d', time() );

                if ( empty( $mdvalue ) ) {
                    $wpdb->query( "DELETE FROM {$wpdb->prefix}kong_popup_content_structures WHERE popup_id = {$post_id}" );
                } else {
                    $query = $wpdb->get_results( "SELECT structures FROM {$wpdb->prefix}kong_popup_content_structures WHERE popup_id = {$post_id}" );
                    if ( $query ) {
                        $wpdb->query( "UPDATE {$wpdb->prefix}kong_popup_content_structures SET structures = '{$mdvalue}' WHERE popup_id = {$post_id}" );
                    } else {
                        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_content_structures ( popup_id, structures, created_at ) VALUES ( {$post_id}, '{$mdvalue}', '{$current_date}' )" );
                    }
                }
            } else {
                if ( $mdvalue ) {
                    if ( is_array( $mdvalue ) ) {
                        $mdvalue = array_values( array_filter( $mdvalue ) );    // for removing empty array element
                    } else {
                        $expl_data = explode( ',', $mdvalue );
                        if( isset( $expl_data[ 1 ] ) ) {
                            $mdvalue = implode( ',', array_map( 'trim', $expl_data ) ); // for triming whitespace from array element
                        } else {
                            $mdvalue = trim( $expl_data[ 0 ] );
                        }
                    }
                    update_post_meta( $post_id, $mdkey, $mdvalue );
                } else {
                    delete_post_meta( $post_id, $mdkey );
                }
            }

            if ( is_array( $mdvalue ) && empty( $mdvalue[ 0 ] ) ) {
                delete_post_meta( $post_id, $mdkey );
            }
        }

        $post = array( 
            'ID' => $post_id, 
            'post_status' => 'publish',   // The post status - publish|pending|draft|private|static|object|attachment|inherit|future|trash.
        );
        wp_update_post( $post );

        die();
    }

    public function get_filtered_report()
    {
        global $wpdb;

        $total_views_array = array();
        $total_clicks_array = array();
        $total_ctr_array = array();
        $total_average_popup_length_array = array();

        $views_array = array();
        $clicks_array = array();
        $ctrs_array = array();
        $average_popup_length_array = array();

        $views_statistics_array = array();
        $clicks_statistics_array = array();

        $total_leads_array = array();

        $total_activity = array();
        $total_activity_result = array();

        $top_performing_popup_result = array();

        $top_locations = array();
        $top_locations_result = array();

        $from_date = sanitize_text_field( $_REQUEST[ 'from_date' ] ); 
        $to_date = sanitize_text_field( $_REQUEST[ 'to_date' ] );

        /**========== Query for counting total views ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $total_views_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_analytics.ID ) AS total_views_count 
            FROM {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics 
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_analytics.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            $template
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}'
        " );
        if ( $total_views_query[ 0 ]->total_views_count == 0 ) {
            $total_views_query[ 0 ]->total_views_count = "";
        }
        $total_views_array[ 'views_count' ] = $total_views_query;


        /**========== Query for counting total clicks ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_click_targets.template = '{$_REQUEST[ 'template' ]}'" : '';
        $total_clicks_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_click_targets.ID ) AS total_clicks_count 
            FROM {$wpdb->prefix}kong_popup_click_targets AS kong_popup_click_targets 
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_click_targets.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_click_targets.created_at BETWEEN '{$from_date}' AND '{$to_date}'
        " );
        if ( $total_clicks_query[ 0 ]->total_clicks_count == 0 ) {
            $total_clicks_query[ 0 ]->total_clicks_count = "";
        }
        $total_clicks_array[ 'clicks_count' ] = $total_clicks_query;

        /**========== Query for counting click through rate ==========**/
        if ( $total_views_query[ 0 ]->total_views_count > 0 ) {
            $total_ctr_query = round( ( ( $total_clicks_query[ 0 ]->total_clicks_count / $total_views_query[ 0 ]->total_views_count ) * 100 ), 2 );
            if ( is_nan( $total_ctr_query ) ) {
                $total_ctr_query = "";
            } else {
                $total_ctr_query = $total_ctr_query . "%";
            }
        } else {
            $total_ctr_query = "";
        }
        $total_ctr_array[ 'ctr_count' ] = $total_ctr_query;

        /**========== Query for counting average popup length ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND postmeta.meta_key = 'template' AND postmeta.meta_value = '{$_REQUEST[ 'template' ]}'" : '';
        $total_average_popup_length_query = $wpdb->get_results( "
            SELECT ROUND( AVG( DATEDIFF( CURDATE(), STR_TO_DATE( posts.post_date, '%Y-%m-%d' ) ) ), 2 ) AS average
            FROM {$wpdb->prefix}posts AS posts 
            JOIN {$wpdb->prefix}postmeta AS postmeta 
                ON posts.ID = postmeta.post_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND posts.post_date BETWEEN '{$from_date}' AND '{$to_date}'
        " );
        if ( empty( $total_average_popup_length_query[ 0 ]->average ) ) {
            $average_length = "";
        } else {
            $average_length = $total_average_popup_length_query[ 0 ]->average . " days";
        }
        $total_average_popup_length_array[ 'average_popup_length_count' ] = $average_length;

        /**========== Query for views graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $views_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at AS created, 
                   date_format( kong_popup_analytics.created_at, '%Y' ) AS year, 
                   date_format( kong_popup_analytics.created_at, '%c' ) AS month, 
                   date_format( kong_popup_analytics.created_at, '%e' ) AS day, 
                   COUNT( kong_popup_analytics.ID ) AS count 
            FROM {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY created 
            -- ORDER BY created_at
        " );
        if ( empty( $views_query ) ) {
            $views_query = 0;
        }
        $views_array[ 'views_report' ] = $views_query;

        /**========== Query for clicks graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_click_targets.template = '{$_REQUEST[ 'template' ]}'" : '';
        $clicks_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at AS created, 
                   date_format( kong_popup_click_targets.created_at, '%Y' ) AS year, 
                   date_format( kong_popup_click_targets.created_at, '%c' ) AS month, 
                   date_format( kong_popup_click_targets.created_at, '%e' ) AS day, 
                   COUNT( kong_popup_click_targets.ID ) AS count 
            FROM {$wpdb->prefix}kong_popup_click_targets AS kong_popup_click_targets
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_click_targets.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY created 
            -- ORDER BY created_at
        " );
        if ( empty( $clicks_query ) ) {
            $clicks_query = 0;
        }
        $clicks_array[ 'clicks_report' ] = $clicks_query;

        /**========== Query for click through rate graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $ctrs_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at AS created, 
                   date_format( kong_popup_analytics.created_at, '%Y' ) AS year, 
                   date_format( kong_popup_analytics.created_at, '%c' ) AS month, 
                   date_format( kong_popup_analytics.created_at, '%e' ) AS day, 
                   COUNT( kong_popup_analytics.ID ) AS count 
            FROM {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY created
            -- ORDER BY created_at
        " );

        foreach ( $ctrs_query as $ctr_query ) {
            $flag = 0;

            foreach ( $clicks_query as $click_query ) {
                if ( $ctr_query->created == $click_query->created ) {
                    $ctr_query->count = round( ( ( $click_query->count / $ctr_query->count ) * 100 ), 2 );
                    $flag = 1;
                    break;
                }
            }

            if ( $flag == 0 ) {
                $ctr_query->count = 0;
            } 
        }
        if ( empty( $ctrs_query ) ) {
            $ctrs_query = 0;
        }
        $ctrs_array[ 'ctrs_report' ] = $ctrs_query;

        /**========== Query for average popup length graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND postmeta.meta_key = 'template' AND postmeta.meta_value = '{$_REQUEST[ 'template' ]}'" : '';
        $average_popup_length_query = $wpdb->get_results( "
            SELECT DATEDIFF( CURDATE(), STR_TO_DATE( posts.post_date, '%Y-%m-%d' ) ) AS average,
                   STR_TO_DATE( post_date, '%Y-%m-%d' ) AS created
            FROM {$wpdb->prefix}posts AS posts 
            JOIN {$wpdb->prefix}postmeta AS postmeta 
                ON posts.ID = postmeta.post_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND posts.post_date BETWEEN '{$from_date}' AND '{$to_date}'
            GROUP BY created
        " );

        if ( empty( $average_popup_length_query ) ) {
            $average_popup_length_query = 0;
        }
        $average_popup_length_array[ 'average_popup_length_report' ] = $average_popup_length_query;

        /**========== Query for total views statistics graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $views_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at AS created, 
                   date_format( kong_popup_analytics.created_at, '%Y' ) AS year, 
                   date_format( kong_popup_analytics.created_at, '%c' ) AS month, 
                   date_format( kong_popup_analytics.created_at, '%e' ) AS day, 
                   COUNT( kong_popup_analytics.ID ) AS count 
            FROM {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY created 
            -- ORDER BY created_at
        " );
        $views_statistics_array[ 'views_statistics_report' ] = $views_statistics_query;

        /**========== Query for total clicks statistics graph ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_click_targets.template = '{$_REQUEST[ 'template' ]}'" : '';
        $clicks_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at AS created, 
                   date_format( kong_popup_click_targets.created_at, '%Y' ) AS year, 
                   date_format( kong_popup_click_targets.created_at, '%c' ) AS month, 
                   date_format( kong_popup_click_targets.created_at, '%e' ) AS day, 
                   COUNT( kong_popup_click_targets.ID ) AS count 
            FROM {$wpdb->prefix}kong_popup_click_targets AS kong_popup_click_targets
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_click_targets.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY created 
            -- ORDER BY created_at
        " );
        $clicks_statistics_array[ 'clicks_statistics_report' ] = $clicks_statistics_query;

        /**========== Query for counting total leads ==========**/
        $total_leads_query = $wpdb->get_results( "
            SELECT posts.ID AS popup_id, 
                   posts.post_title AS popup_title, 
                   COUNT( kong_popup_analytics.ID ) AS total_leads_count
            FROM {$wpdb->prefix}posts AS posts 
            JOIN {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics 
                ON kong_popup_analytics.popup_id = posts.ID
            WHERE NOT EXISTS (
                SELECT * FROM {$wpdb->prefix}postmeta AS postmeta
                WHERE postmeta.post_id = posts.ID 
                AND postmeta.meta_key = 'is_template'
            )
            AND posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY kong_popup_analytics.popup_id
            ORDER BY total_leads_count DESC
            LIMIT 10
        " );
        foreach ( $total_leads_query as $total_leads ) {
            $slug = get_post_meta( $total_leads->popup_id, 'template', true );
            $template = get_term_by( 'slug', $slug, 'popup-template' );
            $total_leads_array[ 'leads_count' ][] = array(
                'popup_id'          => $total_leads->popup_id,
                'popup_title'       => $total_leads->popup_title,
                'popup_template'    => $template->name,
                'count'             => $total_leads->total_leads_count
            );
        }

        /**========== Query for counting total avtivity ==========**/
        $popup_template_categories = get_terms( 
            array(
                'taxonomy'      => 'popup-template',
                'hide_empty'    => false,
            ) 
        );
        if ( $popup_template_categories ) {
            foreach ( $popup_template_categories as $popup_template_category ) {
                $name = $popup_template_category->name;
                $slug = $popup_template_category->slug;

                $total_activity_query = $wpdb->get_results( "
                    SELECT COUNT( kong_popup_analytics.ID ) AS popular_count
                    FROM {$wpdb->prefix}posts AS posts 
                    JOIN {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics 
                        ON kong_popup_analytics.popup_id = posts.ID
                    WHERE posts.post_type = 'popup'
                    AND posts.post_status = 'publish'
                    AND kong_popup_analytics.template = '$slug'
                    AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
                " );
                if ( $total_activity_query[ 0 ]->popular_count ) {
                    $total_activity[ $name ] = $total_activity_query[ 0 ]->popular_count;
                }
            }
            arsort( $total_activity );
            $total_activity_result[ 'total_activity' ] = $total_activity;
        }

        /**========== Query for counting top performing popup ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $top_views_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.popup_id AS ID, 
                   kong_popup_analytics.template AS template,
                   COUNT( kong_popup_analytics.ID ) AS views, 
                   posts.post_date AS created,
                   posts.post_title AS title
            FROM {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_analytics.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY ID 
            ORDER BY template
        " );

        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_click_targets.template = '{$_REQUEST[ 'template' ]}'" : '';
        $top_clicks_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.popup_id AS ID, 
                   kong_popup_click_targets.template AS template,
                   COUNT( kong_popup_click_targets.ID ) AS clicks,
                   posts.post_date AS created,
                   posts.post_title AS title
            FROM {$wpdb->prefix}kong_popup_click_targets AS kong_popup_click_targets 
            JOIN {$wpdb->prefix}posts AS posts 
                ON posts.ID = kong_popup_click_targets.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_click_targets.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
            GROUP BY ID 
            ORDER BY template
        " );

        foreach ( $top_views_query as $key => $top_view ) {
            $top_view->clicks = $top_clicks_query[ $key ]->clicks;
        }
        array_multisort( 
            array_column( $top_views_query, 'views' ), SORT_DESC,
            array_column( $top_views_query, 'clicks' ), SORT_DESC,
            $top_views_query
        );
        if ( $top_views_query ) {
            $top_performer = current( $top_views_query );
            $top_performer_created = $top_performer->created;
            $current_daytime = date( 'Y-m-d h:i:s', time() );
            $days = $this->dateDiffInDays( $top_performer_created, $current_daytime );
            $top_view->days = $days;

            $template_category = get_term_by( 'slug', $top_performer->template, 'popup-template' );
            $template_url = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugins_url() . '/kong-popup/admin/images/blank.png';
            $top_view->url = $template_url;

            $top_view->ctr = round( ( ( $top_performer->clicks / $top_performer->views ) * 100 ), 2 ) . "%";
            $top_view->title = $top_performer->title;
        } else {
            $top_view = 0;
        }
        $top_performing_popup_result[ 'top_performing_popup' ] = $top_view;

        /**========== Query for counting top locations ==========**/
        $template = ( $_REQUEST[ 'template' ] ) ? "AND kong_popup_analytics.template = '{$_REQUEST[ 'template' ]}'" : '';
        $top_locations_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.data AS user_info
            FROM {$wpdb->prefix}posts AS posts 
            JOIN {$wpdb->prefix}kong_popup_analytics AS kong_popup_analytics 
                ON kong_popup_analytics.popup_id = posts.ID
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            {$template}
            AND kong_popup_analytics.created_at BETWEEN '{$from_date}' AND '{$to_date}' 
        " );
        foreach ( $top_locations_query as $top_location_data ) {
            $meta_data = maybe_unserialize( $top_location_data->user_info );
            $location_name = $meta_data[ 'IP' ][ 'country_name' ];
            if ( array_key_exists( $location_name, $top_locations ) ) {
                $count = $top_locations[ $location_name ] + 1;
                $top_locations[ $location_name ] = $count;
            } else {
                $top_locations[ $location_name ] = 1;
            }
        }
        arsort( $top_locations );
        $top_locations_result[ 'top_locations' ] = array_slice( $top_locations, 0, 11 );

        echo json_encode( array_merge( $total_views_array, $total_clicks_array, $total_ctr_array, $total_average_popup_length_array, $views_array, $clicks_array, $ctrs_array, $average_popup_length_array, $views_statistics_array, $clicks_statistics_array, $total_leads_array, $total_activity_result, $top_performing_popup_result, $top_locations_result ) );

        die();
    }

    public function get_preview_popup()
    {
        $meta_data = $_REQUEST[ 'popup_data' ];

        $post_id = $meta_data[ 'popup_id' ];
        unset( $meta_data[ 'popup_id' ] );  // remove the popup_id from array

        if ( $_REQUEST[ 'remove_fields' ] ) {
            foreach ( $_REQUEST[ 'remove_fields' ] as $remove_field ) {
                $this->delete_preview_popup_meta( $post_id, $remove_field );                                
            }
        }

        $this->update_preview_popup_meta( $post_id, 'popup_structure', $_REQUEST[ 'popup_html' ] );

        // loop the remaining and put in post meta
        foreach ( $meta_data as $mdkey => $mdvalue ) {
            if ( $mdvalue ) {
                if ( is_array( $mdvalue ) ) {
                    $mdvalue = array_values( array_filter( $mdvalue ) );    // for removing empty array element
                } else {
                    $expl_data = explode( ',', $mdvalue );
                    if( isset( $expl_data[ 1 ] ) ) {
                        $mdvalue = implode( ',', array_map( 'trim', $expl_data ) ); // for triming whitespace from array element
                    } else {
                        $mdvalue = trim( $expl_data[ 0 ] );
                    }
                }
                $this->update_preview_popup_meta( $post_id, $mdkey, $mdvalue );
            } else {
                $this->delete_preview_popup_meta( $post_id, $mdkey );
            }

            if ( is_array( $mdvalue ) && empty( $mdvalue[ 0 ] ) ) {
                $this->delete_preview_popup_meta( $post_id, $mdkey );
            }
        }

        die();
    }

    public function add_click_target()
    {
        global $wpdb;

        $popup_id = $_REQUEST[ 'popup_id' ]; 
        $target = sanitize_text_field( $_REQUEST[ 'target' ] );
        $template = get_post_meta( $popup_id, 'template', true );
        $current_date = date( 'Y-m-d', time() );

        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_click_targets ( popup_id, target, template, created_at ) VALUES ( $popup_id, '$target', '$template', '$current_date' )" );

        die();
    }

    public function save_popup_feeds()
    {
        global $wpdb;

        $popup_id = $_REQUEST[ 'popup_id' ]; 
        $feeds = sanitize_text_field( $_REQUEST[ 'form_data' ] );
        $current_date = date( 'Y-m-d', time() );

        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_feeds ( popup_id, feeds, created_at ) VALUES ( $popup_id, '$feeds', '$current_date' )" );

        die();
    }

    private function dateDiffInDays( $date1, $date2 )  
    { 
        $diff = strtotime( $date2 ) - strtotime( $date1 ); 
          
        return abs( round( $diff / 86400 ) ); 
    } 

    private function get_preview_popup_meta( $post_id, $mdkey ) 
    {
        global $wpdb;

        $query = $wpdb->get_results( "SELECT meta_value FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$post_id} AND meta_key = '{$mdkey}'" );

        return $query[ 0 ]->meta_value;
    }

    private function update_preview_popup_meta( $post_id, $mdkey, $mdvalue ) 
    {
        global $wpdb;

        $query = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$post_id} AND meta_key = '{$mdkey}'" );
        if ( $query ) {
            $wpdb->query( "UPDATE {$wpdb->prefix}kong_popup_preview_meta SET meta_value = '{$mdvalue}' WHERE popup_id = {$post_id} AND meta_key = '{$mdkey}'" );
        } else {
            $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_preview_meta ( popup_id, meta_key, meta_value ) VALUES ( $post_id, '$mdkey', '$mdvalue' )" );
        }
    }

    private function delete_preview_popup_meta( $post_id, $mdkey ) 
    {
        global $wpdb;

        $wpdb->query( "DELETE FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$post_id} AND meta_key = '{$mdkey}'" );
    }

    public function update_popup_status() 
    {
        $request_data = $_REQUEST;

        $post = array( 
            'ID' => $request_data[ 'id' ], 
            'post_status' => $request_data[ 'status' ],   // The post status - publish|pending|draft|private|static|object|attachment|inherit|future|trash.
        );
        wp_update_post( $post );

        die();
    }
}