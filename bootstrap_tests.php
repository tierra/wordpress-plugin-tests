<?php
/**
 * Bootstrap the plugin unit testing environment.
 *
 * Requires WordPress Unit Tests (http://unit-test.svn.wordpress.org/trunk/).
 *
 * Usage: Add any plugin(s) you want activated during the tests to the
 *        active_plugins array below. The value should be the path to the
 *        plugin relative to wp-content.
 *
 * Note: Do note change the name of this file. PHPUnit will automatically fire
 *       this file when run.
 *
 * @package wordpress-plugin-tests
 */

$GLOBALS['wp_tests_options'] = array(
	'active_plugins' => array( 'your-plugin/your-plugin.php' ),
);

// If the wordpress-tests repo location has been customized (and specified
// with WP_TESTS_DIR), use that location. This will most commonly be the case
// when configured for use with Travis CI.

// Otherwise, we'll just assume that this plugin is installed in the WordPress
// SVN external checkout configured in the wordpress-tests repo.

if( false !== getenv( 'WP_TESTS_DIR' ) ) {
	require getenv( 'WP_TESTS_DIR' ) . '/bootstrap.php';
} else {
	require dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) . '/bootstrap.php';
}
