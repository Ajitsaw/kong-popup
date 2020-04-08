<?php

class Kong_Popup_Admin_Ajax
{
    public function __construct() 
    {
        add_action( 'wp_ajax_get_filtered_report_ajax', array( $this, 'get_filtered_report' ) );

        add_action( 'wp_ajax_add_click_target_ajax', array( $this, 'add_click_target' ) );
        add_action( 'wp_ajax_nopriv_add_click_target_ajax', array( $this, 'add_click_target' ) );
    }

    public function get_filtered_report()
    {
        global $wpdb;

        $total_views_array = array();
        $total_clicks_array = array();

        $views_array = array();
        $clicks_array = array();

        $views_statistics_array = array();
        $clicks_statistics_array = array();

        $total_leads_array = array();

        $top_locations = array();
        $top_locations_result = array();

        $from_date = sanitize_text_field( $_REQUEST[ 'from_date' ] ); 
        $to_date = sanitize_text_field( $_REQUEST[ 'to_date' ] );

        /**========== Query for counting total views ==========**/
        $total_views_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_analytics.ID ) as total_views_count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics 
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date'
        " );

        /**========== Query for counting total clicks ==========**/
        $total_clicks_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_click_targets.ID ) as total_clicks_count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets 
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_click_targets.created_at BETWEEN '$from_date' AND '$to_date'
        " );

        /**========== Query for counting click through rate ==========**/
        /**========== Query for counting average popup length ==========**/

        /**========== Query for views graph ==========**/
        $views_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at, date_format( kong_popup_analytics.created_at, '%Y' ) as year, date_format( kong_popup_analytics.created_at, '%c' ) as month, date_format( kong_popup_analytics.created_at, '%e' ) as day, count( kong_popup_analytics.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY kong_popup_analytics.created_at 
            -- ORDER BY created_at
        " );

        /**========== Query for clicks graph ==========**/
        $clicks_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at, date_format( kong_popup_click_targets.created_at, '%Y' ) as year, date_format( kong_popup_click_targets.created_at, '%c' ) as month, date_format( kong_popup_click_targets.created_at, '%e' ) as day, count( kong_popup_click_targets.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_click_targets.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY created_at 
            -- ORDER BY created_at
        " );

        /**========== Query for click through rate graph ==========**/
        /**========== Query for average popup length graph ==========**/

        /**========== Query for total views statistics graph ==========**/
        $views_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at, date_format( kong_popup_analytics.created_at, '%Y' ) as year, date_format( kong_popup_analytics.created_at, '%c' ) as month, date_format( kong_popup_analytics.created_at, '%e' ) as day, count( kong_popup_analytics.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY created_at 
            -- ORDER BY created_at
        " );

        /**========== Query for total clicks statistics graph ==========**/
        $clicks_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at, date_format( kong_popup_click_targets.created_at, '%Y' ) as year, date_format( kong_popup_click_targets.created_at, '%c' ) as month, date_format( kong_popup_click_targets.created_at, '%e' ) as day, count( kong_popup_click_targets.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_click_targets.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY created_at 
            -- ORDER BY created_at
        " );

        /**========== Query for counting total views ==========**/
        $total_leads_query = $wpdb->get_results( "
            SELECT posts.ID as popup_id, 
                   posts.post_title as popup_title, 
                   COUNT( kong_popup_analytics.ID ) as total_leads_count
            FROM {$wpdb->prefix}posts as posts 
            JOIN {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics ON kong_popup_analytics.popup_id = posts.ID
            WHERE NOT EXISTS (
                SELECT * FROM {$wpdb->prefix}postmeta as postmeta
                WHERE postmeta.post_id = posts.ID 
                AND postmeta.meta_key = 'is_template'
            )
            AND posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY kong_popup_analytics.popup_id
            ORDER BY total_leads_count DESC
            LIMIT 10
        " );

        $top_locations_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.data as user_info
            FROM {$wpdb->prefix}posts as posts 
            JOIN {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics ON kong_popup_analytics.popup_id = posts.ID
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
        " );

        // print_data( $top_locations_query );

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

        // print_data( array_slice( $top_locations, 0, 4 ) );
        // exit;

        $total_views_array[ 'views_count' ] = $total_views_query;
        $total_clicks_array[ 'clicks_count' ] = $total_clicks_query;

        $views_array[ 'views_report' ] = $views_query;
        $clicks_array[ 'clicks_report' ] = $clicks_query;

        $views_statistics_array[ 'views_statistics_report' ] = $views_statistics_query;
        $clicks_statistics_array[ 'clicks_statistics_report' ] = $clicks_statistics_query;

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

        $top_locations_result[ 'top_locations' ] = array_slice( $top_locations, 0, 4 );

        echo json_encode( array_merge( $total_views_array, $total_clicks_array, $views_array, $clicks_array, $views_statistics_array, $clicks_statistics_array, $total_leads_array, $top_locations_result ) );

        die();
    }

    public function add_click_target()
    {
        global $wpdb;

        $popup_id = $_REQUEST[ 'popup_id' ]; 
        $target = sanitize_text_field( $_REQUEST[ 'target' ] );
        $current_date = date( 'Y-m-d', time() );

        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_click_targets ( popup_id, target, created_at ) VALUES ( $popup_id, '$target', '$current_date' )" );

        die();
    }

}