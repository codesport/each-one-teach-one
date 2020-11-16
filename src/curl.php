<?php

/**
 * Intialize curl and set curl library options
 *
 * Contains delete functionality added on 11-10-2020.
 * 
 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
 * array containing the HTTP server response header fields and content.
 *
 * USAGE:
 *	get_web_page( $url, $header_send=[],  $redirects=10 )
 *  post_web_page( $url, $post_fields, $header_send=[], $redirects=10 )
 *  delete_resource( $url, $body_information, $header_send=[], $redirects=10 )
 *
 * NOTES: 
 * 	1. 'CURLOPT_SSL_VERIFYPEER' disables SSL verify on dev machine:
 *		define( 'IS_PRODUCTION', $_SERVER['SERVER_NAME'] != 'localhost' ? true : false );
 *
 *	2. Setting 'CURLOPT_MAXREDIRS' via $redirects=0 may allow access to certain websites
 *
 *
 * @link http://stackoverflow.com/a/14953910 also see http://stackoverflow.com/a/13210186
 *
 * @global boolean IS_PRODUCTION constant defined within apps config file: dev or production
 * @param  string  $url URL to fetch.
 * @param  integer $redirects Optional. Number of auto page forwards to allow. 10
 * @return array   $header.  Error number, error message, or page content. 
 *
 * @package Social Good Tools: Quick Base Hackathon
 * @version   November 10, 2020
 * @since 	  November 10, 2020
 */

function get_web_page( $url, $header_send=[],  $redirects=10 ) {

    $user_agent = 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36';

	/**
    */

   // var_dump ($header_send ); exit;

    $options = array(

        CURLOPT_CUSTOMREQUEST  => 'GET',        // set request type post or get (reduntant)
        CURLOPT_POST           => false,        // set to GET
        CURLOPT_USERAGENT      => $user_agent,  // set user agent
        CURLOPT_COOKIEFILE     => 'cookie.txt', // set cookie file: send cookies from this file
        CURLOPT_COOKIEJAR      => 'cookie.txt', // set cookie jar:  write cookies to this file
        CURLOPT_RETURNTRANSFER => true,     	// return web page
        CURLOPT_HEADER         => false,    	// don't return headers
        CURLOPT_FOLLOWLOCATION => true,     	// follow redirects
        CURLOPT_ENCODING       => '',       	// handle all encodings
        CURLOPT_AUTOREFERER    => true,     	// set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      	// timeout on connect
        CURLOPT_TIMEOUT        => 120,      	// timeout on response
        CURLOPT_MAXREDIRS      => $redirects,	// stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => IS_PRODUCTION,// don't verify certs on local machine to prevent error code 60
        CURLOPT_HTTPHEADER 	   => $header_send,	// set client IP to avoid blocking
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

/**
 * HTTP POST for curl library initialization
 *
 * USAGE:
 *	Call with post_web_page( $url, $post_fields [, $redirects] )
 * 
 * Based on C:\wamp\www\projects\floatshrink\inc\login.php
 *
 * @link http://stackoverflow.com/a/21169961/946957 (login and download file)
 * @link http://stackoverflow.com/a/14953910 (curl get)
 *
 * @global boolean IS_PRODUCTION constant defined within apps config file
 * @param string $url URL to which target form POSTs.   
 * @param string $post_fields POST credentials.
 * @param integer $redirects Setting to 0 may allow access to certain websites.
 *
 * @return array $header.  Error number, error message, or page content.
 */
function post_web_page( $url, $post_fields, $header_send=[], $redirects=10 ) {

    $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36';

    $options = array(

        CURLOPT_CUSTOMREQUEST  => 'POST',       //set request type post or get (req)
        CURLOPT_POST           => true,         //set to true for POST (req)
        CURLOPT_POSTFIELDS	   => $post_fields,
        CURLOPT_USERAGENT      => $user_agent, 	//set user agent
        CURLOPT_COOKIEFILE     => 'cookie.txt', //set cookie file
        CURLOPT_COOKIEJAR      => 'cookie.txt', //set cookie jar
        CURLOPT_RETURNTRANSFER => true,     	// return web page (req)
        CURLOPT_HEADER         => false,    	// don't return headers
        CURLOPT_FOLLOWLOCATION => true,    		// follow redirects
        CURLOPT_ENCODING       => '',      		// handle all encodings
        CURLOPT_AUTOREFERER    => true,    		// set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,     		// timeout on connect
        CURLOPT_TIMEOUT        => 120,    		// timeout on response
        CURLOPT_MAXREDIRS      => $redirects,   // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => IS_PRODUCTION,// don't verify certs on local machine to prevent error code 60        
        CURLOPT_HTTPHEADER 	   => $header_send,
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

/**
 * @link  https://stackoverflow.com/questions/13420952/php-curl-delete-request
 * 
 * @link https://stackoverflow.com/a/38035046/946957
 * 
 * $post_fields is actually the body data sent
 * 
 */
function delete_resource( $url, $post_fields, $header_send=[], $redirects=10 ) {

    $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36';

    $options = array(

        CURLOPT_CUSTOMREQUEST  => 'DELETE',       //set request type post or get (req)
        //CURLOPT_POST           => false,         //set to true for POST (req)
        CURLOPT_POSTFIELDS	   => $post_fields,
        CURLOPT_USERAGENT      => $user_agent, 	//set user agent
        CURLOPT_COOKIEFILE     => 'cookie.txt', //set cookie file
        CURLOPT_COOKIEJAR      => 'cookie.txt', //set cookie jar
        CURLOPT_RETURNTRANSFER => true,     	// return web page (req)
        CURLOPT_HEADER         => false,    	// don't return headers
        CURLOPT_FOLLOWLOCATION => true,    		// follow redirects
        CURLOPT_ENCODING       => '',      		// handle all encodings
        CURLOPT_AUTOREFERER    => true,    		// set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,     		// timeout on connect
        CURLOPT_TIMEOUT        => 120,    		// timeout on response
        CURLOPT_MAXREDIRS      => $redirects,   // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => IS_PRODUCTION,// don't verify certs on local machine to prevent error code 60        
        CURLOPT_HTTPHEADER 	   => $header_send,
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}