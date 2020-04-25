// var popupData = {};
$ = jQuery.noConflict();

var removeFieldsNameArray = [];
const roundChartDataColor = [
	'#369EA0',
	'#f68b60',
	'#52c27e',
	'#f3556b',
	'#76317c',
	'#8b58d9',
	'#29dce4',
	'#9621d2',
	'#3baadf',
	'#9a2767',
	'#428abd',
	'#ef8856',
	'#a6ef56',
];

jQuery( document ).ready( function( e ) {
	'use strict';

	var searchParams = new URLSearchParams( window.location.search );
	var param = searchParams.get( 'page' );
	if ( searchParams.get( 'page' ) == "popup-dashboard" ) {
		getAllTemplates();

		var headerPanel = `
			<!-- .dashboard-left starts -->
			<div class="dashboard-left">
				<div class="kg_secondary_bg" id="report-filter">
					<i class="material-icons">more_vert</i>
					<span class="date-box"></span>
				</div>

				<div class="dashboard-left_dropdown">
					<select class="dashboard-popup-lists" id="dashboard-popup-lists"></select>
				</div>
			</div>
			<!-- .dashboard-left ends -->
		`;
		jQuery( headerPanel ).insertAfter( '.site-logo' );
	}

	jQuery( '#toplevel_page_edit-popup, #toplevel_page_edit-template, #toplevel_page_create-template, #toplevel_page_popups-under-folder' ).remove();
	jQuery( '#toplevel_page_create-popup a' ).addClass( 'kg_secondary_bg btn p-0 site-action-toggle btn-raised' );

	jQuery( '.kong-container .tab-content' ).hide();
	jQuery( '.kong-container #tabs li:first-child' ).addClass( 'active' );
	jQuery( '.kong-container .tab-content:first-child' ).show();
	
	jQuery( '.kong-container #tabs li' ).on( 'click', function() {
		var tabName = jQuery( this ).attr( 'data-href' );
		jQuery( '.kong-container #tabs li' ).removeClass( 'active' );
		jQuery( this ).addClass( 'active' );
		jQuery( '.kong-container .tab-content' ).hide();
		jQuery( '.kong-container ' + tabName ).show();
	} );

	jQuery( this ).on( 'click', '#create-popup', function( e ) {
		e.preventDefault();

		var isVaildate = true;

		var projectTitle = jQuery( '#project-name' ).val();
		var projectFolder = jQuery( '#project-folder' ).val();
		var projectTemplate = jQuery( '#project-template' ).val();

		if ( jQuery.trim( projectTitle ) == '' ) {
			jQuery( '#project-name' ).css( { 'border-bottom': '1px solid #f00' } );
			jQuery( '#pn-error-message' ).text( "required" );
			isVaildate = false;
		} else {
			jQuery( '#project-name' ).removeAttr( 'style' );
			jQuery( '#pn-error-message' ).text( "" );
		}

		if ( jQuery.trim( projectFolder ) == '' ) {
			jQuery( '#project-folder' ).css( { 'border-bottom': '1px solid #f00' } );
			jQuery( '#pf-error-message' ).text( "required" );
			isVaildate = false;
		} else {
			jQuery( '#project-folder' ).removeAttr( 'style' );
			jQuery( '#pf-error-message' ).text( "" );
		}

		if ( jQuery.trim( projectTemplate ) == '' ) {
			jQuery( '#project-template' ).css( { 'border-bottom': '1px solid #f00' } );
			jQuery( '#pt-error-message' ).text( "required" );
			isVaildate = false;
		} else {
			jQuery( '#project-template' ).removeAttr( 'style' );
			jQuery( '#pt-error-message' ).text( "" );
		}

		// console.log( ajaxurl );
		// return;

		if ( isVaildate ) {
			jQuery.ajax( {
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'save_popup_info_ajax',
					title: projectTitle, 
					folder: projectFolder, 
					template: projectTemplate
				}
			} )
			.done( function( response ) {
				popupData.popup_id = response;
				setTimeout( () => {
					window.location.href = kongPopupSupports.admin_url + "?page=edit-popup&id=" + response + "&template=" + projectTemplate;
				}, 200 );
			} );
		}
	} );

	jQuery( this ).on( 'change', '.kong-container input[type="text"]', ( e ) => {
		console.log( "TEXT" );
		if ( popupData.hasOwnProperty( 'display_in' ) && popupData.display_in.length > 0 ) {
			var DisplayInArr = popupData[ 'display_in' ];
		} else {
			var DisplayInArr = [];
		}

		var value = e.target.value;
		var key = e.target.name;
		var elementClassName = e.target.className;
		if ( elementClassName == 'url-field' ) {
			var splitTargetIndex = e.target.id.split( '-' )[ 1 ];
			var targetIndex = parseInt( splitTargetIndex ) - 1;
			DisplayInArr[ targetIndex ] = value;
			popupData[ key ] = DisplayInArr;
		} else {
			popupData[ key ] = value;
		}

		popupPreview();
	} );

	jQuery( this ).on( 'change', '.kong-container textarea', function( e ) {
		var key = e.target.name;
		var value = e.target.value;
		popupData[ key ] = value;

		popupPreview();
	} );

	jQuery( this ).on( 'change', '.kong-container input[type="radio"]', function( e ) {
		console.log( "RADIO" );
		var key = e.target.name;
		var value = e.target.value;
		var id = e.target.id;
		popupData[ key ] = value;

		console.log( "RADIO KEY = " + key );
		console.log( "RADIO VALUE = " + value );
		console.log( "RADIO ID = " + id );
		console.log( popupData );

		if ( value == "specific" ) {
			jQuery( '.conditional-block' ).removeClass( 'hide-parameter-list' ).addClass( 'show-parameter-list' );
		} 

		if ( value == "all" ) {
			jQuery( '.conditional-block' ).removeClass( 'show-parameter-list' ).addClass( 'hide-parameter-list' );
		}

		if ( id == "radio-3" ) {
			jQuery( '#url-test' ).prop( 'disabled', false );
		} else {
			jQuery( '#url-test' ).prop( 'disabled', true );
		}

		// if ( value == "specific" || value == "condition" ) {
		// 	jQuery( '.conditional-block' ).removeClass( 'hide-parameter-list' ).addClass( 'show-parameter-list' );
		// } 

		// if ( value == "all" || value == "once" || value == "programmatically" ) {
		// 	jQuery( '.conditional-block' ).removeClass( 'show-parameter-list' ).addClass( 'hide-parameter-list' );
		// }

		if ( jQuery( this ).attr( 'data-name' ) == "position" ) {
			var targetID = jQuery( this ).closest( '.form-position' )[ 0 ].id;
			jQuery( '#' + targetID ).find( '.selected' ).removeClass( 'selected' );
			jQuery( '#' + targetID ).find( '.kg_border_color' ).removeClass( 'kg_border_color' );
			jQuery( 'label[for="' + this.id + '"]' ).addClass( 'selected' );
			jQuery( 'label[for="' + this.id + '"] .popview-icon' ).addClass( 'kg_border_color' );
		}

		popupPreview();
	} );

	jQuery( this ).on( 'change', '.kong-container .option-checkbox', function( e ) {
		console.log( "CHECKBOX OPTION-CHECKBOX" );
		var key = e.target.name;
		var id = e.target.id;

		console.log( "KEY = " + key );
		console.log( "ID = " + id );

		if ( jQuery( '#' + id ).is( ':checked' ) ) {
			popupData[ key ] = e.target.value;

			if ( id == "date-start" || id == "date-stop" ) {
				jQuery( '#' + id + '-field' ).datepicker( 'option', 'disabled', false );
			} else if ( id == "time-from" || id == "time-to" ) {
				jQuery( '#' + id + '-field' ).removeAttr( 'disabled' );
			} else { }
		} else {
			popupData[ key ] = 0;

			if ( id == "date-start" || id == "date-stop" ) {
				jQuery( '#' + id + '-field' ).datepicker( 'option', 'disabled', true );
			} else if ( id == "time-from" || id == "time-to" ) {
				jQuery( '#' + id + '-field' ).prop( 'disabled', true );
			} else { }
		}

		popupPreview();
	} );

	jQuery( '.kong-container .pos_label > *' ).on( 'click', function( e ) {
		jQuery( '.pos_label' ).removeClass( 'selected' );
		jQuery( this ).parents( '.pos_label' ).addClass( 'selected' );
	} );

	jQuery( this ).on( 'hover', '.pt-add-img li', function( e ) {
        jQuery( this ).children( '.image-editor-block' ).toggle();
    } );

	jQuery( this ).on( 'click', '.add-upload-bgimage, .add-upload-bgfile, .add-upload-btmscreen', function( e ) {
    	e.preventDefault();

    	var target = jQuery( this ).attr( 'data-target' );
    	var param = jQuery( this ).attr( 'data-param' );
    	if ( param == "size" ) {
    		var countBackgroundImageBlock = jQuery( '.' + target + '-bgimage-item' ).length;
    		var nextBackgroundImageBlock = parseInt( countBackgroundImageBlock ) + 1;
	    	var addDisplayBlock = `
	            <li class="` + target + `-bgimage-item" id="` + target + `-bgimage-item-` + nextBackgroundImageBlock + `">
		            <div class="image-editor-block">
		            	<a href="javascript:void(0);" class="upload-bgimage-button" data-param="bgimage">
	                        <i class="fa fa-pencil"></i>
	                    </a>

	                    <a href="javascript:void(0);" class="remove-bgimage-button" id="` + countBackgroundImageBlock + `" data-param="bgimage">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                    </a>
		            </div>

	                <img src="` + kongPopupSupports.base_url + `images/img1.png" alt="" class="image-tag" id="upload-bgimage-button-` + nextBackgroundImageBlock + `" data-target="` + target + `" data-index="` + countBackgroundImageBlock + `">
	                <input type="hidden" name="` + target + `_image" id="` + target + `-image-` + nextBackgroundImageBlock + `" />
	            </li>
			`;
			var item = 'bgimage';
		} else if( param == "bgfile" ) {
			var countBackgroundImageBlock = jQuery( '.' + target + '-bgfile-item' ).length;
    		var nextBackgroundImageBlock = parseInt( countBackgroundImageBlock ) + 1;
			var addDisplayBlock = `
	            <li class="` + target + `-bgfile-item" id="` + target + `-bgfile-item-` + nextBackgroundImageBlock + `">
		            <div class="image-editor-block">
		            	<a href="javascript:void(0);" class="upload-bgfile-button" data-param="bgfile">
	                        <i class="fa fa-pencil"></i>
	                    </a>

	                    <a href="javascript:void(0);" class="remove-bgfile-button" id="` + countBackgroundImageBlock + `" data-param="bgfile">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                    </a>
		            </div>

	                <img src="` + kongPopupSupports.base_url + `images/img1.png" alt="" class="image-tag" id="upload-bgfile-button-` + nextBackgroundImageBlock + `" data-target="` + target + `" data-index="` + countBackgroundImageBlock + `">
	                <input type="hidden" name="` + target + `_image" id="` + target + `-image-` + nextBackgroundImageBlock + `" />
	            </li>
			`;
			var item = 'bgfile';
		} else {
			var countBackgroundImageBlock = jQuery( '.' + target + '-btmscreen-item' ).length;
    		var nextBackgroundImageBlock = parseInt( countBackgroundImageBlock ) + 1;
			var addDisplayBlock = `
	            <li class="` + target + `-btmscreen-item" id="` + target + `-btmscreen-item-` + nextBackgroundImageBlock + `">
		            <div class="image-editor-block">
		            	<a href="javascript:void(0);" class="upload-btmscreen-button" data-param="btmscreen">
	                        <i class="fa fa-pencil"></i>
	                    </a>

	                    <a href="javascript:void(0);" class="remove-btmscreen-button" id="` + countBackgroundImageBlock + `" data-param="btmscreen">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                    </a>
		            </div>

	                <img src="` + kongPopupSupports.base_url + `images/img1.png" alt="" class="image-tag" id="upload-btmscreen-button-` + nextBackgroundImageBlock + `" data-target="` + target + `" data-index="` + countBackgroundImageBlock + `">
	                <input type="hidden" name="` + target + `_image" id="` + target + `-image-` + nextBackgroundImageBlock + `" />
	            </li>
			`;
			var item = 'btmscreen';
		}
    	jQuery( '.' + item + '-' + target ).append( addDisplayBlock );
    } );

    jQuery( this ).on( 'click', '.remove-bgimage-button, .remove-bgfile-button, .remove-btmscreen-button', function( e ) {
    	e.preventDefault();

    	var $currentTargetElement = jQuery( this ).closest( '.image-editor-block' ).next( '.image-tag' );
    	var param = jQuery( this ).attr( 'data-param' );
    	var selectID = this.id;
    	var removeItemBlockID = parseInt( selectID ) + 1;
    	var target = $currentTargetElement.attr( 'data-target' );

    	if ( $currentTargetElement.attr( 'data-target' ) == "desktop" ) {
    		if ( param == "bgimage" ) {
	    		var appearanceImageArray = popupData[ 'desktop_image' ];
	    		var bgImage = "desktop_image";
	    	} else if ( param == "bgfile" ) {
	    		var appearanceImageArray = popupData[ 'desktop_bgfile_image' ];
	    		var bgImage = "desktop_bgfile_image";
	    	} else {
	    		var appearanceImageArray = popupData[ 'desktop_btmscreen_image' ];
	    		var bgImage = "desktop_btmscreen_image";
	    	}
    	} else {
    		if ( param == "bgimage" ) {
	    		var appearanceImageArray = popupData[ 'mobile_image' ];
	    		var bgImage = "mobile_image";
	    	} else if ( param == "bgfile" ) {
	    		var appearanceImageArray = popupData[ 'mobile_bgfile_image' ];
	    		var bgImage = "mobile_bgfile_image";
	    	} else {
	    		var appearanceImageArray = popupData[ 'mobile_btmscreen_image' ];
	    		var bgImage = "mobile_btmscreen_image";
	    	}
    	}
    	jQuery( '#' + target + '-' + param + '-item-' + removeItemBlockID ).remove();

    	appearanceImageArray.splice( selectID, 1 );
    	popupData[ bgImage ] = appearanceImageArray;

    	popupPreview();
    } );

	var appearanceSectionImageUploader;
	jQuery( this ).on( 'click', '.upload-bgimage-button, .upload-bgfile-button, .upload-btmscreen-button', function( e ) {
		e.preventDefault();

		var $currentTargetElement = jQuery( this ).closest( '.image-editor-block' ).next( '.image-tag' );
    	var param = jQuery( this ).attr( 'data-param' );
		var $nextTargetElement = $currentTargetElement.next();
		// if ( appearanceSectionImageUploader ) {
		// 	appearanceSectionImageUploader.open();

		// 	return;
		// }

		if ( $currentTargetElement.attr( 'data-target' ) == "desktop" ) {
			if ( param == "bgimage" ) {
				if ( popupData.hasOwnProperty( 'desktop_image' ) && popupData.desktop_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'desktop_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "desktop_image";
			} else if ( param == "bgfile" ) {
				if ( popupData.hasOwnProperty( 'desktop_bgfile_image' ) && popupData.desktop_bgfile_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'desktop_bgfile_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "desktop_bgfile_image";
			} else {
				if ( popupData.hasOwnProperty( 'desktop_btmscreen_image' ) && popupData.desktop_btmscreen_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'desktop_btmscreen_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "desktop_btmscreen_image";
			}
		} else {
			if ( param == "bgimage" ) {
				if ( popupData.hasOwnProperty( 'mobile_image' ) && popupData.mobile_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'mobile_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "mobile_image";
			} else if ( param == "bgfile" ) {
				if ( popupData.hasOwnProperty( 'mobile_bgfile_image' ) && popupData.mobile_bgfile_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'mobile_bgfile_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "mobile_bgfile_image";
			} else {
				if ( popupData.hasOwnProperty( 'mobile_btmscreen_image' ) && popupData.mobile_btmscreen_image.length > 0 ) {
					var appearanceImageArray = popupData[ 'mobile_btmscreen_image' ];
				} else {
					var appearanceImageArray = [];
				}
				var bgImage = "mobile_btmscreen_image";
			}
		}

		appearanceSectionImageUploader = wp.media.frames.file_frame = wp.media( {
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			}, 
			multiple: false 
		} );

		appearanceSectionImageUploader.on( 'select', function( ele ) {
			var attachment = appearanceSectionImageUploader.state().get( 'selection' ).first().toJSON();
			$currentTargetElement.attr( 'src', attachment.url );
			$nextTargetElement.val( attachment.id );

			if ( appearanceImageArray[ $currentTargetElement.attr( 'data-index' ) ] ) {
				appearanceImageArray[ $currentTargetElement.attr( 'data-index' ) ] = attachment.id;
			} else {
				appearanceImageArray.push( attachment.id );
			}
		} );
		popupData[ bgImage ] = appearanceImageArray;
		appearanceSectionImageUploader.open();

		popupPreview();
	} );

	// content upload image
	var mediaUploader2;
	jQuery( '#upload-image-button' ).click( function( e ) {
		e.preventDefault();

		if ( mediaUploader2 ) {
			mediaUploader2.open();
			
			return;
		}
		mediaUploader2 = wp.media.frames.file_frame = wp.media( {
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			}, 
			multiple: false 
		} );
		mediaUploader2.on( 'select', function() {
			var attachment = mediaUploader2.state().get( 'selection' ).first().toJSON();
			jQuery( '#popup_image' ).val( attachment.url );
			popupData[ 'popup_image' ] = attachment.url;
			
			popupPreview();
		} );
		mediaUploader2.open();
	} );

	var templateCategoryMediaLoader;
	jQuery( '#template-category-image-btn' ).click( function( e ) {
		e.preventDefault();

		if ( templateCategoryMediaLoader ) {
			templateCategoryMediaLoader.open();

			return;
		}
		templateCategoryMediaLoader = wp.media.frames.file_frame = wp.media( {
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			}, 
			multiple: false 
		} );
		templateCategoryMediaLoader.on( 'select', function() {
			var attachment = templateCategoryMediaLoader.state().get( 'selection' ).first().toJSON();
			jQuery( '#template-category-image' ).val( attachment.id );
		} );
		templateCategoryMediaLoader.open();
	} );

	/**
	 * Target for who should see the widget.
	 */
	jQuery( '.kong-container input[name="visitor"]' ).on( 'click', function( e ) {
		if ( popupData.hasOwnProperty( 'visitor' ) && popupData.visitor.length > 0 ) {
			var visitorArray = popupData[ 'visitor' ];
		} else {
			var visitorArray = [];
		}

		var key = e.target.name;
		var value = e.target.value;

		/* Define a flag for checking atleast one Visitor option is checked. */
		var isBlankVisitor = false;	
		if ( jQuery( this ).is( ':checked' ) ) {
			visitorArray.push( value );
		} else {
			visitorArray.splice( visitorArray.indexOf( value ), 1 );
		}

		/* If no Visitor option is checked. */
		if ( visitorArray.length == 0 ) {
			popupData[ key ] = visitorArray.push( '' );
			isBlankVisitor = true;
		}
		popupData[ 'visitor' ] = visitorArray;
		
		popupPreview();

		if ( isBlankVisitor == true ) visitorArray = [];
	} );

	/**
	 * Target for excluding Browser.
	 */
	jQuery( '.kong-container input[name="browser"]' ).on( 'click', function( e ) {
		if ( popupData.hasOwnProperty( 'browser' ) && popupData.browser.length > 0 ) {
			var BrowserArr = popupData[ 'browser' ];
		} else {
			var BrowserArr = [];
		}

		var key = e.target.name;
		var value = e.target.value;

		/* Define a flag for checking atleast one Browser option is checked. */
		var isBlankBrowser = false;	
		if ( jQuery( this ).is( ':checked' ) ) {
			BrowserArr.push( value );
		} else {
			BrowserArr.splice( BrowserArr.indexOf( value ), 1 );
		}
		
		/* If no Browser option is checked. */
		if ( BrowserArr.length == 0 ) {
			popupData[ key ] = BrowserArr.push( '' );
			isBlankBrowser = true;
		}
		popupData[ 'browser' ] = BrowserArr;

		popupPreview();

		if ( isBlankBrowser == true ) popupData[ 'browser' ] = [];
	} );

	/**
	 * Target for excluding OS.
	 */
	jQuery( '.kong-container input[name="os"]' ).on( 'click', function( e ) {
		if ( popupData.hasOwnProperty( 'os' ) && popupData.os.length > 0 ) {
			var OSArr = popupData[ 'os' ];
		} else {
			var OSArr = [];
		}

		var key = e.target.name;
		var value = e.target.value;

		/* Define a flag for checking atleast one OS option is checked. */
		var isBlankOS = false;
		if ( jQuery( this ).is( ':checked' ) ) {
			OSArr.push( value );
		} else{
			OSArr.splice( OSArr.indexOf(value), 1 );
		}

		/* If no OS option is checked. */
		if ( OSArr.length == 0 ) {
			popupData[ key ] = OSArr.push( '' );
			isBlankOS = true;
		}
		popupData[ 'os' ] = OSArr;
		
		popupPreview();

		if ( isBlankOS == true ) popupData[ 'os' ] = [];
	} );

	/**
	 * Target for excluding Device.
	 */
	jQuery( '.kong-container input[name="device"]' ).on( 'click',function( e ) {
		if ( popupData.hasOwnProperty( 'device' ) && popupData.device.length > 0 ) {
			var DeviceArr = popupData[ 'device' ];
		} else {
			var DeviceArr = [];
		}

		var key = e.target.name;
		var value = e.target.value;

		/* Define a flag for checking atleast one Device option is checked. */
		var isBlankDevice = false;
		if ( jQuery( this ).is( ':checked' ) ) {
			DeviceArr.push( value );
		} else {
			DeviceArr.splice( DeviceArr.indexOf( value ), 1 );
		}

		/* If no Device option is checked. */
		if ( DeviceArr.length == 0 ) {
			popupData[ key ] = DeviceArr.push( '' );
			isBlankDevice = true;
		}
		popupData[ 'device' ] = DeviceArr;
		
		popupPreview();

		if ( isBlankDevice == true ) popupData[ 'device' ] = [];
	} );

	/**
	 * Target for Days of Week.
	 */
	jQuery( '.kong-container input[name="days_of_week"]' ).on( 'click',function( e ) {
		if ( popupData.hasOwnProperty( 'days_of_week' ) && popupData.days_of_week.length > 0 ) {
			var DaysOfWeekArr = popupData[ 'days_of_week' ];
		} else {
			var DaysOfWeekArr = [];
		}

		var key = e.target.name;
		var value = e.target.value;

		/* Define a flag for checking atleast one Device option is checked. */
		var isBlankDaysOfWeek = false;
		if ( jQuery( this ).is( ':checked' ) ) {
			DaysOfWeekArr.push( value );
		} else {
			DaysOfWeekArr.splice( DaysOfWeekArr.indexOf( value ), 1 );
		}

		/* If no Days of Week option is checked. */
		if ( DaysOfWeekArr.length == 0 ) {
			popupData[ key ] = DaysOfWeekArr.push( '' );
			isBlankDaysOfWeek = true;
		}
		popupData[ 'days_of_week' ] = DaysOfWeekArr;
		
		popupPreview();

		if ( isBlankDaysOfWeek == true ) popupData[ 'days_of_week' ] = [];
	} );

	/**
	 * Target for all selection fields.
	 */
	// jQuery( '.kong-container #animation, #fonts, #color-theme, #time-schedule-option, #site-pages, #timezone' ).on( 'change', function( e ) {
	jQuery( this ).on( 'change', '.kong-container .select-option', function( e ) {
		var key = e.target.name;
		var value = e.target.value;
		popupData[ key ] = value;
		
		popupPreview();
	} );

	jQuery( '.my-color-field' ).wpColorPicker( {
		change: function( e ) {
			var key = e.target.name;
			var value = e.target.value;
			popupData[ key ] = value;

			popupPreview();
		}
	} );

	jQuery( '#save' ).on( 'click', function() {
		popupPreview();
	} );

	jQuery( '.open-popup-content' ).on( 'click', function() {
		jQuery( '.advance-hidden' ).toggleClass( 'hide' );
	} );

	// jQuery( '#publish-popup' ).on( 'click', function( e ) {
	// 	e.preventDefault();

	// 	var getPopupID = popupData.popup_id;
	// 	var getStatus = 'publish';
	// 	jQuery.ajax( {
	// 		url: ajaxurl + '?action=update_popup_status_ajax',
	// 		type: 'POST',
	// 		data: {
	// 			id: getPopupID,
	// 			status: getStatus
	// 		},
	// 	} )
	// 	.done( function( data ) {
	// 		alert( "Popup Publish" );
	// 		location.reload();
	// 	} )
	// 	.fail( function( data ) {
			
	// 	} );
	// } );

	jQuery( '.target-clone' ).on( 'click', function( e ) {
		e.preventDefault();

		var getPopupID = jQuery( this ).data( 'id' );

		jQuery.ajax( {
			url: ajaxurl + '?action=clone_popup_ajax',
			type: 'POST',
			data: {
				id: getPopupID,
			},
		} )
		.done( function( data ) {
			location.reload();
		} )
		.fail( function( data ) {
			
		} );
	} );

	jQuery( '.trash-popup' ).on( 'click', function( e ) {
		e.preventDefault();

		var getPopupID = jQuery( this ).data( 'id' );
		var getStatus = 'trash';
		jQuery.ajax( {
			url: ajaxurl + '?action=update_popup_status_ajax',
			type: 'POST',
			data: {
				id: getPopupID,
				status: getStatus
			},
		} )
		.done( function( data ) {
			location.reload();
		} )
		.fail( function( data ) {
			
		} );
	} );

	// jQuery( '.change-status' ).on( 'change', function( e ) {
	// 	e.preventDefault();
		
	// 	var getPopupID = jQuery( this ).data( 'id' );
	// 	var getStatus = jQuery( this ).val();
	// 	jQuery.ajax( {
	// 		url: ajaxurl + '?action=update_popup_status_ajax',
	// 		type: 'POST',
	// 		data: {
	// 			id: getPopupID,
	// 			status: getStatus
	// 		},
	// 	} )
	// 	.done( function( data ) {
	// 		location.reload();
	// 	} )
	// 	.fail( function( data ) {
			
	// 	} );
	// } );

	jQuery( '#create-folder' ).on( 'click', function( e ) {
        e.preventDefault();

        var isVaildate = true;

        var folderName = jQuery( '#folder-name' ).val();
        if ( jQuery.trim( folderName ) == '' ) {
			jQuery( '#folder-name' ).css( { 'border-bottom': '1px solid #f00' } );
			jQuery( '#fn-error-message' ).text( "required" );
			isVaildate = false;
		} else {
			jQuery( '#folder-name' ).removeAttr( 'style' );
			jQuery( '#fn-error-message' ).text( "" );
		}

        if ( isVaildate ) {
            jQuery.ajax( {
                url: ajaxurl + '?action=create_folder_ajax',
                type: 'POST',
                data: {
                    'folder_name': folderName
                }
            } )
            .done( function( response ) {
                location.reload();
            } );
        } 
    } );

    jQuery( '#create-template-category' ).on( 'click', function( e ) {
        e.preventDefault();

        var isVaildate = true;

        var templateCategoryName = jQuery( '#template-category-name' ).val();
        var templateCategoryImage = jQuery( '#template-category-image' ).val();

        if ( jQuery.trim( templateCategoryName ) == '' ) {
			jQuery( '#template-category-name' ).css( { 'border-bottom': '1px solid #f00' } );
			jQuery( '#tcn-error-message' ).text( "required" );
			isVaildate = false;
		} else {
			jQuery( '#template-category-name' ).removeAttr( 'style' );
			jQuery( '#tcn-error-message' ).text( "" );
		}

        if ( isVaildate ) {
            jQuery.ajax( {
                url: ajaxurl + '?action=create_template_category_ajax',
                type: 'POST',
                data: {
                    'template_category_name': templateCategoryName,
                    'template_category_image': templateCategoryImage,
                }
            } )
            .done( function( response ) {
                location.reload();
            } );
        }
    } );

    jQuery( this ).on( 'click', '#add-expression', ( e ) => {
    	e.preventDefault();

    	var countDisplayInBlocks = jQuery( '.display-in' ).length;
	    if ( countDisplayInBlocks == 1 ) {
	    	jQuery( '.remove-btn' ).removeClass( 'hide-btn' ).addClass( 'show-btn' );
	    }

	    jQuery( '#show-on' ).append( `
	    	<select name="" id="">
          		<option><?php echo __( 'Show on', 'kong-popup' ); ?></option>
        	</select>
        ` );

    	var currentDisplayInBlockIndex = jQuery( '.display-in:last' )[ 0 ].id.split( '-' )[ 2 ];
    	var nextDisplayInBlockIndex = parseInt( currentDisplayInBlockIndex ) + 1;
    	var addDisplayBlock = `
    		<!-- .display-in starts -->
            <div class="display-in" id="display-in-` + nextDisplayInBlockIndex + `">
            	<!-- .show-on-dropdown starts -->
                <div class="show-on-dropdown" id="show-on-` + nextDisplayInBlockIndex + `">
                  <select name="" id="">
                    <option>Show on</option>
                  </select>
                </div>
                <!-- .show-on-dropdown ends -->

                <!-- .show-on-block starts -->
                <div class="show-on-block">
              		<input class="url-field" name="display_in" type="text"" placeholder="*" id="field-` + nextDisplayInBlockIndex + `" data-param="display-in" data-index="` + currentDisplayInBlockIndex + `" />
              		<input type="button" value="-" class="remove-btn" id="remove-btn-` + nextDisplayInBlockIndex + `" data-id="` + nextDisplayInBlockIndex + `" />
            	</div>
            	<!-- .show-on-block ends -->
            </div>
            <!-- .display-in ends -->
		`;
    	jQuery( '.addition-block-inner' ).append( addDisplayBlock );
    } );

    jQuery( this ).on( 'click', '.remove-btn', function( e ) {
    	if ( popupData.hasOwnProperty( 'display_in' ) && popupData.display_in.length > 0 ) {
			var removeDisplayInArr = popupData[ 'display_in' ];
		} else {
			var removeDisplayInArr = [];
		}
		
    	var targetingIndex = jQuery( this ).data( 'id' );
    	var removeTargetIndex = parseInt( targetingIndex ) - 1;
    	removeDisplayInArr.splice( removeTargetIndex, 1 );
    	jQuery( '#display-in-' + jQuery( this ).data( 'id' ) ).remove();

	    var countDisplayInBlocks = jQuery( '.display-in' ).length;
	    if ( countDisplayInBlocks == 1 ) {
	    	jQuery( '.remove-btn' ).removeClass( 'show-btn' ).addClass( 'hide-btn' );
	    }
	    popupData[ 'display_in' ] = removeDisplayInArr;
		
		popupPreview();
    } );
    
    jQuery( this ).on( 'click', '.url-test', function( e ) {
    	e.preventDefault();
    	e.stopPropagation();

    	var splitID = this.id.split( '-' );
    	var successRedirectURL = jQuery( '#success-redirect-url-' + splitID[ 1 ] ).val();
    	var pattern = /^((http|https|ftp):\/\/)/;
		if ( ! pattern.test( successRedirectURL ) ) {
		    successRedirectURL = "http://" + successRedirectURL;
		}
    	var redirect = window.open( successRedirectURL, '_blank' );
    	redirect.focus();
    } );

    jQuery( '#date-start-field, #date-stop-field' ).datepicker( {
		dateFormat: 'M d,yy'
	} );

    jQuery( '#time-from-field, #time-to-field' ).datetimepicker( {
	    datepicker: false,
		format: 'H:i',
		step: 5
	} );

	jQuery( this ).on( 'change', '#start-to-display-option', function( e ) {
		if ( jQuery( this ).val() == "when-reach" ) {
			jQuery( '#when-reach-percentage-option' ).removeAttr( 'disabled' );
		} else {
			jQuery( '#when-reach-percentage-option' ).prop( 'disabled', true );
		}

		if ( jQuery( this ).val() == "after-second" ) {
			jQuery( '#time-duration' ).removeAttr( 'readonly' );
		} else {
			jQuery( '#time-duration' ).prop( 'readonly', true );
		}
	} );

	/**
	 * Only number input validation
	 */
	jQuery( this ).on( 'keypress', '#time-duration', function( e ) {
		var theEvent = e || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode( key );
		var regex = /[0-9]|\./;
		if ( ! regex.test( key ) ) {
			theEvent.returnValue = false;
			if ( theEvent.preventDefault ) theEvent.preventDefault();
		}	
	} );

	jQuery( this ).on( 'change', '#project-template', function( e ) {
		var projectTemplate = jQuery( '#project-template' ).val();

		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'get_template_category_image_ajax',
				template: projectTemplate
			}
		} )
		.done( function( response ) {
			jQuery( '#top-subscribe-image > img' ).attr( 'src', response );
		} );
	} );

	jQuery( this ).on( 'click', '#template-cat li', function( e ) {
		e.preventDefault();

		var templateSlug = jQuery( this ).data( 'template' );
		var categoryID = this.id;
		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'search_template_by_category_ajax',
				template: templateSlug
			}
		} )
		.done( function( response ) {
			jQuery( '#template-listing' ).html( response );
			jQuery( '#template-cat li' ).removeClass( 'selected-category' );
			jQuery( '#' + categoryID ).addClass( 'selected-category' );
		} );
	} );

	jQuery( this ).on( 'input', '#search-template', function( e ) {
		var searchKeyword = jQuery( this ).val();

		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'search_template_by_title_ajax',
				keyword: searchKeyword
			}
		} )
		.done( function( response ) {
			jQuery( '#template-listing' ).html( response );
		} );
	} );

	// function popupPreview() {
	// 	if ( popupData ) {
	// 		jQuery.ajax( {
	// 			url: ajaxurl + '?action=updatepopup',
	// 			type: 'POST',
	// 			dataType: 'json',
	// 			data: popupData,
	// 			beforeSend: function( x ) {
	// 				if ( x && x.overrideMimeType ) {
	// 					x.overrideMimeType( "application/j-son;charset=UTF-8" );
	// 				}
	// 			},
	// 		} )
	// 		.done( function( data ) {
	// 			frameSRC = jQuery('.preview-wrap iframe' ).attr( 'src' );
	// 			jQuery( '.preview-wrap iframe' ).attr( 'src', frameSRC ); 
	// 			jQuery( 'a.frame' ).attr( 'href', frameSRC );
	// 		} );
	// 	} else {
	// 		console.log( 'Not Updating...' );
	// 	}
	// }



	/**
	 * New Codes
	 */
	popupPreview();

	jQuery( '.pt-addfield' ).sortable( {
	 	update: function( event, ui ) {
	 		rearrangeSection();
	 	}
	} );

	jQuery( '.optionUl' ).sortable( {
	 	update: function( event, ui ) {
	 		rearrangeSection();
	 	}
	} );
	// jQuery( '.optionUl' ).sortable();
	jQuery( '#step1-mobile-size, #step1-mobile-bgfile, #step1-mobile-btmscreen, #step2-mobile-size' ).hide();
	// popup position selecte
	jQuery('.pos-label').click(function() {
		jQuery('.pos-label').removeClass('selected');
		jQuery(this).addClass('selected');
	});

	// open and close section
	jQuery( this ).on( 'change', '#option-add-image-opener-appearance, #option-add-background-file-opener, #option-add-buttom-screen-icon-opener, #option-add-image-opener-content', function( e ) {
		var optionTab = jQuery( this ).attr( 'data-info' );
		var $ele = jQuery( '.pt-add-image-field.' + optionTab );
		jQuery( this ).is( ':checked' ) ? $ele.slideDown( 500 ) : $ele.slideUp( 500 );
	} );

	jQuery( '.pt-add-image-field_tab li' ).click( function() {
		jQuery( this ).closest( 'ul' ).find( 'li' ).removeClass( 'selected' );
		if ( jQuery( this ).attr( 'data-step' ) == "step-2" ) {
			var selected = jQuery( '.pt-inner-tab' ).find( '.selected' ).attr( 'id' );
			jQuery( '.inner-option' ).removeAttr( 'data-id' ).removeAttr( 'data-param' );
			var target = jQuery( this ).attr( 'data-target' );
			var options = [ 'popup', 'content', 'wheel' ];
			options.forEach( function( option ) {
				jQuery( '#option-' + option ).attr( { 'data-id': 'step2-' + target + '-' + option, 'data-param': target + '-' + option } );
			} );
			jQuery( '#' + selected ).click();
		}
		var tabName = jQuery( this ).addClass( 'selected' ).attr( 'data-id' );
		jQuery( this ).closest( '.pt-add-image-field' ).find( '.pt-image-field_cnt' ).hide();
		jQuery( '#' + tabName ).show();
	} );

	jQuery(document).on('click', '.pt-add-img li', function() {
		tabSelectedFunction(jQuery(this));
	});

	jQuery( this ).on( 'click', '.pt-inner-tab li', function() {
		var popupID = jQuery( '.appearance' ).attr( 'data-popup' );
		var param = jQuery( this ).attr( 'data-param' );
		var splitParam = param.split( '-' );
		var target = splitParam[ 0 ];
		var option = splitParam[ 1 ];
		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			async: false,
			data: {
				action: 'add_selective_section_ajax',
				id: popupID,
				target: target,
				option: option,
			},
			success: function( response ) {
				jQuery( '#step2-' + target ).remove();
				jQuery( '#step2-' + target + '-size' ).html( response );
			}
		} );
		tabSelectedFunction( jQuery( this ) );
	} );

	jQuery('.pt-flip-option li').click(function() {
		var $this = jQuery( this );
		// $this.hasClass('selected') ? $this.removeClass('selected') : $this.addClass('selected');
		jQuery( '.pt-flip-option li' ).removeClass( 'selected' );
		$this.addClass('selected');
	});

	// jQuery( '.color-select' ).spectrum( {
	// 	// color: "#98752d",
	// 	showButtons: false,
	// 	change: function( color ) {
	// 		var element = jQuery( this ).closest( '.pt-color-box' ).find( '.colorCode' );
	// 		if ( element ) {
	// 			jQuery( this ).val( color.toHexString() );
	// 			element.val( color.toHexString() );

	// 			var key = element.context.name;
	// 			var value = color.toHexString();
	// 			popupData[ key ] = value;

	// 			popupPreview();
	// 		}
	// 	}
	// } );

	jQuery('#bgColorPeeker, #block1-bgColorPeeker, #block2-bgColorPeeker').click(function() {
		// if(jQuery('#colorOptions').is(':visible')){
		// 	jQuery('#colorOptions').hide();
		// } else {
		// 	jQuery('#colorOptions').show();
		// }

		if ( jQuery( this ).next( '.pt-color-option' ).is( ':visible' ) ) {
			jQuery( this ).next( '.pt-color-option' ).hide();
		} else {
			jQuery( this ).next( '.pt-color-option' ).show();
		}
	} );

	var value = ( jQuery( '#cmn-direction' ).val() ) ? jQuery( '#cmn-direction' ).val() : 0;
	jQuery( '#cmn_direction' ).roundSlider({
		radius: 30,
		width: 4,
		value: value,
		max:360,
		handleSize: "+14",
		showTooltip: true,
		editableTooltip: false,
		tooltipFormat: "tooltipVal2"
	});

	var block1Value = ( jQuery( '#block1-direction' ).val() ) ? jQuery( '#block1-direction' ).val() : 0;
	jQuery( '#block1_direction' ).roundSlider({
		radius: 30,
		width: 4,
		value: block1Value,
		max:360,
		handleSize: "+14",
		showTooltip: true,
		editableTooltip: false,
		tooltipFormat: "tooltipVal2"
	});

	var block2Value = ( jQuery( '#block2-direction' ).val() ) ? jQuery( '#block2-direction' ).val() : 0;
	jQuery( '#block2_direction' ).roundSlider({
		radius: 30,
		width: 4,
		value: block2Value,
		max:360,
		handleSize: "+14",
		showTooltip: true,
		editableTooltip: false,
		tooltipFormat: "tooltipVal2"
	});

	function tooltipVal2(args) {
		return args.value;
	}

	jQuery( this ).on( 'change', '#cmn_direction, #block1_direction, #block2_direction', function( e ) {
		var key = e.id;
		var value = e.value;
		popupData[ key ] = value;

		popupPreview();
	} );

	jQuery( this ).on( 'input', '#adons', function( e ) {
		var key = e.target.name;
		var value = e.target.value;
		popupData[ key ] = value;

		popupPreview();
	} );

	// function tabSelectedFunction($el) {
	// 	$el.closest('ul').find('li').removeClass('selected');
	// 	$el.addClass('selected');
	// }

	// function rgb2hex(rgb){
	// 	rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
	// 	return (rgb && rgb.length === 4) ? "#" +
	// 	("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
	// 	("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
	// 	("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
	// }

	jQuery( this ).on( 'click', '.save-popup', function( e ) {
		updatePopupData();
	} );

	jQuery('#addFldBtn').click(function() {
		(jQuery('#addFldList').is(':visible')) ? toggleEl('#addFldList', 'hide') : toggleEl('#addFldList', 'show');
	});
	jQuery(document).on('click', '.pt-addfield-box-config', function() {
		if(jQuery(this).next().is(':visible')) {
			jQuery(this).next().hide();
		} else {
			jQuery(this).next().show();
		}
	});
	jQuery(document).on('click', '.accrodianBtn', function() {
		var $el = jQuery(this).closest('.drugableSection').find('.pt-addfield-box-edit');
		$el.is(':visible') ? toggleEl($el, 'hide') : toggleEl($el, 'show');
	});
	jQuery(document).on('click', '.sectionOpener', function() {
		var $el = jQuery(this).closest('section').find('.subSection');
		$el.is(':visible') ? toggleEl($el, 'hide') : toggleEl($el, 'show');
	});
	jQuery(document).on('click', '.renameTitle', function() {
		var $el = jQuery(this).closest('.pt-addfield-box');
		$el.find('.accrodianBtn').removeClass('accrodianBtn').addClass('accrodianBtn1');
		$el.find('.editableTitle').attr('readonly', false).focus().css({background:'#fff', padding:'5px 3px'});
		toggleEl('.add-button-field', 'hide')
	});
	jQuery(document).on('blur', '.editableTitle', function() { newTitle(jQuery(this)); });
	jQuery(document).on('keyup', '.editableTitle', function(e) {
		if (e.which == 13)
			newTitle(jQuery(this));
	});

	jQuery( this ).on( 'click', '.removeSection', function() {
		jQuery( this ).closest( '.drugableSection' ).find( 'input, select, textarea' ).each( function() {
		    removeFieldsNameArray.push( this.name );
		    delete popupData[ this.name ];
		} );
		
		var $selectedElement = jQuery( this ).closest( '.drugableSection' );
		var dataField = $selectedElement.attr( 'data-field' );

		$selectedElement.remove();
		jQuery( ".pt-frm-field[data-form-field='" + dataField + "']" ).remove();

		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '.cloneSection', function() {
		var $el = jQuery( this ).closest( '.drugableSection' );
		var fldIdentity = $el.attr( 'id' ).split( '_' )[ 0 ];
		var tag = $el.attr( 'data-tag' );
		var id = fldIdentity + '_' + jQuery( '#fldArea .drugableSection' ).length;
		var title = $el.find( '.editableTitle' ).val() + ' Cloned';

		if ( fldIdentity == 'wp' ) {
			var structure = welcomePageField( title, id );
			jQuery( '#fldArea').append( structure[ 1 ] );
		} else if ( fldIdentity == 'rb' || fldIdentity == 'cb' || fldIdentity == 'dl' ) {
			var structure = radioButtonFld( title, id, tag );
			jQuery( '#fldArea').append( structure[ 1 ] );
			// jQuery( '.optionUl' ).sortable();
			jQuery( '.optionUl' ).sortable( {
			 	update: function( event, ui ) {
			 		rearrangeSection();
			 	}
			} );
		} else if ( fldIdentity == 'slt' || fldIdentity == 'mlt' ) {
			jQuery( '#fldArea' ).append( singleLineTextFld( title, id, tag ) );
		} else if(fldIdentity == 'ea') {
			var structure = emailAddressFld( title, id );
			jQuery( '#fldArea' ).append( structure[ 1 ] );
		} else if(fldIdentity == 'r') {
			jQuery( '#fldArea' ).append( ratingFld( title, id ) );
		} else if(fldIdentity == 'sp') {
			jQuery( '#fldArea' ).append( successPageFld( title, id ) );
		}
		rearrangeSection();
		jQuery( this ).closest( 'ul' ).hide();
	} );

	jQuery( this ).on( 'click', '.optionRemove', function() {
		var removeInput = jQuery( this ).closest( 'li' ).attr( 'data-input' );
		// var removeSpan = jQuery( this ).closest( 'li' ).attr( 'data-span' );
		var splitIndex = removeInput.split( '_' );
		// console.log( removeInput );
		// console.log( removeSpan );
		// return;
		jQuery( '.popup-content #options-' + splitIndex[ 2 ] ).find( 'div[data-index="' + splitIndex[ 1 ] + '"]' ).remove();
		// jQuery( '.popup-content #' + removeSpan ).remove();
		jQuery( this ).closest( 'li' ).remove();
	} );

	jQuery( this ).on( 'click', '.addOptionBtn', function() {
		var ind = jQuery( this ).prev().find( 'li' ).length + 1;
		var index = jQuery( this ).closest( '.drugableSection' ).attr( 'data-field' );
		var tag = jQuery( this ).closest( '.drugableSection' ).attr( 'data-tag' );
		var markUp = `
			<li data-input="opt_${ind}_${index}" data-span="sp-${ind}-${index}">
				<div class="barIcon">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>

				<div class="optnTxtArea">
					<input type="text" name="content_form_radio_opt_title_${ind}_${index}" placeholder="Option ${ind}" />
				</div>

				<div class="optionRemove">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</div>
			</li>
		`;

		if ( tag == "radio" ) {
			var html = `
				<div data-index="${ind}" data-order="${ind}">
					<input type="radio" name="radio_option_${index}" id="opt_${ind}_${index}"/>
					<span id="sp-${ind}-${index}"></span>
				</div>
			`;
			jQuery( '#option-fields-block-' + index ).append( html );
		} else if ( tag == "checkbox" ) {
			var html = `
				<input type="checkbox" name="checkbox_option_${index}" id="opt_${ind}_${index}"/>
				<span id="sp-${ind}-${index}"></span>
			`;
			jQuery( '.options-' + index ).append( html );
		} else {
			var html = `
				<option id="opt_${ind}_${index}" /></option>
			`;
			jQuery( '#select_' + index ).append( html );
		}
		jQuery( this ).prev().append( markUp );

		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#welcomePageBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = welcomePageField( 'Welcome Page', 'wp_' + ind );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );

		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#emailAddressBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = emailAddressFld( 'Email address', 'ea_' + ind );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );

		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#radioButtonsBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = radioButtonFld( 'Radio Button', 'rb_' + ind, 'radio' );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );

		jQuery( '.optionUl').sortable();
		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#checkboxesBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = radioButtonFld( 'Checkboxes', 'cb_'+ind, 'checkbox' );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );

		jQuery( '.optionUl').sortable();
		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#dropdownListBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = radioButtonFld( 'Dropdown list', 'dl_'+ind, 'select' );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );

		jQuery( '.optionUl').sortable();
		rearrangeSection();
		popupPreview();
	} );
	jQuery( this ).on( 'click', '#singleLineTextBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = singleLineTextFld( 'Single line text', 'slt_'+ind, 'single' );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );
		
		rearrangeSection();
		popupPreview();
	} );

	jQuery( this ).on( 'click', '#multiLineTextBtn', function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;
		var structure = singleLineTextFld( 'Multiline text', 'mlt_'+ind, 'multi' );

		jQuery( '#fldArea' ).append( structure[ 1 ] );
		toggleEl( '#addFldList', 'hide' );
		
		rearrangeSection();
		popupPreview();
	} );
	jQuery('#successPageBtn').click(function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;

		jQuery('#fldArea').append(successPageFld('Success Page', 'sp_'+ind));
		toggleEl('#addFldList', 'hide');
		rearrangeSection();
	});
	jQuery('#ratingBtn').click(function() {
		var ind = jQuery( '#fldArea .drugableSection' ).length + 1;

		jQuery('#fldArea').append(ratingFld('Rating', 'r_'+ind));
		toggleEl('#addFldList', 'hide');
		rearrangeSection();
	});
	colorPickerInit();
	jQuery('#addSegmentBtn').click(function() {
		// var ind = jQuery('#segmentArea .drugableSection').length;
		var ind = jQuery('#segmentArea .drugableSection').length + 1;

		jQuery('#segmentArea').append(newSegment('Segment ' + ind, 'segment_'+ind));
		colorPickerInit();
	});

	jQuery(document).on('click', '.cloneSegment', function() {
		var $el = jQuery(this).closest('.drugableSection').find('.editableTitle');
		var id = 'segment_' + jQuery('#segmentArea .drugableSection').length;
		var title = $el.val() + ' Cloned';
		jQuery('#segmentArea').append(newSegment( title, id ));
		colorPickerInit();
		jQuery(this).closest('ul').hide();
	});

	/**
	 * Dashboard
	 */
	jQuery( '#views, #click, #click-rate, #length, #statistics, #popup-list' ).css( 'display', 'block' );
	
	jQuery( '#report-filter' ).daterangepicker( {
        startDate: moment().subtract( 6, 'month' ),
        endDate: moment(),
        ranges: {
           'Today': [ moment(), moment() ],
           'Yesterday': [ moment().subtract( 1, 'days' ), moment().subtract( 1, 'days' ) ],
           'Last 7 Days': [ moment().subtract( 6, 'days' ), moment()],
           'Last 30 Days': [ moment().subtract( 29, 'days' ), moment()],
           'This Month': [ moment().startOf( 'month' ), moment().endOf( 'month' ) ],
           'Last Month': [ moment().subtract( 1, 'month' ).startOf( 'month' ), moment().subtract( 1, 'month' ).endOf( 'month' ) ]
        }
	}, dateRender );
	
	dateRender( moment().subtract( 6, 'month' ), moment() );

	


	jQuery( '.drugableSection' ).find( 'input, select, textarea' ).each( function() {
		var fieldType = this.type;
		var fieldName = this.name;
		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			// async: false,
			data: {
				action: 'set_backend_popup_form_fields_value_ajax',
				popup_id: popupData.popup_id,
				field_name: fieldName,
			},
			success: function( response ) {
				// console.log( response );
				if ( response ) {
					if ( fieldType == "checkbox" ) {
						jQuery( '[name="' + fieldName + '"]' ).prop( 'checked', true );

					} else if ( fieldType == "radio" ) {
						jQuery( '[name="' + fieldName + '"]' ).filter( '[value="' + response + '"]' ).prop( 'checked', true );

					} else {
						jQuery( '[name="' + fieldName + '"]' ).val( response );
					}
				}
			}
		} );
	} );




	jQuery( this ).on( 'change', '#dashboard-popup-lists', function( e ) {
		var dateStamp = jQuery( '#report-filter span' ).text();
		var splitDateStamp = dateStamp.split( '-' );
		var fromDate = moment( splitDateStamp[ 0 ].trim() ).format( 'YYYY-MM-DD' );
		var toDate = moment( splitDateStamp[ 1 ].trim() ).format( 'YYYY-MM-DD' );

		filteredReport( fromDate, toDate );
	} );

} );

