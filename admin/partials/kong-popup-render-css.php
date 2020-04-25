<?php
$position_css = $animation_css = '';

switch ( $appearance_position ) {
    case 'center-center':
    $position_css .= '
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%);
    ';
    break;

    case 'bottom-left':
    $position_css .= '
        left: 70px;
        right: auto;
        bottom: 70px;
        top: auto;
        transform: none;
    ';
    break;

    case 'bottom-right':
    $position_css .= '
        left: auto;
        right: 70px;
        bottom: 70px;
        top: auto;
        transform: none;
    ';
    break;

    case 'top-full':
    $position_css .= '
        left: 0;
        right: 0;
        top: 0;
        width: 100%;
        max-width: 100%;
        transform: none;
    ';
    break;

    case 'bottom-full':
    $position_css .= '
        left: 0;
        right: 0;
        top: auto;
        bottom:0;
        width: 100%;
        max-width: 100%;
        transform: none;
    ';
    break;

    case 'center-left':
    $position_css .= '
        left: 0px;
        right: auto;
        top: 70px;
        transform: none;
    ';
    break;

    case 'center-right':
    $position_css .= '
        left: auto;
        right: 0px;
        top: 70px;
        transform: none;
    ';
    break;

    case 'baseline-left':
    $position_css .= '
        left: 70px;
        right: auto !important;
        top: auto;
        transform: none;
        bottom: 0px;
    ';
    break;

    case 'baseline-right':
    $position_css .= '
        left: auto !important;
        right: 70px;
        top: auto;
        transform: none;
        bottom: 0px;
    ';
    break;
}

switch ( $animation ) {
    case 'linear':
    $animation_css = 'transition-timing-function: linear; ';
    break;

    case 'ease':
    $animation_css = 'transition-timing-function: ease; ';
    break;

    case 'ease-in-out':
    $animation_css = 'transition-timing-function: ease-in-out; ';
    break;

    case 'ease-in':
    $animation_css = 'transition-timing-function: ease-in; ';
    break;

    case 'ease-out':
    $animation_css = 'transition-timing-function: ease-out; ';
    break;
}

$dynamic_css = $position_css;

$generated_css = '
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
';

$generated_css .= "
<style type='text/css'>
    /*Popup CSS 18.3.2020 -->>Start*/
    .pt-popup {
        max-width: 600px;
        margin: auto;
        position: absolute;
        left: 15px;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #cccccc;
        padding: 20px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-shadow: 0 0 5px #ccc
    }

    .pt-popup__header {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        position: relative;
    }

    .pt-popup__close {
        position: absolute;
        right: 0;
        top: -6px;
        color: #979495
    }

    .pt-popup__header h2 {
        font-size: 20px;
        margin-top: 0
    }

    .pt-popup__body {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .pt-popup__body p {
        margin-bottom: 15px;
        font-size: 16px
    }

    .pt-frm-field {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        margin-bottom: 15px
    }

    .pt-frm-field label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px
    }

    .pt-frm-field input[type='email']{
        height: 38px;
        font-size: 16px;
        background-color: #fff;
        color: #424242;
        border: 1px solid #ccc;
        width: 100%;
        padding-left: 12px;
        padding-right: 12px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .pt-frm-field textarea {
        height: 100px;
        font-size: 16px;
        background-color: #fff;
        color: #424242;
        border: 1px solid #ccc;
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        resize: none
    }

    .pt-popup__body button {
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: $btn_bg_color;
        text-align: center;
        display: block;
        color: $btn_txt_color;
        cursor: pointer;
        padding: 10px 15px;
        width: 100%;
        font-size: 18px
    }

    p.pt-popup__note {
        font-size: 12px;
        color: #717171
    }

    .pt-popup--content input[type='email']{
        width: 79%;
        display: inline-block;
        vertical-align: middle;
    }

    .pt-popup--content button {
        display: inline-block;
        vertical-align: middle;
        width: auto;
        padding: 8px 15px
    }

    .pt-popup--socialList ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        font-size: 14px
    }

    .pt-popup--socialList ul li {
        display: inline-block;
        vertical-align: top
    }

    .pt-popup--socialList ul li a {
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        text-decoration:none;
    }

    .pt-fb {
        background-color: #39579a
    }

    .pt-tw {
        background-color: #1da8e2
    }

    .pt-popup--socialList ul li a i {
        font-size: 20px;
        vertical-align: middle;
        margin-right: 5px
    }

    .pt-popup--interstitial {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        background-color: #cccccc;
    }

    .pt-popup--interstitial .pt-popup {
        background-color: transparent
    }

    .pt-popup--interstitial .pt-popup__close {
        right: 15px;
        top: 15px
    }

    .pt-popup--promo button {
        display: inline-block;
        width: auto;
    }

    .pt-frm-field input[type='checkbox']{
        width: 15px;
        height: 15px
    }

    .pt-popup--survey .pt-frm-field label {
        background-color: #c2c2c2;
        margin-bottom: 5px;
        padding: 10px;
        font-size: 15px
    }

    .pt-frm-field input[type='radio']{
        width: 20px;
        height: 20px;
        vertical-align: middle
    }

    .pt-popup--twostep {
        top: auto;
        bottom: 50px;
        left: auto;
        right: 70px;
        transform: translateY(0);
    }

    .pt-two-stepBtn {
        display: inline-block;
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        position: fixed;
        right: 15px;
        bottom: 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px
    }

    .pt-popup--welc-mat {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        background-color: #cccccc 
    }

    .pt-popup--welc-mat .pt-popup__close {
        right: 15px;
        top: 15px
    }

    .pt-botBtn {
        width: 34px;
        height: 34px;
        display: inline-block;
        background-color: #808080;
        position: fixed;
        bottom: 30px;
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 50%
    }

    .pt-botBtn:after {
        content: '';
        width: 12px;
        height: 12px;
        border-bottom: 2px solid #fff;
        border-left: 2px solid #fff;
        display: block;
        margin: 8px auto;
        transform: rotate(315deg)
    }
    /*Popup CSS 18.3.2020 -->>end*/
";

$generated_css .= "
    .kong-popup {
        position: fixed;
        width: auto; 
        height: auto;
        padding:20px;
        z-index: 99999999999;
        $dynamic_css;
        animation-name: $position;
        animation-duration: 2s;
        -webkit-animation-duration: 6s;
        overflow:hidden;
    }
";

$generated_css .= "
    @keyframes bottom-left { 
        from { bottom: -500px; left:0; }    
        to { $position_css } 
    } 

    @keyframes center-right { 
        from { right: -500px; } 
        to { $position_css } 
    } 

    @keyframes center-left {  
        from {left: -500px; }   
        to { $position_css } 
    } 

    @keyframes center-center {    
        from { opacity: 0; } 
        to { opacity: 1; }  
    } 

    @keyframes bottom-right { 
        from {right: -500px; }   
        to { $position_css } 
    } 

    @keyframes top-full { 
        from {top: -500px; } 
        to { $position_css } 
    } 

    @keyframes bottom-full {  
        from {bottom: -500px; }  
        to { $position_css } 
    } 

    @keyframes baseline-right {   
        from {right: -500px;bottom:-500px; } 
        to { $position_css } 
    } 

    @keyframes baseline-left {    
        from {left: -500px;bottom:-500px; }  
        to { $position_css } 
    } 
";

$generated_css .= "
    .animate {
        $animation_css
    }
";

$generated_css .= "
</style>
";
