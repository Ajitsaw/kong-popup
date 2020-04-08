<?php

class Kong_Popup_Validate_Targeting 
{
    private $current_data, $popup_id, $kong_popup;

    public function __construct( $current_data, $popup_id ) 
    {
        $this->current_data = $current_data;
        $this->popup_id     = $popup_id;
        $this->kong_popup   = new Kong_Popup_Render( $popup_id );
    }

    public function validate_popup_targeting_conditions() 
    {
        $is_target_check = false;
        $is_visitor_check = true;
        $is_valid_visitor  = $this->check_valid_visitor( $this->kong_popup );

        if ( ! $is_valid_visitor ) {
            $is_visitor_check = false;
        }

        switch ( 1 ) {
            case 1:
                $ex_browsers = $this->kong_popup->get_popup_info( 'browser' );
                $current_browser = $this->current_data[ 'browser_info' ][ 'browser' ];
                if ( empty( $ex_browsers ) ) {
                    $current_browser_exists_in_exclude_list = true;
                } else {
                    $current_browser_exists_in_exclude_list = in_array( $current_browser, $ex_browsers );
                }

                if ( $current_browser_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- Browser Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- Browser Condition : Found -->';
                }
            case 2:
                $ex_os = $this->kong_popup->get_popup_info( 'os' );
                $current_os = $this->current_data[ 'browser_info' ][ 'os' ];
                if ( empty( $ex_os ) ) {
                    $current_os_exists_in_exclude_list = true;
                } else {
                    $current_os_exists_in_exclude_list = in_array( $current_os, $ex_os );
                }

                if ( $current_os_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- OS Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- OS Condition : Found -->';
                }
            case 3:
                $ex_device = $this->kong_popup->get_popup_info( 'device' );
                $current_device = $this->current_data[ 'browser_info' ][ 'device' ];
                if ( empty( $ex_device ) ) {
                    $current_device_exists_in_exclude_list = true;
                } else {
                    $current_device_exists_in_exclude_list = in_array( $current_device, $ex_device );
                }

                if ( $current_device_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- DEVICE Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- DEVICE Condition : Found -->';
                }
            case 4: 
                $utm_tags_from_db = $this->kong_popup->get_popup_info( 'utm_tag' );
                $current_url = $this->current_data[ 'url' ];
                $expl_current_url = explode( '?', $current_url );
                $utm_tags_from_current_url = $expl_current_url[ 1 ];

                $url_array = $this->create_exploded_array( $utm_tags_from_current_url, '&', $utm_tags_from_current_url_array );
                $db_array = $this->create_exploded_array( $utm_tags_from_db, ',', $utm_tags_from_db_array );

                if ( ! is_array( $db_array ) ) $db_array = array( $db_array ); 
                if ( empty( $db_array[ 0 ] ) ) {
                    $current_utm_tag_exists_in_exclude_list = true;
                } else {
                    $current_utm_tag_exists_in_exclude_list = ! empty( array_intersect( $url_array, $db_array ) );
                }

                // print_data( array_intersect( $url_array, $db_array ) );

                if ( $current_utm_tag_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- UTM Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- UTM Condition : Found -->';
                }
            case 5:
            // case 4:
                $ex_ip_address = explode( ',', $this->kong_popup->get_popup_info( 'ip_address' ) );
                if ( ! is_array( $ex_ip_address ) ) $ex_ip_address = array( $ex_ip_address ); 
                $current_ip_address = $this->current_data[ 'IP' ][ 'ip' ];
                if ( empty( $ex_ip_address[ 0 ] ) ) {
                    $current_ip_address_exists_in_exclude_list = true;
                } else {
                    $current_ip_address_exists_in_exclude_list = in_array( $current_ip_address, $ex_ip_address );
                }

                if ( $current_ip_address_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- IP Condition : Not Found -->';
                } else {
                    echo '<!-- IP Condition : Found -->';
                }
            case 6: 
            // case 5:
                $ex_location = explode( ',', $this->kong_popup->get_popup_info( 'location' ) );
                if ( ! is_array( $ex_location ) ) $ex_location = array( $ex_location ); 
                $current_location = $this->current_data[ 'IP' ][ 'country_code' ];
                if ( empty( $ex_location[ 0 ] ) ) {
                    $current_location_exists_in_exclude_list = true;
                } else {
                    $current_location_exists_in_exclude_list = in_array( $current_location, $ex_location );
                }

                if ( $current_location_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- LOCATION Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- LOCATION Condition : Found -->';
                }
            case 7: 
            // case 6: 
                $ex_language = explode( ',', $this->kong_popup->get_popup_info( 'language' ) );
                if ( ! is_array( $ex_language ) ) $ex_language = array( $ex_language ); 
                $current_language = explode( ',', $this->current_data[ 'IP' ][ 'languages' ] );
                if ( empty( $ex_language[ 0 ] ) ) { // if none of the targeting parameters are selected
                    $current_language_exists_in_exclude_list = true;
                } else {
                    $current_language_exists_in_exclude_list = ! empty( array_intersect( $current_language, $ex_language ) );
                }

                if ( $current_language_exists_in_exclude_list == false ) {
                    $is_target_check = true;
                    echo '<!-- LANGUAGE Condition : Not Found -->';
                    break;
                } else {
                    echo '<!-- LANGUAGE Condition : Found -->';
                }
        }

        if ( $is_visitor_check == true && $is_target_check == true ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_valid_visitor( $popup_info ) 
    {
        $is_visitor = $popup_info->get_popup_info( 'visitor' );
        $is_visitor_flag = false;

        if ( $is_visitor[ 0 ] == "Returning" ) {
            if ( $popup_info->get_popup_info( 'site_pages' ) > $_COOKIE[ 'kong_popup_rendered' ] ) {
                $is_visitor_flag = true;
                echo '<!-- VISITOR Condition : Not Found -->';
            } 
        } else {
            $is_visitor_flag = true;
        }
        return $is_visitor_flag;
    }

    public function create_exploded_array( $string, $separator, $array = array() ) 
    {
        $expl_data_by_comma = explode( $separator, $string );
        foreach ( $expl_data_by_comma as $str ) {
            $array[] = substr( $str, strpos( $str, "=" ) + 1 );
        }

        return $array;
    }

}