var popupPreview = () => {
	console.log( "PREVIEW WORKS HERE" );
	var popupHTML = jQuery( '.popup-content' ).html();
	if ( popupData ) {
		jQuery.ajax( {
			type: 'POST',
			url: ajaxurl,
			dataType: 'json',
			data: {
				action: 'get_preview_popup_ajax',
				popup_data: popupData,
				popup_html: popupHTML,
				remove_fields: removeFieldsNameArray,
			},
			beforeSend: ( x ) => {
				if ( x && x.overrideMimeType ) {
					x.overrideMimeType( "application/j-son; charset=UTF-8" );
				}
			},
			success: ( data ) => {
				var frameSRC = jQuery( '.preview-wrap iframe' ).attr( 'src' );
				jQuery( '.preview-wrap iframe' ).attr( 'src', frameSRC ); 
				jQuery( 'a.frame' ).attr( 'href', frameSRC );
			}
		} );
	}
}

var updatePopupData = () => {
	if ( popupData ) {
		console.log( "UPDATE IS HERE" );
		console.log( popupData );
		jQuery( '.pt-frm-field' ).find( 'input, select, textarea, option' ).each( function() {
			var fieldType = this.type;
			var fieldID = this.id;
			var fieldName = this.name;
			var splitFieldID = fieldID.split( '_' );
			var ID = splitFieldID[ 1 ];
			if ( fieldType == "radio" || fieldType == "checkbox" || typeof fieldType === "undefined" ) {
				ID = splitFieldID[ 2 ];
			}
			// console.log( this );
			// console.log( "FIELD TYPE = " + fieldType );
			console.log( "FIELD ID = " + fieldID );
			console.log( "FIELD ADDRESS = " + ID );
			// return;

			jQuery.ajax( {
				type: 'POST',
				url: ajaxurl,
				dataType: 'json',
				async: false,
				data: {
					action: 'set_frontend_popup_form_fields_value_ajax',
					popup_id: popupData.popup_id,
					field_type: fieldType,
					field_name: fieldName,
					field_address: fieldID,
					field_id: ID,
				},
				success: function( response ) {
					console.log( fieldType );
					console.log( response );
					if ( fieldType == "email" ) {
						jQuery( '.popup-content #label-' + ID ).text( response[ 0 ] );
						jQuery( '.popup-content #' + fieldID ).attr( 'placeholder', response[ 1 ] );
						if ( response[ 2 ] == "on" ) {
							jQuery( '.popup-content #' + fieldID ).prop( 'required', true );
						}
					} else if ( fieldType == "radio" ) {
						jQuery( '.popup-content #label-' + ID ).text( response[ 0 ] );
						jQuery( '.popup-content #opt_' + splitFieldID[ 1 ] + '_' + ID ).val( response[ 1 ] );
						jQuery( '.popup-content #sp-' + splitFieldID[ 1 ] + '-' + ID ).text( response[ 1 ] );
					} else if ( fieldType == "textarea" ) {
						jQuery( '.popup-content #textarea_' + ID ).attr( 'placeholder', response[ 0 ] );
						if ( response[ 1 ] == "on" ) {
							jQuery( '.popup-content #textarea_' + ID ).prop( 'required', true );
						}

						if ( response[ 2 ].length > 0 ) {
							jQuery( '.popup-content #label-' + ID ).text( response[ 2 ] );
						}

						if ( response[ 3 ].length > 0 ) {
							jQuery( '.popup-content #textarea_' + ID ).prop( 'required', true );
						}
					} else if ( fieldType == "checkbox" ) {
						jQuery( '.popup-content #label-' + ID ).text( response[ 0 ] );
						jQuery( '.popup-content #opt_' + splitFieldID[ 1 ] + '_' + ID ).val( response[ 1 ] );
						jQuery( '.popup-content #sp-' + splitFieldID[ 1 ] + '-' + ID ).text( response[ 1 ] );
					} else if ( fieldType == "select-one" ) {
						jQuery( '.popup-content #label-' + ID ).text( response[ 0 ] );
					} else if ( fieldType == "text" ) {
						jQuery( '.popup-content #label-' + ID ).text( response[ 0 ] );
						if ( response[ 1 ] == "on" ) {
							jQuery( '.popup-content #' + fieldID ).prop( 'required', true );
						}
					} else if ( typeof fieldType === "undefined" ) {
						jQuery( '.popup-content #opt_' + splitFieldID[ 1 ] + '_' + ID ).val( response[ 1 ] );
						jQuery( '.popup-content #opt_' + splitFieldID[ 1 ] + '_' + ID ).text( response[ 1 ] );
					} 
				},
				// complete: function( response ) {
				// 	sendPopupData();
				// }
			} );
		} );
		sendPopupData();
	}
}

