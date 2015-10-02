<?php
/*
Plugin Name: Screenpartners Social Sharing plugin
Plugin URI: http://screenpartner.no/
Description: Use [screenpartner_social] shortcode to display social sharing links. Use echo do_shortcode('[screenpartner_social]'); for theme display.
Version: 0.1
Author: Screenpartner AS
Author URI: http://screenpartner.no/
*/

function screenpartners_social_sharing_buttons() {

	$content = '';

	// Get current page URL
	$shortURL = get_permalink();
	
	// Get current page title
	$shortTitle = get_the_title();
	
	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$shortURL.'&amp;via=Crunchify';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shortURL;
	$emailURL = get_the_title() . '&amp;body=' . get_the_title() . '%0D%0A' . get_the_permalink();
	// For more sharing urls go here:
	// http://crunchify.com/list-of-all-social-sharing-urls-for-handy-reference-social-media-sharing-buttons-without-javascript/

	// Add sharing button at the end of page/page content
	$content .= '<ul class="share-buttons">';
	$content .= '<li class="share-label">Del:</li>';
	$content .= '<li><a class="share-link share-twitter" href="'. $twitterURL .'" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>';
	$content .= '<li><a class="share-link share-facebook" href="'.$facebookURL.'" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>';
	$content .= '<li><a class="share-link share-facebook" href="mailto:?subject='.$emailURL.'" target="_blank" title="Share with email"><i class="fa fa-envelope"></i></a></li>';
	$content .= '</ul>';
	$content .= '<div class="clearfix"></div>';
	return $content;
}

// Add Shortcode
function screenpartner_social_shortcode() {
	echo screenpartners_social_sharing_buttons();
}
add_shortcode( 'screenpartner_social', 'screenpartner_social_shortcode' );