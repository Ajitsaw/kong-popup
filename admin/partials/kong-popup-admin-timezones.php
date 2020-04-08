<?php

//--------------------------------------------------------------------------------------------------
// This script outputs a JSON array of all timezones (like "America/Chicago") that PHP supports.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// echo json_encode(DateTimeZone::listIdentifiers(DateTimeZone::ALL));
$timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

$timezone_offsets = array();

foreach( $timezones as $timezone ) {

    $tz = new DateTimeZone( $timezone );
    $timezone_offsets[ $timezone ] = $tz->getOffset( new DateTime );

}

// sort timezone by offset
asort($timezone_offsets);

$timezone_list = array();

foreach( $timezone_offsets as $timezone => $offset ) {

    $offset_prefix = $offset < 0 ? '-' : '+';
    $offset_formatted = gmdate( 'H:i', abs( $offset ) );

    $pretty_offset = "GMT${offset_prefix}${offset_formatted}";

    // $expl_timezone = explode( '/', $timezone );
    // if( isset( $expl_timezone[ 2 ] ) ) {
    // 	$timezone = str_replace( '_', ' ', $expl_timezone[ 2 ] );
    // } else {
    // 	$timezone = str_replace( '_', ' ', $expl_timezone[ 1 ] );
    // }

    $timezone_list[ $timezone ] = "(${pretty_offset}) $timezone";

}

echo json_encode( $timezone_list );