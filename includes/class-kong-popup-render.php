<?php

class Kong_Popup_Render
{
    private $popup_id, $popup;

    public function __construct( $popup_id = '' ) 
    {
        if ( $popup_id != '' ) {
            $this->popup_id = $popup_id;
            $this->popup = get_post($this->popup_id);
        }
    }

    public function get_popup() 
    {
        return $this->popup;
    }

    public function get_popup_info( $label = '' ) 
    {
        $info = '';
        if ( $label != '' ) {
            $info = get_post_meta( $this->popup_id, $label, true );
        }

        return $info;
    }

    public function get_popup_all_info() 
    {
        $infos = array();

        $metadata = get_post_meta( $this->popup_id );
        foreach ( $metadata as $key => $val ) {
            $infos[ $key ] = get_post_meta( $this->popup_id, $key, true );
        }

        return $infos;
    }

    public function get_popup_content() 
    {
        $content = $this->popup->post_content;

        return $content;
    }

    public function generate_popup_content() 
    {
        $infos = $this->get_popup_all_info();
        $content = $this->get_popup_content();
        $content = str_replace( "{_ID_}", $this->popup_id, $content );
            
        // Replace the values from meta to template
        preg_match_all( '/{([^}]*)}/', $content, $matches );

        $search_arr = array_combine( $matches[ 1 ], $matches[ 0 ] );

        foreach ( $search_arr as $k => $v ) {
            $replace_value = $infos[ $k ];
            $content = str_replace( $v, $replace_value, $content );
        }

        // print_data( $content );

        return $content;
    }

    public function generate_popup_css() 
    {
        $appearance_position = $this->get_popup_infoo( 'appearance_position' );
        $animation = $this->get_popup_infoo( 'animation' );
        $font = $this->get_popup_infoo( 'fonts' );
        $width = $this->get_popup_infoo( 'popup_width' );
        $height = $this->get_popup_infoo( 'popup_height' );
        $textcolor = $this->get_popup_infoo( 'textcolor' );
        $bgcolor = $this->get_popup_infoo( 'bgcolor' );
        $use_bgimage = $this->get_popup_infoo( 'use_bgimage' );
        $bgimage = $this->get_popup_infoo( 'bgimage' );
        $btn_bg_color = ( $this->get_popup_infoo( 'buttonbgcolor' ) ) ? $this->get_popup_infoo( 'buttonbgcolor' ) : '#808080';
        $btn_txt_color = ( $this->get_popup_infoo( 'buttontextcolor' ) ) ? $this->get_popup_infoo( 'buttontextcolor' ) : '#fff';

        require_once PLUGIN_BASE_DIR . '/admin/partials/kong-popup-render-css.php';

        return $generated_css;

        // return $this->wrap_css( $generated_css );
    }

    // public function wrap_css( $css ) 
    // {
    //     return '<style type="text/css">' . $css . '</style>';
    // }

    public function generate_popup_js() 
    {
        require_once PLUGIN_BASE_DIR . '/admin/partials/kong-popup-render-js.php';

        return $generated_js;
    }

    public function generate_popup_publish_date() 
    {
        $current_date = date( 'M d,yy' );
        $get_publish_popup_date_array = maybe_unserialize( get_post_meta( $this->popup_id, 'publish_popup_date', true ) );
        if ( empty( $get_publish_popup_date_array ) ) {
            $publish_popup_date = array( array( 'IP' => $_POST[ 'IP' ][ 'ip' ], 'date' => $current_date ) );
            add_post_meta( $this->popup_id, 'publish_popup_date', $publish_popup_date );
        } 
        else {
            if ( $key = array_search( $_POST[ 'IP' ][ 'ip' ], array_column( $get_publish_popup_date_array, 'IP' ) ) ) {
                $get_publish_popup_date = $get_publish_popup_date_array[ $key ][ 'date' ];
                $expire_popup_date = date( 'M d,Y', strtotime( $get_publish_popup_date . ' +' . $this->get_popup_info( 'frequency_time_schedule' ) . ' ' . $this->get_popup_info( 'frequency_time_schedule_option' ) ) );
                if ( $current_date > $expire_popup_date ) {
                    $get_publish_popup_date_array[ $key ][ 'date' ] = $current_date;
                }
            } else {
                $get_publish_popup_date_array[] = array( 'IP' => $_POST[ 'IP' ][ 'ip' ], 'date' => $current_date );
            }
            update_post_meta( $this->popup_id, 'publish_popup_date', $get_publish_popup_date_array );
        }
    }

    // public function validate_popup_targeting_conditions() 
    // {
    //     $current_data = $_POST;
    //     $check = false;

    //     switch ( 1 ) {
    //         case 1:
    //             $ex_browsers = $this->get_popup_info( 'browser' );
    //             $current_browser = $current_data[ 'browser_info' ][ 'browser' ];
    //             if ( empty( $ex_browsers ) ) {
    //                 $current_browser_exists_in_exclude_list = true;
    //             } else {
    //                 $current_browser_exists_in_exclude_list = in_array( $current_browser, $ex_browsers );
    //             }

    //             if ( $current_browser_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- Browser Condition : Not Found -->';
    //                 break;
    //             } else {
    //                 echo '<!-- Browser Condition : Found -->';
    //             }
    //         case 2:
    //             $ex_os = $this->get_popup_info( 'os' );
    //             $current_os = $current_data[ 'browser_info' ][ 'os' ];
    //             if ( empty( $ex_os ) ) {
    //                 $current_os_exists_in_exclude_list = true;
    //             } else {
    //                 $current_os_exists_in_exclude_list = in_array( $current_os, $ex_os );
    //             }

