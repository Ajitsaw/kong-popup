<!-- .popup-tab-content starts -->
<div class="popup-tab-content content">
  <!-- .left-panel starts -->
  <div class="w-50 left-panel">
    <!-- .form-wrap starts -->
    <div class="form-wrap">
        <label>Position</label>
        <!-- .form-position starts -->
        <div class="form-position">
            <input type="radio" name="position" value="" id="pos-bot" data-name="">
            <label for="pos-bot" class="pos-label">
                <div class="popview-icon popview-icon__pos-bot"></div>
            </label>

            <input type="radio" name="position" value="" id="pos-top" data-name="">
            <label for="pos-top" class="pos-label">
                <div class="popview-icon popview-icon__pos-top"></div>
            </label>

            <input type="radio" name="position" value="" id="pos-left" data-name="">
            <label for="pos-left" class="pos-label selected">
                <div class="popview-icon popview-icon__pos-left"></div>
            </label>

            <input type="radio" name="position" value="" id="pos-right" data-name="">
            <label for="pos-right" class="pos-label">
                <div class="popview-icon popview-icon__pos-right"></div>
            </label>

            <input type="radio" name="position" value="" id="pos-center" data-name="">
            <label for="pos-center" class="pos-label">
                <div class="popview-icon popview-icon__pos-center"></div>
            </label>
        </div>
        <!-- .form-position ends -->
        <h4>Spin Wheel Settings</h4>

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
        <!-- Show hide click on add image checkbox //Start -->

        <!-- Title //Start -->
        <div class="pt-option-box">
            <label>Title</label>
            <input type="text" name="" placeholder="WOOCOMMERCE LUCKY WHEEL">
        </div>
        <!-- Title //end -->

        <!-- Title //Start -->
        <div class="pt-option-box">
            <label>Description</label>
            <textarea></textarea>
        </div>
        <!-- Title //end -->

        <!-- Add field Button //Start -->
        <div class="pt-option-box">
            <button class="pt-add-field" id="addFldBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add Fields</button>
            <ul class="add-button-field" id="addFldList">
                <li id="welcomePageBtn">Welcome Page</li>
                <li id="radioButtonsBtn">Radio Buttons</li>
                <li id="checkboxesBtn">Checkboxes</li>
                <li id="dropdownListBtn">Dropdown list</li>
                <li id="singleLineTextBtn">Single line text</li>
                <li id="multiLineTextBtn">Multiline text</li>
                <li id="emailAddressBtn">Email address</li>
                <li id="ratingBtn">Rating</li>
                <li id="successPageBtn">Success page</li>
            </ul>
        </div>
        <!-- Add field Button //end -->

        <!-- Add Field //Start -->
        <div class="pt-addfield" id="fldArea">
          <!-- <div class="drugableSection" id="dd_00">
            <div class="pt-addfield-box">
              <div class="accrodianBtn">
                <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="" readonly value="Rating"></span>
                <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
              </div>

                <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                <ul class="add-button-field pt-config-btn">
                    <li class="renameTitle">Rename</li>
                    <li class="cloneSection">Clone</li>
                    <li class="removeSection">Remove</li>
                </ul>
            </div>
            <div class="pt-addfield-box-edit">
                <div class="pt-option-box">
                    <label>Field Label</label>
                    <input type="text" name="" placeholder="text Label">
                </div>
                <div class="pt-option-box">
                    <i class="fa fa-star fontSize30" aria-hidden="true"></i>
                    <label>Repeats</label>
                    <input type="text" name="" placeholder="10">
                </div>
                <div class="pt-checkbox pt-inline-field">
                    <label class="container">
                      <input type="checkbox">
                      <span class="checkmark"></span>Required
                    </label>
                </div>
            </div>

          </div> -->

        </div>
        <!-- Add Field //Start -->

        <!-- Add field Button //Start -->
        <div class="pt-option-box">
            <button class="pt-add-field" id="addSegmentBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add Segments</button>
        </div>
        <!-- Add field Button //end -->

        <!-- Add Field //Start -->
        <div class="pt-addfield no-border-bot" id="segmentArea">
            <!-- <div class="drugableSection" id="dd_00">
                <div class="pt-addfield-box">
                    <div class="accrodianBtn">
                        <span class="pt-addfield-box-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        <span class="pt-addfield-box-title"><input type="text" class="editableTitle" name="" readonly value="Segment Title #1"></span>
                        <span class="pt-addfield-box-arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                    </div>
                    
                    <a class="pt-addfield-box-config" href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <ul class="add-button-field pt-config-btn">
                        <li class="renameTitle">Rename</li>
                        <li class="cloneSegment">Clone</li>
                        <li class="removeSection">Remove</li>
                    </ul>
                </div>

                <div class="pt-addfield-box-edit">
                    <div class="pt-option-box">
                        <label>Segment Title</label>
                        <input type="text" name="" placeholder="Segment Title #2">
                    </div>
                    <div class="pt-colors">
                        <label>Segment Color</label>
                        <ul>
                            <li>
                                <div class="pt-color-box">
                                    <span class="cp"><input type="text" name="" ></span>
                                    <span class="colorCode"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-option-box">
                        <label>Win / Result Message</label>
                        <textarea></textarea>
                    </div>
                    <div class="pt-option-box">
                        <label>End With This Message Instead</label>
                        <div class="pt-option-box-select">
                            <select><option>----</option></select>
                        </div>
                    </div>
                    <div class="pt-option-box">
                        <label>Win Percentage</label>
                        <div class="pt-win-percentage">
                            <input type="text" name="" placeholder="10%">
                        </div>
                    </div>
                </div>
            </div> -->
            
            
            
           
        </div>
        <!-- Add Field //Start -->

        <!-- Button Text //Start -->
        <div class="pt-option-box">
            <label>Button text</label>
            <input type="text" name="" placeholder="SPIN NOW!">
        </div>
        <!-- Button Text //end -->
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
</div>
<!-- .popup-tab-content ends -->