<?php

if ( file_exists( dirname(__FILE__) . '/wp-config-local.php' ) ) {
	require_once( dirname(__FILE__) . '/wp-config-local.php' );
} else {}

define( 'DISALLOW_FILE_EDIT', true );