    //             if ( $current_os_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- OS Condition : Not Found -->';
    //                 break;
    //             } else {
    //                 echo '<!-- OS Condition : Found -->';
    //             }
    //         case 3:
    //             $ex_device = $this->get_popup_info( 'device' );
    //             $current_device = $current_data[ 'browser_info' ][ 'device' ];
    //             if ( empty( $ex_device ) ) {
    //                 $current_device_exists_in_exclude_list = true;
    //             } else {
    //                 $current_device_exists_in_exclude_list = in_array( $current_device, $ex_device );
    //             }

    //             if ( $current_device_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- DEVICE Condition : Not Found -->';
    //                 break;
    //             } else {
    //                 echo '<!-- DEVICE Condition : Found -->';
    //             }
    //         case 4:
    //             $ex_ip_address = explode( ',', $this->get_popup_info( 'ip_address' ) );
    //             if ( ! is_array( $ex_ip_address ) ) $ex_ip_address = array( $ex_ip_address ); 
    //             $current_ip_address = $current_data[ 'IP' ][ 'ip' ];
    //             if ( empty( $ex_ip_address[ 0 ] ) ) {
    //                 $current_ip_address_exists_in_exclude_list = true;
    //             } else {
    //                 $current_ip_address_exists_in_exclude_list = in_array( $current_ip_address, $ex_ip_address );
    //             }

    //             if ( $current_ip_address_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- IP Condition : Not Found -->';
    //             } else {
    //                 echo '<!-- IP Condition : Found -->';
    //             }
    //         case 5: 
    //             $ex_location = explode( ',', $this->get_popup_info( 'location' ) );
    //             if ( ! is_array( $ex_location ) ) $ex_location = array( $ex_location ); 
    //             $current_location = $current_data[ 'IP' ][ 'country_code' ];
    //             if ( empty( $ex_location[ 0 ] ) ) {
    //                 $current_location_exists_in_exclude_list = true;
    //             } else {
    //                 $current_location_exists_in_exclude_list = in_array( $current_location, $ex_location );
    //             }

    //             if ( $current_location_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- LOCATION Condition : Not Found -->';
    //                 break;
    //             } else {
    //                 echo '<!-- LOCATION Condition : Found -->';
    //             }
    //         case 6: 
    //             $ex_language = explode( ',', $this->get_popup_info( 'language' ) );
    //             if ( ! is_array( $ex_language ) ) $ex_language = array( $ex_language ); 
    //             $current_language = explode( ',', $current_data[ 'IP' ][ 'languages' ] );
    //             if ( empty( $ex_language[ 0 ] ) ) {
    //                 $current_language_exists_in_exclude_list = true;
    //             } else {
    //                 $current_language_exists_in_exclude_list = ! empty( array_intersect( $current_language, $ex_language ) );
    //             }

    //             if ( $current_language_exists_in_exclude_list == false ) {
    //                 $check = true;
    //                 echo '<!-- LANGUAGE Condition : Not Found -->';
    //                 break;
    //             } else {
    //                 echo '<!-- LANGUAGE Condition : Found -->';
    //             }
    //     }

    //     // $is_visitor = $this->get_popup_info( 'visitor' );
    //     // if ( $is_visitor[ 0 ] == "Returning" ) {
    //     //     if ( $this->get_popup_info( 'site_pages' ) >= $_COOKIE[ 'kong_popup_rendered' ] ) {
    //     //         $is_visitor_check = true;
    //     //         echo '<!-- VISITOR Condition : Not Found -->';
    //     //     } else {
    //     //         $is_visitor_check = false;
    //     //         echo '<!-- VISITOR Condition : Found -->';
    //     //     }
    //     // } else {
    //     //     $is_visitor_check = true;
    //     // }
    //     print_data( $check );
    //     // print_data( $is_visitor_check );

    //     if ( $check == true ) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function get_popup_infoo( $label = '' ) 
    {
        global $wpdb;

        $info = '';
        if ( $label != '' ) {
            $get_preview_data_query = $wpdb->get_results( "SELECT meta_value FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$this->popup_id} AND meta_key = '{$label}'" );
            $info = $get_preview_data_query[ 0 ]->meta_value;
        }

        return $info;
    }

    public function get_popup_all_infoo() 
    {
        global $wpdb;

        $infos = array();

        $get_preview_data_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$this->popup_id}" );
        foreach ( $get_preview_data_query as $key => $value ) {
            if ( $value->meta_key != "popup_structure" ) {
                $infos[ $value->meta_key ] = $value->meta_value;
            }
        }

        return $infos;
    }

    public function get_popup_contentt() 
    {
        global $wpdb;

        $get_preview_data_query = $wpdb->get_results( "SELECT meta_value FROM {$wpdb->prefix}kong_popup_preview_meta WHERE popup_id = {$this->popup_id} AND meta_key = 'popup_structure'" );

        $content = $get_preview_data_query[ 0 ]->meta_value;

        return $content;
    }

    public function generate_popup_contentt() 
    {
        $infos = $this->get_popup_all_infoo();
        $content = $this->get_popup_contentt();
        $content = str_replace( "{_ID_}", $this->popup_id, $content );
            
        // Replace the values from meta to template
        preg_match_all( '/{([^}]*)}/', $content, $matches );

        $search_arr = array_combine( $matches[ 1 ], $matches[ 0 ] );

        foreach ( $search_arr as $k => $v ) {
            $replace_value = $infos[ $k ];
            $content = str_replace( $v, $replace_value, $content );
        }

        return $content;
    }

}