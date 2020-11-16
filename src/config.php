<?php
/**
 * Configuration file for holdings.
 *
 * We define constants here to create root-relative web addresses and
 * absolute server paths throughout all the code
 *
 * @package Financial Tools: Quick Base Hackathon
 * @version November 2, 2020
 * @since July 29, 2016 to August 26, 2016
 */

define( 'IS_PRODUCTION', $_SERVER['SERVER_NAME'] != 'localhost' ? true : false );

if ( IS_PRODUCTION ) {

	define( 'WEB_ROOT', strstr( __DIR__, 'public_html', true ) . 'public_html' );
    define( 'SECURE_PATH', str_replace(  'public/src', '', __DIR__ )  . 'private' );


} else {

	define( 'WEB_ROOT', strstr( __DIR__, 'projects', true ) . 'projects' );
    define( 'SECURE_PATH',  strstr( __DIR__, 'quickbase-2020', true) . 'private'  );


}
