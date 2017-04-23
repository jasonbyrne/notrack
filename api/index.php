<?php
require('../admin/include/global-vars.php');
require('../admin/include/global-functions.php');

$db = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

/**
 * Search for the reason we are blocking the site using reverse notation.
 *
 * @param $site
 * @return null|object|stdClass
 */
function getReasonBlocked($site) {
	global $db;

	// Must have database connection
	if (!$db) {
		$error = new stdClass();
		$error->message = 'Could not connect to database';
		echo json_encode((array) $error);
	}

	// Get reverse domain notation
	$arr = explode('.', $site);
	$arr = array_reverse($arr);
	$search = array();
	$len = sizeof($arr);
	// Loop through and create array of possible matches
	for ($i=0; $i < $len; $i++) {
		$search[] = implode('.', $arr);
		array_pop($arr);
	}

	// Look for a matching block reason
	$result = $db->query('SELECT bl_source, site, comment FROM blocklist WHERE site_reverse IN ("' . implode('","', $search) . '")');
	if ($result->num_rows > 0) {
		return $result->fetch_all();
	}

	// No block reason found
	return null;

}


// Why is this url blocked?
if (isset($_GET['q'])) {
	// Parse URL
	$url = $_GET['q'];
	$parse = parse_url($url);
	$host = $parse['host'];
	// If we got a host
	if (!empty($host)) {
		// Get reason
		$reason = getReasonBlocked($host);
		$payload = new stdClass();
		// If we round a reason
		if ($reason) {
			$payload->message = 'This URL was blocked by ' . $reason[0]['bl_source'];
			$payload->data = $reason;
		}
		// If reason found
		else {
			$payload->message = 'No reason found. Are you sure this URL is blocked?';
			$payload->data = array();
		}
		echo json_encode((array) $payload);
		exit;
	}
}

// Still here? Error
$error = new stdClass();
$error->message = 'Invalid API call';
echo json_encode((array) $error);
