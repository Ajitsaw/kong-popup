<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.capitalnumbers.com/
 * @since      1.0.0
 *
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Kong_Popup
 * @subpackage Kong_Popup/includes
 * @author     CN <https://www.capitalnumbers.com/>
 */
class Kong_Popup 
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Kong_Popup_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() 
	{
		if ( defined( 'KONG_POPUP_VERSION' ) ) {
			$this->version = KONG_POPUP_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'kong-popup';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		/** 
         * Register custom post types: Popup and Template
         */
        add_action( 'init', array( $this, 'kong_popup_register_post_type_popup' ) );
        // add_action( 'init', array( $this, 'kong_popup_register_post_type_template' ) );

        /** 
         * Rewrite popup script for external uses
         */
        add_action( 'init', array( $this, 'kong_popup_rewrite_popup_script' ) );

        /** 
         * Render popup script in external file
         */
        add_action( 'wp_ajax_render_popup', array( $this, 'kong_popup_render_popup_js' ) );
        add_action( 'wp_ajax_nopriv_render_popup', array( $this, 'kong_popup_render_popup_js' ) );

        /** 
         * Get popup information by URL
         */
        add_action( 'wp_ajax_get_popup_by_url', array( $this, 'kong_popup_get_popup_by_url' ) );
        add_action( 'wp_ajax_nopriv_get_popup_by_url', array( $this, 'kong_popup_get_popup_by_url' ) );
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Kong_Popup_Loader. Orchestrates the hooks of the plugin.
	 * - Kong_Popup_i18n. Defines internationalization functionality.
	 * - Kong_Popup_Admin. Defines all hooks for the admin area.
	 * - Kong_Popup_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() 
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kong-popup-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kong-popup-i18n.php';

		/**
         * The class responsible for storing popup analytics functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kong-popup-analytics.php';

        /**
         * The class responsible for creating folder(taxonomy) functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kong-popup-folders.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-kong-popup-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-kong-popup-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/classes/class-kong-popup-ajax.php';

		$this->loader = new Kong_Popup_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Kong_Popup_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() 
	{
		$plugin_i18n = new Kong_Popup_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() 
	{
		$plugin_admin = new Kong_Popup_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() 
	{
		$plugin_public = new Kong_Popup_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() 
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() 
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Kong_Popup_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() 
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() 
	{
		return $this->version;
	}

	public function kong_popup_register_post_type_popup() 
	{
        $labels = array(
            'name'                  => _x( 'Popups', 'Post type general name', 'kong-popup' ),
            'singular_name'         => _x( 'Popup', 'Post type singular name', 'kong-popup' ),
            'menu_name'             => _x( 'Popups', 'Admin Menu text', 'kong-popup' ),
            'name_admin_bar'        => _x( 'Popup', 'Add New on Toolbar', 'kong-popup' ),
            'add_new'               => __( 'Add New', 'kong-popup' ),
            'add_new_item'          => __( 'Add New Popup', 'kong-popup' ),
            'new_item'              => __( 'New Popup', 'kong-popup' ),
            'edit_item'             => __( 'Edit Popup', 'kong-popup' ),
            'view_item'             => __( 'View Popup', 'kong-popup' ),
            'all_items'             => __( 'All Popups', 'kong-popup' ),
            'search_items'          => __( 'Search Popups', 'kong-popup' ),
            'parent_item_colon'     => __( 'Parent Popups:', 'kong-popup' ),
            'not_found'             => __( 'No Popups found.', 'kong-popup' ),
            'not_found_in_trash'    => __( 'No Popups found in Trash.', 'kong-popup' ),
            'featured_image'        => _x( 'Popup Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kong-popup' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
            'archives'              => _x( 'Popup archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kong-popup' ),
            'insert_into_item'      => _x( 'Insert into Popup', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kong-popup' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Popup', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kong-popup' ),
            'filter_items_list'     => _x( 'Filter Popups list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kong-popup' ),
            'items_list_navigation' => _x( 'Popups list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kong-popup' ),
            'items_list'            => _x( 'Popups list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kong-popup' ),
        );
        $args = array(
            'label'                 => __( 'popups', 'kong-popup' ),
            'description'           => __( 'Popup description', 'kong-popup' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => false,	// true
            'show_in_nav_menus'     => false,
            'show_in_admin_bar'     => true,
            'menu_position'         => '',
            'can_export'            => true,
            'rewrite'               => array( 'slug' => 'popup', 'with_front' => true, 'pages' => true ),
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'query_var'             => true,
            'capability_type'       => 'post',
            'menu_icon'             => 'dashicons-testimonial',

        );
        register_post_type( 'popup', $args );

        register_taxonomy( 'popup-folder', 'popup', array(
            'labels'        =>  array(
                'name'          => __( 'Folder', 'kong-popup' ),
                'all_items'     => __( 'All Folders', 'kong-popup' ),
                'add_new_item'  => __( 'Add New Folder', 'kong-popup' ),
                'edit_item'     => __( 'Edit Folder', 'kong-popup' ),
                'back_to_items' => __( 'Back to Folders', 'kong-popup' ),
                'search_items'  => __( 'Search Folders', 'kong-popup' ),
                'parent_item'   => __( 'Parent Folder', 'kong-popup' )
            ),
            'hierarchical'  => true,
            'rewrite'       => array( 'slug' => 'popup-folder' ),
            'show_ui' => true,
            'query_var' => true,
        ) );

        register_taxonomy( 'popup-template', 'popup', array(
            'labels'        =>  array(
                'name'          => __( 'Template', 'kong-popup' ),
                'all_items'     => __( 'All Templates', 'kong-popup' ),
                'add_new_item'  => __( 'Add New Template', 'kong-popup' ),
                'edit_item'     => __( 'Edit Template', 'kong-popup' ),
                'back_to_items' => __( 'Back to Templates', 'kong-popup' ),
                'search_items'  => __( 'Search Templates', 'kong-popup' ),
                'parent_item'   => __( 'Parent Template', 'kong-popup' )
            ),
            'hierarchical'  => true,
            'rewrite'       => array( 'slug' => 'popup-template' ),
            'show_ui' => true,
            'query_var' => true,
        ) );

        // wp_insert_term( 'Unassigned', 'popup-folder' );
    }

    // public function kong_popup_register_post_type_template() 
    // {
    //     $labels = array(
    //         'name'                  => _x( 'Templates', 'Post type general name', 'kong-popup' ),
    //         'singular_name'         => _x( 'Template', 'Post type singular name', 'kong-popup' ),
    //         'menu_name'             => _x( 'Templates', 'Admin Menu text', 'kong-popup' ),
    //         'name_admin_bar'        => _x( 'Template', 'Add New on Toolbar', 'kong-popup' ),
    //         'add_new'               => __( 'Add New', 'kong-popup' ),
    //         'add_new_item'          => __( 'Add New Template', 'kong-popup' ),
    //         'new_item'              => __( 'New Template', 'kong-popup' ),
    //         'edit_item'             => __( 'Edit Template', 'kong-popup' ),
    //         'view_item'             => __( 'View Template', 'kong-popup' ),
    //         'all_items'             => __( 'All Templates', 'kong-popup' ),
    //         'search_items'          => __( 'Search Templates', 'kong-popup' ),
    //         'parent_item_colon'     => __( 'Parent Templates:', 'kong-popup' ),
    //         'not_found'             => __( 'No Templates found.', 'kong-popup' ),
    //         'not_found_in_trash'    => __( 'No Templates found in Trash.', 'kong-popup' ),
    //         'featured_image'        => _x( 'Template Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kong-popup' ),
    //         'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
    //         'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
    //         'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kong-popup' ),
    //         'archives'              => _x( 'Template archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kong-popup' ),
    //         'insert_into_item'      => _x( 'Insert into Template', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kong-popup' ),
    //         'uploaded_to_this_item' => _x( 'Uploaded to this Template', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kong-popup' ),
    //         'filter_items_list'     => _x( 'Filter Templates list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kong-popup' ),
    //         'items_list_navigation' => _x( 'Templates list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kong-popup' ),
    //         'items_list'            => _x( 'Templates list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kong-popup' ),
    //     );
    //     $args = array(
    //         'label'                 => __( 'templates', 'kong-popup' ),
    //         'description'           => __( 'Template description', 'kong-popup' ),
    //         'labels'                => $labels,
    //         'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    //         'hierarchical'          => false,
    //         'public'                => true,
    //         'show_ui'               => true,
    //         'show_in_menu'          => true,
    //         'show_in_nav_menus'     => false,
    //         'show_in_admin_bar'     => true,
    //         'menu_position'         => '',
    //         'can_export'            => true,
    //         'rewrite'               => array( 'slug' => 'template', 'with_front' => true, 'pages' => true ),
    //         'has_archive'           => true,
    //         'exclude_from_search'   => false,
    //         'publicly_queryable'    => true,
    //         'query_var'             => true,
    //         'capability_type'       => 'post',
    //         'menu_icon'             => 'dashicons-images-alt',

    //     );
    //     register_post_type( 'template', $args );

    //     register_taxonomy( 'template-category', 'template', array(
    //         'labels'        =>  array(
    //             'name'          => __( 'Template Category', 'kong-popup' ),
    //             'all_items'     => __( 'All Template Categories', 'kong-popup' ),
    //             'add_new_item'  => __( 'Add New Template Category', 'kong-popup' ),
    //             'edit_item'     => __( 'Edit Template Category', 'kong-popup' ),
    //             'back_to_items' => __( 'Back to Template Categories', 'kong-popup' ),
    //             'search_items'  => __( 'Search Template Categories', 'kong-popup' ),
    //             'parent_item'   => __( 'Parent Template Category', 'kong-popup' )
    //         ),
    //         'hierarchical'  => true,
    //         'rewrite'       => array( 'slug' => 'template-category' ),
    //         'show_ui' => true,
    //         'query_var' => true,
    //     ) );
    // }

    public function kong_popup_rewrite_popup_script() 
    {
        $url = str_replace( trailingslashit( home_url( '/' ) ), '', admin_url( 'admin-ajax.php' ) . '?action=render_popup' );
        add_rewrite_rule( '^popup.js$', $url, 'top' );
        flush_rewrite_rules();
    }

    public function kong_popup_render_popup_js() 
    {
        // $dataURL = admin_url( 'admin-ajax.php' ) . '?action=get_popup_by_url';
        $ajaxURL = admin_url( 'admin-ajax.php' );

        header( 'Content-Type:text/javascript' );
        header( 'Access-Control-Allow-Origin: *' );
        // header( 'Set-Cookie: CookieName=CookieValue; HttpOnly; SameSite=Strict' );
        
        echo '
        jQuery( "body" ).bind( "DOMSubtreeModified", function( e ) {
            var popupConditionCase = "";
            var popupElement = jQuery( ".kong-popup" );
            var popupDisplayCondition = popupElement.data( "display-condition" );
            var popupDisplayConditionType = popupElement.data( "display-condition-type" );
            var popupWhenReach = popupElement.data( "when-reach" );
            var popupAfterSecond = popupElement.data( "after-second" );
            if ( popupDisplayCondition == "condition" ) {
                if ( popupDisplayConditionType == "when-reach" ) {
                    popupConditionCase = "scroll";
                } else if ( popupDisplayConditionType == "after-second" ) {
                    popupConditionCase = "timeout";
                } else { }
                switch( popupConditionCase ) {
                    case "scroll":
                        jQuery( window ).scroll( function( e ) {
                            var scrollTop = jQuery( window ).scrollTop();
                            var docHeight = jQuery( document ).height();
                            var winHeight = jQuery( window ).height();
                            var scrollPercent = scrollTop / ( docHeight - winHeight );
                            var scrollPercentRounded = Math.round( scrollPercent * 100 ) + "%";
                            if ( scrollPercentRounded == popupWhenReach ) {
                                jQuery( ".kong-popup" ).show();
                            }
                        } );
                        break;
                    case "timeout":
                        setTimeout( function() {
                            jQuery( ".kong-popup" ).show();
                        }, popupAfterSecond * 1000 );
                        break;
                }
            } else {
                jQuery( ".kong-popup" ).show();
            }
        } );';

        echo '
        setTimeout( function() {
            jQuery( ".kong-popup" ).addClass( "animate" );
        }, 1000 );
        ';

        echo '
    	function close_kong_popup() 
    	{
            jQuery( ".kong-popup" ).hide();
        }
        ';

        echo '
        function clickTarget( popupID, target ) 
        {
        	jQuery.ajax( {
				type: "POST",
				url: "' . $ajaxURL . '",
				data: {
					action: "add_click_target_ajax",
					popup_id: popupID,
					target: target,
				},
				success: function( response ) {}
			} );
        }
        ';

        $email = "[type='email']";
        echo '
        function submit_behaviour( popupID, e, $el ) 
        {
            e.preventDefault();

            var flag = 0;
            var checkAtleastOneEmail = jQuery( ".popup-form input' . $email . '" ).filter( function() {
            	return this.value !== "" && this.value !== "0";
            } );

            if ( checkAtleastOneEmail.length > 0 ) {
            	flag = 1;
            }

            var formData = jQuery( $el ).serialize();
            jQuery.ajax( {
				type: "POST",
				url: "' . $ajaxURL . '",
				data: {
					action: "save_popup_feeds_ajax",
					popup_id: popupID,
					form_data: formData,
				},
				success: function( response ) {
					if ( flag == 1 ) {
						clickTarget( popupID, "submit" );
					}
					jQuery( "#popup-block" ).remove();
				}
			} );
            return false;
        }';

    //     echo '
    //     function popupFunctionalities() {
    //     	jQuery( document ).ready( function( e ) {
    //     		jQuery( "form #popup-submit" ).submit( function( e ) {
				//     e.preventDefault(); 

				//     var form = jQuery( this );
				//     console.log( form );
				//     return;
				//     // var url = form.attr( "action" );
				//     // jQuery.ajax( {
				//     // 	type: "POST",
				//     // 	url: url,
				//     // 	data: form.serialize(),
				//     // 	success: function( data ) {
				//     // 		console.log( data ); // show response from the php script.
				//     // 		return;
				//     // 	}
				//     // } );
				// } );
    //     	} );
    //     }
    //     ';

        echo '
        function getBrowser() {
            var unknown = "Unknown";
        
                // screen
                var screenSize = "";
                if (screen.width) {
                    width = (screen.width) ? screen.width : "";
                    height = (screen.height) ? screen.height : "";
                    screenSize += "" + width + " x " + height;
                }
        
                //browser
                var nVer = navigator.appVersion;
                var nAgt = navigator.userAgent;
                var browser = navigator.appName;
                var version = "" + parseFloat(navigator.appVersion);
                var majorVersion = parseInt(navigator.appVersion, 10);
                var nameOffset, verOffset, ix;
        
                // Opera
                if ((verOffset = nAgt.indexOf("Opera")) != -1) {
                    browser = "Opera";
                    version = nAgt.substring(verOffset + 6);
                    if ((verOffset = nAgt.indexOf("Version")) != -1) {
                        version = nAgt.substring(verOffset + 8);
                    }
                }
                // MSIE
                else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
                    browser = "Microsoft Internet Explorer";
                    version = nAgt.substring(verOffset + 5);
                }
        
                //IE 11 no longer identifies itself as MS IE, so trap it
                //http://stackoverflow.com/questions/17907445/how-to-detect-ie11
                else if ((browser == "Netscape") && (nAgt.indexOf("Trident/") != -1)) {
        
                    browser = "Microsoft Internet Explorer";
                    version = nAgt.substring(verOffset + 5);
                    if ((verOffset = nAgt.indexOf("rv:")) != -1) {
                        version = nAgt.substring(verOffset + 3);
                    }
        
                }
        
                // Chrome
                else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
                    browser = "Chrome";
                    version = nAgt.substring(verOffset + 7);
                }
                // Safari
                else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
                    browser = "Safari";
                    version = nAgt.substring(verOffset + 7);
                    if ((verOffset = nAgt.indexOf("Version")) != -1) {
                        version = nAgt.substring(verOffset + 8);
                    }
        
                    // Chrome on iPad identifies itself as Safari. Actual results do not match what Google claims
                    //  at: https://developers.google.com/chrome/mobile/docs/user-agent?hl=ja
                    //  No mention of chrome in the user agent string. However it does mention CriOS, which presumably
                    //  can be keyed on to detect it.
                    if (nAgt.indexOf("CriOS") != -1) {
                        //Chrome on iPad spoofing Safari...correct it.
                        browser = "Chrome";
                        //Don"t believe there is a way to grab the accurate version number, so leaving that for now.
                    }
                }
                // Firefox
                else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
                    browser = "Firefox";
                    version = nAgt.substring(verOffset + 8);
                }
                // Other browsers
                else if ((nameOffset = nAgt.lastIndexOf(" ") + 1) < (verOffset = nAgt.lastIndexOf("/"))) {
                    browser = nAgt.substring(nameOffset, verOffset);
                    version = nAgt.substring(verOffset + 1);
                    if (browser.toLowerCase() == browser.toUpperCase()) {
                        browser = navigator.appName;
                    }
                }
                // trim the version string
                if ((ix = version.indexOf(";")) != -1) version = version.substring(0, ix);
                if ((ix = version.indexOf(" ")) != -1) version = version.substring(0, ix);
                if ((ix = version.indexOf(")")) != -1) version = version.substring(0, ix);
        
                majorVersion = parseInt("" + version, 10);
                if (isNaN(majorVersion)) {
                    version = "" + parseFloat(navigator.appVersion);
                    majorVersion = parseInt(navigator.appVersion, 10);
                }
        
                // mobile version
                var mobile = /Mobile|mini|Fennec|Android|iP(ad|od|hone)/.test(nVer);
        
                // cookie
                var cookieEnabled = (navigator.cookieEnabled) ? true : false;
        
                if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) {
                    document.cookie = "testcookie";
                    cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
                }
                // referrer
                var referrer = document.referrer;

                // system
                var os = unknown;
                var clientStrings = [
                    {s:"Windows 3.11", r:/Win16/},
                    {s:"Windows 95", r:/(Windows 95|Win95|Windows_95)/},
                    {s:"Windows ME", r:/(Win 9x 4.90|Windows ME)/},
                    {s:"Windows 98", r:/(Windows 98|Win98)/},
                    {s:"Windows CE", r:/Windows CE/},
                    {s:"Windows 2000", r:/(Windows NT 5.0|Windows 2000)/},
                    {s:"Windows XP", r:/(Windows NT 5.1|Windows XP)/},
                    {s:"Windows Server 2003", r:/Windows NT 5.2/},
                    {s:"Windows Vista", r:/Windows NT 6.0/},
                    {s:"Windows 7", r:/(Windows 7|Windows NT 6.1)/},
                    {s:"Windows 8.1", r:/(Windows 8.1|Windows NT 6.3)/},
                    {s:"Windows 8", r:/(Windows 8|Windows NT 6.2)/},
                    {s:"Windows NT 4.0", r:/(Windows NT 4.0|WinNT4.0|WinNT|Windows NT)/},
                    {s:"Windows ME", r:/Windows ME/},
                    {s:"Android", r:/Android/},
                    {s:"Open BSD", r:/OpenBSD/},
                    {s:"Sun OS", r:/SunOS/},
                    {s:"Linux", r:/(Linux|X11)/},
                    {s:"iOS", r:/(iPhone|iPad|iPod)/},
                    {s:"Mac OS X", r:/Mac OS X/},
                    {s:"Mac OS", r:/(MacPPC|MacIntel|Mac_PowerPC|Macintosh)/},
                    {s:"QNX", r:/QNX/},
                    {s:"UNIX", r:/UNIX/},
                    {s:"BeOS", r:/BeOS/},
                    {s:"OS/2", r:/OS\/2/},
                    {s:"Search Bot", r:/(nuhk|Googlebot|Yammybot|Openbot|Slurp|MSNBot|Ask Jeeves\/Teoma|ia_archiver)/}
                ];
                for (var id in clientStrings) {
                    var cs = clientStrings[id];
                    if (cs.r.test(nAgt)) {
                        os = cs.s;
                        break;
                    }
                }
        
                var osVersion = unknown;
        
                if (/Windows/.test(os)) {
                    osVersion = /Windows (.*)/.exec(os)[1];
                    os = "Windows";
                }
        
                switch (os) {
                    case "Mac OS X":
                        osVersion = /Mac OS X (10[\.\_\d]+)/.exec(nAgt)[1];
                        break;
        
                    case "Android":
                        osVersion = /Android ([\.\_\d]+)/.exec(nAgt)[1];
                        break;
        
                    case "iOS":
                        osVersion = /OS (\d+)_(\d+)_?(\d+)?/.exec(nVer);
                        osVersion = osVersion[1] + "." + osVersion[2] + "." + (osVersion[3] | 0);
                        break;
        
                }
            //}
        
            window.browserInfo = {
                screen: screenSize,
                browser: browser,
                referrer: referrer,
                browserVersion: version,
                mobile: mobile,
                os: os,
                osVersion: osVersion,
                cookies: cookieEnabled
            };
        }     
        ';
        echo 'function setCookie(name,value,days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==" ") c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
        function eraseCookie(name) {   
            document.cookie = name+"=; Max-Age=-99999999;";  
        }';
        echo 'function render_popups(){';
        // echo 'var data_url="'.$dataURL.'";';
        //echo 'alert("PopUp Check For:" + window.location.href);';
        echo 'var currentURL = window.location.href;';
        echo 'jQuery(function(){';
        echo 'jQuery.getJSON("https://ipapi.co/json/", function(data) {';
        echo ' var ipinfo = data;';
        echo 'jQuery.ajax({
                type:"POST",
                url: "' . $ajaxURL . '",
                data: {action: "get_popup_by_url", url: currentURL, browser_info: browserInfo, client_date: new Date(), IP: ipinfo}
            }).done(function(response){
                if(response!=""){
                var head = document.getElementsByTagName("head")[0];
                var fonts_url = "https://fonts.googleapis.com/css?family=Assistant|Cookie|Lato|Lobster+Two|Muli|Open+Sans|Oswald|PT+Serif|Raleway|Roboto|Satisfy|Source+Sans+Pro|Ubuntu&display=swap";
                var link = document.createElement("link");
                link.setAttribute("href",fonts_url);
                link.setAttribute("rel","stylesheet");
                head.appendChild(link);
    
                var popup = document.createElement("div");
                popup.setAttribute("id","popup-block");
                popup.innerHTML = response;
                document.getElementsByTagName("body")[0].appendChild(popup);
                // Working with Cookie
                var KongPopUpRendered = getCookie("kong_popup_rendered");
                if(KongPopUpRendered== null){
                    KongPopUpRendered = 1;
                }else{
                    KongPopUpRendered = parseInt(KongPopUpRendered)+1;
                }
                CookieDays = new Date(new Date().setFullYear(new Date().getFullYear() + 1))
                console.log( CookieDays )
                setCookie("kong_popup_rendered",KongPopUpRendered,CookieDays);
                }
            });';

        echo '});';

        echo '})';

        echo '}
        getBrowser();
        render_popups();
        // popupFunctionalities();
        ';
        die();
    }

    public function kong_popup_get_popup_by_url() 
    {
        global $wpdb;

        $url = $_POST[ 'url' ];
        $popup_id = null;
        $sql_popup_show_in = "
            SELECT * FROM {$wpdb->prefix}posts as p 
            JOIN {$wpdb->prefix}postmeta as m ON p.ID = m.post_id
            WHERE p.post_status = 'publish'
            AND m.meta_key = 'display_in'
            ORDER BY p.ID ASC
        ";
        $popups = $wpdb->get_results( $sql_popup_show_in );
        if ( $popups ) {
            $flag = 1;
            foreach ( $popups as $popup ) {
                foreach ( unserialize( $popup->meta_value ) as $view_popup_url ) {
                    if ( $flag == 1 && $view_popup_url == $url ) {
                        $popup_id = $popup->post_id;
                        $flag = 0;
                    }
                }
            }
        }

        if ( $popup_id ) {
            $kong_popup = new Kong_Popup_Render( $popup_id );
            $kong_popup_validate_behavior = new Kong_Popup_Validate_Behavior( $_POST, $popup_id );
            $kong_popup_validate_targeting = new Kong_Popup_Validate_Targeting( $_POST, $popup_id );

            if ( ( $kong_popup_validate_behavior->validate_popup_behavior_conditions() && $kong_popup->get_popup_info( 'target_for_whom' ) == "all" ) || ( $kong_popup_validate_behavior->validate_popup_behavior_conditions() && $kong_popup_validate_targeting->validate_popup_targeting_conditions() ) ) {
                if ( class_exists( 'Kong_Popup_Analytics' ) ) {
                    $analytics = Kong_Popup_Analytics::getInstance();
                    $analytics->set_analytics( $popup_id, $_POST );
                }

                echo $kong_popup->generate_popup_css();
                echo $kong_popup->generate_popup_js();
                echo $kong_popup->generate_popup_content();
                echo $kong_popup->generate_popup_publish_date();
                die( '<!-- Valid Target -->' );
            } else {
                die( '<!-- Invalid Target -->' );
            }

            die();
        } else {
            die( '<!-- No Published Popup for this URL -->' );
        }
    }

}