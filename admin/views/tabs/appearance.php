<!-- .popup-tab-content starts -->
<div class="popup-tab-content appearance" data-popup="<?php echo $_REQUEST[ 'id' ]; ?>">
    <!-- .left-panel starts -->
    <div class="w-50 left-panel">
        <!-- .form-wrap starts -->
        <div class="form-wrap">
            <span><?php echo __( 'Position', 'kong-popup' ); ?></span>
            <!-- .form-position starts -->
            <div class="form-position" id="appearance">
                <label for="appearance-center-center" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-center' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="center-center" id="appearance-center-center" data-name="position" />
                    <div class="popview-icon popview-icon__one <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-center' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-bottom-left" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-left' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="bottom-left" id="appearance-bottom-left" data-name="position" />
                    <div class="popview-icon popview-icon__two <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-left' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-bottom-right" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-right' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="bottom-right" id="appearance-bottom-right" data-name="position" />
                    <div class="popview-icon popview-icon__three <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-right' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-top-full" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'top-full' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="top-full" id="appearance-top-full" data-name="position" />
                    <div class="popview-icon popview-icon__four <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'top-full' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-bottom-full" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-full' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="bottom-full" id="appearance-bottom-full" data-name="position" />
                    <div class="popview-icon popview-icon__five <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'bottom-full' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-center-left" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-left' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="center-left" id="appearance-center-left" data-name="position" />
                    <div class="popview-icon popview-icon__six <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-left' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-center-right" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-right' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="center-right" id="appearance-center-right" data-name="position" />
                    <div class="popview-icon popview-icon__seven <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'center-right' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-baseline-left" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'baseline-left' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="baseline-left" id="appearance-baseline-left" data-name="position" />
                    <div class="popview-icon popview-icon__eight <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'baseline-left' ) echo 'kg_border_color'; ?>"></div>
                </label>

                <label for="appearance-baseline-right" class="pos-label <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'baseline-right' ) echo 'selected'; ?>">
                    <input type="radio" class="bg_radio_color" name="appearance_position" value="baseline-right" id="appearance-baseline-right" data-name="position" />
                    <div class="popview-icon popview-icon__nine <?php if ( isset( $popup_meta[ 'appearance_position' ] ) && trim( $popup_meta[ 'appearance_position' ] ) == 'baseline-right' ) echo 'kg_border_color'; ?>"></div>
                </label>
            </div>
            <!-- .form-position ends -->

            <!-- .pt-checkbox starts -->
            <div class="pt-checkbox pt-inline-field">
                <!-- .container starts -->
                <label class="container">
                    <input type="checkbox" name="add_image_appearance" class="option-checkbox kg_checkbox_color" id="option-add-image-opener-appearance" data-info="add-image" <?php if ( isset( $popup_meta[ 'add_image_appearance' ] ) == 'on' ) echo 'checked'; ?> />
                    <span class="checkmark"></span>
                    <?php echo __( 'Add image', 'kong-popup' ); ?>
                </label>
                <!-- .container ends -->
            </div>
            <!-- .pt-checkbox ends -->

            <!-- .pt-add-image-field starts -->
            <div class="pt-add-image-field add-image hide-app" <?php if ( isset( $popup_meta[ 'add_image_appearance' ] ) == 'on' ) echo 'style="display: block"'; ?>>
                <!-- .pt-add-image-field_tab starts -->
                <ul class="pt-add-image-field_tab">
                    <li class="selected" data-id="step1-desktop-size-appearance">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <?php echo __( 'Desktop', 'kong-popup' ); ?>
                    </li>

                    <li data-id="step1-mobile-size-appearance">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <?php echo __( 'Mobile', 'kong-popup' ); ?>
                    </li>
                </ul>
                <!-- .pt-add-image-field_tab ends -->

                <!-- .pt-image-field_cnt #step1-desktop-size-appearance starts -->
                <div class="pt-image-field_cnt" id="step1-desktop-size-appearance">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img bgimage-desktop">
                        <?php
                        if ( isset( $popup_meta[ 'desktop_image' ] ) && is_array( $popup_meta[ 'desktop_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'desktop_image' ] as $id ) {
                                ?>                                                                   
                                <li class="desktop-bgimage-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="desktop-bgimage-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-bgimage-button" data-param="bgimage">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-bgimage-button" id="<?php echo ( $step - 1 ); ?>" data-param="bgimage">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-bgimage-button-<?php echo $step; ?>" data-target="desktop" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="desktop_image" id="desktop-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="desktop-bgimage-item selected" id="desktop-bgimage-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-bgimage-button" data-param="bgimage">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-bgimage-button" id="0" data-param="bgimage">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-bgimage-button-1" data-target="desktop" data-index="0" />
                                <input type="hidden" name="desktop_image" id="desktop-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-bgimage" data-target="desktop" data-param="size">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-image-field_size starts -->
                    <div class="pt-image-field_size clearfix">
                        <!-- .pt-image-field_left starts -->
                        <div class="pt-image-field_left">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Width', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_width_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_width_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_width_value_desktop_1' ]; ?>" />
                                    <select name="step1_width_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_width_unit_desktop_1' ] ) && $popup_meta[ 'step1_width_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_width_unit_desktop_1' ] ) && $popup_meta[ 'step1_width_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'step1_width_unit_desktop_1' ] ) && $popup_meta[ 'step1_width_unit_desktop_1' ] == "vh" ) echo "selected='selected'"; ?>>vh</option>
                                    </select>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Height', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_height_value_desktop_1" placeholder="auto" value="<?php if ( isset( $popup_meta[ 'step1_height_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_height_value_desktop_1' ]; ?>" />
                                    <select name="step1_height_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_height_unit_desktop_1' ] ) && $popup_meta[ 'step1_height_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_height_unit_desktop_1' ] ) && $popup_meta[ 'step1_height_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'step1_height_unit_desktop_1' ] ) && $popup_meta[ 'step1_height_unit_desktop_1' ] == "vh" ) echo "selected='selected'"; ?>>vh</option>
                                    </select>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Opacity', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_opacity_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_opacity_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_opacity_value_desktop_1' ]; ?>" />
                                    <span>
                                        100%
                                    </span>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Rotate', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_rotate_value_desktop_1" placeholder="90" value="<?php if ( isset( $popup_meta[ 'step1_rotate_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_rotate_value_desktop_1' ]; ?>" />
                                    <span>
                                        <?php echo __( 'deg', 'kong-popup' ); ?>
                                    </span>
                                </div>
                            </div>
                            <!-- .pt-field ends -->
                        </div>
                        <!-- .pt-image-field_left ends -->

                        <!-- .pt-image-field_right starts -->
                        <div class="pt-image-field_right">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Left', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_left_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_left_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_left_value_desktop_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_left_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_left_unit_desktop_1' ] ) && $popup_meta[ 'step1_left_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_left_unit_desktop_1' ] ) && $popup_meta[ 'step1_left_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Right', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_right_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_right_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_right_value_desktop_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_right_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_right_unit_desktop_1' ] ) && $popup_meta[ 'step1_right_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_right_unit_desktop_1' ] ) && $popup_meta[ 'step1_right_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Top', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_top_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_top_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_top_value_desktop_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_top_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_top_unit_desktop_1' ] ) && $popup_meta[ 'step1_top_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_top_unit_desktop_1' ] ) && $popup_meta[ 'step1_top_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Bottom', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_bottom_value_desktop_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_bottom_value_desktop_1' ] ) ) echo $popup_meta[ 'step1_bottom_value_desktop_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_bottom_unit_desktop_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_bottom_unit_desktop_1' ] ) && $popup_meta[ 'step1_bottom_unit_desktop_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_bottom_unit_desktop_1' ] ) && $popup_meta[ 'step1_bottom_unit_desktop_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Flip', 'kong-popup' ); ?></label>
                                <div>
                                    <!-- .pt-flip-option starts -->
                                    <ul class="pt-flip-option">
                                        <li<?php if ( isset( $popup_meta[ 'step1_flip_value_desktop_1' ] ) && $popup_meta[ 'step1_flip_value_desktop_1' ] == "vertical" ) echo " class='selected'"; ?>>
                                            <!-- <a href="javascript:void(0);"> -->
                                                <input type="radio" class="bg_radio_color" name="step1_flip_value_desktop_1" value="vertical">
                                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip1.png'; ?>" alt="">
                                            <!-- </a> -->
                                        </li>

                                        <li<?php if ( isset( $popup_meta[ 'step1_flip_value_desktop_1' ] ) && $popup_meta[ 'step1_flip_value_desktop_1' ] == "horizontal" ) echo " class='selected'"; ?>>
                                            <!-- <a href="javascript:void(0);"> -->
                                                <input type="radio" class="bg_radio_color" name="step1_flip_value_desktop_1" value="horizontal">
                                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip2.png'; ?>" alt="">
                                            <!-- </a> -->
                                        </li>
                                    </ul>
                                    <!-- .pt-flip-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->
                        </div>
                        <!-- .pt-image-field_right ends -->
                    </div>
                    <!-- .pt-image-field_size ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-desktop-size-appearance ends -->

                <!-- .pt-image-field_cnt #step1-mobile-size-appearance starts -->
                <div class="pt-image-field_cnt" id="step1-mobile-size-appearance">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img bgimage-mobile">
                        <?php
                        if ( isset( $popup_meta[ 'mobile_image' ] ) && is_array( $popup_meta[ 'mobile_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'mobile_image' ] as $id ) {
                                ?>                                                                   
                                <li class="mobile-bgimage-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="mobile-bgimage-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-bgimage-button" data-param="bgimage">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-bgimage-button" id="<?php echo ( $step - 1 ); ?>" data-param="bgimage">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-bgimage-button-<?php echo $step; ?>" data-target="mobile" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="mobile_image" id="mobile-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="mobile-bgimage-item selected" id="mobile-bgimage-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-bgimage-button" data-param="bgimage">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-bgimage-button" id="0" data-param="bgimage">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-bgimage-button-1" data-target="mobile" data-index="0" />
                                <input type="hidden" name="mobile_image" id="mobile-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-bgimage" data-target="mobile" data-param="size">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-image-field_size starts -->
                    <div class="pt-image-field_size clearfix">
                        <!-- .pt-image-field_left starts -->
                        <div class="pt-image-field_left">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Width', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_width_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_width_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_width_value_mobile_1' ]; ?>" />
                                    <select name="step1_width_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_width_unit_mobile_1' ] ) && $popup_meta[ 'step1_width_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_width_unit_mobile_1' ] ) && $popup_meta[ 'step1_width_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'step1_width_unit_mobile_1' ] ) && $popup_meta[ 'step1_width_unit_mobile_1' ] == "vh" ) echo "selected='selected'"; ?>>vh</option>
                                    </select>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Height', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_height_value_mobile_1" placeholder="auto" value="<?php if ( isset( $popup_meta[ 'step1_height_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_height_value_mobile_1' ]; ?>" />
                                    <select name="step1_height_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_height_unit_mobile_1' ] ) && $popup_meta[ 'step1_height_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_height_unit_mobile_1' ] ) && $popup_meta[ 'step1_height_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'step1_height_unit_mobile_1' ] ) && $popup_meta[ 'step1_height_unit_mobile_1' ] == "vh" ) echo "selected='selected'"; ?>>vh</option>
                                    </select>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Opacity', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_opacity_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_opacity_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_opacity_value_mobile_1' ]; ?>" />
                                    <span>
                                        100%
                                    </span>
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Rotate', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_rotate_value_mobile_1" placeholder="90" value="<?php if ( isset( $popup_meta[ 'step1_rotate_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_rotate_value_mobile_1' ]; ?>" />
                                    <span>
                                        <?php echo __( 'deg', 'kong-popup' ); ?>
                                    </span>
                                </div>
                            </div>
                            <!-- .pt-field ends -->
                        </div>
                        <!-- .pt-image-field_left ends -->

                        <!-- .pt-image-field_right starts -->
                        <div class="pt-image-field_right">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Left', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_left_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_left_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_left_value_mobile_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_left_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_left_unit_mobile_1' ] ) && $popup_meta[ 'step1_left_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_left_unit_mobile_1' ] ) && $popup_meta[ 'step1_left_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Right', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_right_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_right_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_right_value_mobile_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_right_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_right_unit_mobile_1' ] ) && $popup_meta[ 'step1_right_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_right_unit_mobile_1' ] ) && $popup_meta[ 'step1_right_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Top', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_top_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_top_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_top_value_mobile_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_top_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_top_unit_mobile_1' ] ) && $popup_meta[ 'step1_top_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_top_unit_mobile_1' ] ) && $popup_meta[ 'step1_top_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Bottom', 'kong-popup' ); ?></label>
                                <div>
                                    <input type="text" name="step1_bottom_value_mobile_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'step1_bottom_value_mobile_1' ] ) ) echo $popup_meta[ 'step1_bottom_value_mobile_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="step1_bottom_unit_mobile_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'step1_bottom_unit_mobile_1' ] ) && $popup_meta[ 'step1_bottom_unit_mobile_1' ] == "px" ) echo "selected='selected'"; ?>>px</option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'step1_bottom_unit_mobile_1' ] ) && $popup_meta[ 'step1_bottom_unit_mobile_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label><?php echo __( 'Flip', 'kong-popup' ); ?></label>
                                <div>
                                    <!-- .pt-flip-option starts -->
                                    <ul class="pt-flip-option">
                                        <li<?php if ( isset( $popup_meta[ 'step1_flip_value_mobile_1' ] ) && $popup_meta[ 'step1_flip_value_mobile_1' ] == "vertical" ) echo " class='selected'"; ?>>
                                            <!-- <a href="javascript:void(0);"> -->
                                                <input type="radio" class="bg_radio_color" name="step1_flip_value_mobile_1" value="vertical">
                                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip1.png'; ?>" alt="">
                                            <!-- </a> -->
                                        </li>

                                        <li<?php if ( isset( $popup_meta[ 'step1_flip_value_mobile_1' ] ) && $popup_meta[ 'step1_flip_value_mobile_1' ] == "horizontal" ) echo " class='selected'"; ?>>
                                            <!-- <a href="javascript:void(0);"> -->
                                                <input type="radio" class="bg_radio_color" name="step1_flip_value_mobile_1" value="horizontal">
                                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip2.png'; ?>" alt="">
                                            <!-- </a> -->
                                        </li>
                                    </ul>
                                    <!-- .pt-flip-option ends -->
                                </div>
                            </div>
                            <!-- .pt-field ends -->
                        </div>
                        <!-- .pt-image-field_right ends -->
                    </div>
                    <!-- .pt-image-field_size ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-mobile-size-appearance ends -->
            </div>
            <!-- .pt-add-image-field ends -->

            <!-- .pt-add-image-field starts -->
            <div class="pt-add-image-field add-image hide" <?php if ( isset( $popup_meta[ 'add_image_appearance' ] ) == 'on' ) echo 'style="display: block"'; ?>>
                <!-- p starts -->
                <p>
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                    <?php echo __( 'Size and Padding', 'kong-popup' ); ?>
                </p>
                <!-- p ends -->

                <!-- .pt-add-image-field_tab starts -->
                <ul class="pt-add-image-field_tab">
                    <li class="selected" data-id="step2-desktop-size-appearance" data-step="step-2" data-target="desktop">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <?php echo __( 'Desktop', 'kong-popup' ); ?>
                    </li>

                    <li data-id="step2-mobile-size-appearance" data-step="step-2" data-target="mobile">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <?php echo __( 'Mobile', 'kong-popup' ); ?>
                    </li>
                </ul>
                <!-- .pt-add-image-field_tab ends -->

                <!-- .pt-inner-tab starts -->
                <ul class="pt-inner-tab">
                    <li id="option-popup" class="inner-option" data-id="step2-desktop-popup" data-param="desktop-popup">
                        <?php echo __( 'Popup', 'kong-popup' ); ?>
                    </li>

                    <li id="option-content" class="inner-option selected" data-id="step2-desktop-content" data-param="desktop-content">
                        <?php echo __( 'Content', 'kong-popup' ); ?>
                    </li>

                    <li id="option-wheel" class="inner-option" data-id="step2-desktop-wheel" data-param="desktop-wheel">
                        <?php echo __( 'Wheel', 'kong-popup' ); ?>
                    </li>
                </ul>
                <!-- .pt-inner-tab ends -->

                <!-- .pt-add-image-field #step2-desktop-size-appearance starts -->
                <div class="pt-image-field_cnt" id="step2-desktop-size-appearance">
                    <!-- .pt-image-field_size starts -->
                    <div class="pt-image-field_size clearfix" id="step2-desktop">
                        <!-- .pt-image-field_left starts -->
                        <div class="pt-image-field_left">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-desktop"><?php echo __( 'Width', 'kong-popup' ); ?></label>
                                <!-- #cnt-desktop-option starts -->
                                <div id="cnt-desktop-option">
                                    <input type="text" name="p2_width_value_desktop_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_width_value_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_width_value_desktop_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_width_unit_desktop_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'p2_width_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_width_unit_desktop_content_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'p2_width_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_width_unit_desktop_content_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'p2_width_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_width_unit_desktop_content_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-desktop-option ends -->
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-desktop"><?php echo __( 'Height', 'kong-popup' ); ?></label>
                                
                                <!-- #cnt-desktop-option starts -->
                                <div id="cnt-desktop-option">
                                    <input type="text" name="p2_height_value_desktop_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_height_value_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_height_value_desktop_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_height_unit_desktop_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'p2_height_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_height_unit_desktop_content_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'p2_height_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_height_unit_desktop_content_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'p2_height_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_height_unit_desktop_content_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-desktop-option ends -->
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-desktop"><?php echo __( 'Overflow', 'kong-popup' ); ?></label>
                                
                                <!-- #cnt-desktop-option starts -->
                                <div id="cnt-desktop-option">
                                    <input type="text" name="p2_overflow_value_desktop_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_overflow_value_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_overflow_value_desktop_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_overflow_unit_desktop_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="auto" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_overflow_unit_desktop_content_1' ] == "auto" ) echo "selected='selected'"; ?>><?php echo __( 'auto', 'kong-popup' ); ?></option>
                                        <option value="hidden" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_desktop_content_1' ] ) && $popup_meta[ 'p2_overflow_unit_desktop_content_1' ] == "hidden" ) echo "selected='selected'"; ?>><?php echo __( 'hidden', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-desktop-option ends -->
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
                                <input class="pt-input-top" type="" name="p2_top_padding_desktop_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_top_padding_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_top_padding_desktop_content_1' ]; ?>" />
                                <input class="pt-input-right" type="" name="p2_right_padding_desktop_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_right_padding_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_right_padding_desktop_content_1' ]; ?>" />
                                <input class="pt-input-bottom" type="" name="p2_bottom_padding_desktop_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_bottom_padding_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_bottom_padding_desktop_content_1' ]; ?>" />
                                <input class="pt-input-left" type="" name="p2_left_padding_desktop_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_left_padding_desktop_content_1' ] ) ) echo $popup_meta[ 'p2_left_padding_desktop_content_1' ]; ?>" />
                            </div>
                            <!-- .pt-field-padding ends -->
                        </div>
                        <!-- .pt-image-field_right ends -->
                    </div>
                    <!-- .pt-image-field_size ends -->
                </div>
                <!-- .pt-add-image-field #step2-desktop-size-appearance ends -->

                <!-- .pt-add-image-field #step2-mobile-size-appearance starts -->
                <div class="pt-image-field_cnt" id="step2-mobile-size-appearance">
                    <!-- .pt-image-field_size starts -->
                    <div class="pt-image-field_size clearfix" id="step2-mobile">
                        <!-- .pt-image-field_left starts -->
                        <div class="pt-image-field_left">
                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-mobile"><?php echo __( 'Width', 'kong-popup' ); ?></label>
                                
                                <!-- #cnt-mobile-option starts -->
                                <div id="cnt-mobile-option">
                                    <input type="text" name="p2_width_value_mobile_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_width_value_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_width_value_mobile_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_width_unit_mobile_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'p2_width_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_width_unit_mobile_content_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'p2_width_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_width_unit_mobile_content_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'p2_width_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_width_unit_mobile_content_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-mobile-option ends -->
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-mobile"><?php echo __( 'Height', 'kong-popup' ); ?></label>
                                
                                <!-- #cnt-mobile-option starts -->
                                <div id="cnt-mobile-option">
                                    <input type="text" name="p2_height_value_mobile_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_height_value_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_height_value_mobile_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_height_unit_mobile_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="px" <?php if ( isset( $popup_meta[ 'p2_height_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_height_unit_mobile_content_1' ] == "px" ) echo "selected='selected'"; ?>><?php echo __( 'px', 'kong-popup' ); ?></option>
                                        <option value="%" <?php if ( isset( $popup_meta[ 'p2_height_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_height_unit_mobile_content_1' ] == "%" ) echo "selected='selected'"; ?>>%</option>
                                        <option value="vh" <?php if ( isset( $popup_meta[ 'p2_height_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_height_unit_mobile_content_1' ] == "vh" ) echo "selected='selected'"; ?>><?php echo __( 'vh', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-mobile-option ends -->
                            </div>
                            <!-- .pt-field ends -->

                            <!-- .pt-field starts -->
                            <div class="pt-field">
                                <label id="cnt-mobile"><?php echo __( 'Overflow', 'kong-popup' ); ?></label>
                                
                                <!-- #cnt-mobile-option starts -->
                                <div id="cnt-mobile-option">
                                    <input type="text" name="p2_overflow_value_mobile_content_1" placeholder="280" value="<?php if ( isset( $popup_meta[ 'p2_overflow_value_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_overflow_value_mobile_content_1' ]; ?>" />

                                    <!-- .select-option starts -->
                                    <select name="p2_overflow_unit_mobile_content_1" class="select-option">
                                        <option value="">-</option>
                                        <option value="auto" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_overflow_unit_mobile_content_1' ] == "auto" ) echo "selected='selected'"; ?>><?php echo __( 'auto', 'kong-popup' ); ?></option>
                                        <option value="hidden" <?php if ( isset( $popup_meta[ 'p2_overflow_unit_mobile_content_1' ] ) && $popup_meta[ 'p2_overflow_unit_mobile_content_1' ] == "hidden" ) echo "selected='selected'"; ?>><?php echo __( 'hidden', 'kong-popup' ); ?></option>
                                    </select>
                                    <!-- .select-option ends -->
                                </div>
                                <!-- #cnt-mobile-option ends -->
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
                                <input class="pt-input-top" type="" name="p2_top_padding_mobile_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_top_padding_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_top_padding_mobile_content_1' ]; ?>" />
                                <input class="pt-input-right" type="" name="p2_right_padding_mobile_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_right_padding_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_right_padding_mobile_content_1' ]; ?>" />
                                <input class="pt-input-bottom" type="" name="p2_bottom_padding_mobile_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_bottom_padding_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_bottom_padding_mobile_content_1' ]; ?>" />
                                <input class="pt-input-left" type="" name="p2_left_padding_mobile_content_1" id="adons" placeholder="50" value="<?php if ( isset( $popup_meta[ 'p2_left_padding_mobile_content_1' ] ) ) echo $popup_meta[ 'p2_left_padding_mobile_content_1' ]; ?>" />
                            </div>
                            <!-- .pt-field-padding ends -->
                        </div>
                        <!-- .pt-image-field_right ends -->
                    </div>
                    <!-- .pt-image-field_size ends -->
                </div>
                <!-- .pt-add-image-field #step2-mobile-size-appearance ends -->
            </div>
            <!-- .pt-add-image-field ends -->

            <?php
            if ( in_array( $slug, array( 'interstitial', 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-checkbox starts -->
                <div class="pt-checkbox pt-inline-field">
                    <!-- .container starts -->
                    <label class="container">
                        <input type="checkbox" name="add_background_file_appearance" class="option-checkbox" id="option-add-background-file-opener" data-info="add-background-file" <?php if ( isset( $popup_meta[ 'add_background_file_appearance' ] ) == 'on' ) echo 'checked'; ?> />
                        <span class="checkmark"></span>
                        <?php echo __( 'Add background file', 'kong-popup' ); ?>
                    </label>
                    <!-- .container ends -->
                </div>
                <!-- .pt-checkbox ends -->
                <?php
            }
            ?>

            <!-- .pt-add-image-field starts -->
            <div class="pt-add-image-field add-background-file hide" <?php if ( isset( $popup_meta[ 'add_background_file_appearance' ] ) == 'on' ) echo 'style="display: block"'; ?>>
                <!-- .pt-add-image-field_tab starts -->
                <ul class="pt-add-image-field_tab">
                    <li class="selected" data-id="step1-desktop-bgfile">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <?php echo __( 'Desktop', 'kong-popup' ); ?>
                    </li>

                    <li data-id="step1-mobile-bgfile">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <?php echo __( 'Mobile', 'kong-popup' ); ?>
                    </li>
                </ul>
                <!-- .pt-add-image-field_tab ends -->

                <!-- .pt-image-field_cnt #step1-desktop-bgfile starts -->
                <div class="pt-image-field_cnt" id="step1-desktop-bgfile">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img bgfile-desktop">
                        <?php
                        if ( isset( $popup_meta[ 'desktop_bgfile_image' ] ) && is_array( $popup_meta[ 'desktop_bgfile_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'desktop_bgfile_image' ] as $id ) {
                                ?>                                                                   
                                <li class="desktop-bgfile-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="desktop-bgfile-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-bgfile-button" data-param="bgfile">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-bgfile-button" id="<?php echo ( $step - 1 ); ?>" data-param="bgfile">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-bgfile-button-<?php echo $step; ?>" data-target="desktop" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="desktop_bgfile_image" id="desktop-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="desktop-bgfile-item selected" id="desktop-bgfile-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-bgfile-button" data-param="bgfile">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-bgfile-button" id="0" data-param="bgfile">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-bgfile-button-1" data-target="desktop" data-index="0" />
                                <input type="hidden" name="desktop_bgfile_image" id="desktop-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-bgfile" data-target="desktop" data-param="bgfile">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-desktop-bgfile ends -->

                <!-- .pt-image-field_cnt #step1-mobile-bgfile starts -->
                <div class="pt-image-field_cnt" id="step1-mobile-bgfile">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img bgfile-mobile">
                        <?php
                        if ( isset( $popup_meta[ 'mobile_bgfile_image' ] ) && is_array( $popup_meta[ 'mobile_bgfile_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'mobile_bgfile_image' ] as $id ) {
                                ?>                                                                   
                                <li class="mobile-bgfile-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="mobile-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-bgfile-button" data-param="bgfile">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-bgfile-button" id="<?php echo ( $step - 1 ); ?>" data-param="bgfile">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-bgfile-button-<?php echo $step; ?>" data-target="mobile" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="mobile_bgfile_image" id="mobile-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="mobile-bgfile-item selected" id="mobile-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-bgfile-button" data-param="bgfile">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-bgfile-button" id="0" data-param="bgfile">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-bgfile-button-1" data-target="mobile" data-index="0" />
                                <input type="hidden" name="mobile_bgfile_image" id="mobile-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-bgfile" data-target="mobile" data-param="bgfile">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-mobile-bgfile ends -->
            </div>
            <!-- .pt-add-image-field ends -->

            <?php
            if ( in_array( $slug, array( 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-checkbox starts -->
                <div class="pt-checkbox pt-inline-field">
                    <!-- .container starts -->
                    <label class="container">
                        <input type="checkbox" name="add_buttom_screen_icon" class="option-checkbox" id="option-add-buttom-screen-icon-opener" data-info="add-buttom-screen-icon" <?php if ( isset( $popup_meta[ 'add_buttom_screen_icon' ] ) == 'on' ) echo 'checked'; ?> />
                        <span class="checkmark"></span>
                        <?php echo __( 'Bottom screen icon', 'kong-popup' ); ?>
                    </label>
                    <!-- .container ends -->
                </div>
                <!-- .pt-checkbox ends -->
                <?php
            }
            ?>

            <!-- .pt-add-image-field starts -->
            <div class="pt-add-image-field add-buttom-screen-icon hide" <?php if ( isset( $popup_meta[ 'add_buttom_screen_icon' ] ) == 'on' ) echo 'style="display: block"'; ?>>
                <!-- .pt-add-image-field_tab starts -->
                <ul class="pt-add-image-field_tab">
                    <li class="selected" data-id="step1-desktop-btmscreen">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <?php echo __( 'Desktop', 'kong-popup' ); ?>
                    </li>

                    <li data-id="step1-mobile-btmscreen">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <?php echo __( 'Mobile', 'kong-popup' ); ?>
                    </li>
                </ul>
                <!-- .pt-add-image-field_tab ends -->

                <!-- .pt-image-field_cnt #step1-desktop-btmscreen starts -->
                <div class="pt-image-field_cnt" id="step1-desktop-btmscreen">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img btmscreen-desktop">
                        <?php
                        if ( isset( $popup_meta[ 'desktop_btmscreen_image' ] ) && is_array( $popup_meta[ 'desktop_btmscreen_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'desktop_btmscreen_image' ] as $id ) {
                                ?>                                                                   
                                <li class="desktop-btmscreen-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="desktop-btmscreen-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-btmscreen-button" data-param="btmscreen">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-btmscreen-button" id="<?php echo ( $step - 1 ); ?>" data-param="btmscreen">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-btmscreen-button-<?php echo $step; ?>" data-target="desktop" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="desktop_btmscreen_image" id="desktop-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="desktop-btmscreen-item selected" id="desktop-btmscreen-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-btmscreen-button" data-param="btmscreen">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-btmscreen-button" id="0" data-param="btmscreen">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-btmscreen-button-1" data-target="desktop" data-index="0" />
                                <input type="hidden" name="desktop_btmscreen_image" id="desktop-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-btmscreen" data-target="desktop" data-param="btmscreen">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-desktop-btmscreen ends -->

                <!-- .pt-image-field_cnt #step1-mobile-btmscreen starts -->
                <div class="pt-image-field_cnt" id="step1-mobile-btmscreen">
                    <!-- .pt-add-img starts -->
                    <ul class="pt-add-img btmscreen-mobile">
                        <?php
                        if ( isset( $popup_meta[ 'mobile_btmscreen_image' ] ) && is_array( $popup_meta[ 'mobile_btmscreen_image' ] ) ) {
                            $step = 1;
                            foreach ( $popup_meta[ 'mobile_btmscreen_image' ] as $id ) {
                                ?>                                                                   
                                <li class="mobile-btmscreen-item<?php if ( $step == 1 ) echo ' selected'; ?>" id="mobile-item-<?php echo $step; ?>">
                                    <div class="image-editor-block">
                                        <a href="javascript:void(0);" class="upload-btmscreen-button" data-param="btmscreen">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0);" class="remove-btmscreen-button" id="<?php echo ( $step - 1 ); ?>" data-param="btmscreen">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" class="image-tag" id="upload-btmscreen-button-<?php echo $step; ?>" data-target="mobile" data-index="<?php echo ( $step - 1 ); ?>" />
                                    <input type="hidden" name="mobile_btmscreen_image" id="mobile-image-<?php echo $step; ?>" value="<?php echo $id; ?>" />
                                </li>
                                <?php
                                $step++;
                            }
                        } else {
                             ?>                                                                   
                            <li class="mobile-btmscreen-item selected" id="mobile-item-1">
                                <div class="image-editor-block">
                                    <a href="javascript:void(0);" class="upload-btmscreen-button" data-param="btmscreen">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="remove-btmscreen-button" id="0" data-param="btmscreen">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt="" class="image-tag" id="upload-btmscreen-button-1" data-target="mobile" data-index="0" />
                                <input type="hidden" name="mobile_btmscreen_image" id="mobile-image-1" />
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- .pt-add-img ends -->

                    <!-- .pt-add-img starts -->
                    <ul class="">
                        <li>
                            <a href="javascript:void(0);" class="add-upload-btmscreen" data-target="mobile" data-param="btmscreen">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <!-- <input id="upload_bgimage_button" type="" /> -->
                        </li>
                    </ul>
                    <!-- .pt-add-img ends -->
                </div>
                <!-- .pt-image-field_cnt #step1-mobile-btmscreen ends -->
            </div>
            <!-- .pt-add-image-field ends -->

            <?php
            if ( ! in_array( $slug, array( 'share', 'two-step' ) ) ) {
                ?>
                <!-- .pt-colors starts -->
                <div class="pt-colors">
                    <label><?php echo __( 'Colors', 'kong-popup' ); ?></label>
                    <!-- ul starts -->
                    <ul>
                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box" id="bgColorPeeker">
                                <span style="display:inline-block;width:20px;height:20px;border-radius:5px;border:1px solid #ababab;background-color: #cccccc"></span> 
                                <?php echo __( 'Background', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->

                            <!-- .pt-color-option starts -->
                            <div class="pt-color-option" id="colorOptions">
                                <p><?php echo __( 'Background Color / Image', 'kong-popup' ); ?></p>
                                <!-- .pt-color-palet starts -->
                                <div class="pt-color-palet"></div>
                                <!-- .pt-color-palet ends -->

                                <!-- .pt-color-bot starts -->
                                <div class="pt-color-bot">
                                    <!-- .pt-color-bot-left starts -->
                                    <div class="pt-color-bot-left">
                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="background_gradient_1" class="color-select" id="cp1" value="<?php if ( isset( $popup_meta[ 'background_gradient_1' ] ) ) echo $popup_meta[ 'background_gradient_1' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'background_gradient_1' ] ) ) echo $popup_meta[ 'background_gradient_1' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->

                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="background_gradient_2" class="color-select" id="cp2" value="<?php if ( isset( $popup_meta[ 'background_gradient_2' ] ) ) echo $popup_meta[ 'background_gradient_2' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'background_gradient_2' ] ) ) echo $popup_meta[ 'background_gradient_2' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->
                                    </div>
                                    <!-- .pt-color-bot-left ends -->

                                    <!-- .pt-color-bot-right starts -->
                                    <div class="pt-color-bot-right">
                                        <!-- .pt-color-opacity starts -->
                                        <div class="pt-color-opacity">
                                            <?php echo __( 'opacity', 'kong-popup' ); ?>
                                            <input type="" name="opacity" class="opacity" id="adons" placeholder="100" value="<?php if ( isset( $popup_meta[ 'opacity' ] ) ) echo $popup_meta[ 'opacity' ]; ?>" /><span>%</span>
                                        </div>
                                        <!-- .pt-color-opacity ends -->

                                        <!-- .pt-radial starts -->
                                        <div class="pt-radial">
                                            <!-- #tooltip2 starts -->
                                            <div id="cmn_direction"></div>
                                            <!-- #tooltip2 ends -->

                                            <input type="hidden" id="cmn-direction" value="<?php if ( isset( $popup_meta[ 'cmn_direction' ] ) ) echo $popup_meta[ 'cmn_direction' ]; ?>" />
                                        </div>
                                        <!-- .pt-radial ends -->
                                    </div>
                                    <!-- .pt-color-bot-right ends -->

                                    <!-- .pt-add-img starts -->
                                    <div class="pt-add-img">
                                        <?php echo __( 'Add image', 'kong-popup' ); ?>
                                    </div>
                                    <!-- .pt-add-img ends -->
                                </div>
                                <!-- .pt-color-bot ends -->
                            </div>
                            <!-- .pt-color-option ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="textcolor" class="color-select" id="cp3" value="<?php if ( isset( $popup_meta[ 'textcolor' ] ) ) echo $popup_meta[ 'textcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Text', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="buttonbgcolor" class="color-select" id="cp4" value="<?php if ( isset( $popup_meta[ 'buttonbgcolor' ] ) ) echo $popup_meta[ 'buttonbgcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Button', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="buttontextcolor" class="color-select" id="cp5" value="<?php if ( isset( $popup_meta[ 'buttontextcolor' ] ) ) echo $popup_meta[ 'buttontextcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Button Text', 'kong-popup' ); ?>
                            </div>
                        </li>
                        <!-- .pt-color-box ends -->
                    </ul>
                    <!-- ul ends -->
                </div>
                <!-- .pt-colors ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'two-step' ) ) ) {
                ?>
                <!-- .pt-colors starts -->
                <div class="pt-colors">
                    <label><?php echo __( 'Block #1', 'kong-popup' ); ?></label>
                    <!-- ul starts -->
                    <ul>
                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box" id="block1-bgColorPeeker">
                                <span style="display:inline-block;width:20px;height:20px;border-radius:5px;border:1px solid #ababab;background-color: #cccccc"></span> 
                                <?php echo __( 'Background', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->

                            <!-- .pt-color-option starts -->
                            <div class="pt-color-option" id="colorOptions">
                                <p><?php echo __( 'Background Color / Image', 'kong-popup' ); ?></p>
                                <!-- .pt-color-palet starts -->
                                <div class="pt-color-palet"></div>
                                <!-- .pt-color-palet ends -->

                                <!-- .pt-color-bot starts -->
                                <div class="pt-color-bot">
                                    <!-- .pt-color-bot-left starts -->
                                    <div class="pt-color-bot-left">
                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="block1_background_gradient_1" class="color-select" id="block1-cp1" value="<?php if ( isset( $popup_meta[ 'block1_background_gradient_1' ] ) ) echo $popup_meta[ 'block1_background_gradient_1' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'block1_background_gradient_1' ] ) ) echo $popup_meta[ 'block1_background_gradient_1' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->

                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="block1_background_gradient_2" class="color-select" id="block1-cp2" value="<?php if ( isset( $popup_meta[ 'block1_background_gradient_2' ] ) ) echo $popup_meta[ 'block1_background_gradient_2' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'block1_background_gradient_2' ] ) ) echo $popup_meta[ 'block1_background_gradient_2' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->
                                    </div>
                                    <!-- .pt-color-bot-left ends -->

                                    <!-- .pt-color-bot-right starts -->
                                    <div class="pt-color-bot-right">
                                        <!-- .pt-color-opacity starts -->
                                        <div class="pt-color-opacity">
                                            <?php echo __( 'opacity', 'kong-popup' ); ?>
                                            <input type="" name="block1_opacity" class="opacity" id="adons" placeholder="100" value="<?php if ( isset( $popup_meta[ 'block1_opacity' ] ) ) echo $popup_meta[ 'block1_opacity' ]; ?>" /><span>%</span>
                                        </div>
                                        <!-- .pt-color-opacity ends -->

                                        <!-- .pt-radial starts -->
                                        <div class="pt-radial">
                                            <!-- #tooltip2 starts -->
                                            <div id="block1_direction"></div>
                                            <!-- #tooltip2 ends -->

                                            <input type="hidden" id="block1-direction" value="<?php if ( isset( $popup_meta[ 'block1_direction' ] ) ) echo $popup_meta[ 'block1_direction' ]; ?>" />
                                        </div>
                                        <!-- .pt-radial ends -->
                                    </div>
                                    <!-- .pt-color-bot-right ends -->

                                    <!-- .pt-add-img starts -->
                                    <div class="pt-add-img">
                                        <?php echo __( 'Add image', 'kong-popup' ); ?>
                                    </div>
                                    <!-- .pt-add-img ends -->
                                </div>
                                <!-- .pt-color-bot ends -->
                            </div>
                            <!-- .pt-color-option ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="header_textcolor" class="color-select" id="block1-cp3" value="<?php if ( isset( $popup_meta[ 'header_textcolor' ] ) ) echo $popup_meta[ 'header_textcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Header text', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="textcolor" class="color-select" id="block1-cp4" value="<?php if ( isset( $popup_meta[ 'textcolor' ] ) ) echo $popup_meta[ 'textcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Text', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="buttonbgcolor" class="color-select" id="block1-cp5" value="<?php if ( isset( $popup_meta[ 'buttonbgcolor' ] ) ) echo $popup_meta[ 'buttonbgcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Button', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="buttontextcolor" class="color-select" id="block1-cp6" value="<?php if ( isset( $popup_meta[ 'buttontextcolor' ] ) ) echo $popup_meta[ 'buttontextcolor' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Button Text', 'kong-popup' ); ?>
                            </div>
                        </li>
                        <!-- .pt-color-box ends -->
                    </ul>
                    <!-- ul ends -->
                </div>
                <!-- .pt-colors ends -->

                <!-- .pt-colors starts -->
                <div class="pt-colors">
                    <label><?php echo __( 'Block #2', 'kong-popup' ); ?></label>
                    <!-- ul starts -->
                    <ul>
                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box" id="block2-bgColorPeeker">
                                <span style="display:inline-block;width:20px;height:20px;border-radius:5px;border:1px solid #ababab;background-color: #cccccc"></span> 
                                <?php echo __( 'Background', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->

                            <!-- .pt-color-option starts -->
                            <div class="pt-color-option" id="colorOptions">
                                <p><?php echo __( 'Background Color / Image', 'kong-popup' ); ?></p>
                                <!-- .pt-color-palet starts -->
                                <div class="pt-color-palet"></div>
                                <!-- .pt-color-palet ends -->

                                <!-- .pt-color-bot starts -->
                                <div class="pt-color-bot">
                                    <!-- .pt-color-bot-left starts -->
                                    <div class="pt-color-bot-left">
                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="block2_background_gradient_1" class="color-select" id="block2-cp1" value="<?php if ( isset( $popup_meta[ 'block2_background_gradient_1' ] ) ) echo $popup_meta[ 'block2_background_gradient_1' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'block2_background_gradient_1' ] ) ) echo $popup_meta[ 'block2_background_gradient_1' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->

                                        <!-- .pt-color-box starts -->
                                        <div class="pt-color-box">
                                            <!-- .cp starts -->
                                            <span class="cp">
                                                <input type="text" name="block2_background_gradient_2" class="color-select" id="block2-cp2" value="<?php if ( isset( $popup_meta[ 'block2_background_gradient_2' ] ) ) echo $popup_meta[ 'block2_background_gradient_2' ]; ?>" />
                                            </span> 
                                            <!-- .cp ends -->

                                            <input type="text" class="colorCode" readonly placeholder="#CCCCCC" value="<?php if ( isset( $popup_meta[ 'block2_background_gradient_2' ] ) ) echo $popup_meta[ 'block2_background_gradient_2' ]; ?>" />
                                        </div>
                                        <!-- .pt-color-box ends -->
                                    </div>
                                    <!-- .pt-color-bot-left ends -->

                                    <!-- .pt-color-bot-right starts -->
                                    <div class="pt-color-bot-right">
                                        <!-- .pt-color-opacity starts -->
                                        <div class="pt-color-opacity">
                                            <?php echo __( 'opacity', 'kong-popup' ); ?>
                                            <input type="" name="block2_opacity" class="opacity" id="adons" placeholder="100" value="<?php if ( isset( $popup_meta[ 'block2_opacity' ] ) ) echo $popup_meta[ 'block2_opacity' ]; ?>" /><span>%</span>
                                        </div>
                                        <!-- .pt-color-opacity ends -->

                                        <!-- .pt-radial starts -->
                                        <div class="pt-radial">
                                            <!-- #tooltip2 starts -->
                                            <div id="block2_direction"></div>
                                            <!-- #tooltip2 ends -->

                                            <input type="hidden" id="block2-direction" value="<?php if ( isset( $popup_meta[ 'block2_direction' ] ) ) echo $popup_meta[ 'block2_direction' ]; ?>" />
                                        </div>
                                        <!-- .pt-radial ends -->
                                    </div>
                                    <!-- .pt-color-bot-right ends -->

                                    <!-- .pt-add-img starts -->
                                    <div class="pt-add-img">
                                        <?php echo __( 'Add image', 'kong-popup' ); ?>
                                    </div>
                                    <!-- .pt-add-img ends -->
                                </div>
                                <!-- .pt-color-bot ends -->
                            </div>
                            <!-- .pt-color-option ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="block_shape" class="color-select" id="block2-cp3" value="<?php if ( isset( $popup_meta[ 'block_shape' ] ) ) echo $popup_meta[ 'block_shape' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Block shape', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="image_color" class="color-select" id="block2-cp4" value="<?php if ( isset( $popup_meta[ 'image_color' ] ) ) echo $popup_meta[ 'image_color' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Image', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="icon" class="color-select" id="block2-cp5" value="<?php if ( isset( $popup_meta[ 'icon' ] ) ) echo $popup_meta[ 'icon' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Icon', 'kong-popup' ); ?>
                            </div>
                            <!-- .pt-color-box ends -->
                        </li>

                        <li>
                            <!-- .pt-color-box starts -->
                            <div class="pt-color-box">
                                <!-- .cp starts -->
                                <span class="cp">
                                    <input type="text" name="icon_color" class="color-select" id="block2-cp6" value="<?php if ( isset( $popup_meta[ 'icon_color' ] ) ) echo $popup_meta[ 'icon_color' ]; ?>" />
                                </span> 
                                <!-- .cp ends -->
                                <?php echo __( 'Icon color', 'kong-popup' ); ?>
                            </div>
                        </li>
                        <!-- .pt-color-box ends -->
                    </ul>
                    <!-- ul ends -->
                </div>
                <!-- .pt-colors ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'follow', 'share' ) ) ) {
                ?>
                <!-- .pt-checkbox starts -->
                <div class="pt-checkbox pt-inline-field">
                    <!-- .container starts -->
                    <label class="container">
                        <input type="checkbox" name="use_native_color" class="option-checkbox" id="native-color" <?php if ( isset( $popup_meta[ 'use_native_color' ] ) == 'on' ) echo 'checked'; ?> />
                        <span class="checkmark"></span>
                        <?php echo __( 'Use native colors of social networks', 'kong-popup' ); ?>
                    </label>
                    <!-- .container ends -->
                </div>
                <!-- .pt-checkbox ends -->
                <?php
            }
            ?>

            <!-- .pt-option-box starts -->
            <div class="pt-option-box">
                <label><?php echo __( 'Font', 'kong-popup' ); ?></label>
                <!-- .select-option starts -->
                <select name="font" class="select-option" id="font">
                    <option value=""><?php echo __( 'Select a Font', 'kong-popup' ); ?></option>
                    <?php foreach ( $this->google_fonts as $key => $font ): ?>
                        <option value="<?php echo $font; ?>" <?php if ( isset( $popup_meta[ 'font' ] ) && $font == $popup_meta[ 'font' ] ) echo "selected='selected'"; ?>><?php echo __( $key, 'kong-popup' ); ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- .select-option ends -->
            </div>
            <!-- .pt-option-box ends -->

            <?php
            // if ( ! in_array( $slug, array( 'content-upgrade', 'spin-wheel', 'two-step', 'welcome-mat' ) ) ) {
            if ( ! in_array( $slug, array( 'two-step', 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Animation', 'kong-popup' ); ?></label>
                    <select name="animation" class="select-option" id="animation">
                        <option value=""><?php echo __( 'Select an Animation', 'kong-popup' ); ?></option>
                        <option value="linear" <?php if ( isset( $popup_meta[ 'animation' ] ) && $popup_meta[ 'animation' ] == "linear" ) echo "selected='selected'"; ?>><?php echo __( 'Linear', 'kong-popup' ); ?></option>
                        <option value="ease" <?php if ( isset( $popup_meta[ 'animation' ] ) && $popup_meta[ 'animation' ] == "ease" ) echo "selected='selected'"; ?>><?php echo __( 'Ease', 'kong-popup' ); ?></option>
                        <option value="ease-in-out" <?php if ( isset( $popup_meta[ 'animation' ] ) && $popup_meta[ 'animation' ] == "ease-in-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In Out', 'kong-popup' ); ?></option>
                        <option value="ease-in" <?php if ( isset( $popup_meta[ 'animation' ] ) && $popup_meta[ 'animation' ] == "ease-in" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In', 'kong-popup' ); ?></option>
                        <option value="ease-out" <?php if ( isset( $popup_meta[ 'animation' ] ) && $popup_meta[ 'animation' ] == "ease-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease Out', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                 <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'two-step' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Block #1 animation', 'kong-popup' ); ?></label>
                    <select name="block1_animation" class="select-option" id="block1-animation">
                        <option value=""><?php echo __( 'Select an Animation', 'kong-popup' ); ?></option>
                        <option value="linear" <?php if ( isset( $popup_meta[ 'block1_animation' ] ) && $popup_meta[ 'block1_animation' ] == "linear" ) echo "selected='selected'"; ?>><?php echo __( 'Linear', 'kong-popup' ); ?></option>
                        <option value="ease" <?php if ( isset( $popup_meta[ 'block1_animation' ] ) && $popup_meta[ 'block1_animation' ] == "ease" ) echo "selected='selected'"; ?>><?php echo __( 'Ease', 'kong-popup' ); ?></option>
                        <option value="ease-in-out" <?php if ( isset( $popup_meta[ 'block1_animation' ] ) && $popup_meta[ 'block1_animation' ] == "ease-in-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In Out', 'kong-popup' ); ?></option>
                        <option value="ease-in" <?php if ( isset( $popup_meta[ 'block1_animation' ] ) && $popup_meta[ 'block1_animation' ] == "ease-in" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In', 'kong-popup' ); ?></option>
                        <option value="ease-out" <?php if ( isset( $popup_meta[ 'block1_animation' ] ) && $popup_meta[ 'block1_animation' ] == "ease-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease Out', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                 <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'two-step' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Block #2 animation', 'kong-popup' ); ?></label>
                    <select name="block2_animation" class="select-option" id="block2-animation">
                        <option value=""><?php echo __( 'Select an Animation', 'kong-popup' ); ?></option>
                        <option value="linear" <?php if ( isset( $popup_meta[ 'block2_animation' ] ) && $popup_meta[ 'block2_animation' ] == "linear" ) echo "selected='selected'"; ?>><?php echo __( 'Linear', 'kong-popup' ); ?></option>
                        <option value="ease" <?php if ( isset( $popup_meta[ 'block2_animation' ] ) && $popup_meta[ 'block2_animation' ] == "ease" ) echo "selected='selected'"; ?>><?php echo __( 'Ease', 'kong-popup' ); ?></option>
                        <option value="ease-in-out" <?php if ( isset( $popup_meta[ 'block2_animation' ] ) && $popup_meta[ 'block2_animation' ] == "ease-in-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In Out', 'kong-popup' ); ?></option>
                        <option value="ease-in" <?php if ( isset( $popup_meta[ 'block2_animation' ] ) && $popup_meta[ 'block2_animation' ] == "ease-in" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In', 'kong-popup' ); ?></option>
                        <option value="ease-out" <?php if ( isset( $popup_meta[ 'block2_animation' ] ) && $popup_meta[ 'block2_animation' ] == "ease-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease Out', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                 <?php
            }
            ?>

            <?php
            /**
            if ( in_array( $slug, array( 'content-upgrade', 'spin-wheel' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Entrance Animation', 'kong-popup' ); ?></label>
                    <select name="entrance_animation" class="select-option" id="entrance-animation">
                        <option value=""><?php echo __( 'Select an Animation', 'kong-popup' ); ?></option>
                        <option value="linear" <?php if ( isset( $popup_meta[ 'entrance_animation' ] ) && $popup_meta[ 'entrance_animation' ] == "linear" ) echo "selected='selected'"; ?>><?php echo __( 'Linear', 'kong-popup' ); ?></option>
                        <option value="ease" <?php if ( isset( $popup_meta[ 'entrance_animation' ] ) && $popup_meta[ 'entrance_animation' ] == "ease" ) echo "selected='selected'"; ?>><?php echo __( 'Ease', 'kong-popup' ); ?></option>
                        <option value="ease-in-out" <?php if ( isset( $popup_meta[ 'entrance_animation' ] ) && $popup_meta[ 'entrance_animation' ] == "ease-in-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In Out', 'kong-popup' ); ?></option>
                        <option value="ease-in" <?php if ( isset( $popup_meta[ 'entrance_animation' ] ) && $popup_meta[ 'entrance_animation' ] == "ease-in" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In', 'kong-popup' ); ?></option>
                        <option value="ease-out" <?php if ( isset( $popup_meta[ 'entrance_animation' ] ) && $popup_meta[ 'entrance_animation' ] == "ease-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease Out', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                 <?php
            }
            */
            ?>

            <?php
            if ( in_array( $slug, array( 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Exit animation', 'kong-popup' ); ?></label>
                    <select name="exit_animation" class="select-option" id="exit-animation">
                        <option value=""><?php echo __( 'Select an Animation', 'kong-popup' ); ?></option>
                        <option value="linear" <?php if ( isset( $popup_meta[ 'exit_animation' ] ) && $popup_meta[ 'exit_animation' ] == "linear" ) echo "selected='selected'"; ?>><?php echo __( 'Linear', 'kong-popup' ); ?></option>
                        <option value="ease" <?php if ( isset( $popup_meta[ 'exit_animation' ] ) && $popup_meta[ 'exit_animation' ] == "ease" ) echo "selected='selected'"; ?>><?php echo __( 'Ease', 'kong-popup' ); ?></option>
                        <option value="ease-in-out" <?php if ( isset( $popup_meta[ 'exit_animation' ] ) && $popup_meta[ 'exit_animation' ] == "ease-in-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In Out', 'kong-popup' ); ?></option>
                        <option value="ease-in" <?php if ( isset( $popup_meta[ 'exit_animation' ] ) && $popup_meta[ 'exit_animation' ] == "ease-in" ) echo "selected='selected'"; ?>><?php echo __( 'Ease In', 'kong-popup' ); ?></option>
                        <option value="ease-out" <?php if ( isset( $popup_meta[ 'exit_animation' ] ) && $popup_meta[ 'exit_animation' ] == "ease-out" ) echo "selected='selected'"; ?>><?php echo __( 'Ease Out', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                 <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'contact', 'subscribe' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Mobile button position', 'kong-popup' ); ?></label>
                    <select name="mobile_button_position" class="select-option" id="mobile-button-position">
                        <option value=""><?php echo __( 'Select a Position', 'kong-popup' ); ?></option>
                        <option value="right" <?php if ( isset( $popup_meta[ 'mobile_button_position' ] ) && $popup_meta[ 'mobile_button_position' ] == "right" ) echo "selected='selected'"; ?>><?php echo __( 'Right', 'kong-popup' ); ?></option>
                        <option value="left" <?php if ( isset( $popup_meta[ 'mobile_button_position' ] ) && $popup_meta[ 'mobile_button_position' ] == "left" ) echo "selected='selected'"; ?>><?php echo __( 'Left', 'kong-popup' ); ?></option>
                        <option value="center" <?php if ( isset( $popup_meta[ 'mobile_button_position' ] ) && $popup_meta[ 'mobile_button_position' ] == "center" ) echo "selected='selected'"; ?>><?php echo __( 'Center', 'kong-popup' ); ?></option>
                    </select>
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <?php
            if ( ! in_array( $slug, array( 'content-upgrade', 'interstitial', 'spin-wheel', 'two-step', 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-checkbox starts -->
                <div class="pt-checkbox pt-inline-field">
                    <!-- .container starts -->
                    <label class="container">
                        <input type="checkbox" name="enable_unobtrusive" class="option-checkbox kg_checkbox_color"  id="enable-unobtrusive" <?php if ( isset( $popup_meta[ 'enable_unobtrusive' ] ) == 'on' ) echo 'checked'; ?> />
                        <span class="checkmark"></span>
                        <label>
                            <?php echo __( 'Enable unobtrusive mobile view', 'kong-popup' ); ?> 
                            <span>
                                <a href="javascript:void(0);">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </a>
                            </span>
                        </label>
                    </label>
                    <!-- .container ends -->
                </div>
                <!-- .pt-checkbox ends -->
                <?php
            }
            ?>
        </div>
        <!-- .form-wrap ends -->
    </div>
    <!-- .left-panel ends -->

    <!-- .right-panel starts -->
    <div class="w-50 right-panel">
        <!-- .preview-wrap starts -->
        <div class="preview-wrap">
            <iframe class="frame preview-frame" src="<?php echo admin_url( 'admin-ajax.php' ) . '?action=preview&popup_id=' . $_REQUEST[ 'id' ]; ?>"></iframe>
        </div>
        <!-- .preview-wrap ends -->

        <!-- .preview-viewport starts -->
        <div class="preview-viewport">
            <a href="javascript:void(0);" class="pt-preview-mobile"><i class="fa fa-mobile" aria-hidden="true"></i></a>
            <a href="javascript:void(0);" class="pt-preview-desktop"><i class="fa fa-desktop" aria-hidden="true"></i></a>
            <a class="frame" target="_blank" href="<?php echo admin_url( 'admin-ajax.php' ) . '?action=preview&popup_id=' . $_REQUEST[ 'id' ]; ?>" >
                <?php echo __( 'Full-size preview', 'kong-popup' ); ?>
            </a>
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