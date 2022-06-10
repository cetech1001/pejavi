<?php

require_once "../../config/index.php";

unset($_SESSION["user"]);

header("location: " . page("index"));
