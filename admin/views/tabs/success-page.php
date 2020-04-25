<!-- .popup-tab-content starts -->
<div class="popup-tab-content success-page">
    <!-- .left-panel starts -->
    <div class="w-50 left-panel">
        <!-- .form-wrap starts -->
        <div class="form-wrap">
            <!-- .form-bar starts -->
            <div class="form-bar">
                <label><?php echo __( 'Description', 'kong-popup' ); ?></label>
                <textarea name="success_message" class="description" placeholder="You have successfully subscribed."></textarea>

                <label><?php echo __( 'Final action', 'kong-popup' ); ?></label>
                <!-- .final-action starts -->
                <div class="final-action">
                    <!-- .radio starts -->
                    <div class="radio">
                        <input id="radio-1" value="none" name="success_action" type="radio" class="bg_radio_color" <?php if ( trim( $popup_meta[ 'success_action' ] ) == 'none' ) echo 'checked'; ?> />
                        <label  for="radio-1" class="radio-label"><?php echo __( 'none', 'kong-popup' ); ?></label>
                    </div>
                    <!-- .radio ends -->

                    <!-- .radio starts -->
                    <div class="radio">
                        <input id="radio-2" value="close" name="success_action" type="radio" class="bg_radio_color" <?php if ( trim( $popup_meta[ 'success_action' ] ) == 'close' ) echo 'checked'; ?> />
                        <label  for="radio-2" class="radio-label"><?php echo __( 'close widget', 'kong-popup' ); ?></label>
                    </div>
                    <!-- .radio ends -->

                    <!-- .radio starts -->
                    <div class="radio">
                        <input id="radio-3" value="redirect" name="success_action" type="radio" class="bg_radio_color" <?php if ( trim( $popup_meta[ 'success_action' ] ) == 'redirect' ) echo 'checked'; ?> />
                        <label  for="radio-3" class="radio-label"><?php echo __( 'redirect to URL', 'kong-popup' ); ?></label>
                    </div>
                    <!-- .radio ends -->
                </div>
                <!-- .final-action ends -->

                <!-- .redirect-url starts -->
                <div class="redirect-url">
                    <input type="text" value="<?php if ( isset( $popup_meta[ 'success_redirect_url' ] ) ) echo $popup_meta[ 'success_redirect_url' ]; ?>" name="success_redirect_url" class="success-redirect-url" id="success-redirect-url" placeholder="Redirect URL" />
                    <button type="button" class="url-test" id="url-test" disabled>
                        <?php echo __( 'Test', 'kong-popup' ); ?>
                    </button>
                </div>
                <!-- .redirect-url ends -->
            </div>
            <!-- .form-bar ends -->
        </div>
        <!-- .form-wrap ends -->
    </div>
    <!-- .left-panel ends -->

    <!-- .right-panel starts -->
    <div class="w-50 right-panel">
        <!-- .preview-wrap starts -->
        <div class="preview-wrap">
            <!-- .preview-frame starts -->
            <iframe class="frame preview-frame" src="<?php echo admin_url( 'admin-ajax.php' ) . '?action=preview&popup_id=' . $_REQUEST[ 'id' ]; ?>"></iframe>
            <!-- .preview-frame ends -->
        </div>
        <!-- .preview-wrap ends -->

        <!-- .preview-viewport starts -->
        <div class="preview-viewport">
            <!-- .frame starts -->
            <a class="frame" target="_blank" href="<?php echo admin_url( 'admin-ajax.php' ) . '?action=preview&popup_id=' . $_REQUEST[ 'id' ]; ?>" >
                <?php echo __( 'Full-size preview', 'kong-popup' ); ?>
            </a>
            <!-- .frame ends -->
        </div>
        <!-- .preview-viewport ends -->
    </div>
    <!-- .right-panel ends -->
    
    <!-- .btn-group starts -->
    <div class="btn-group clearfix">
        <button class="save-popup kg_secondary_bg btn">
            <?php echo __( 'Save', 'kong-popup' ); ?>
        </button>
        
        <button class="cancel-popup kg_secondary_bg btn">
            <?php echo __( 'Cancel', 'kong-popup' ); ?>
        </button>
    </div>
    <!-- .btn-group ends -->
</div>
<!-- .popup-tab-content ends -->