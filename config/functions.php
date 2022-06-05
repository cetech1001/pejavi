<?php
	function page($file, $params = null) {
		return PUBLIC_PATH . "/pages/$file.php" . ($params ? "?$params" : "");
	}

	function req($path) {
		require_once PROJECT_PATH . "/$path.php";
	}

	function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function check_for_db_error($sql) {
    	global $conn;
    	if ($conn->errno) {
    		die("Query error: {$conn->error}");
    	}
    }

    function redirect($file, $params = null) {
    	header("location: " . page($file, $params));
    	exit();
    }
?>