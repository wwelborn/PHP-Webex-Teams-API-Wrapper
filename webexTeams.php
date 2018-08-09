<?php
	function webexTeams_createRoom($token = null, $roomTitle = null) {
		// Vars
		$endpoint = "/rooms";
		$json = array();
		$verb = "POST";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomTitle)) {
			// Set the room name
			$json["title"] = substr($roomTitle, 0, 150);
			// Encode the JSON
			$json = json_encode($json);
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, $json, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_getRoom($token = null, $roomID = null) {
		// Vars
		$endpoint = "/rooms/";
		$json = array();
		$verb = "GET";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID)) {
			// Set the userid into the endpoint
			$endpoint .= $roomID;
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_putRoom($token = null, $roomID = null, $roomTitle = null) {
		// Vars
		$endpoint = "/rooms/";
		$json = array();
		$verb = "PUT";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID) && !empty($roomTitle)) {
			// Set the userid into the endpoint
			$endpoint .= $roomID;
			// Set the variables
			$json["title"] = substr($roomTitle, 0, 150);
			// Encode the JSON
			$json = json_encode($json);
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, $json, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_deleteRoom($token = null, $roomID = null) {
		// Vars
		$endpoint = "/rooms/";
		$json = array();
		$verb = "DELETE";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID)) {
			// Set the userid into the endpoint
			$endpoint .= $roomID;
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_getPerson($token = null, $userid = null) {
		// Vars
		$endpoint = "/people?email=";
		$json = array();
		$verb = "GET";
		// Check that the required variable were provided
		if(!empty($token) && !empty($userid)) {
			// Set the userid into the endpoint
			$endpoint .= str_replace("@cisco.com", "", $userid) . "@cisco.com";
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_createRoomParticipant($token = null, $roomID = null, $userid = null, $isModerator = null) {
		// Vars
		$endpoint = "/memberships";
		$json = array();
		$verb = "POST";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID) && !empty($userid)) {
			// Set the room name
			$json["roomId"] = $roomID;
			$json["personEmail"] = str_replace("@cisco.com", "", $userid) . "@cisco.com";
			$json["isModerator"] = (($isModerator === true || $isModerator === strtolower("true")) ? true : false);
			// Encode the JSON
			$json = json_encode($json);
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, $json, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_putRoomParticipant($token = null, $membershipID = null, $isModerator = null) {
		// Vars
		$endpoint = "/memberships/";
		$json = array();
		$verb = "PUT";
		// Check that the required variable were provided
		if(!empty($token) && !empty($membershipID)) {
			// Set the mambershipID into the endpoint
			$endpoint .= $membershipID;
			// Set the variables
			$json["isModerator"] = (($isModerator === true || $isModerator === strtolower("true")) ? true : false);
			// Encode the JSON
			$json = json_encode($json);
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, $json, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_deleteRoomParticipant($token = null, $membershipID = null) {
		// Vars
		$endpoint = "/memberships/";
		$json = array();
		$verb = "DELETE";
		// Check that the required variable were provided
		if(!empty($token) && !empty($membershipID)) {
			// Set the mambershipID into the endpoint
			$endpoint .= $membershipID;
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_getRoomParticipants($token = null, $roomID = null) {
		// Vars
		$endpoint = "/memberships?roomId=";
		$json = array();
		$verb = "GET";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID)) {
			// Set the roomID into the endpoint
			$endpoint .= $roomID;
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_putMessage($token = null, $roomID = null, $markdown = null) {
		// Vars
		$endpoint = "/messages";
		$json = array();
		$verb = "POST";
		// Check that the required variable were provided
		if(!empty($token) && !empty($roomID) && !empty($markdown)) {
			// Set the room name
			$json["roomId"] = $roomID;
			$json["markdown"] = str_replace("&", "%26", $markdown);
			// Encode the JSON
			$json = json_encode($json);
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, $json, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_deleteMessage($token = null, $messageID = null) {
		// Vars
		$endpoint = "/messages/";
		$json = array();
		$verb = "DELETE";
		// Check that the required variable were provided
		if(!empty($token) && !empty($messageID)) {
			// Set the messageID into the endpoint
			$endpoint .= $messageID;
			// Perform the request
			$output = webexTeams_curl($token, $endpoint, null, $verb);
			// Return the results
			return (!empty($output) ? json_decode($output, true) : null);
		} else {
			return false;
		}
	}
	function webexTeams_curl($token = null, $endpoint = null, $POST = null, $verb = null) {
		// Vars
		$apiRoot = "https://api.ciscospark.com/v1";
		$verb = (!empty($verb) ? strtoupper($verb) : "GET");
		// Check that the required variables were set
		if(!empty($token) && !empty($endpoint)) {
			// Create the auth header
			$headers = array(
				"Authorization: Bearer " . trim($token),
				"Content-Type: application/json"
			);
			// Create the cURL instance
			$ch = curl_init();
			// Set the verb to use
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
			// Set the options
			curl_setopt($ch, CURLOPT_URL, $apiRoot . $endpoint);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_ENCODING, "");
			curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
			curl_setopt($ch, CURLOPT_TIMEOUT, 120);
			curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, false);
			curl_setopt($ch, CURLOPT_VERBOSE, false);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
			// Set the header is passed in
			if(!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			// If a POST is set, create the element
			if(!empty($POST)) {
				// Set the headers
				curl_setopt($ch, CURLOPT_POST, 1);
				// Set the fields
				curl_setopt($ch, CURLOPT_POSTFIELDS, trim($POST));
			}
			// Call the page
			$content = curl_exec($ch);
			// Close the connection
			curl_close($ch);
			// Return the result
			return $content;
		} else {
			return false;
		}
	}
?>