var sendPopupData = () => {
	console.log( "SEND IS HERE" );
	var contentHTMLStructures = jQuery( '#fldArea' ).html();
	if ( contentHTMLStructures <= 29 ) {
		popupData[ 'content_html_structures' ] = '';
	} else {
		popupData[ 'content_html_structures' ] = contentHTMLStructures;
	}

	var popupHTML = jQuery( '.popup-content' ).html();
	console.log( popupData );

	jQuery.ajax( {
		type: 'POST',
		url: ajaxurl,
		dataType: 'json',
		data: {
			action: 'update_popup_info_ajax',
			popup_data: popupData,
			popup_html: popupHTML,
			remove_fields: removeFieldsNameArray,
		},
		beforeSend: ( x ) => {
			if ( x && x.overrideMimeType ) {
				x.overrideMimeType( "application/j-son; charset=UTF-8" );
			}
		},
		success: ( data ) => {
			jQuery( '#success-message' ).html( '<i class="fa fa-check" aria-hidden="true"></i>Saved!' ).show();
			setTimeout( () => {
				jQuery( '#success-message' ).hide( 'blind', {}, 500 );
			}, 1500 );
			removeFieldsNameArray = [];
			// location.reload();
		}
	} );
}

var dateRender = ( start, end ) => {
	jQuery( '#report-filter span' ).html( start.format( 'MMMM D, YYYY' ) + ' - ' + end.format( 'MMMM D, YYYY' ) );

	var fromDate = start.format( 'YYYY-MM-DD' );
	var toDate = end.format( 'YYYY-MM-DD' );

	filteredReport( fromDate, toDate );
}

