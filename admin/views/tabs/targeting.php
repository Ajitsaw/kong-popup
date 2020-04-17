<!-- .popup-tab-content starts -->
<div class="popup-tab-content targeting">
  <!-- .no-panel starts -->
  <div class="w-100 no-panel">
    <!-- .widget-appear starts -->
    <div class="widget-appear">
      <h4><?php echo __( 'Where should this widget appear?', 'kong-popup' ); ?></h4>
      <!-- .appear-row starts -->
      <div class="appear-row">
        <!-- .addition-block starts -->
        <div class="targeting-block">
          <!-- .addition-block-inner starts -->
          <div class="addition-block-inner targeting-tab">
          <?php
          if ( isset( $popup_meta[ 'display_in' ] ) && is_array( $popup_meta[ 'display_in' ] ) ) {
            $step = 1;
            foreach ( $popup_meta[ 'display_in' ] as $display_in ) {
              ?>
              <!-- .display-in starts -->
              <div class="display-in" id="display-in-<?php echo $step; ?>">
                <!-- .show-on-dropdown starts -->
                <div class="show-on-dropdown" id="show-on-<?php echo $step; ?>">
                  <select name="" id="">
                    <option><?php echo __( 'Show on', 'kong-popup' ); ?></option>
                  </select>
                </div>
                <!-- .show-on-dropdown ends -->

                <!-- .show-on-block starts -->
                <div class="show-on-block">
                  <input class="url-field" name="display_in" type="text" value="<?php echo $display_in; ?>" placeholder="*" id="field-<?php echo $step; ?>" data-param="display-in" data-index="<?php echo ( $step - 1 ); ?>" />
                  <input type="button" value="-" class="remove-btn" id="remove-btn-<?php echo $step; ?>" data-id="<?php echo $step; ?>" />
                </div>
                <!-- .show-on-block ends -->
              </div>
              <!-- .display-in ends -->
              <?php
              $step++;
            }
          } else {
            ?>
            <!-- .display-in starts -->
            <div class="display-in" id="display-in-1">
              <!-- .show-on-dropdown starts -->
              <div class="show-on-dropdown" id="show-on-1">
                <select name="" id="">
                  <option><?php echo __( 'Show on', 'kong-popup' ); ?></option>
                </select>
              </div>
              <!-- .show-on-dropdown ends -->

              <!-- .show-on-block starts -->
              <div class="show-on-block">
                <input class="url-field" name="display_in" type="text" value="<?php if ( isset( $popup_meta[ 'display_in' ] ) ) echo $popup_meta[ 'display_in' ]; ?>" placeholder="*" id="field-1" data-param="display-in" data-index="0" />
                <input type="button" value="-" class="remove-btn hide-btn" id="remove-btn-1" data-id="1" />
              </div>
              <!-- .show-on-block ends -->
            </div>
            <!-- .display-in ends -->
            <?php
          }
          ?>
          </div>
          <!-- .addition-block-inner ends -->
        </div>
        <!-- .addition-block ends -->
      </div>
      <!-- .appear-row ends -->

      <!-- .add-expression starts -->
      <p class="add-expression" id="add-expression">
        <a href="javaScript:void(0);">
          <?php echo __( ' + Add expression', 'kong-popup' ); ?>
        </a>
      </p>
      <!-- .add-expression ends -->
    </div>
    <!-- .widget-appear ends -->

    <!-- .widget-parameter starts -->
    <div class="widget-parameter">
      <h4><?php echo __( 'Who should see this widget?', 'kong-popup' ); ?></h4>
      <!-- .radio starts -->
      <div class="radio">
        <input id="radio-1" class="target-for-whom bg_radio_color" name="target_for_whom" type="radio" value="all" <?php if ( trim( $popup_meta[ 'target_for_whom' ] ) == "all" ) echo "checked='checked'"; ?> />
        <label for="radio-1" class="radio-label"><?php echo __( 'all visitors', 'kong-popup' ); ?></label>
      </div>
      <!-- .radio ends -->

      <!-- .radio starts -->
      <div class="radio">
        <input id="radio-2" class="target-for-whom bg_radio_color" name="target_for_whom" type="radio" value="specific" <?php if ( trim( $popup_meta[ 'target_for_whom' ] ) == "specific" ) echo "checked='checked'"; ?> />
        <label  for="radio-2" class="radio-label"><?php echo __( 'visitors who meet the conditions below', 'kong-popup' ); ?></label>
      </div>
      <!-- .radio ends -->

      <!-- .parameter-list starts -->
      <div class="parameter-list conditional-block<?php if ( trim( $popup_meta[ 'target_for_whom' ] ) == 'all' ) echo ' hide-parameter-list'; ?>" id="hide-parameter-list">
        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude visitors', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="visitor" value="Returning" type="checkbox" id="returning" <?php if ( isset( $popup_meta[ 'visitor' ][ 0 ] ) == "Returning" ) echo "checked='checked'"; ?>>
            <label for="returning"><?php echo __( 'Returning who have viewed', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .site-pages starts -->
          <select class="site-pages select-option" name="site_pages" id="site-pages">
            <option value="2" <?php if ( $popup_meta[ 'site_pages' ] == 2 ) echo "selected='selected'"; ?>>2</option>
            <option value="3" <?php if ( $popup_meta[ 'site_pages' ] == 3 ) echo "selected='selected'"; ?>>3</option>
            <option value="4" <?php if ( $popup_meta[ 'site_pages' ] == 4 ) echo "selected='selected'"; ?>>4</option>
          </select>
          <!-- .site-pages ends -->
          <label><?php echo __( 'pages on your site', 'kong-popup' ); ?></label>
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude browsers', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Chrome" type="checkbox" id="Chrome" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Chrome", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="Chrome"><?php echo __( 'Chrome', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Firefox" type="checkbox" id="firefox" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Firefox", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="firefox"><?php echo __( 'Firefox', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Internet Explorer" type="checkbox" id="internet" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Internet Explorer", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="internet"><?php echo __( 'Internet Explorer', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Safari" type="checkbox" id="safari" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Safari", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="safari"><?php echo __( 'Safari', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Opera" type="checkbox" id="opera" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Opera", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="opera"><?php echo __( 'Opera', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input name="browser" value="Other" type="checkbox" id="other-browser" <?php if ( isset( $popup_meta[ 'browser' ] ) && in_array( "Other", $popup_meta[ 'browser' ] ) ) echo "checked='checked'"; ?>/>
            <label for="other-browser"><?php echo __( 'Other', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude OS', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="Windows" id="Windows" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "Windows", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="Windows"><?php echo __( 'Windows', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="Linux" id="linux" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "Linux", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="linux"><?php echo __( 'Linux/Unix', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="Mac OS X" id="mac" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "Mac OS X", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="mac"><?php echo __( 'Mac OS', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="iOS" id="ios" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "iOS", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="ios"><?php echo __( 'iOS', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="Android" id="android" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "Android", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="android"><?php echo __( 'Android', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="os" value="Other" id="other-os" <?php if ( isset( $popup_meta[ 'os' ] ) && in_array( "Other", $popup_meta[ 'os' ] ) ) echo "checked='checked'"; ?>/>
            <label for="other-os"><?php echo __( 'Other', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude devices', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="device" value="Desktop" id="desktop" <?php if ( isset( $popup_meta[ 'device' ] ) && in_array( "Desktop", $popup_meta[ 'device' ] ) ) echo "checked='checked'"; ?>/>
            <label for="desktop"><?php echo __( 'Desktop', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="device" value="Tablet" id="tablet" <?php if ( isset( $popup_meta[ 'device' ] ) && in_array( "Tablet", $popup_meta[ 'device' ] ) ) echo "checked='checked'"; ?>/>
            <label for="tablet"><?php echo __( 'Tablet', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="device" value="Mobile" id="mobile" <?php if ( isset( $popup_meta[ 'device' ] ) && in_array( "Mobile", $popup_meta[ 'device' ] ) ) echo "checked='checked'"; ?>/>
            <label for="mobile"><?php echo __( 'Mobile', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group">
            <input type="checkbox" name="device" value="Other" id="other-device" <?php if ( isset( $popup_meta[ 'device' ] ) && in_array( "Other", $popup_meta[ 'device' ] ) ) echo "checked='checked'"; ?>/>
            <label for="other-device"><?php echo __( 'Other', 'kong-popup' ); ?></label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude referrers', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <span>
            <input type="text" name="referrer_url" class="referrer-url" value="<?php if ( isset( $popup_meta[ 'referrer_url' ] ) ) echo $popup_meta[ 'referrer_url' ]; ?>" placeholder="Type referrer URL">
          </span>

          <!-- .template-select starts -->
          <select class="template-select" name="" id="">
            <option><?php echo __( 'Templates', 'kong-popup' ); ?></option>
            <option><?php echo __( 'Templates', 'kong-popup' ); ?></option>
          </select>
          <!-- .template-select ends -->
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude UTM tags', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <span>
            <input type="text" name="utm_tag" class="input-block" value="<?php if ( isset( $popup_meta[ 'utm_tag' ] ) ) echo $popup_meta[ 'utm_tag' ]; ?>" placeholder="Type UTM value">
          </span>
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude IP addresses', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <span>
            <input type="text" name="ip_address" class="input-block" value="<?php if ( isset( $popup_meta[ 'ip_address' ] ) ) echo $popup_meta[ 'ip_address' ]; ?>" placeholder="Type IP address" />
          </span>
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude locations', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <span>
            <input type="text" name="location" class="input-block" value="<?php if ( isset( $popup_meta[ 'location' ] ) ) echo $popup_meta[ 'location' ]; ?>" placeholder="Type location" />
          </span>
        </div>
        <!-- .parameter-row ends -->

        <!-- .parameter-row starts -->
        <div class="parameter-row">
          <!-- .exclude-list starts -->
          <select class="exclude-list" name="" id="">
            <option><?php echo __( 'Exclude languages', 'kong-popup' ); ?></option>
          </select>
          <!-- .exclude-list ends -->

          <span>
            <input type="text" name="language" class="input-block" value="<?php if ( isset( $popup_meta[ 'language' ] ) ) echo $popup_meta[ 'language' ]; ?>" placeholder="Type language">
          </span>
        </div>
        <!-- .parameter-row ends -->

        <!-- .show-visitor starts -->
        <div class="show-visitor">
          <?php echo __( 'Show to', 'kong-popup' ); ?>
          <select name="select_visitor" class="select-visitor" id="select-visitor">
            <option value="100%">100%</option>
            <option value="50%">50%</option>
            <option value="25%">25%</option>
          </select> 
          <?php echo __( 'of selected visitors', 'kong-popup' ); ?>
        </div>
        <!-- .show-visitor ends -->
      </div>
      <!-- .parameter-list ends -->

      <!-- .btn-group starts -->
      <div class="btn-group">
        <button class="btn-publish-popup kg_secondary_bg btn" id="publish-popup">
          <?php echo __( 'Publish', 'kong-popup' ); ?>
        </button>

        <button class="kg_secondary_bg btn">
          <?php echo __( 'Cancel', 'kong-popup' ); ?>
        </button>
      </div>
      <!-- .btn-group ends -->
    </div>
    <!-- .widget-parameter ends -->
  </div>
  <!-- .no-panel ends -->
</div>
<!-- .popup-tab-content ends