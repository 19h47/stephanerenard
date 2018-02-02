<?php
// https://premium.wpmudev.org/blog/customizing-wordpress-post-editor/
add_filter("mce_buttons_2", "tinymce_enable_more_buttons");
function tinymce_enable_more_buttons( $buttons ) {

	// $buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	// $buttons[] = 'styleselect';
	// $buttons[] = 'backcolor';
	// $buttons[] = 'newdocument';
	// $buttons[] = 'cut';
	// $buttons[] = 'copy';
	// $buttons[] = 'charmap';
	// $buttons[] = 'hr';
	// $buttons[] = 'visualaid';

	return $buttons;
}
// add_filter( 'mce_buttons_4', 'tinymce_buttons' );


add_filter( 'tiny_mce_before_init', 'tinymce_enable_more_text_sizes' );
function tinymce_enable_more_text_sizes( $initArray ){
    $initArray['theme_advanced_font_sizes'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 33px 34px 35px 36px";
    $initArray['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 33px 34px 35px 36px";
    return $initArray;
}