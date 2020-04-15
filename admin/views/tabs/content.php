<!-- .popup-tab-content starts -->
<div class="popup-tab-content content">
    <!-- .left-panel starts -->
    <div class="w-50 left-panel">
        <!-- .form-wrap starts -->
        <div class="form-wrap">
            <label><?php echo __( 'Position', 'kong-popup' ); ?></label>
            <!-- .form-position starts -->
            <div class="form-position">
            <?php
            if ( in_array( $slug, array( 'spin-wheel' ) ) ) {
                ?>
                <label for="pos-bot" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom" id="pos-bot" data-name="position" />
                    <div class="popview-icon popview-icon__pos-bot"></div>
                </label>

                <label for="pos-top" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'top' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="top" id="pos-top" data-name="position" />
                    <div class="popview-icon popview-icon__pos-top"></div>
                </label>

                <label for="pos-left" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'left' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="left" id="pos-left" data-name="position" />
                    <div class="popview-icon popview-icon__pos-left"></div>
                </label>

                <label for="pos-right" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'right' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom" id="pos-right" data-name="position" />
                    <div class="popview-icon popview-icon__pos-right"></div>
                </label>

                <label for="pos-center" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'center' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom" id="pos-center" data-name="position" />
                    <div class="popview-icon popview-icon__pos-center"></div>
                </label>
                <?php
            } else if ( in_array( $slug, array( 'two-step' ) ) ) {
                ?>
                <label for="content-center-center" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'center-center' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="center-center" id="content-center-center" data-name="position" />
                    <div class="popview-icon popview-icon__one"></div>
                </label>

                <label for="content-bottom-left" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom-left' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom-left" id="content-bottom-left" data-name="position" />
                    <div class="popview-icon popview-icon__two"></div>
                </label>

                <label for="content-bottom-right" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom-right' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom-right" id="content-bottom-right" data-name="position" />
                    <div class="popview-icon popview-icon__three"></div>
                </label>

                <label for="content-top-full" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'top-full' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="top-full" id="content-top-full" data-name="position" />
                    <div class="popview-icon popview-icon__four"></div>
                </label>
                <?php
            } else {
                ?>
                <label for="content-center-center" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'center-center' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="center-center" id="content-center-center" data-name="position" />
                    <div class="popview-icon popview-icon__one"></div>
                </label>

                <label for="content-bottom-left" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom-left' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom-left" id="content-bottom-left" data-name="position" />
                    <div class="popview-icon popview-icon__two"></div>
                </label>

                <label for="content-bottom-right" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom-right' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom-right" id="content-bottom-right" data-name="position" />
                    <div class="popview-icon popview-icon__three"></div>
                </label>

                <label for="content-top-full" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'top-full' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="top-full" id="content-top-full" data-name="position" />
                    <div class="popview-icon popview-icon__four"></div>
                </label>

                <label for="content-bottom-full" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'bottom-full' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="bottom-full" id="content-bottom-full" data-name="position" />
                    <div class="popview-icon popview-icon__five"></div>
                </label>

                <label for="content-center-left" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'center-left' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="center-left" id="content-center-left" data-name="position" />
                    <div class="popview-icon popview-icon__six"></div>
                </label>

                <label for="content-center-right" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'center-right' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="center-right" id="content-center-right" data-name="position" />
                    <div class="popview-icon popview-icon__seven"></div>
                </label>

                <label for="content-baseline-left" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'baseline-left' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="baseline-left" id="content-baseline-left" data-name="position" />
                    <div class="popview-icon popview-icon__eight"></div>
                </label>

                <label for="content-baseline-right" class="pos-label <?php if ( isset( $popup_meta[ 'content_position' ] ) && trim( $popup_meta[ 'content_position' ] ) == 'baseline-right' ) echo 'selected'; ?>">
                    <input type="radio" name="content_position" value="baseline-right" id="content-baseline-right" data-name="position" />
                    <div class="popview-icon popview-icon__nine"></div>
                </label>
                <?php
            }
            ?>
            </div>
            <!-- .form-position ends -->

            <?php
            if ( in_array( $slug, array( 'contact', 'content-upgrade', 'interstitial', 'survey', 'two-step', 'welcome-mat' ) ) ) {
                ?>
                <h4><?php echo __( 'Form Settings', 'kong-popup' ); ?></h4>
                <?php
            } else if( in_array( $slug, array( 'subscribe' ) ) ) {
                ?>
                <h4><?php echo __( 'Bar Settings', 'kong-popup' ); ?></h4>
                <?php
            } else if ( in_array( $slug, array( 'spin-wheel' ) ) ) {
                ?>
                <h4><?php echo __( 'Spin Wheel Settings', 'kong-popup' ); ?></h4>
                <!-- .pt-checkbox starts -->
                <div class="pt-checkbox pt-inline-field">
                    <!-- .container starts -->
                    <label class="container">
                        <input type="checkbox" name="add_image_content" class="option-checkbox" id="option-add-image-opener-content" data-info="add-image" <?php if ( isset( $popup_meta[ 'add_image_content' ] ) == 'on' ) echo 'checked'; ?> />
                        <span class="checkmark"></span>
                        <?php echo __( 'Add image', 'kong-popup' ); ?>
                    </label>
                    <!-- .container ends -->
                </div>
                <!-- .pt-checkbox ends -->

                <!-- .pt-add-image-field starts -->
                <div class="pt-add-image-field add-image hide" <?php if ( isset( $popup_meta[ 'add_image_content' ] ) == 'on' ) echo 'style="display: block"'; ?>>
                    <!-- .pt-add-image-field_tab starts -->
                    <ul class="pt-add-image-field_tab">
                        <li class="selected" data-id="step1-desktop-size-content">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                            <?php echo __( 'Desktop', 'kong-popup' ); ?>
                        </li>

                        <li data-id="step1-mobile-size-content">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <?php echo __( 'Mobile', 'kong-popup' ); ?>
                        </li>
                    </ul>
                    <!-- .pt-add-image-field_tab ends -->

                    <div class="pt-image-field_cnt" id="step1-desktop-size-content">
                        <ul class="pt-add-img">
                            <li class="selected"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt=""></li>
                            <li><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img2.png'; ?>" alt=""></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="pt-image-field_size clearfix">
                            <div class="pt-image-field_left">
                                <div class="pt-field">
                                    <label>Width</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                             <option>vh</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Height</label>
                                    <div>
                                         <input type="text" name="" placeholder="auto">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                             <option>wh</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Opacity</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <span>
                                             100%
                                         </span>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Rotate</label>
                                    <div>
                                         <input type="text" name="" placeholder="90">
                                         <span>
                                             deg
                                         </span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-image-field_right">
                                <div class="pt-field">
                                    <label>Left</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Right</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Top</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Bottom</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Flip</label>
                                    <div>
                                        <ul class="pt-flip-option">
                                            <li><a href="javascript:void(0);"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip1.png'; ?>" alt=""></a></li>
                                            <li><a href="javascript:void(0);"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip2.png'; ?>" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-image-field_cnt" id="step1-mobile-size-content">
                        <ul class="pt-add-img">
                            <li class="selected" id="img1"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img1.png'; ?>" alt=""></li>
                            <li id="img2"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/img2.png'; ?>" alt=""></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                        </ul>

                        <div class="pt-image-field_size clearfix">
                            <div class="pt-image-field_left">
                                <div class="pt-field">
                                    <label>Width</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                             <option>vh</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Height</label>
                                    <div>
                                         <input type="text" name="" placeholder="auto">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                             <option>wh</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Opacity</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <span>
                                             100%
                                         </span>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Rotate</label>
                                    <div>
                                         <input type="text" name="" placeholder="90">
                                         <span>
                                             deg
                                         </span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-image-field_right">
                                <div class="pt-field">
                                    <label>Left</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Right</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Top</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Bottom</label>
                                    <div>
                                         <input type="text" name="" placeholder="280">
                                         <select>
                                            <option>-</option>
                                             <option>px</option>
                                             <option>%</option>
                                         </select>
                                    </div>
                                </div>
                                <div class="pt-field">
                                    <label>Flip</label>
                                    <div>
                                        <ul class="pt-flip-option">
                                            <li><a href="javascript:void(0);"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip1.png'; ?>" alt=""></a></li>
                                            <li><a href="javascript:void(0);"><img src="<?php echo PLUGIN_BASE_URL . 'admin/images/flip2.png'; ?>" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .pt-add-image-field ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'contact', 'promo', 'spin-wheel', 'subscribe' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Title', 'kong-popup' ); ?></label>
                    <input type="text" name="content_title" value="<?php if ( isset( $popup_meta[ 'content_title' ] ) ) echo $popup_meta[ 'content_title' ]; ?>" placeholder="Content Title" />
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'contact', 'promo', 'spin-wheel' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Description', 'kong-popup' ); ?></label>
                    <textarea name="content_description" value="<?php if ( isset( $popup_meta[ 'content_description' ] ) ) echo trim( $popup_meta[ 'content_description' ] ); ?>"><?php if ( isset( $popup_meta[ 'content_description' ] ) ) echo trim( $popup_meta[ 'content_description' ] ); ?></textarea>
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'content-upgrade', 'interstitial', 'survey', 'two-step', 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <!-- .radio starts -->
                    <div class="radio">
                        <input name="content_branching" type="radio" value="linear" <?php if ( isset( $popup_meta[ 'content_branching' ] ) && trim( $popup_meta[ 'content_branching' ] ) == "linear" ) echo "checked='checked'"; ?> />
                        <label><?php echo __( 'Linear', 'kong-popup' ); ?></label>
                        <span>
                            <a href="javascript:void(0);">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                    <!-- .radio ends -->

                    <!-- .radio starts -->
                    <div class="radio">
                        <input name="content_branching" type="radio" value="skip" <?php if ( isset( $popup_meta[ 'content_branching' ] ) && trim( $popup_meta[ 'content_branching' ] ) == "skip" ) echo "checked='checked'"; ?> />
                        <label><?php echo __( 'Skip logic and branching', 'kong-popup' ); ?></label>
                        <span>
                            <a href="javascript:void(0);">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                    <!-- .radio ends -->
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'subscribe' ) ) ) {
                ?>
                <label><?php echo __( 'Input field', 'kong-popup' ); ?></label>
                <!-- .drugableSection starts -->
                <div class="drugableSection">
                    <div class="pt-addfield-box">
                        <div class="accrodianBtn">
                            <span class="pt-addfield-box-title">
                                <input type="text" class="editableTitle" name="" value="" placeholder="Email address">
                            </span>
                            <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                        </div>
                    </div>

                    <div class="pt-addfield-box-edit">
                        <div class="pt-option-box">
                            <label><?php echo __( 'Email placeholder', 'kong-popup' ); ?></label>
                            <input type="text" name="" placeholder="Email address">
                        </div>

                        <section>
                            <div class="pt-checkbox pt-inline-field">
                                <label class="container">
                                    <input type="checkbox" class="sectionOpener">
                                    <span class="checkmark"></span><?php echo __( 'Add a consent checkbox', 'kong-popup' ); ?>
                                </label>
                            </div>

                            <div class="subSection">
                                <div class="pt-option-box">
                                    <label>Text</label>
                                    <input type="text" name="" placeholder="Spacify consent message">
                                </div>

                                <div class="pt-checkbox pt-inline-field">
                                    <label class="container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span><?php echo __( 'Required', 'kong-popup' ); ?>
                                    </label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- .drugableSection ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'contact', 'spin-wheel' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <!-- .pt-add-field starts -->
                    <button class="pt-add-field" id="addFldBtn">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<?php echo __( 'Add Fields', 'kong-popup' ); ?>
                    </button>
                    <!-- .pt-add-field ends -->

                    <!-- .add-button-field starts -->
                    <ul class="add-button-field" id="addFldList">
                        <li id="welcomePageBtn">
                            <?php echo __( 'Welcome Page', 'kong-popup' ); ?>
                        </li>

                        <li id="radioButtonsBtn">
                            <?php echo __( 'Radio Buttons', 'kong-popup' ); ?>
                        </li>

                        <li id="checkboxesBtn">
                            <?php echo __( 'Checkboxes', 'kong-popup' ); ?>
                        </li>

                        <li id="dropdownListBtn">
                            <?php echo __( 'Dropdown list', 'kong-popup' ); ?>
                        </li>

                        <li id="singleLineTextBtn">
                            <?php echo __( 'Single line text', 'kong-popup' ); ?>
                        </li>

                        <li id="multiLineTextBtn">
                            <?php echo __( 'Multiline text', 'kong-popup' ); ?>
                        </li>

                        <li id="emailAddressBtn">
                            <?php echo __( 'Email address', 'kong-popup' ); ?>
                        </li>

                        <li id="ratingBtn">
                            <?php echo __( 'Rating', 'kong-popup' ); ?>
                        </li>

                        <li id="successPageBtn">
                            <?php echo __( 'Success page', 'kong-popup' ); ?>
                        </li>
                    </ul>
                    <!-- .add-button-field ends -->
                </div>
                <!-- .pt-option-box ends -->
                <?php
            } else if ( in_array( $slug, array( 'content-upgrade', 'interstitial', 'survey', 'two-step', 'welcome-mat' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <!-- .pt-add-field starts -->
                    <button class="pt-add-field" id="addFldBtn">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<?php echo __( 'Add Question', 'kong-popup' ); ?>
                    </button>
                    <!-- .pt-add-field ends -->

                    <!-- .add-button-field starts -->
                    <ul class="add-button-field" id="addFldList">
                        <li id="welcomePageBtn">
                            <?php echo __( 'Welcome Page', 'kong-popup' ); ?>
                        </li>

                        <li id="radioButtonsBtn">
                            <?php echo __( 'Radio Buttons', 'kong-popup' ); ?>
                        </li>

                        <li id="checkboxesBtn">
                            <?php echo __( 'Checkboxes', 'kong-popup' ); ?>
                        </li>

                        <li id="dropdownListBtn">
                            <?php echo __( 'Dropdown list', 'kong-popup' ); ?>
                        </li>

                        <li id="singleLineTextBtn">
                            <?php echo __( 'Single line text', 'kong-popup' ); ?>
                        </li>

                        <li id="multiLineTextBtn">
                            <?php echo __( 'Multiline text', 'kong-popup' ); ?>
                        </li>

                        <li id="emailAddressBtn">
                            <?php echo __( 'Email address', 'kong-popup' ); ?>
                        </li>

                        <li id="ratingBtn">
                            <?php echo __( 'Rating', 'kong-popup' ); ?>
                        </li>

                        <li id="successPageBtn">
                            <?php echo __( 'Success page', 'kong-popup' ); ?>
                        </li>
                    </ul>
                    <!-- .add-button-field ends -->
                </div>
                <!-- .pt-option-box ends -->
                <?php
            } else if ( in_array( $slug, array( 'follow', 'share' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <!-- .pt-add-field starts -->
                    <button class="pt-add-field" id="addFldBtn">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<?php echo __( 'Add Button', 'kong-popup' ); ?>
                    </button>
                    <!-- .pt-add-field ends -->

                    <!-- .add-button-field starts -->
                    <ul class="add-button-field" id="addFldList">
                        <li id="welcomePageBtn">
                            <?php echo __( 'Welcome Page', 'kong-popup' ); ?>
                        </li>

                        <li id="radioButtonsBtn">
                            <?php echo __( 'Radio Buttons', 'kong-popup' ); ?>
                        </li>

                        <li id="checkboxesBtn">
                            <?php echo __( 'Checkboxes', 'kong-popup' ); ?>
                        </li>

                        <li id="dropdownListBtn">
                            <?php echo __( 'Dropdown list', 'kong-popup' ); ?>
                        </li>

                        <li id="singleLineTextBtn">
                            <?php echo __( 'Single line text', 'kong-popup' ); ?>
                        </li>

                        <li id="multiLineTextBtn">
                            <?php echo __( 'Multiline text', 'kong-popup' ); ?>
                        </li>

                        <li id="emailAddressBtn">
                            <?php echo __( 'Email address', 'kong-popup' ); ?>
                        </li>

                        <li id="ratingBtn">
                            <?php echo __( 'Rating', 'kong-popup' ); ?>
                        </li>

                        <li id="successPageBtn">
                            <?php echo __( 'Success page', 'kong-popup' ); ?>
                        </li>
                    </ul>
                    <!-- .add-button-field ends -->
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <!-- .pt-addfield starts -->
            <div class="pt-addfield" id="fldArea">
                <?php
                global $wpdb;

                $popup_id = $_REQUEST[ 'id' ]; 

                $get_structures = $wpdb->get_results( "SELECT structures FROM {$wpdb->prefix}kong_popup_content_structures WHERE popup_id = $popup_id", OBJECT );
                if ( $get_structures ) {
                    echo $get_structures[ 0 ] ->structures;
                }
                ?>
            </div>
            <!-- .pt-addfield ends -->

            <?php
            if ( in_array( $slug, array( 'spin-wheel' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <button class="pt-add-field" id="addSegmentBtn"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<?php echo __( 'Add Segments', 'kong-popup' ); ?></button>
                </div>
                <!-- .pt-option-box ends -->

                <!-- .pt-addfield starts -->
                <div class="pt-addfield no-border-bot" id="segmentArea"></div>
                <!-- .pt-addfield ends -->
                <?php
            }
            ?>

            <?php
            if ( ! in_array( $slug, array( 'follow', 'share' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Button Text', 'kong-popup' ); ?></label>
                    <input type="text" name="button_text" value="<?php if ( isset( $popup_meta[ 'button_text' ] ) ) echo trim( $popup_meta[ 'button_text' ] ); ?>" placeholder="Button Text">
                </div>
                <!-- .pt-option-box ends -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'share' ) ) ) {
                ?>
                <!-- Button Text //Start -->
                <div class="pt-option-box">
                    <label><?php echo __( 'URL to share', 'kong-popup' ); ?></label>
                    <!-- .radio starts -->
                    <div class="radio">
                        <input name="url_to_share" type="radio" value="current_page" <?php if ( isset( $popup_meta[ 'url_to_share' ] ) && trim( $popup_meta[ 'url_to_share' ] ) == "current_page" ) echo "checked='checked'"; ?> />
                        <label><?php echo __( 'current page', 'kong-popup' ); ?></label>
                    </div>
                    <!-- .radio ends -->

                    <!-- .radio starts -->
                    <div class="radio">
                        <input name="url_to_share" type="radio" value="choose_page" <?php if ( isset( $popup_meta[ 'url_to_share' ] ) && trim( $popup_meta[ 'url_to_share' ] ) == "choose_page" ) echo "checked='checked'"; ?> />
                        <label><?php echo __( 'choose page to share', 'kong-popup' ); ?></label>
                    </div>
                    <!-- .radio ends -->
                    <input type="text" name="" placeholder="URL" readonly="readonly">
                </div>
                <!-- Button Text //end -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'follow', 'share' ) ) ) {
                ?>
                <!-- Button Text //Start -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Label for mobile', 'kong-popup' ); ?></label>
                    <span>
                        <a href="javascript:void(0);">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                        </a>
                    </span>
                    <input type="text" name="" placeholder="Label for mobile">
                </div>
                <!-- Button Text //end -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'follow', 'subscribe' ) ) ) {
                ?>
                <h4><?php echo __( 'Mobile', 'kong-popup' ); ?></h4>
                <!-- Button Text //Start -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Label for mobile', 'kong-popup' ); ?></label>
                    <span>
                        <a href="javascript:void(0);">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                        </a>
                    </span>
                    <input type="text" name="" placeholder="Label for mobile">
                </div>
                <!-- Button Text //end -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'promo' ) ) ) {
                ?>
                <!-- Button Text //Start -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Target URL', 'kong-popup' ); ?></label>
                    <span>
                        <a href="javascript:void(0);">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                        </a>
                    </span>
                    <input type="text" name="" placeholder="Target URL">
                    <button class="pt-add-field" id="addFldBtn">
                        <?php echo __( 'Test', 'kong-popup' ); ?>
                    </button>
                    <label class="container">
                        <input type="checkbox" class="sectionOpener">
                        <span class="checkmark"></span><?php echo __( 'Open the target page in a new window', 'kong-popup' ); ?>
                    </label>
                </div>
                <!-- Button Text //end -->
                <?php
            }
            ?>

            <?php
            if ( in_array( $slug, array( 'contact', 'promo' ) ) ) {
                ?>
                <!-- .pt-option-box starts -->
                <div class="pt-option-box">
                    <label><?php echo __( 'Note', 'kong-popup' ); ?></label>
                    <textarea name="content_note" value="<?php if ( isset( $popup_meta[ 'content_note' ] ) ) echo trim( $popup_meta[ 'content_note' ] ); ?>"><?php if ( isset( $popup_meta[ 'content_note' ] ) ) echo trim( $popup_meta[ 'content_note' ] ); ?></textarea>
                </div>
                <!-- .pt-option-box ends -->
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