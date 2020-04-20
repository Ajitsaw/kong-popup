<?php

class Kong_Popup_Validate_Behavior 
{
    private $current_data, $popup_id, $kong_popup;

    public function __construct( $current_data, $popup_id ) 
    {
        $this->current_data = $current_data;
        $this->popup_id     = $popup_id;
        $this->kong_popup   = new Kong_Popup_Render( $popup_id );
    }

    public function validate_popup_behavior_conditions() 
    {
        $check = true;

        if ( $this->kong_popup->get_popup_info( 'frequency' ) == "condition" ) {
            $is_valid_datetime  = $this->check_valid_datetime( $this->kong_popup, $this->current_data );
            $is_valid_timezone  = $this->check_valid_timezone( $this->kong_popup, $this->current_data );
            $is_valid_days      = $this->check_valid_days( $this->kong_popup, $this->current_data );
            $is_valid_user      = $this->check_valid_user( $this->popup_id, $this->kong_popup, $this->current_data );

            switch ( 1 ) {
                case 1:
                    if ( $is_valid_datetime == false ) {
                        $check = false;
                        echo '<!-- Time Condition : Found -->';
                        break;
                    } else {
                        echo '<!-- Time Condition : Not Found -->';
                    }
                case 2:
                    if ( $is_valid_timezone == false ) {
                        $check = false;
                        echo '<!-- Timezone Condition : Found -->';
                        break;
                    } else {
                        echo '<!-- Timezone Condition : Not Found -->';
                    }
                case 3:
                    if ( $is_valid_days == false ) {
                        $check = false;
                        echo '<!-- Day(s) Condition : Found -->';
                        break;
                    } else {
                        echo '<!-- Day(s) Condition : Not Found -->';
                    }
                case 4:
                    if ( $is_valid_user == false ) {
                        $check = false;
                        echo '<!-- User(s) Condition : Found -->';
                        break;
                    } else {
                        echo '<!-- User(s) Condition : Not Found -->';
                    }
            }
        } else {
            $check = true;
        }

        if ( $check == true ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_valid_datetime( $popup_info, $current_info ) 
    {
        $behavior_start_on  = $popup_info->get_popup_info( 'start_on' );
        $behavior_stop_on   = $popup_info->get_popup_info( 'stop_on' );
        $behavior_time_from = $popup_info->get_popup_info( 'time_from' );
        $behavior_time_to   = $popup_info->get_popup_info( 'time_to' );
        $get_date_string    = substr( $current_info[ 'client_date' ], 4, 20 );
        $minimum_datetime   = strtotime( $behavior_start_on . ' ' . $behavior_time_from );
        $maximum_datetime   = strtotime( $behavior_stop_on . ' ' . $behavior_time_to );
        $current_datetime   = strtotime( $get_date_string );
        
        if ( $minimum_datetime <= $current_datetime && $maximum_datetime >= $current_datetime ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_valid_timezone( $popup_info, $current_info ) 
    {
        $behavior_timezone  = $popup_info->get_popup_info( 'timezone' );
        $current_timezone   = $current_info[ 'IP' ][ 'timezone' ];
        
        if ( $behavior_timezone == $current_timezone ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_valid_days( $popup_info, $current_info ) 
    {
        $behavior_days  = $popup_info->get_popup_info( 'days_of_week' );
        $current_day    = substr( $current_info[ 'client_date' ], 0, 3 );
        
        if ( in_array( $current_day, $behavior_days ) ) {
            return true;
        } else {
            return false;
        }
    }

    public function check_valid_user( $popup_id, $popup_info, $current_info ) 
    {
        $current_date = date( 'M d,yy' );
        $get_publish_popup_date_array = $popup_info->get_popup_info( 'publish_popup_date' );
        
        if ( $key = array_search( $current_info[ 'IP' ][ 'ip' ], array_column( $get_publish_popup_date_array, 'IP' ) ) ) {
            $get_publish_popup_date = $get_publish_popup_date_array[ $key ][ 'date' ];
            $expire_popup_date = date( 'M d,Y', strtotime( $get_publish_popup_date . ' +' . $popup_info->get_popup_info( 'frequency_time_schedule' ) . ' ' . $popup_info->get_popup_info( 'frequency_time_schedule_option' ) ) );
            
            if ( $current_date <= $expire_popup_date ) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

}