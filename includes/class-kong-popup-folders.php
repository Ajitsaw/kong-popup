<?php

class Kong_Popup_Folders
{

    public function __construct()
    {
        
    }

    public function create_folder() {
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
        echo $term[ 'term_id' ];
        
        die();
    }

}