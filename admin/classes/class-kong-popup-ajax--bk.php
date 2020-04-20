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
        $views_array = array();
        $total_clicks_array = array();
        $clicks_array = array();
        $views_statistics_array = array();
        $clicks_statistics_array = array();

        $from_date = sanitize_text_field( $_REQUEST[ 'from_date' ] ); 
        $to_date = sanitize_text_field( $_REQUEST[ 'to_date' ] );

        $total_views_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_analytics.ID ) as total_views_count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics 
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date'
        " );

        $views_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at, if( month( kong_popup_analytics.created_at ) > month( now() ), month( kong_popup_analytics.created_at ), month( kong_popup_analytics.created_at ) + 12 ) as month_order, date_format( kong_popup_analytics.created_at, '%Y' ) as year, date_format( kong_popup_analytics.created_at, '%c' ) as month, count( kong_popup_analytics.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_analytics.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY month 
            ORDER BY month_order
        " );

        $total_clicks_query = $wpdb->get_results( "
            SELECT COUNT( kong_popup_click_targets.ID ) as total_clicks_count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets 
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_click_targets.created_at BETWEEN '$from_date' AND '$to_date'
        " );

        $clicks_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at, if( month( kong_popup_click_targets.created_at ) > month( now() ), month( kong_popup_click_targets.created_at ), month( kong_popup_click_targets.created_at ) + 12 ) as month_order, date_format( kong_popup_click_targets.created_at, '%Y' ) as year, date_format( kong_popup_click_targets.created_at, '%c' ) as month, count( kong_popup_click_targets.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND kong_popup_click_targets.created_at BETWEEN '$from_date' AND '$to_date' 
            GROUP BY month 
            ORDER BY month_order
        " );

        $views_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_analytics.created_at, if( month( kong_popup_analytics.created_at ) > month( now() ), month( kong_popup_analytics.created_at ), month( kong_popup_analytics.created_at ) + 12 ) as month_order, date_format( kong_popup_analytics.created_at, '%Y' ) as year, date_format( kong_popup_analytics.created_at, '%c' ) as month, count( kong_popup_analytics.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_analytics as kong_popup_analytics
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_analytics.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            GROUP BY month 
            ORDER BY month_order
        " );

        $clicks_statistics_query = $wpdb->get_results( "
            SELECT kong_popup_click_targets.created_at, if( month( kong_popup_click_targets.created_at ) > month( now() ), month( kong_popup_click_targets.created_at ), month( kong_popup_click_targets.created_at ) + 12 ) as month_order, date_format( kong_popup_click_targets.created_at, '%Y' ) as year, date_format( kong_popup_click_targets.created_at, '%c' ) as month, count( kong_popup_click_targets.ID ) as count 
            FROM {$wpdb->prefix}kong_popup_click_targets as kong_popup_click_targets
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = kong_popup_click_targets.popup_id 
            WHERE posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            GROUP BY month 
            ORDER BY month_order
        " );

        // print_data( $views_query );

        $total_views_array[ 'views_count' ] = $total_views_query;
        $views_array[ 'views_report' ] = $views_query;

        $total_clicks_array[ 'clicks_count' ] = $total_clicks_query;
        $clicks_array[ 'clicks_report' ] = $clicks_query;

        $views_statistics_array[ 'views_statistics_report' ] = $views_statistics_query;
        $clicks_statistics_array[ 'clicks_statistics_report' ] = $clicks_statistics_query;
       
        echo json_encode( array_merge( $total_views_array, $views_array, $total_clicks_array, $clicks_array, $views_statistics_array, $clicks_statistics_array ) );

        die();
    }

    public function add_click_target()
    {
        global $wpdb;

        $popup_id = sanitize_text_field( $_REQUEST[ 'popup_id' ] ); 
        $target = sanitize_text_field( $_REQUEST[ 'target' ] );
        $current_date = date( 'Y-m-d', time() );

        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_click_targets ( popup_id, target, created_at ) VALUES ( $popup_id, '$target', '$current_date' )" );

        die();
    }

}