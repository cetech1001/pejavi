<?php
	function page($file, $params = null) {
		return PUBLIC_PATH . "/pages/$file.php" . ($params ? "?$params" : "");
	}

	function is_auction_live($start_time, $end_time) {
        $start = strtotime($start_time);
        $end = strtotime($end_time);
        $time = time();
        return $time >= $start_time && $time <= $end_time;
    }

	function sanitize($data) {
        global $conn;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $conn->escape_string($data);
    }

    function check_for_db_error($sql) {
    	global $conn;
    	if ($conn->errno) {
    		die("Query error: {$conn->error}");
    	}
    }

    function redirect($page) {
    	header("location: " . $page);
    	exit();
    }

    function date_time($value) {
        $arr = explode(" ", $value);
        return join("T", $arr);
    }