var getAllTemplates = () => {
	jQuery.ajax( {
		type: 'POST',
		url: ajaxurl,
		data: {
			action: 'get_all_templates_ajax',
		},
		success: ( data ) => {
			jQuery( '#dashboard-popup-lists' ).html( data );
		}
	} );
}

var filteredReport = ( fromDate, toDate ) => {
	var selectedTemplate = jQuery( '#dashboard-popup-lists' ).val();

	var totalViewsChartData = [];
	var totalClicksChartData = [];
	var totalCtrsChartData = [];
	var totalPopupLengthChartData = [];

	var splineTotalViewsStatisticsChartData = [];
	var splineTotalClicksStatisticsChartData = [];

	var topActivityRoundChartData = [];
	var topLocationsRoundChartData = [];

	var leadsHTML = totalActivityHTML = topLocationsHTML = '';

	jQuery.ajax( {
		type: 'POST',
		url: kongPopupSupports.ajax_url,
		data: {
			action: 'get_filtered_report_ajax',
			from_date: fromDate,
			to_date: toDate,
			template: selectedTemplate,
		},
		dataType: 'json',
		async: false,
		success: function( response ) {
			if ( response !== 0 ) {
				var viewsCount = response.views_count;
				jQuery( '#total-views' ).html( viewsCount[ 0 ].total_views_count );

				var clicksCount = response.clicks_count;
				jQuery( '#total-clicks' ).html( clicksCount[ 0 ].total_clicks_count );

				var ctrCount = response.ctr_count;
				jQuery( '#total-click-through-rate' ).html( ctrCount );

				var averagePopupLengthCount = response.average_popup_length_count;
				jQuery( '#popup-length' ).html( averagePopupLengthCount );

				var viewsReport = response.views_report;
				if ( kongPopupSupports.current_page == "popup-dashboard" && viewsReport ) {
					for ( var index = 0; index < viewsReport.length; index++ ) {
						totalViewsChartData.push(
							parseInt( viewsReport[ index ].count )
						);
					}
					jQuery( '#total-views-chart' ).html( ' ' );
					var totalViewsChart = new Chartist.Line(
						"#total-views-chart",
						{
							series: [ totalViewsChartData ]
						},
						{
							chartPaddingTop: 5,
							axisX: {
								showLabel: false,
								showGrid: false
							},
							axisY: {
								showLabel: false,
									showGrid: false
							},
							lineSmooth: Chartist.Interpolation.simple( {
								divisor: 2
							} ),
							plugins: [ Chartist.plugins.tooltip( { class: 'total-count-tooltip', appendToBody: true } ) ],
							fullWidth: false
						}
					);

					totalViewsChart.on( 'created', function( data ) {
						var defs = data.svg.querySelector( 'defs' ) || data.svg.elem( 'defs' );
						defs
							.elem( 'linearGradient', {
								id: 'lineLinearStats',
								x1: 0,
								y1: 0,
								x2: 1,
								y2: 0
							} )
							.elem( 'stop', {
								offset: '0%',
								'stop-color': '#fff'
							} )
							.parent()
							.elem( 'stop', {
								offset: '10%',
								'stop-color': '#fff'
							} )
							.parent()
							.elem( 'stop', {
								offset: '30%',
								'stop-color': '#fff'
							} )
							.parent()
							.elem( 'stop', {
								offset: '95%',
								'stop-color': '#fff'
							} )
							.parent()
							.elem( 'stop', {
								offset: '100%',
								'stop-color': '#fff'
							} );

						return defs;
					} );
				} else {
					jQuery( '#total-views-chart' ).html( '<i class="material-icons">error_outline</i>' );
				}

				var clicksReport = response.clicks_report;
				if ( kongPopupSupports.current_page == "popup-dashboard" && clicksReport ) {
					for ( var index = 0; index < clicksReport.length; index++ ) {
						totalClicksChartData.push(
							parseInt( clicksReport[ index ].count )
						);
					}
					jQuery( '#total-clicks-chart' ).html( ' ' );
					var totalClicksChart = new Chartist.Line(
						"#total-clicks-chart",
						{
							series: [ totalClicksChartData ]
						},
						{
							chartPaddingTop: 5,
							axisX: {
								showLabel: false,
								showGrid: false
							},
							axisY: {
								showLabel: false,
									showGrid: false
							},
							lineSmooth: Chartist.Interpolation.simple( {
								divisor: 2
							} ),
							plugins: [ Chartist.plugins.tooltip( { class: 'total-count-tooltip', appendToBody: true } ) ],
							fullWidth: false
						}
					);
				} else {
					jQuery( '#total-clicks-chart' ).html( '<i class="material-icons">error_outline</i>' );
				}

				if ( response.ctrs_report != 0 ) {
					var ctrsReport = Object.entries( response.ctrs_report );
					if ( kongPopupSupports.current_page == "popup-dashboard" ) {
						ctrsReport.forEach( function( ctr ) {
							totalCtrsChartData.push(
								ctr[ 1 ].count
							);
						} );

						jQuery( '#total-click-through-rate-chart' ).html( ' ' );
						var totalCtrsChart = new Chartist.Line(
							"#total-click-through-rate-chart",
							{
								series: [ totalCtrsChartData ]
							},
							{
								chartPaddingTop: 5,
								axisX: {
									showLabel: false,
									showGrid: false
								},
								axisY: {
									showLabel: false,
										showGrid: false
								},
								lineSmooth: Chartist.Interpolation.simple( {
									divisor: 2
								} ),
								plugins: [ Chartist.plugins.tooltip( { class: 'total-count-tooltip', appendToBody: true } ) ],
								fullWidth: false
							}
						);
					}
				} else {
					jQuery( '#total-click-through-rate-chart' ).html( '<i class="material-icons">error_outline</i>' );
				}

				if ( response.average_popup_length_report != 0 ) {
					var averagePopupLengthReport = Object.entries( response.average_popup_length_report );
					if ( kongPopupSupports.current_page == "popup-dashboard" ) {
						averagePopupLengthReport.forEach( function( popup ) {
							totalPopupLengthChartData.push(
								popup[ 1 ].average
							);
						} );

						jQuery( '#popup-length-chart' ).html( ' ' );
						var totalPopupLengthChart = new Chartist.Line(
							"#popup-length-chart",
							{
								series: [ totalPopupLengthChartData ]
							},
							{
								chartPaddingTop: 5,
								axisX: {
									showLabel: false,
									showGrid: false
								},
								axisY: {
									showLabel: false,
										showGrid: false
								},
								lineSmooth: Chartist.Interpolation.simple( {
									divisor: 2
								} ),
								plugins: [ Chartist.plugins.tooltip( { class: 'total-count-tooltip', appendToBody: true } ) ],
								fullWidth: false
							}
						);
					}
				} else {
					jQuery( '#popup-length-chart' ).html( '<i class="material-icons">error_outline</i>' );
				}

				var viewsStatisticsReport = response.views_statistics_report;
				var clicksStatisticsReport = response.clicks_statistics_report;

				if ( viewsStatisticsReport.length > 0 && clicksStatisticsReport.length > 0 ) {
					jQuery( '#statistics-graph-no-data-block' ).hide();
					jQuery( '#statistics-graph' ).show();

					for ( var index = 0; index < viewsStatisticsReport.length; index++ ) {
						var year = viewsStatisticsReport[ index ].year;
						var month = viewsStatisticsReport[ index ].month - 1;
						var day = viewsStatisticsReport[ index ].day;
						splineTotalViewsStatisticsChartData.push( {
							x: new Date( year, month, day ),
							y: parseInt( viewsStatisticsReport[ index ].count )
						} );
					}

					for ( var index = 0; index < clicksStatisticsReport.length; index++ ) {
						var year = clicksStatisticsReport[ index ].year;
						var month = clicksStatisticsReport[ index ].month - 1;
						var day = clicksStatisticsReport[ index ].day;
						splineTotalClicksStatisticsChartData.push( {
							x: new Date( year, month, day ),
							y: parseInt( clicksStatisticsReport[ index ].count )
						} );
					}

				} else {
					jQuery( '#statistics-graph' ).hide();
					jQuery( '#statistics-graph-no-data-block' ).show();
				}

				var leadsCount = response.leads_count;
				if ( leadsCount ) {
					leadsCount.forEach( function( item ) {
						leadsHTML += `
							<!-- tr starts -->
							<tr>
								<td>` + item.popup_title + `</td>
								<td>` + item.popup_template + `</td>
								<td>` + item.count + `
									<i class="large material-icons kg_color">equalizer</i>
								</td>
							</tr>
							<!-- tr ends -->
						`;
					} );
				} else {
					leadsHTML = `
						<tr>
							<td colspan="3" style="text-align: center;">
								<i class="material-icons">error_outline</i>
							</td>
						</tr>
					`;
				}
				jQuery( '#popuplist-box tbody' ).html( leadsHTML );

				var totalActivity = Object.entries( response.total_activity );
				if ( totalActivity.length > 0 ) {
					jQuery( '#top-activity-no-data-block' ).hide();
					jQuery( '#top-activity .chart-value' ).show();

					totalActivity.forEach( ( popup, index ) => {
						totalActivityHTML += `
							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong>` + popup[ 0 ] + `</strong>
								<span>` + popup[ 1 ] + `</span>
							</div>
							<!-- .chart-value-row ends -->
						`;

						topActivityRoundChartData.push( {
							y: parseInt( popup[ 1 ] ),
							label: popup[ 0 ],
							color: roundChartDataColor[ index ]
						} );
				  	} );
					jQuery( '#total-activity-block' ).html( totalActivityHTML );
				} else {
					jQuery( '#top-activity .chart-value' ).hide();
					jQuery( '#top-activity-no-data-block' ).show();
				}

				if ( response.top_performing_popup != 0 ) {
					var topPerformingPopup = response.top_performing_popup;
					jQuery( '#top-performing-no-data-block' ).hide();
					jQuery( '#top-performing .chart-value' ).show();

					jQuery( '#tpp-url' ).attr( 'src', topPerformingPopup.url );
					jQuery( '#tpp-title' ).text( topPerformingPopup.title );
					jQuery( '#tpp-views' ).text( topPerformingPopup.views );
					jQuery( '#tpp-clicks' ).text( topPerformingPopup.clicks );
					jQuery( '#tpp-ctr' ).text( topPerformingPopup.ctr );
					jQuery( '#tpp-days' ).text( topPerformingPopup.days );
				} else {
					jQuery( '#top-performing .chart-value' ).hide();
					jQuery( '#top-performing-no-data-block' ).show();
				}

				var topLocations = Object.entries( response.top_locations );
				if ( topLocations.length > 0 ) {
					jQuery( '#top-locations-no-data-block' ).hide();
					jQuery( '#top-locations .chart-value' ).show();

					topLocations.forEach( ( location, index ) => {
						topLocationsHTML += `
							<!-- .chart-value-row starts -->
							<div class="chart-value-row">
								<strong>` + location[ 0 ] + `</strong>
								<span>` + location[ 1 ] + `</span>
							</div>
							<!-- .chart-value-row ends -->
						`;

						topLocationsRoundChartData.push( {
							y: parseInt( location[ 1 ] ),
							label: location[ 0 ],
							color: roundChartDataColor[ index ]
						} );
				  	} );
					jQuery( '#top-locations-block' ).html( topLocationsHTML );
				} else {
					jQuery( '#top-locations .chart-value' ).hide();
					jQuery( '#top-locations-no-data-block' ).show();
				}
			}
		}
	} );

    if ( kongPopupSupports.current_page == "popup-dashboard" ) {
    	// window.onload = function () {
			var chartStatistics = new CanvasJS.Chart( 'statistics-graph', {
				animationEnabled: true,
				axisY :{
					gridColor: '#DCDCDC',
					includeZero: false,
					labelFontColor: '#bfbfbf',
				},
				toolTip: {
					shared: true
				},
				legend: {
					fontSize: 15,
					horizontalAlign: 'left',
					verticalAlign: 'top'
				},
				data: [
					{
						type: 'splineArea', 
						showInLegend: true,
						color: '#9D8AF8',
						legendMarkerType: 'circle',
						name: 'Total Views',
						yValueFormatString: '###',
						//markerType: ' ',
						dataPoints: splineTotalViewsStatisticsChartData
					},
					{
						type: 'splineArea', 
						showInLegend: true,
						color: '#4AD4DF',
						legendMarkerType: 'circle',
						name: 'Total Click',
						yValueFormatString: '###',    
						//markerType: ' ', 
						dataPoints: splineTotalClicksStatisticsChartData
					} 
				]
			} );
			chartStatistics.render();

			var roundChartArray = [
				[ 'top-activity-round-chart', topActivityRoundChartData ],
				[ 'top-locations-round-chart', topLocationsRoundChartData ],
			];
			roundChartArray.forEach( chartData => {
				var roundChart = new CanvasJS.Chart( chartData[ 0 ], {
					animationEnabled: true,
					data: [ {
						type: "doughnut",
						startAngle: 60,
						innerRadius: 60,
						indexLabel: " ",
						toolTipContent: "<b>{label}:</b> {y} (#percent%)",
				    	indexLabelLineThickness: 0,
						dataPoints: chartData[ 1 ]
					} ]
				} );
				roundChart.render();
			} );
		// }
	}
}

