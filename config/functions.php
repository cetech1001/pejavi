<?php
	function page($file, $params = null) {
		return PUBLIC_PATH . "/pages/$file.php" . ($params ? "?$params" : "");
	}

	function req($path) {
		require_once PROJECT_PATH . "/$path.php";
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
?>