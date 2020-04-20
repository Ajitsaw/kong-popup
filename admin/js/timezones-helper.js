jQuery( document ).ready( function() {
  jQuery.getJSON( kongPopupTimezonesAjax.base_admin_url + '/partials/kong-popup-admin-timezones.php', function( timezones ) {
    jQuery.each( timezones, function( i, timezone ) {
      if ( timezone != 'GMT' ) { 
        jQuery( '#timezone' ).append(
          jQuery( '<option/>' ).text( timezone ).attr( 'value', timezone.split( ' ' )[ 1 ] )
        );
      }
    } );

    var browserTimezone = moment.tz.guess();
    if( browserTimezone == "Asia/Calcutta" ) {
      browserTimezone = "Asia/Kolkata";
    }

    var timezoneValue = ( jQuery( '#timezone' ).val() ) ? jQuery( '#timezone' ).val() : browserTimezone;
    jQuery( '#timezone option[value="' + timezoneValue + '"]' ).attr( 'selected', 'selected' );
  } );
} );