var colorPickerInit = () => {
	// jQuery(".cp input").spectrum({
	// 	color: "#98752d",
	// 	showButtons: false,
	// 	change: function(color) {
	// 		var ele = jQuery(this).closest('.pt-color-box').find('.colorCode');
	// 		if(ele)
	// 			ele.text(color.toHexString());
	// 	}
	// });

  	jQuery( '.cp input' ).spectrum( {
		// color: "#98752d",
		showButtons: false,
		change: function( color ) {
			var element = jQuery( this ).closest( '.pt-color-box' ).find( '.colorCode' );
			if ( element ) {
				jQuery( this ).val( color.toHexString() );
				element.val( color.toHexString() );

				var key = element.context.name;
				var value = color.toHexString();
				popupData[ key ] = value;

				popupPreview();
			}
		}
	} );
}

var tabSelectedFunction = ( $el ) => {
	$el.closest( 'ul' ).find( 'li' ).removeClass( 'selected' );
	$el.addClass( 'selected' );
}

var newTitle = ( $el ) => {
  var currentVal = $el.val();
  // console.log(currentVal);
  $el.attr('readonly', true).css({background:'transparent', padding:0});
  $el.closest('.accrodianBtn1').removeClass('accrodianBtn1').addClass('accrodianBtn');
}

