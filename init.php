<?php


/** Absolute path to the Main directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}


require ABSPATH ."/config/config.php";

require ABSPATH."Core/init.php";
