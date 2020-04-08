<!-- .popup-tab-content starts -->
<div class="popup-tab-content behavior-tab">
  <!-- .no-panel starts -->
  <div class="w-100 no-panel">
    <!-- .widget-block starts -->
    <div class="widget-block">
      <!-- .widget-parameter starts -->
      <div class="widget-parameter widget-parameter--behavior">
        <h4><?php echo __( 'Start to display the widget', 'kong-popup' ); ?></h4>
        <!-- .radio starts -->
        <div class="radio">
          <input id="start-to-display-once" name="start_to_display" type="radio" value="once" <?php if ( trim( $popup_meta[ 'start_to_display' ] ) == "once" ) echo "checked='checked'"; ?> />
          <label for="start-to-display-once" class="radio-label">
            <?php echo __( 'at once', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->

        <!-- .radio starts -->
        <div class="radio">
          <input id="start-to-display-condition" name="start_to_display" type="radio" value="condition" <?php if( trim( $popup_meta[ 'start_to_display' ] ) == "condition" ) echo "checked='checked'"; ?> />
          <label for="start-to-display-condition" class="radio-label">
            <?php echo __( 'under the following conditions', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->

        <!-- .select-group starts -->
        <div class="select-group conditional-block<?php //if ( trim( $popup_meta[ 'start_to_display' ] ) == 'once' || trim( $popup_meta[ 'start_to_display' ] ) == 'programmatically' ) echo ' hide-parameter-list'; ?>">
          <!-- .form-group starts -->
          <div class="form-group behavior">
            <input type="radio" name="start_to_display_option" id="start-to-display-option" value="is-leaving" <?php if ( trim( $popup_meta[ 'start_to_display_option' ] ) == "is-leaving" ) echo "checked='checked'"; ?> />
            <label for="start-to-display-option">
              <?php echo __( 'when the user is leaving the website', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group behavior">
            <input type="radio" name="start_to_display_option" id="start-to-display-option" value="when-reach" <?php if ( trim( $popup_meta[ 'start_to_display_option' ] ) == "when-reach" ) echo "checked='checked'"; ?> />
            <label for="start-to-display-option">
              <?php echo __( 'when the user reaches', 'kong-popup' ); ?> 
              <!-- .select-option starts -->
              <select name="when_reach_percentage" class="when-reach-percentage-option select-option" id="when-reach-percentage-option" <?php if ( trim( $popup_meta[ 'start_to_display_option' ] ) != "when-reach" ) echo "disabled='disabled'"; ?>>
                <option value="25%" <?php if ( $popup_meta[ 'when_reach_percentage' ] == "25%" ) echo "selected='selected'"; ?>>25%</option>
                <option value="50%" <?php if ( $popup_meta[ 'when_reach_percentage' ] == "50%" ) echo "selected='selected'"; ?>>50%</option>
                <option value="75%" <?php if ( $popup_meta[ 'when_reach_percentage' ] == "75%" ) echo "selected='selected'"; ?>>75%</option>
                <option value="100%" <?php if ( $popup_meta[ 'when_reach_percentage' ] == "100%" ) echo "selected='selected'"; ?>>100%</option>
              </select>
              <!-- .select-option ends -->
              <?php echo __( 'of the page', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group behavior">
            <input type="radio" name="start_to_display_option" id="start-to-display-option" value="after-second" <?php if ( trim( $popup_meta[ 'start_to_display_option' ] ) == "after-second" ) echo "checked='checked'"; ?> />
            <label for="start-to-display-option">
              <?php echo __( 'after', 'kong-popup' ); ?> 
              <input name="start_to_display_time_duration" class="time-duration" type="text" id="time-duration" placeholder="5" value="<?php if ( isset( $popup_meta[ 'start_to_display_time_duration' ] ) ) echo trim( $popup_meta[ 'start_to_display_time_duration' ] ); ?>" <?php if ( trim( $popup_meta[ 'start_to_display_option' ] ) != "after-second" ) echo "readonly"; ?> />
              <?php echo __( 'seconds', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .select-group ends -->
      </div>
      <!-- .widget-parameter ends -->

      <!-- .widget-parameter starts -->
      <div class="widget-parameter widget-parameter--behavior">
        <h4><?php echo __( 'Frequency', 'kong-popup' ); ?></h4>
        <!-- .radio stasrts -->
        <div class="radio">
          <input id="frequency-every" name="frequency" type="radio" value="every" <?php if ( trim( $popup_meta[ 'frequency' ] ) == "every" ) echo "checked='checked'"; ?> />
          <label for="frequency-every" class="radio-label">
            <?php echo __( 'on every page view', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->

        <!-- .radio starts -->
        <div class="radio">
          <input id="frequency-condition" name="frequency" type="radio" value="condition" <?php if ( trim( $popup_meta[ 'frequency' ] ) == "condition" ) echo "checked='checked'"; ?> />
          <label for="frequency-condition" class="radio-label"><?php echo __( 'not more than once every', 'kong-popup' ); ?>
            <input class="time-schedule" type="text" name="frequency_time_schedule" placeholder="5" value="<?php if ( isset( $popup_meta[ 'frequency_time_schedule' ] ) ) echo $popup_meta[ 'frequency_time_schedule' ]; ?>" />

            <!-- .select-option starts -->
            <select name="frequency_time_schedule_option" class="select-option" id="time-schedule-option">
              <option value="days" <?php if ( $popup_meta[ 'frequency_time_schedule_option' ] == "days" ) echo "selected='selected'"; ?>><?php echo __( 'day(s)', 'kong-popup' ); ?></option>
              <option value="weeks" <?php if ( $popup_meta[ 'frequency_time_schedule_option' ] == "weeks" ) echo "selected='selected'"; ?>><?php echo __( 'week(s)', 'kong-popup' ); ?></option>
              <option value="months" <?php if ( $popup_meta[ 'frequency_time_schedule_option' ] == "months" ) echo "selected='selected'"; ?>><?php echo __( 'month(s)', 'kong-popup' ); ?></option>
              <option value="years" <?php if ( $popup_meta[ 'frequency_time_schedule_option' ] == "years" ) echo "selected='selected'"; ?>><?php echo __( 'year(s)', 'kong-popup' ); ?></option>
            </select>
            <!-- .select-option ends -->
            <?php echo __( 'per user', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->
      </div>
      <!-- .widget-parameter ends -->

      <!-- .widget-parameter starts --> 
      <div class="widget-parameter widget-parameter--behavior">
        <h4><?php echo __( 'Stop to display the widget', 'kong-popup' ); ?></h4>
        <!-- .radio starts -->
        <div class="radio">
          <input id="stop-to-display-never" name="stop_to_display" type="radio" value="never" <?php if ( trim( $popup_meta[ 'stop_to_display' ] ) == "never" ) echo "checked='checked'"; ?> />
          <label for="stop-to-display-never" class="radio-label">
            <?php echo __( 'never', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->

        <!-- .radio starts -->
        <div class="radio">
          <input id="stop-to-display-condition" name="stop_to_display" type="radio" value="condition" <?php if ( trim( $popup_meta[ 'stop_to_display' ] ) == "condition" ) echo "checked='checked'"; ?> />
          <label for="stop-to-display-condition" class="radio-label">
            <?php echo __( 'under the following conditions', 'kong-popup' ); ?>
          </label>
        </div>
        <!-- .radio ends -->

        <!-- .select-group starts -->
        <div class="select-group">
          <!-- .form-group starts -->
          <div class="form-group behavior">
            <input type="radio" name="stop_to_display_condition_option" id="stop-to-display-condition-option-performs" value="performs" <?php if( trim( $popup_meta[ 'stop_to_display_condition_option' ] ) == "performs" ) echo "checked='checked'"; ?> />
            <label for="stop-to-display-condition-option-performs">
              <?php echo __( 'after the user performs the action', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->

          <!-- .form-group starts -->
          <div class="form-group behavior">
            <input type="radio" name="stop_to_display_condition_option" id="stop-to-display-condition-option-condition" value="condition" <?php if( trim( $popup_meta[ 'stop_to_display_condition_option' ] ) == "condition" ) echo "checked='checked'"; ?> />
            <label for="stop-to-display-condition-option-condition"><?php echo __( 'after showing it', 'kong-popup' ); ?>
              <input class="time-duration" type="text" name="stop_to_display_time_duration" placeholder="3" value="<?php if ( isset( $popup_meta[ 'stop_to_display_time_duration' ] ) ) echo $popup_meta[ 'stop_to_display_time_duration' ]; ?>" />
            <?php echo __( 'times to the user', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .select-group ends -->
      </div>
      <!-- .widget-parameter ends --> 

      <!-- .date-schedule starts -->
      <div class="date-schedule">
        <!-- .widget-parameter starts -->
        <div class="widget-parameter widget-parameter--behavior">
          <h4><?php echo __( 'Date', 'kong-popup' ); ?></h4>
          <!-- .form-group starts -->
          <div class="form-group behavior">
            <!-- .option-checkbox starts -->
            <input type="checkbox" name="is_date_start" class="option-checkbox" id="date-start" <?php if ( isset( $popup_meta[ 'is_date_start' ] ) ) echo "checked='checked'"; ?> />
            <label for="date-start"><?php echo __( 'start on', 'kong-popup' ); ?>
              <input class="time-duration width--120" type="text" name="start_on" id="date-start-field" placeholder="<?php echo date( 'M d,yy' ); ?>" value="<?php if ( isset( $popup_meta[ 'start_on' ] ) ) echo $popup_meta[ 'start_on' ]; ?>" <?php if ( isset( $popup_meta[ 'is_date_start' ] ) && trim( $popup_meta[ 'is_date_start' ] ) != "on" ) echo "disabled='disabled'"; ?> />
            </label>
            <!-- .option-checkbox ends -->

            <!-- .option-checkbox starts -->
            <input type="checkbox" name="is_date_stop" class="option-checkbox" id="date-stop" <?php if ( isset( $popup_meta[ 'is_date_stop' ] ) ) echo "checked='checked'"; ?> />
            <label for="date-stop"><?php echo __( 'stop on', 'kong-popup' ); ?>
              <input class="time-duration width--120" type="text" name="stop_on" id="date-stop-field" placeholder="<?php echo date( 'M d,yy' ); ?>" value="<?php if ( isset( $popup_meta[ 'stop_on' ] ) ) echo $popup_meta[ 'stop_on' ]; ?>" <?php if ( isset( $popup_meta[ 'is_date_stop' ] ) && trim( $popup_meta[ 'is_date_stop' ] ) != "on" ) echo "disabled='disabled'"; ?> />
            </label>
            <!-- .option-checkbox ends -->
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .widget-parameter ends -->

        <!-- .widget-parameter starts -->
        <div class="widget-parameter widget-parameter--behavior">
          <h4><?php echo __( 'Time', 'kong-popup' ); ?></h4>
          <!-- .form-group starts -->
          <div class="form-group behavior">
            <!-- .option-checkbox starts -->
            <input type="checkbox" name="is_time_from" class="option-checkbox" id="time-from" <?php if ( isset( $popup_meta[ 'is_time_from' ] ) && $popup_meta[ 'is_time_from' ] ) echo "checked='checked'"; ?> />
            <label for="time-from"><?php echo __( 'from', 'kong-popup' ); ?>
              <input class="time-duration width--120" type="text" name="time_from" id="time-from-field" placeholder="23:55" value="<?php if ( isset( $popup_meta[ 'time_from' ] ) ) echo $popup_meta[ 'time_from' ]; ?>" <?php if ( isset( $popup_meta[ 'is_time_from' ] ) && trim( $popup_meta[ 'is_time_from' ] ) != "on" ) echo "disabled='disabled'"; ?> />
            </label> 
            <!-- .option-checkbox ends -->

            <!-- .option-checkbox starts -->
            <input type="checkbox" name="is_time_to" class="option-checkbox" id="time-to" <?php if ( isset( $popup_meta[ 'is_time_to' ] ) && $popup_meta[ 'is_time_to' ] ) echo "checked='checked'"; ?> />
            <label for="time-to"><?php echo __( 'to', 'kong-popup' ); ?>
              <input class="time-duration width--120" type="text" name="time_to" id="time-to-field" placeholder="23:55" value="<?php if ( isset( $popup_meta[ 'time_to' ] ) ) echo $popup_meta[ 'time_to' ]; ?>" <?php if ( isset( $popup_meta[ 'is_time_to' ] ) && trim( $popup_meta[ 'is_time_to' ] ) != "on" ) echo "disabled='disabled'"; ?> />
            </label> 
            <!-- .option-checkbox ends -->

            <?php echo __( 'time zone', 'kong-popup' ); ?>
            <!-- .select-option starts -->
            <select name="timezone" class="timezone select-option" id="timezone">
              <option value="" selected><?php echo __( 'Select Timezone', 'kong-popup' ); ?></option>
              <?php
              if ( trim( $popup_meta[ 'timezone' ] ) ) {
                ?>
                <option value="<?php echo $popup_meta[ 'timezone' ]; ?>" selected="selected"><?php echo $popup_meta[ 'timezone' ]; ?></option>
                <?php
              }
              ?>
            </select>
            <!-- .select-option ends -->
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .widget-parameter ends -->

        <!-- .widget-parameter starts -->
        <div class="widget-parameter widget-parameter--behavior">
          <h4><?php echo __( 'Days of the week', 'kong-popup' ); ?></h4>
          <!-- .form-group starts -->
          <div class="form-group select-days">
            <input name="days_of_week" value="Sun" type="checkbox" id="sunday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Sun", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="sunday">
              <?php echo __( 'Sun', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Mon" type="checkbox" id="monday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Mon", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="monday">
              <?php echo __( 'Mon', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Tue" type="checkbox" id="tuesday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Tue", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="tuesday">
              <?php echo __( 'Tue', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Wed" type="checkbox" id="wednesday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Wed", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="wednesday">
              <?php echo __( 'Wed', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Thu" type="checkbox" id="thursday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Thu", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="thursday">
              <?php echo __( 'Thu', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Fri" type="checkbox" id="friday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Fri", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="friday">
              <?php echo __( 'Fri', 'kong-popup' ); ?>
            </label>

            <input name="days_of_week" value="Sat" type="checkbox" id="saturday" <?php if ( isset( $popup_meta[ 'days_of_week' ] ) && in_array( "Sat", $popup_meta[ 'days_of_week' ] ) ) echo "checked='checked'"; ?> />
            <label for="saturday">
              <?php echo __( 'Sat', 'kong-popup' ); ?>
            </label>
          </div>
          <!-- .form-group ends -->
        </div>
        <!-- .widget-parameter ends -->
      </div>
      <!-- .date-schedule ends -->
    </div>
    <!-- .widget-block ends -->
  </div>
  <!-- .no-panel ends -->
</div>
<!-- .popup-tab-content ends -->