var toggleEl = ( $el, action ) => {
  if (action == 'hide') {
    jQuery($el).hide(100);
  } else if (action == 'show') {
    jQuery($el).show(100);
  }
}

// markups
var welcomePageField = ( title, id ) => {
	var returnStructure = [];
	var index = formFieldIndex();
	var order = findNextIndex( id );

  	var html = `
  		<div class="drugableSection" id="${id}" data-field="${index}">
  			<div class="pt-addfield-box">
  				<div class="accrodianBtn">
  					<span class="pt-addfield-box-icon">
  						<i class="fa fa-bars" aria-hidden="true"></i>
  					</span>
  					
  					<span class="pt-addfield-box-title">
  						<input type="text" class="editableTitle" name="content_form_welcome_field_${index}" readonly value="${title}" />
  					</span>
  					
  					<span class="pt-addfield-box-arrow">
  						<i class="fa fa-caret-down" aria-hidden="true"></i>
  					</span>
  				</div>

  				<a class="pt-addfield-box-config" href="javascript:void(0);">
  					<i class="fa fa-cog" aria-hidden="true"></i>
  				</a>
  				
  				<ul class="add-button-field pt-config-btn">
  					<li class="renameTitle">Rename</li>
				  	<li class="cloneSection">Clone</li>
				  	<li class="removeSection">Remove</li>
  				</ul>
  			</div>
  			
  			<div class="pt-addfield-box-edit">
  				<div class="pt-option-box">
  					<label>Title</label>
  					<input type="text" name="content_form_welcome_title_${index}" placeholder="Welcome!" />
  				</div>
  				
  				<div class="pt-option-box">
  					<label>Description</label>
  					<textarea name="content_form_welcome_description_${index}"></textarea>
  				</div>
  				
  				<div class="pt-option-box">
  					<label>Final action</label>
  					
  					<div class="pt-radio">
  						<input type="radio" name="content_form_welcome_action_${index}" class="bg_radio_color sub-radio" value="none" />
  						<label for="start-to-display-option">none</label>
  					</div>

				  	<div class="pt-radio">
					  	<input type="radio" name="content_form_welcome_action_${index}" class="bg_radio_color sub-radio" value="close" />
					  	<label for="start-to-display-option">close widget</label>
				  	</div>
				  	
				  	<div class="pt-radio">
					  	<input type="radio" name="content_form_welcome_action_${index}" class="bg_radio_color sub-radio" value="redirect" />
					  	<label for="start-to-display-option">redirect to URL</label>
				  	</div>
  					
  					<div class="redirect-url">
  						<input type="text" name="content_form_welcome_redirect_url_${index}" class="success-redirect-url" id="success-redirect-url-${index}" placeholder="Redirect URL" />
  						<button type="button" id="btn-${index}" class="url-test">Test</button>
  					</div>
  				</div>
  			</div>
  		</div>
  	`;
  	returnStructure.push( index, html );

 //  	var formField = `
	// 	<div class="pt-frm-field" id="fl_${id}" data-form-field="${index}" data-order="${order}">
	// 		<label id="label-${index}"></label>
	// 		<input type="email" name="email_name_${index}" id="field_${index}" placeholder="" />
	// 	</div>
	// `;
 //  	jQuery( '.form-fields-block' ).append( formField );

  	return returnStructure;
}

