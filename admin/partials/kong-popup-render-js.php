<?php 
$generated_js = '
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
';

$generated_js .= "
<script type='text/javascript'>
    jQuery( document ).ready( function( e ) {
        var kongPopupID = " . $this->popup_id . ";
        setTimeout( function() {
            jQuery( '.kong-popup' ).addClass( 'animate' );
        }, 1000 );

        // jQuery( this ).on( 'click', '.kong-popup', function() {
        //     jQuery( this ).hide();
        // } );

        setTimeout( function() {
                jQuery( '.kong-popup' ).removeAttr( 'style' );
        }, 1000 );
    } );
</script>
";