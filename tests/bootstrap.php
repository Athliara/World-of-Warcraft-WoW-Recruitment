<?php

if (!defined('ABSPATH')) {
	if (!defined('WP_TESTS_DIR')) {
		exit;
	}
}

$athlios_wow_recruit_tests_dir = getenv('WP_TESTS_DIR');
if ( !$athlios_wow_recruit_tests_dir ) $athlios_wow_recruit_tests_dir = '/tmp/wordpress-tests-lib';

require_once $athlios_wow_recruit_tests_dir . '/includes/functions.php';

function athlios_wow_recruit_manually_load_plugin() {
	require dirname( __FILE__ ) . '/../world-of-warcraft-recruitment.php';
}
tests_add_filter( 'muplugins_loaded', 'athlios_wow_recruit_manually_load_plugin' );

require $athlios_wow_recruit_tests_dir . '/includes/bootstrap.php';