var emailAddressFld = ( title, id ) => {
	var returnStructure = [];
	var index = formFieldIndex();
	var order = findNextIndex( id );
	var html = `
		<div class="drugableSection" id="${id}" data-field="${index}">
			<div class="pt-addfield-box">
				<div class="accrodianBtn">
					<span class="pt-addfield-box-icon">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</span>

					<span class="pt-addfield-box-title">
						<input type="text" class="editableTitle" name="content_form_email_field_${index}" readonly value="${title}" />
					</span>

					<span class="pt-addfield-box-arrow">
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</span>
				</div>

				<a class="pt-addfield-box-config" href="javascript:void(0);">
					<i class="fa fa-cog" aria-hidden="true"></i>
				</a>

				<ul class="add-button-field pt-config-btn">
					<li class="renameTitle">Rename</li>
					<li class="cloneSection">Clone</li>
					<li class="removeSection">Remove</li>
				</ul>
			</div>

			<div class="pt-addfield-box-edit">
				<div class="pt-option-box">
					<label>Title</label>
					<input type="text" name="content_form_email_title_${index}" placeholder="Title" />
				</div>

				<section>
					<div class="pt-checkbox pt-inline-field">
						<label class="container">
							<input type="checkbox" name="content_form_email_consent_${index}" id="conent-form-email-consent-${index}" class="sectionOpener option-checkbox" />
							<span class="checkmark"></span>Add a consent checkbox
						</label>
					</div>

					<div class="subSection">
						<div class="pt-option-box">
							<label>Text</label>
							<input type="text" name="content_form_email_message_${index}" placeholder="Spacify consent message" />
						</div>

						<div class="pt-checkbox pt-inline-field">
							<label class="container">
								<input type="checkbox" name="content_form_email_required_${index}" id="conent-form-email-required-${index}" class="option-checkbox" />
								<span class="checkmark"></span>Required
							</label>
						</div>
					</div>
				</section>
			</div>
		</div>
  	`;
  	returnStructure.push( index, html );

  	var formField = `
		<div class="pt-frm-field" id="fl_${id}" data-form-field="${index}" data-order="${order}">
			<label id="label-${index}"></label>
			<input type="email" name="email_name_${index}" id="field_${index}" placeholder="" />
		</div>
	`;
  	jQuery( '.form-fields-block' ).append( formField );

  	return returnStructure;
}

