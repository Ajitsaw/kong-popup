<!-- .create-folder-section starts -->
<div class="wrap create-folder-section kg_primary_bg_color">
    <!-- .kong-container-create-folder starts -->
    <div class="kong-container-create-folder create-folder">
        <!-- .project-title starts -->
        <div class="project-title project-title--folder">
            <span><?php echo __( 'Create A Folder', 'kong-popup' ); ?></span> 
            <input type="text" id="folder-name" placeholder="Folder Name" required /> 
            <span class="error-message" id="fn-error-message"></span> 
            <button class="kg_secondary_bg btn" id="create-folder"><?php echo __( 'Create', 'kong-popup' ); ?></button>
        </div>
        <!-- .project-title ends -->

        <!-- .folders-container starts -->
        <div class="folders-container">
            <!-- .folders starts -->
            <ul class="folders clearfix">
            <?php 
            // get all items which belongs to popup-folder category
            $popup_folder_categories = get_terms( 
                array(
                    'taxonomy'      => 'popup-folder',
                    'hide_empty'    => false
                )
            );
            // if popup_folder_categories exists
            if ( count( $popup_folder_categories ) ) {
                foreach ( $popup_folder_categories as $popup_folder_category ) {
                    ?>
                    <!-- .folder-item starts -->
                    <li class="folder-item">
                        <a href="<?php echo admin_url( 'admin.php' ) . '?page=popups-under-folder&folder=' . $popup_folder_category->slug; ?>">
                            <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/folder-icon.png'; ?>" alt="folder" />
                            
                            <span class="folder-name">
                                <?php echo __( $popup_folder_category->name, 'kong-popup' ); ?>
                            </span>
                        </a>
                    </li>
                    <!-- .folder-item ends -->
                    <?php
                }
            }
            ?>
            </ul>
            <!-- .folders ends -->
        </div>
        <!-- .folders-container ends -->
    </div>
    <!-- .kong-container-create-folder ends -->
</div>
<!-- .create-folder-section ends -->

<script>
    var popupData = {};
    <?php
    if ( isset( $_REQUEST[ 'id' ] ) && $_REQUEST[ 'id' ] > 0 ) {
        ?>
        popupData.popup_id = <?php echo $_REQUEST[ 'id' ]; ?>;
        <?php 
        foreach ( $popup_meta as $key => $value ) {
            if ( is_array( $value ) ) {
                if ( $key != "publish_popup_date" ) {
                    ?>
                    popupData.<?php echo $key; ?> =  [<?php echo '"' . implode( '","',  $value ) . '"' ?>];
                    <?php 
                }
            } else { 
                ?>
                popupData.<?php echo $key; ?> = '<?php echo trim( $value ); ?>';
                <?php 
            }
        }
    }
    ?>
</script>