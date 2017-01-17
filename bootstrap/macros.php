<?php

/**
 * Define custom macros here.
 */

/**
 * Call To Action button.
 */
HTML::macro( 'cta', function( $url, $text, $attributes = array() )
{
	$span_text = '<span class="text">' . $text . '</span>';
	$attributes['class'] = 'cta';
	return HTML::expander( $url, $span_text, 'sprite slider-arrow arrow', $attributes);
});

/**
 * Content expander arrow link.
 */
HTML::macro( 'expander', function( $url, $text, $span_class, $attributes = array() )
{
	return '<a' . HTML::attributes( fuzz_macro_attributes( $url, $attributes ) ) . '><span>' . $text . '</span><div class="' . $span_class . '"></div></a>';
});

/**
 * Pager previous link.
 */
HTML::macro( 'pagerPrev', function( $url, $text, $span_class, $attributes = array() )
{
	return  '<a' . HTML::attributes( fuzz_macro_attributes( $url, $attributes ) ) . '><div class="' . $span_class . '"></div>' . $text . '</a>';
});

/**
 * Pager next link.
 */
HTML::macro( 'pagerNext', function( $url, $text, $span_class, $attributes = array() )
{
	return '<a' . HTML::attributes( fuzz_macro_attributes( $url, $attributes ) ) . '>' . $text . '<div class="' . $span_class . '"></div></a>';
});

/**
 * Sprited link for social icons.
 */
HTML::macro( 'social', function( $url, $text, $span_class, $text_class, $attributes = array() )
{
	return '<a' . HTML::attributes( fuzz_macro_attributes( $url, $attributes ) ) . '><span class="' . $span_class . '"></span><span class="' . $text_class . '">' . $text . '</span></a>';
});

/**
 * Menu link for admin section.
 */
HTML::macro( 'menu_link', function( $uri = '/', $label = 'Home' ) {
	return '<li ' . ( Request::is( $uri ) ? 'class="active" ' : '' ) . '>' . HTML::link( $uri, $label ) . '</li>';
} );

/**
 * Return image with full S3 URL.
 */
HTML::macro( 'image_with_directory', function( $image, $title, $directory, $crop = null, $attributes = array() ) {
	if ( is_array( $image ) ) {
		if ( !is_null( $crop ) ) { $crop = '_' . $crop; }
		$url = FileManager::get_full_s3_url( $image['filename'] . $crop . '.' . $image['extension'], $directory );
		return HTML::image( $url, $title, $attributes );
	}
} );

/**
 * Return CMS action drop requirements for saving.
 */
HTML::macro( 'actions', function( $requirements = array() ) {
	$items = '';
	foreach ( $requirements as $requirement ) {
		$items .= ( ' !item.' . $requirement . ' ||' );
	}
	return '<a ng-class="{ disabled:' . substr( $items, 0, -3 ) . ' }" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></a>';
} );

/**
 * Return a TNG stardate based on some fuzzy math.
 * cf. http://en.wikipedia.org/wiki/Stardate
 */
HTML::macro( 'star_date', function() {
	// 17 means 21st century, 7th "season"
	// The rest is a "day counter" going from 000 to 999 including partial days
	return '17' . str_pad( round( 1000 * date( 'z' ) / 365, 1 ), 5, '0', STR_PAD_LEFT );
} );

/**
 * Inform CMS users about the exact dimensions for image uploads.
 */
HTML::macro( 'image_dimensions', function( $size ) {
	$config = Config::get( 'images.' . $size );
	if ( isset( $config['width'] ) && isset( $config['height'] ) ) {
		return sprintf( '<small>(images must be exactly %dpx &times; %dpx)</small>', $config['width'], $config['height'] );
	} elseif ( isset( $config['min_side'] ) ) {
		return sprintf( '<small>(images must be at least %dpx in either width or height)</small>', $config['min_side'] );
	} elseif ( isset( $config['max_side'] ) ) {
		return sprintf( '<small>(images must be less than %dpx in both width or height)</small>', $config['max_side'] );
	}
} );

HTML::macro( 'date', function( $date ) {
	return '<span>' . ( new Carbon( $date ) )->format( 'F j, Y' ) . '</span>';
} );

/**
 * Pass in a string and determine if any of the words exceed the character limit.
 *
 * @param string  {$string}
 *     Text to limit
 * @param integer {$limit}
 *     Number to limit string by
 *
 * @return boolean
 *     True if substrings exceed limit
 */
HTML::macro( 'word_limit', function( $string, $limit ) {
	$substrings = explode( ' ', $string );

	foreach ( $substrings as $sub ) {
		if ( strlen( $sub ) > $limit ) {
			return true;
		}
	}

	return false;
} );