var radioButtonFld = ( title, id, item ) => {
	var returnStructure = [];
	var index = formFieldIndex();
	var order = findNextIndex( id );

	console.log( "ITEM " + item );

	if ( item == "radio" ) {
		var tag = "radio";
	} else if ( item == "checkbox" ) {
		var tag = "checkbox";
	} else {
		var tag = "select";
	}
	var html = `
	  <div class="drugableSection" id="${id}" data-field="${index}" data-tag=${tag}>
	    <div class="pt-addfield-box">
	      <div class="accrodianBtn">
	        <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
	        <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="content_form_radio_field_${index}" readonly value="${title}"></span>
	        <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
	      </div>

	        <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
	        <ul class="add-button-field pt-config-btn">
	            <li class="renameTitle">Rename</li>
	            <li class="cloneSection">Clone</li>
	            <li class="removeSection">Remove</li>
	        </ul>
	    </div>
	    <div class="pt-addfield-box-edit">
	        <div class="pt-option-box">
	            <label>Field Label</label>
	            <input type="text" name="content_form_radio_title_${index}" placeholder="Select one">
	        </div>
	        <div class="pt-option-box">
	            <label>Options</label>
	            <ul class="optionUl" data-select="${index}">
	              <li data-input="opt_1_${index}" data-span="sp-1-${index}">
	                <div class="barIcon"><i class="fa fa-bars" aria-hidden="true"></i></div>
	                <div class="optnTxtArea"><input type="text" name="content_form_radio_opt_title_1_${index}" value="Option 1"></div>
	                <div class="optionRemove"><i class="fa fa-trash" aria-hidden="true"></i></div>
	              </li>
	              <li data-input="opt_2_${index}" data-span="sp-2-${index}">
	                <div class="barIcon"><i class="fa fa-bars" aria-hidden="true"></i></div>
	                <div class="optnTxtArea"><input type="text" name="content_form_radio_opt_title_2_${index}" value="Option 2"></div>
	                <div class="optionRemove"><i class="fa fa-trash" aria-hidden="true"></i></div>
	              </li>
	            </ul>
	            <div class="addOptionBtn"> + Add option</div>
	        </div>
	        <div class="pt-option-box">
	            <label>Comment placeholder</label>
	            <input type="text" name="content_form_radio_placeholder_${index}" class="success-redirect-url" placeholder="Please specify (optional)">
	        </div>
	        <div class="pt-checkbox pt-inline-field">
	            <label class="container">
	              <input type="checkbox" name="content_form_radio_required_${index}" id="conent-form-${tag}-required-${index}" class="option-checkbox" />
	              <span class="checkmark"></span>Required
	            </label>
	        </div>
	    </div>

	  </div>`;
	  	returnStructure.push( index, html );

	  	if ( item == "radio" ) {
		  	var formField = `
				<div class="pt-frm-field radio-${index}" id="fl_${id}" data-form-field="${index}" data-order="${order}">
					<div class="radio-options options-${index}" id="options-${index}">
						<label id="label-${index}"></label>
						<div id="option-fields-block-${index}">
							<div data-index="1" data-order="1">
								<input type="radio" name="radio_option_${index}" id="opt_1_${index}" />
								<span id="sp-1-${index}"></span>
							</div>

							<div data-index="2" data-order="2">
								<input type="radio" name="radio_option_${index}" id="opt_2_${index}" />
								<span id="sp-2-${index}"></span>
							</div>
						</div>
					</div>

					<div class="comment-section comment-${index}">
						<textarea name="textarea_${index}" id="textarea_${index}"></textarea>
					</div>
				</div>
			`;
		} else if ( item == "checkbox" ) {
		  	var formField = `
				<div class="pt-frm-field checkbox-${index}" id="fl_${id}" data-form-field="${index}" data-order="${order}">
					<div class="checkbox-options options-${index}" id="options-${index}">
						<label id="label-${index}"></label>
						<input type="checkbox" name="checkbox_option_${index}" id="opt_1_${index}" /><span id="sp-1-${index}"></span>
						<input type="checkbox" name="checkbox_option_${index}" id="opt_2_${index}" /><span id="sp-2-${index}"></span>
					</div>

					<div class="comment-section comment-${index}">
						<textarea name="textarea_${index}" id="textarea_${index}"></textarea>
					</div>
				</div>
			`;
		} else {
			var formField = `
				<div class="pt-frm-field select-${index}" id="fl_${id}" data-form-field="${index}" data-order="${order}">
					<div class="select-options options-${index}" id="options-${index}">
						<label id="label-${index}"></label>
						<select name="select_option_${index}" class="select-${index}" id="select_${index}">
							<option id="opt_1_${index}" /></option>
							<option id="opt_2_${index}" /></option>
						</select>
					</div>

					<div class="comment-section comment-${index}">
						<textarea name="textarea_${index}" id="textarea_${index}"></textarea>
					</div>
				</div>
			`;
		}
	  	jQuery( '.form-fields-block' ).append( formField );

	  return returnStructure;
}

var singleLineTextFld =  ( title, id, item ) => {
	var returnStructure = [];
	var index = formFieldIndex();
	var order = findNextIndex( id );

	if ( item == "single" ) {
		var tag = "single";
	} else {
		var tag = "multi";
	}
  var html = `<div class="drugableSection" id="${id}" data-field="${index}" data-tag=${tag}>
    <div class="pt-addfield-box">
      <div class="accrodianBtn">
        <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="content_form_single_field_${index}" readonly value="${title}"></span>
        <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
      </div>

        <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <ul class="add-button-field pt-config-btn">
            <li class="renameTitle">Rename</li>
            <li class="cloneSection">Clone</li>
            <li class="removeSection">Remove</li>
        </ul>
    </div>
    <div class="pt-addfield-box-edit">
        <div class="pt-option-box">
            <label>Field Label</label>
            <input type="text" name="content_form_single_title_${index}" placeholder="text Label">
        </div>
        <div class="pt-checkbox pt-inline-field">
            <label class="container">
              <input type="checkbox" name="content_form_field_required_${index}" id="conent-form-field-required-${index}" class="option-checkbox" />
              <span class="checkmark"></span>Required
            </label>
        </div>
    </div>

  </div>`;
  returnStructure.push( index, html );

  	if ( item == "single" ) {
	  	var formField = `
			<div class="pt-frm-field" id="fl_${id}" data-form-field="${index}" data-order="${order}">
				<label id="label-${index}"></label>
				<input type="text" name="single_line_${index}" id="field_${index}" placeholder="" />
			</div>
		`;
	} else {
		var formField = `
			<div class="pt-frm-field" id="fl_${id}" data-form-field="${index}" data-order="${order}">
				<label id="label-${index}"></label>
				<textarea name="textarea_${index}" id="textarea_${index}"></textarea>
			</div>
		`;
	}
  	jQuery( '.form-fields-block' ).append( formField );

  return returnStructure;
}

var successPageFld = ( title, id ) => {
  return `<div class="drugableSection" id="${id}">
    <div class="pt-addfield-box">
      <div class="accrodianBtn">
        <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="" readonly value="${title}"></span>
        <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
      </div>

        <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <ul class="add-button-field pt-config-btn">
            <li class="renameTitle">Rename</li>
            <li class="cloneSection">Clone</li>
            <li class="removeSection">Remove</li>
        </ul>
    </div>
    <div class="pt-addfield-box-edit">
        <div class="pt-option-box">
            <label>Title</label>
            <input type="text" name="" placeholder="Welcome!">
        </div>
        <div class="pt-option-box">
            <label>Description</label>
            <textarea></textarea>
        </div>
        <div class="pt-option-box">
            <label>Final action</label>
            <div class="pt-radio">
                <label class="container">
                  <input type="radio" name="radio">
                  <span class="checkmark"></span>none
                </label>
            </div>
            <div class="pt-radio">
                <label class="container">
                  <input type="radio" name="radio">
                  <span class="checkmark"></span>Close widget
                </label>
            </div>
            <div class="pt-radio">
                <label class="container">
                  <input type="radio" name="radio">
                  <span class="checkmark"></span>redirect to URL
                </label>
            </div>
            <div class="redirect-url">
                <input type="text" value="" name="success_redirect_url" class="success-redirect-url" placeholder="Redirect URL">
                <button type="button" class="url-test">Test</button>
            </div>
        </div>
    </div>

  </div>`;
}

var ratingFld =  ( title, id ) => {
  return `<div class="drugableSection" id="${id}">
  <div class="pt-addfield-box">
    <div class="accrodianBtn">
      <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="" readonly value="${title}"></span>
      <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
    </div>

      <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
      <ul class="add-button-field pt-config-btn">
          <li class="renameTitle">Rename</li>
          <li class="cloneSection">Clone</li>
          <li class="removeSection">Remove</li>
      </ul>
  </div>
  <div class="pt-addfield-box-edit">
      <div class="pt-option-box">
          <label>Field Label</label>
          <input type="text" name="" placeholder="text Label">
      </div>
      <div class="pt-option-box">
          <i class="fa fa-star fontSize30" aria-hidden="true"></i>
          <label>Repeats</label>
          <input type="text" name="" placeholder="10">
      </div>
      <div class="pt-checkbox pt-inline-field">
          <label class="container">
            <input type="checkbox">
            <span class="checkmark"></span>Required
          </label>
      </div>
  </div>

</div>`;
}

var newSegment = ( title, id ) => {
  return `<div class="drugableSection" id="${id}">
  <div class="pt-addfield-box">
      <div class="accrodianBtn">
          <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
          <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="" readonly value="${title}"></span>
          <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
      </div>
      
      <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
      <ul class="add-button-field pt-config-btn">
          <li class="renameTitle">Rename</li>
          <li class="cloneSegment">Clone</li>
          <li class="removeSection">Remove</li>
      </ul>
  </div>

  <div class="pt-addfield-box-edit">
      <div class="pt-option-box">
          <label>Segment Title</label>
          <input type="text" name="" placeholder="Segment Title">
      </div>
      <div class="pt-colors">
          <label>Segment Color</label>
          <ul>
              <li>
                  <div class="pt-color-box">
                      <span class="cp"><input type="text" name=""></span>
                      <span class="colorCode"></span>
                  </div>
              </li>
          </ul>
      </div>
      <div class="pt-option-box">
          <label>Win / Result Message</label>
          <textarea></textarea>
      </div>
      <div class="pt-option-box">
          <label>End With This Message Instead</label>
          <div class="pt-option-box-select">
              <select><option>----</option></select>
          </div>
      </div>
      <div class="pt-option-box">
          <label>Win Percentage</label>
          <div class="pt-win-percentage">
              <input type="text" name="" placeholder="10%">
          </div>
      </div>
  </div>
</div>`
}

var findNextIndex =  ( id ) => {
	var splitIndex = id.split( '_' );

	return parseInt( splitIndex[ 1 ] );
}
// options-86c4w1uhorus
var rearrangeSection = () => {
	var length = jQuery( '#fldArea .drugableSection' ).length;
	for ( var i = 1; i <= length; i++ ) {
		var dataField = jQuery( '.drugableSection:nth-child( ' + i + ' )' ).attr( 'data-field' );
		var dataTag = jQuery( '.drugableSection:nth-child( ' + i + ' )' ).attr( 'data-tag' );
		var splitIndex = jQuery( '.drugableSection:nth-child( ' + i + ' )' )[ 0 ].id.split( '_' );
		// console.log( "DATA FIELD = " + dataField );
		// console.log( "DATA TAG = " + dataTag );
		// console.log( "SPLIT INDEX = " + splitIndex );

		// jQuery( '.drugableSection:nth-child( ' + i + ' )' ).removeClass().addClass( 'drugableSection drag-' + i ).attr( { 'id': splitIndex[ 0 ] + '_' + i, 'data-order': i } );
		jQuery( '.drugableSection:nth-child( ' + i + ' )' ).attr( { 'id': splitIndex[ 0 ] + '_' + i } );
		jQuery( '.form-fields-block' ).find( "[data-form-field='" + dataField + "']" ).attr( { 'id': 'fl_' + splitIndex[ 0 ] + '_' + i, 'data-order': i } );

		if ( dataTag == "radio" || dataTag == "checkbox" || dataTag == "select" ) {
			var inputLength = jQuery( 'ul[data-select="' + dataField + '"] li' ).length; 
			// console.log( "INPUT LENGTH = " + inputLength );
			for ( var j = 1; j <= inputLength; j++ ) {
				var splitInput = jQuery( 'ul[data-select="' + dataField + '"] li:nth-child( ' + j + ' )' ).attr( 'data-input' ).split( '_' );
				jQuery( '#options-' + dataField ).find( "[data-index='" + j + "']" ).attr( { 'data-order': splitInput[ 1 ] } );
				console.log( dataField );
				console.log( splitInput[ 1 ] );
			}
		}
	}

	jQuery( '.optionUl' ).sortable( {
	 	update: function( event, ui ) {
	 		rearrangeSection();
	 	}
	} );

	sortFormFieldsPostion( dataField );
	popupPreview();
}

var formFieldIndex = () => {
	const length = 12;
	const characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    var result = '';
    for ( var i = length; i > 0; --i ) {
    	result += characters[ Math.round( Math.random() * ( characters.length - 1 ) ) ];
    }

    return result;
}

var sortFormFieldsPostion = ( id = '' ) => {
	var fields = jQuery( '.pt-frm-field' );
	fields.sort( ( a, b ) => {
		return jQuery( a ).data( 'order' ) - jQuery( b ).data( 'order' );
	} );
	jQuery( '.form-fields-block' ).html( fields );

	var optionFields = jQuery( '#options-' + id + ' div' );
	console.log( optionFields );
	if ( optionFields) {
		optionFields.sort( ( a, b ) => {
			return jQuery( a ).data( 'order' ) - jQuery( b ).data( 'order' );
		} );
		jQuery( '#option-fields-block-' + id ).html( optionFields );
	}
}
