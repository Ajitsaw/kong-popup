<?php

// error_reporting( E_ALL );
// ini_set( 'display_error', 'on' );

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.capitalnumbers.com/
 * @since      1.0.0
 *
 * @package    Kong_Popup
 * @subpackage Kong_Popup/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Kong_Popup
 * @subpackage Kong_Popup/admin
 * @author     CN <https://www.capitalnumbers.com/>
 */

require_once PLUGIN_BASE_DIR . '/includes/class-kong-popup-render.php';
require_once PLUGIN_BASE_DIR . '/includes/class-kong-popup-validate-behavior.php';
require_once PLUGIN_BASE_DIR . '/includes/class-kong-popup-validate-targeting.php';
// require_once PLUGIN_BASE_DIR . '/admin/partials/kong-popup-admin-ajax.php';
// require_once PLUGIN_BASE_DIR . '/admin/classes/class-kong-popup-ajax.php';

class Kong_Popup_Admin 
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    private $google_fonts;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) 
    {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->google_fonts = array(
            'Roboto'            => 'Roboto',
            'Open Sans'         => 'Open+Sans',
            'Lato'              => 'Lato',
            'Source Sans Pro'   => 'Source+Sans+Pro',
            'Oswald'            => 'Oswald',
            'Raleway'           => 'Raleway',
            'Ubuntu'            => 'Ubuntu',
            'PT Serif'          => 'PT+Serif',
            'Muli'              => 'Muli',
            'Assistant'         => 'Assistant',
            'Satisfy'           => 'Satisfy',
            'Lobster Two'       => 'Lobster+Two',
            'Cookie'            => 'Cookie',
        );

        add_action( 'admin_menu', array( $this, 'admin_pages' ) );

        add_action( 'wp_ajax_savepopup', array( $this, 'savePopup' ) );
        //add_action( 'wp_ajax_nopriv_savepopup', array( $this, 'savePopup' ) );
        // add_action( 'wp_ajax_update_popup_info_ajax', array( $this, 'update_popup_info' ) );
        add_action( 'wp_ajax_update_popup_status_ajax', array( $this, 'update_popup_status' ) );
        add_action( 'wp_ajax_preview', array( $this, 'preview' ) );
        add_action( 'admin_menu', array( $this, 'add_folders' ) );

        // $kong_popup_folders = new Kong_Popup_Folders;
        // add_action( 'wp_ajax_create_folder_ajax', array( $kong_popup_folders, 'create_folder' ) );

        add_action( 'wp_ajax_create_folder_ajax', array( $this, 'create_folder' ) );
        add_action( 'wp_ajax_create_template_category_ajax', array( $this, 'create_template_category' ) );
        add_action( 'wp_ajax_get_template_category_image_ajax', array( $this, 'get_template_category_image' ) );
        add_action( 'wp_ajax_search_template_by_category_ajax', array( $this, 'search_template_by_category' ) );
        add_action( 'wp_ajax_search_template_by_title_ajax', array( $this, 'search_template_by_title' ) );
        add_action( 'wp_ajax_clone_popup_ajax', array( $this, 'clone_popup' ) );
        add_action( 'wp_ajax_add_selective_section_ajax', array( $this, 'add_selective_section' ) );

        $kong_popup_admin_ajax = new Kong_Popup_Admin_Ajax;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() 
    {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kong_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kong_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        // wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'spectrum-min', '//cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'roundslider-min', '//cdn.jsdelivr.net/npm/round-slider@1.4.0/dist/roundslider.min.css', array(), $this->version, 'all' );

        if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == "popup-dashboard" ) {
            wp_enqueue_style( 'chartist', plugin_dir_url( __FILE__ ) . 'css/chartist.min.css', array(), $this->version, 'all' );
            wp_enqueue_style( 'chartist-plugin-tooltip', plugin_dir_url( __FILE__ ) . 'css/chartist-plugin-tooltip.css', array(), $this->version, 'all' );
            wp_enqueue_style( 'dashboard-modern', plugin_dir_url( __FILE__ ) . 'css/dashboard-modern.css', array(), $this->version, 'all' );
        }

        wp_enqueue_style( 'daterangepicker', '//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap', array(), $this->version, 'all' );
        wp_enqueue_style( 'material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), $this->version, 'all' );
        wp_enqueue_style( 'jquery-datetimepicker', plugin_dir_url( __FILE__ ) . 'css/jquery.datetimepicker.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/kong-popup-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() 
    {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Kong_Popup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kong_Popup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        require_once PLUGIN_BASE_DIR . '/admin/partials/kong-popup-supports.php';

        wp_enqueue_script( 'jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( 'spectrum-min', '//cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( 'roundslider-min', '//cdn.jsdelivr.net/npm/round-slider@1.4.0/dist/roundslider.min.js', array( 'jquery' ), $this->version, true );

        if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == "popup-dashboard" ) {
            wp_enqueue_script( 'canvas-min', plugin_dir_url( __FILE__ ) . 'js/canvasjs.min.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'chart-min', plugin_dir_url( __FILE__ ) . 'js/chart.min.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'chartist-min', plugin_dir_url( __FILE__ ) . 'js/chartist.min.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'chartist-plugin-tooltip', plugin_dir_url( __FILE__ ) . 'js/chartist-plugin-tooltip.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'chartist-plugin-fill-donut-min', plugin_dir_url( __FILE__ ) . 'js/chartist-plugin-fill-donut.min.js', array( 'jquery' ), $this->version, true );
           
            wp_enqueue_script( 'amcharts-core', 'https://www.amcharts.com/lib/4/core.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'amcharts-charts', 'https://www.amcharts.com/lib/4/charts.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'amcharts-theme-kelly', 'https://www.amcharts.com/lib/4/themes/kelly.js', array( 'jquery' ), $this->version, true );
            wp_enqueue_script( 'amcharts-animated', 'https://www.amcharts.com/lib/4/themes/animated.js', array( 'jquery' ), $this->version, true );
        }
        
        wp_enqueue_script( 'moment', plugin_dir_url( __FILE__ ) . 'js/moment.min.js', array( 'jquery' ), true );
        wp_enqueue_script( 'moment-timezones-list', plugin_dir_url( __FILE__ ) . 'js/moment-timezones-list.js', array( 'jquery' ), $this->version, true );

        if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == "edit-popup" ) {
            wp_enqueue_script( 'timezones-helper', plugin_dir_url( __FILE__ ) . 'js/timezones-helper.js', array( 'jquery' ), $this->version, true );
            wp_localize_script( 'timezones-helper', 'kongPopupTimezonesAjax', array( 'base_admin_url' => plugin_dir_url( __FILE__ ) ) );
        } else {
            wp_enqueue_script( 'moment-with-locales-min', plugin_dir_url( __FILE__ ) . 'js/moment-with-locales.min.js', array( 'jquery' ), $this->version, true );
        }

        wp_enqueue_script( 'jquery-datetimepicker', '//cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( 'daterangepicker', plugin_dir_url( __FILE__ ) . 'js/daterangepicker.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/kong-popup-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, true );
        wp_localize_script( $this->plugin_name, 'kongPopupSupports', $kong_popup_supports );
        wp_enqueue_media();
	}

    public function admin_pages() 
    {
        if ( ! $this->is_kong_popup() ) {
            return false;
        }

        $this->remove_default_menus();
        $this->add_popup_menus();
    }

    public function module_callback() 
    {
        if ( isset( $_REQUEST[ 'page' ] ) ) {
            $module = $_REQUEST[ 'page' ];
            if ( isset( $_REQUEST[ 'id' ] ) && $_REQUEST[ 'id' ] > 0 ) {
                $kong_popup_render = new Kong_Popup_Render( $_REQUEST[ 'id' ] );
                $popup = $kong_popup_render->get_popup();
                $popup_meta = $kong_popup_render->get_popup_all_info();
            }
            require_once plugin_dir_path( __FILE__ ) . "/views/modules/$module.php";
        }
    }

    public function savePopup() 
    {
        $title = trim( $_REQUEST[ 'title' ] );
        $folder = trim( $_REQUEST[ 'folder' ] );
        $template = trim( $_REQUEST[ 'template' ] );

        $template_html_path = PLUGIN_BASE_DIR . '/templates/' . $template . '/template.html';
        $content = '';
        $fp1 = fopen( $template_html_path, 'r' ) or die( 'Unable to open file' );
        if ( $fp1 ) {
            while ( $s = fgets( $fp1, filesize( $template_html_path ) ) ) {
                $content .= $s;
            }
        }
        fclose( $fp1 );
        
        $template_info_path = PLUGIN_BASE_DIR . '/templates/' . $template . '/template.info';
        $infos = array();
        $fp2 = fopen( $template_info_path, 'r' ) or die( 'Unable to open file' );
        if ( $fp2 ) {
            while ($info = fgets( $fp2, filesize( $template_info_path ) ) ) {
                $arr = explode( '=', $info );
                $k = $arr[ 0 ];
                $v = $arr[ 1 ];
                $infos[ $k ] = $v;
            }
        }
        fclose( $fp2 );

        $popup = array(
            'post_title'    => $title,
            'post_content'  => $content,
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => 'popup',
        );
        $post_id = wp_insert_post( $popup );

        foreach ( $infos as $key => $info ) {
            update_post_meta( $post_id, $key, $info );
        }
        update_post_meta( $post_id, 'template', $template );
        
        // if ( empty( $folder ) ) {
        //     $folder = "unassigned";
        // }
        $attached_folder = get_term_by( 'slug', $folder, 'popup-folder', ARRAY_A );
        wp_set_object_terms( $post_id,  $attached_folder[ 'term_id' ] , 'popup-folder');

        $attached_template = get_term_by( 'slug', $template, 'popup-template', ARRAY_A );
        wp_set_object_terms( $post_id,  $attached_template[ 'term_id' ] , 'popup-template');

        echo $post_id;

        die();
    }

    // public function update_popup_info() 
    // {
    //     $meta_data = $_REQUEST[ 'popup_data' ];

    //     $post_id = $meta_data[ 'popup_id' ];
    //     unset( $meta_data[ 'popup_id' ] );  // remove the popup_id from array

    //     // loop the remaining and put in post meta
    //     foreach ( $meta_data as $mdkey => $mdvalue ) {
    //         if ( $mdvalue ) {
    //             if ( is_array( $mdvalue ) ) {
    //                 $mdvalue = array_values( array_filter( $mdvalue ) );    // for removing empty array element
    //             } else {
    //                 $expl_data = explode( ',', $mdvalue );
    //                 if( isset( $expl_data[ 1 ] ) ) {
    //                     $mdvalue = implode( ',', array_map( 'trim', $expl_data ) ); // for triming whitespace from array element
    //                 } else {
    //                     $mdvalue = trim( $expl_data[ 0 ] );
    //                 }
    //             }
    //             update_post_meta( $post_id, $mdkey, $mdvalue );
    //         } else {
    //             delete_post_meta( $post_id, $mdkey );
    //         }

    //         if ( is_array( $mdvalue ) && empty( $mdvalue[ 0 ] ) ) {
    //             delete_post_meta( $post_id, $mdkey );
    //         }
    //     }

    //     die();
    // }

    public function update_popup_status() 
    {
        $request_data = $_REQUEST;

        $post = array( 
            'ID' => $request_data[ 'id' ], 
            'post_status' => $request_data[ 'status' ],   // The post status - publish|pending|draft|private|static|object|attachment|inherit|future|trash.
        );
        wp_update_post( $post );

        die();
    }

    public function preview()
    {
        $post_id = $_REQUEST['popup_id'];
        //if ($post_id) {
        //$post = get_post($post_id);
        //$template = get_post_meta($post_id, 'template', true);
        //$postMeta = get_post_meta($post_id);
        //$content = $post->post_content;
        //}
        //var_dump($postMeta);

        // general user restrictions: Only Author can preview

        // $user = wp_get_current_user();
        // if ($user->data->ID != $post->post_author) {
        //     die('Unauthorised Access');
        // }
        // Reading the Template Information
        // $template_info_path = PLUGIN_BASE_DIR.'/templates/'.$template.'/template.info';
        // $template_html_path = PLUGIN_BASE_DIR.'/templates/'.$template.'/template.html';

        // if (!$content) {
        //     $fp1 = fopen($template_html_path, 'r') or die('Unable to open file');
        //     if ($fp1) {
        //         while ($s = fgets($fp1, filesize($template_html_path))) {
        //             $content .= $s;
        //         }
        //     }
        //     fclose($fp1);
        // }

        // $infos = array();

        // $fp2 = fopen($template_info_path, 'r') or die('Unable to open file');
        // if ($fp2) {
        //     while ($info = fgets($fp2, filesize($template_info_path))) {
        //         $arr = explode('=', $info);
        //         //var_dump($arr);
        //         $k = $arr[0];
        //         $v = $arr[1];
        //         $infos[$k] = $v;
        //     }
        // }
        // fclose($fp2);

        $kong_popup = new Kong_Popup_Render($post_id);
        $dynamic_css = $kong_popup->generate_popup_css();
        $content = $kong_popup->generate_popup_content();
        $dynamic_js = $kong_popup->generate_popup_js();

        echo '<html><head>';
        echo '<link href="https://fonts.googleapis.com/css?family=Assistant|Cookie|Lato|Lobster+Two|Muli|Open+Sans|Oswald|PT+Serif|Raleway|Roboto|Satisfy|Source+Sans+Pro|Ubuntu&display=swap" rel="stylesheet">';
        echo $dynamic_css;
            echo $dynamic_js;
        /*
            .popup-button {
                background-color:'.$postMeta['buttonbgcolor'][0].';
                color:'.$postMeta['buttontextcolor'][0].';
                border:1px solid #ddd;
                padding:10px;
                margin-top:10px;
                min-width:100px;

            }
            .popup-button1 {
                background-color:'.$postMeta['buttonbgcolor'][0].';
                color:'.$postMeta['buttontextcolor'][0].';
                border:1px solid #ddd;
                padding:10px;
                margin-top:10px;
                min-width:40px;

            }
            .popup-button2 {
                background-color:'.$postMeta['buttonbgcolor'][0].';
                color:'.$postMeta['buttontextcolor'][0].';
                border:1px solid #ddd;
                padding:10px;
                margin-top:10px;
                min-width:40px;

            }
            .popup-body .popup-image,
            .popup-body .popup-content {
                width:49%;
                display:inline-block;
                vertical-align:top;
            }
            .popup-body .popup-image img{max-width: 100%;}
            </style>
            */
        echo '</head>';
        echo '<body>'.$content.'</body>';
        echo '</html>';
        die();
    }

    // public function add_folders()
    // {
    //     $folders = array('kong_1' => 'Kong The King', 'kong_2' => 'Flash Sales');

    //     foreach ($folders as $k => $f) {
    //         add_submenu_page(
    //             'kong-popup-dashboard',
    //             '#'.$f,
    //             '#'.$f,
    //             'manage_options',
    //             $k,
    //             array($this, 'kong_popup_folders')
    //         );
    //     }
    // }

    public function add_folders()
    {
        $folders = get_terms(array('taxonomy'=> 'popup-folder', 'hide_empty'=>false));
        //var_dump($folders);
        foreach ($folders as $f) {
            add_submenu_page(
                'kong-popup-dashboard',
                '#'.$f->name,
                '#'.$f->name,
                'manage_options',
                'kong-popup-folders&folder_id='.$f->term_id,
                
                array($this, 'kong_popup_folders')
            );
        }
    }

    public function get_templates() 
    {
        $args = array(
            'post_type'     => 'popup',
            'post_status'   => 'publish',
            'orderby'       => 'modified',
            'order'         => 'DESC',
            'meta_query'    => array(
                array(
                    'key'       => 'is_template',
                    'value'     => 'on',
                    'compare'   => '='
                ),
            ),
        );
        $templates = new WP_Query( $args );

        return $templates;
    }

    public function get_templates_by_term_slug( $slug ) 
    {
        // $templates_dir_path = PLUGIN_BASE_DIR . '/templates/';
        // $templates = array();
        // $directory_path = opendir( $templates_dir_path );
        // while ( $read = readdir( $directory_path ) ) {
        //     if ( $read != '.' && $read != '..' ) {
        //         if ( is_dir( $templates_dir_path . $read ) ) {
        //             $templates[] = $read;
        //         }
        //     }
        // }
        // closedir( $directory_path );

        // return $templates;
        // print_data( $id );

        global $wpdb;

        $query = $wpdb->get_results( "
            SELECT * FROM {$wpdb->prefix}terms as terms 
            JOIN {$wpdb->prefix}term_relationships as term_relationships ON term_relationships.term_taxonomy_id = terms.term_id
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = term_relationships.object_id
            JOIN {$wpdb->prefix}postmeta as postmeta ON postmeta.post_id = posts.ID
            WHERE terms.slug = '$slug'
            AND posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND postmeta.meta_key = 'is_template'
            AND postmeta.meta_value = 'on'
        ", OBJECT );
        // print_data( $query );
        return $query;
    }

    public function is_kong_popup() 
    {
        $bookme_pages = array( 'recent-popups', 'create-popup', 'popup-dashboard', 'popup-lists', 'template-lists', 'create-folder', 'create-template-category', 'edit-popup', 'edit-template', 'create-template', 'popups-under-folder',  );
        if ( isset( $_GET[ 'page' ] ) && in_array( $_GET[ 'page' ], $bookme_pages ) ) {
            return true;
        }

        return false;
    }

    public function remove_default_menus() 
    {
        global $menu;

        // array of menus postion
        $menus_position = array( 2, 3, 5, 10, 20, 25, 60, 65, 70, 75, 80, 99 );
        foreach ( $menus_position as $menu_position ) {
            unset( $menu[ $menu_position ] );
        }
    }

    public function add_popup_menus() 
    {
        $add_menu_pages = array(
            'create-popup'              => array( 'Create A Popup Page', 'Create A Popup', ' ', ),
            'recent-popups'             => array( 'Recent Popups Page', 'Recent Popups', 'dashicons-admin-generic', ),
            'popup-dashboard'           => array( 'Dashboard Page', 'Dashboard', 'dashicons-admin-generic', ),
            'popup-lists'               => array( 'Popups Page', 'Popups', 'dashicons-admin-generic', ),
            'template-lists'            => array( 'Templates Page', 'Templates', 'dashicons-admin-generic', ),
            'create-folder'             => array( 'Folders Page', 'Folders', 'dashicons-admin-generic', ),
            'create-template-category'  => array( 'Settings Page', 'Settings', 'dashicons-admin-generic', ),
            'edit-popup'                => array( 'Edit Popup Page', ' ', ' ', ),
            'edit-template'             => array( 'Edit Template Page', ' ', ' ', ),
            'create-template'           => array( 'Create A Template Page', ' ', ' ', ),
            'popups-under-folder'       => array( 'Popups Under Folder Page', ' ', ' ', ),
        );

        $index = 0;
        foreach ( $add_menu_pages as $key => $add_menu_page ) {
            add_menu_page(
                __( $add_menu_pages[ $key ][ 0 ], 'kong-popup' ),
                __( $add_menu_pages[ $key ][ 1 ], 'kong-popup' ),
                'manage_options',
                $key,
                array( $this, 'module_callback' ),
                $add_menu_pages[ $key ][ 2 ]
            );
            
            $index++;
        }
    }

    public function create_folder() 
    {
        $name = $_POST[ 'folder_name' ] ?? '';
        if ( $name ) {
            $term = wp_insert_term(
                $name,   // the term 
                'popup-folder', // the taxonomy
                array(
                    'description' => '',
                    'slug'        => sanitize_title( $name ),
                    'parent'      => 0,
                )
            );
        }
        // echo $term[ 'term_id' ];
        
        die();
    }

    public function create_template_category() 
    {
        $name = $_POST[ 'template_category_name' ] ?? '';
        $image = $_POST[ 'template_category_image' ] ?? '';
        if ( $name ) {
            $term = wp_insert_term(
                $name,   // the term 
                'popup-template', // the taxonomy
                array(
                    'description' => '',
                    'slug'        => sanitize_title( $name ),
                    'parent'      => 0,
                )
            );
        }
        
        if ( $image ) {
            add_term_meta( $term[ 'term_id' ], '_image_id', $image );
        }
        
        die();
    }

    public function get_template_category_image() 
    {
        $slug = $_POST[ 'template' ];
        $template_category = get_term_by( 'slug', $slug, 'popup-template' );
        $src = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugin_dir_url( __FILE__ ) . 'images/blank.png';
        echo $src;
        
        die();
    }

    public function search_template_by_category() 
    {
        global $wpdb;
        
        $slug = $_POST[ 'template' ];
        $template_category = get_term_by( 'slug', $slug, 'popup-template' );
        $src = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugin_dir_url( __FILE__ ) . 'images/blank.png';

        $templates = $wpdb->get_results( "
            SELECT * FROM {$wpdb->prefix}terms as terms 
            JOIN {$wpdb->prefix}term_relationships as term_relationships ON term_relationships.term_taxonomy_id = terms.term_id
            JOIN {$wpdb->prefix}posts as posts ON posts.ID = term_relationships.object_id
            JOIN {$wpdb->prefix}postmeta as postmeta ON postmeta.post_id = posts.ID
            WHERE terms.term_id = $template_category->term_id
            AND posts.post_type = 'popup'
            AND posts.post_status = 'publish'
            AND postmeta.meta_key = 'is_template'
            AND postmeta.meta_value = 'on'
        " );
        foreach ( $templates as $template ) {
            $slug = get_post_meta( $template->ID, 'template', true );
            $template_category = get_term_by( 'slug', $slug, 'popup-template' );
            ?>
            <div class="template-box">
                <div class="template-box__temp">
                    <figure>
                        <a href="javascript:void(0);"><img src="<?php echo $src; ?>" alt="<?php echo $template_category->name; ?>"></a>
                        <figcaption><?php echo $template->post_title; ?></figcaption>
                        <a href="javascript:void(0);" class="btn-setting"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </figure>
                    <div class="template-box__cnt">
                        <!-- .template-box__topinfo starts -->
                        <ul class="template-box__topinfo">
                            <!-- .popup-view starts -->
                            <li class="popup-view">
                                <span><?php echo ( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ? count( unserialize( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ) : 0; ?></span>
                                <?php echo __( 'views', 'kong-popup' ); ?>
                            </li>
                            <!-- .popup-view ends -->

                            <!-- .popup-hits starts -->
                            <li class="popup-hits">
                                <span>3</span>
                                <?php echo __( 'hits', 'kong-popup' ); ?>
                            </li>
                            <!-- .popup-hits ends -->

                            <!-- .popup-ctrl starts -->
                            <li class="popup-ctrl">
                                <span>20</span>
                                <?php echo __( 'ctr%', 'kong-popup' ); ?>
                            </li>
                            <!-- .popup-ctrl ends -->

                            <!-- .popup-type starts -->
                            <li class="popup-type">
                                <span>
                                    <?php echo __( $template_category->name, 'kong-popup' ); ?>
                                </span>
                            </li>
                            <!-- .popup-type ends -->
                        </ul>
                        <!-- .template-box__topinfo ends -->

                        <ul class="template-box__btns">
                            <li><button class="tem-btn">Edit</button></li>
                            <li><button class="tem-btn">Preview</button></li>
                            <li><button class="tem-btn">Clone</button></li>
                            <li><button class="tem-btn"><i class="fa fa-trash" aria-hidden="true"></i></button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        
        die();
    }

    public function search_template_by_title() 
    {
        if ( $_POST[ 'keyword' ] ) {
            global $wpdb;

            $keyword = $_POST[ 'keyword' ];

            $query = $wpdb->get_results( "
                SELECT * FROM {$wpdb->prefix}posts as posts
                JOIN {$wpdb->prefix}postmeta as postmeta ON postmeta.post_id = posts.ID
                WHERE posts.post_title LIKE '%$keyword%'
                AND posts.post_type = 'popup'
                AND posts.post_status = 'publish'
                AND postmeta.meta_key = 'is_template'
                AND postmeta.meta_value = 'on'
            ", OBJECT );

            $templates = new WP_Query();
            $templates->parse_query( $query );
            $templates = $templates->query;
        } else {
            $templates = $this->get_templates()->get_posts();
        }

        if ( $templates ) {
            foreach ( $templates as $template ) {
                $slug = get_post_meta( $template->ID, 'template', true );
                $template_category = get_term_by( 'slug', $slug, 'popup-template' );
                $src = ( get_term_meta( $template_category->term_id, '_image_id', true ) ) ? wp_get_attachment_url( get_term_meta( $template_category->term_id, '_image_id', true ) ) : plugin_dir_url( __FILE__ ) . 'images/blank.png';
                ?>
                <div class="template-box">
                    <div class="template-box__temp">
                        <figure>
                            <a href="javascript:void(0);"><img src="<?php echo $src; ?>" alt="<?php echo $template_category->name; ?>"></a>
                            <figcaption><?php echo $template->post_title; ?></figcaption>
                            <a href="javascript:void(0);" class="btn-setting"><i class="fa fa-cog" aria-hidden="true"></i></a>
                        </figure>
                        <div class="template-box__cnt">
                            <!-- .template-box__topinfo starts -->
                            <ul class="template-box__topinfo">
                                <!-- .popup-view starts -->
                                <li class="popup-view">
                                    <span><?php echo ( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ? count( unserialize( get_post_meta( $template->ID, 'kong_popup_analytics', true ) ) ) : 0; ?></span>
                                    <?php echo __( 'views', 'kong-popup' ); ?>
                                </li>
                                <!-- .popup-view ends -->

                                <!-- .popup-hits starts -->
                                <li class="popup-hits">
                                    <span>3</span>
                                    <?php echo __( 'hits', 'kong-popup' ); ?>
                                </li>
                                <!-- .popup-hits ends -->

                                <!-- .popup-ctrl starts -->
                                <li class="popup-ctrl">
                                    <span>20</span>
                                    <?php echo __( 'ctr%', 'kong-popup' ); ?>
                                </li>
                                <!-- .popup-ctrl ends -->

                                <!-- .popup-type starts -->
                                <li class="popup-type">
                                    <span>
                                        <?php echo __( $template_category->name, 'kong-popup' ); ?>
                                    </span>
                                </li>
                                <!-- .popup-type ends -->
                            </ul>
                            <!-- .template-box__topinfo ends -->

                            <ul class="template-box__btns">
                                <li><button class="tem-btn">Edit</button></li>
                                <li><button class="tem-btn">Preview</button></li>
                                <li><button class="tem-btn">Clone</button></li>
                                <li><button class="tem-btn"><i class="fa fa-trash" aria-hidden="true"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php 
            }
            wp_reset_postdata();
        } else {
            echo "No template found!";
        }

        die();
    }

    public function clone_popup() 
    {
        $original_post_id = $_POST[ 'id' ];
        $title = get_the_title( $original_post_id ) . " Copy";
        $original_post = get_post( $original_post_id );
        $post = array(
            'post_title'    => $title,
            'post_status'   => 'publish',
            'post_type'     => $original_post->post_type,
            'post_author'   => 1
        );
        $clone_post_id = wp_insert_post( $post );
        // Copy post metadata
        $data = get_post_custom( $original_post_id );
        foreach ( $data as $key => $values ) {
            foreach ( maybe_unserialize( $values ) as $value ) {
                add_post_meta( $clone_post_id, $key, maybe_unserialize( $value ) );
            }
        }

        $folder_term = wp_get_post_terms( $original_post_id, 'popup-folder' );
        // $folder_term = get_term_by( 'ID', $original_post_id, 'popup-folder', ARRAY_A );
        wp_set_object_terms( $clone_post_id,  $folder_term[ 0 ]->term_id , 'popup-folder' );

        $template_term = wp_get_post_terms( $original_post_id, 'popup-template' );
        // $template_term = get_term_by( 'ID', $original_post_id, 'popup-template', ARRAY_A );
        wp_set_object_terms( $clone_post_id,  $template_term[ 0 ]->term_id , 'popup-template' );

        die();
    }

    public function add_selective_section() 
    {
        $target = $_REQUEST[ 'target' ];
        $option = $_REQUEST[ 'option' ];

        $arr = array( $target, $option );
        $kong_popup_render = new Kong_Popup_Render( $_REQUEST[ 'id' ] );
        $popup_meta = $kong_popup_render->get_popup_all_info();
        ?>
        <!-- .pt-image-field_size starts -->
        <div class="pt-image-field_size clearfix" id="<?php echo $target; ?>">
            <!-- .pt-image-field_left starts -->
            <div class="pt-image-field_left">
                <!-- .pt-field starts -->
                <div class="pt-field">
                    <label id="cnt-<?php echo $target; ?>"><?php echo __( 'Width', 'kong-popup' ); ?></label>
                    <!-- #cnt-<?php echo $target; ?>-option starts -->
                    <div id="cnt-<?php echo $target; ?>-option">
                        <input type="text" name="p2_width_value_<?php echo $target . '_' . $option; ?>_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_width_value_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_width_value_' . $target . '_' . $option . '_1' ]; ?>" />

                        <!-- .select-option starts -->
                        <select name="p2_width_unit_<?php echo $target . '_' . $option; ?>_1" class="select-option">
                            <option value="">-</option>
                            <option value="px" <?php if ( isset( $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                            <option value="%" <?php if ( isset( $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                            <option value="vh" <?php if ( isset( $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_width_unit_' . $target . '_' . $option . '_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                        </select>
                        <!-- .select-option ends -->
                    </div>
                    <!-- #cnt-<?php echo $target; ?>-option ends -->
                </div>
                <!-- .pt-field ends -->

                <!-- .pt-field starts -->
                <div class="pt-field">
                    <label id="cnt-<?php echo $target; ?>"><?php echo __( 'Height', 'kong-popup' ); ?></label>
                    <!-- #cnt-<?php echo $target; ?>-option starts -->
                    <div id="cnt-<?php echo $target; ?>-option">
                        <input type="text" name="p2_height_value_<?php echo $target . '_' . $option; ?>_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_height_value_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_height_value_' . $target . '_' . $option . '_1' ]; ?>" />

                        <!-- .select-option starts -->
                        <select name="p2_height_unit_<?php echo $target . '_' . $option; ?>_1" class="select-option">
                            <option value="">-</option>
                            <option value="px" <?php if ( isset( $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                            <option value="%" <?php if ( isset( $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                            <option value="vh" <?php if ( isset( $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_height_unit_' . $target . '_' . $option . '_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                        </select>
                        <!-- .select-option ends -->
                    </div>
                    <!-- #cnt-<?php echo $target; ?>-option ends -->
                </div>
                <!-- .pt-field ends -->

                <!-- .pt-field starts -->
                <div class="pt-field">
                    <label id="cnt-<?php echo $target; ?>"><?php echo __( 'Overflow', 'kong-popup' ); ?></label>

                    <!-- #cnt-<?php echo $target; ?>-option starts -->
                    <div id="cnt-<?php echo $target; ?>-option">
                        <input type="text" name="p2_overflow_value_<?php echo $target . '_' . $option; ?>_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_overflow_value_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_overflow_value_' . $target . '_' . $option . '_1' ]; ?>" />

                        <!-- .select-option starts -->
                        <select name="p2_overflow_unit_<?php echo $target . '_' . $option; ?>_1" class="select-option">
                            <option value="">-</option>
                            <option value="auto" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_overflow_unit_' . $target . '_' . $option . '_1' ] == "auto" ) echo "selected='selected'"; ?>><?php echo __( 'auto', 'kong-popup' ); ?></option>
                            <option value="hidden" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_' . $target . '_' . $option . '_1' ] ) && $popup_meta[ 'p2_overflow_unit_' . $target . '_' . $option . '_1' ] == "hidden" ) echo "selected='selected'"; ?>><?php echo __( 'hidden', 'kong-popup' ); ?></option>
                        </select>
                        <!-- .select-option ends -->
                    </div>
                    <!-- #cnt-<?php echo $target; ?>-option ends -->
                </div>
                <!-- .pt-field ends -->
            </div>
            <!-- .pt-image-field_left ends -->

            <!-- .pt-image-field_right starts -->
            <div class="pt-image-field_right">
                <!-- .pt-field-padding starts -->
                <div class="pt-field-padding">
                    <!-- .pt-paddbox starts -->
                    <div class="pt-paddbox"></div>
                    <!-- .pt-paddbox ends -->
                    <input class="pt-input-top" type="" name="p2_top_padding_<?php echo $target . '_' . $option; ?>_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_top_padding_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_top_padding_' . $target . '_' . $option . '_1' ]; ?>" />
                    <input class="pt-input-right" type="" name="p2_right_padding_<?php echo $target . '_' . $option; ?>_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_right_padding_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_right_padding_' . $target . '_' . $option . '_1' ]; ?>" />
                    <input class="pt-input-bottom" type="" name="p2_bottom_padding_<?php echo $target . '_' . $option; ?>_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_bottom_padding_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_bottom_padding_' . $target . '_' . $option . '_1' ]; ?>" />
                    <input class="pt-input-left" type="" name="p2_left_padding_<?php echo $target . '_' . $option; ?>_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_left_padding_' . $target . '_' . $option . '_1' ] ) ) echo $popup_meta[ 'p2_left_padding_' . $target . '_' . $option . '_1' ]; ?>" />
                </div>
                <!-- .pt-field-padding ends -->
            </div>
            <!-- .pt-image-field_right ends -->
        </div>
        <!-- .pt-image-field_size ends -->
        <?php
        die();
    }
}