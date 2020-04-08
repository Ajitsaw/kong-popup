<?php

class Kong_Popup_Analytics 
{

    private static $popup_id;
    private $analytics_key;
    private $analytics_data;

    private function __construct() 
    {
        $this->analytics_key = 'kong_popup_analytics';
    }

    public static function getInstance() 
    {
        $analytics = new Kong_Popup_Analytics();

        return $analytics;
    }

    public function get_analytics( $popup_id ) 
    {
        if ( ! empty( $popup_id ) ) {
            // $this->popup_id = $popup_id;
            // $this->analytics_data = get_post_meta( $this->popup_id, $this->analytics_key, true );

            // return $this->analytics_data;

            global $wpdb;

            $get_analytics = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}kong_popup_analytics WHERE popup_id = $popup_id", OBJECT );

            return $get_analytics;
        }
    }

    public function set_analytics( $popup_id, $data ) 
    {
        // $this->analytics_data = unserialize( get_post_meta( $popup_id, $this->analytics_key, true ) );
        // print_data( maybe_unserialize( $data ) );

        // if ( $this->analytics_data == null ) {
        //     $this->analytics_data = array();
        //     $this->analytics_data[] = $data;
        // } else {
        //     $this->analytics_data[] = $data;
        // }
        // update_post_meta( $popup_id, $this->analytics_key, maybe_serialize( $this->analytics_data ) );
        global $wpdb;

        $data = maybe_serialize( $data );
        $current_date = date( 'Y-m-d', time() );

        // print_data( $data );

        $wpdb->query( "INSERT INTO {$wpdb->prefix}kong_popup_analytics ( popup_id, data, created_at ) VALUES ( $popup_id, '$data', '$current_date' )" );
    }
    
}
