<!-- .create-popup-section starts -->
<div class="wrap create-popup-section kg_primary_bg_color">
    <!-- .kong-container starts -->
    <div class="kong-container">
        <!-- .popup-building-block starts -->
        <div class="popup-building-block">
            <!-- .create-popup starts -->
			<div class="create-popup" id="create-popup-form">
			    <!-- .top-subscribe-image starts -->
			    <div class="top-subscribe-image" id="top-subscribe-image">
			        <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/blank.png'; ?>" alt="Popup Image">
			    </div>
			    <!-- .top-subscribe-image ends -->

			    <!-- .popup-building starts -->
			    <div class="popup-building">
			    <!-- <div class="popup-building"> -->
			        <h2><?php echo __( 'What Do You Want To Call Your Popup?', 'kong-popup' ); ?></h2>
			        <form>
			            <input type="text" name="project_name" id="project-name" placeholder="Project Name">
            			<span class="error-message" id="pn-error-message"></span> 

			            <!-- .project-folder starts -->
			            <select name="project_folder" class="project-folder" id="project-folder">
			                <option value=""><?php echo __( 'Select a Folder', 'kong-popup' ); ?></option>
			                <?php
			                // get all items which belongs to popup-folder category
			                $popup_folder_categories = get_terms( 
			                	array(
			                		'taxonomy'      => 'popup-folder',
			                		'hide_empty'    => false,
			                	) 
			                );
			                // if popup_folder_categories exists
			                if ( $popup_folder_categories ) {
			                    foreach ( $popup_folder_categories as $popup_folder_category ) {
			                        ?>
			                        <option value="<?php echo $popup_folder_category->slug; ?>"><?php echo __( $popup_folder_category->name, 'kong-popup' ); ?></option>
			                        <?php
			                    }
			                }
			                ?>
			            </select>
			            <!-- .project-folder ends -->
            			<span class="error-message" id="pf-error-message"></span> 

			            <!-- .project-template starts -->
			            <select name="project_template" class="project-template" id="project-template">
			                <option value=""><?php echo __( 'Select a Category', 'kong-popup' ); ?></option>
			                <?php
			                // get all items which belongs to popup-template category
			                $popup_template_categories = get_terms( 
			                	array(
			                		'taxonomy'      => 'popup-template',
			                		'hide_empty'    => false,
			                	) 
			                );
			                // if popup_template_categories exists
			                if ( $popup_template_categories ) {
			                    foreach ( $popup_template_categories as $popup_template_category ) {
			                        ?>
			                        <option value="<?php echo $popup_template_category->slug; ?>"><?php echo __( $popup_template_category->name, 'kong-popup' ); ?></option>
			                        <?php
			                    }
			                }
			                ?>
			            </select>
			            <!-- .project-template ends -->
            			<span class="error-message" id="pt-error-message"></span> 

			            <!-- .btn-group starts -->
			            <div class="btn-group">
			                <button class="kg_secondary_bg btn" id="create-popup">
			                    <?php echo __( 'Start Building!', 'kong-popup' ); ?>
			                </button>
			            </div>
			            <!-- .btn-group ends -->
			        </form>
			    </div>
			    <!-- .popup-building ends -->
			</div>
			<!-- .create-popup ends -->
        </div>
        <!-- .popup-building-block ends -->
    </div>
    <!-- .kong-container ends -->
</div>
<!-- .create-popup-section ends -->

<script>
    var popupData = {};
</script>