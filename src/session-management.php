<?php
/**
 * Session timeout handler.
 *
 * A simple time stamp that denotes the time of the last activity (i.e. request) and update it
 * with every request
 * 
 * @link https://stackoverflow.com/a/1270960/946957
 *
 * @package Social Good Tools: Quick Base Hackathon
 * @version November 12, 2020
 * @since November 12, 2020
 */

$session_duration_hours = 2;
$hours_to_seconds_multiplier = 3600;
$session_length = $session_duration_hours * $hours_to_seconds_multiplier;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_length)) {
    // last request was more than $session_length seconds ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

/*
*  Use an additional time stamp to regenerate the session ID periodically
*  to avoid attacks on sessions like session fixation
*
* @link http://www.owasp.org/index.php/Session_fixation
*/

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}