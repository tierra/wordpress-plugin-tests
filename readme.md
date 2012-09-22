WordPress Plugin Tests
======================

Unit testing skeleton files for WordPress plugins that utilizes
[WordPress's unit testing framework](http://unit-tests.trac.wordpress.org/browser/trunk)
and [PHPUnit](https://github.com/sebastianbergmann/phpunit/). Provides methods
of unit testing your WordPress plugin in a local installation of WordPress as
well as using [Travis CI](http://travis-ci.org/).

Installation
------------

Copy `.travis.yml`, `bootstrap_tests.php`, `phpunit.xml`, and the `tests`
directory into the root folder of your plugin.

Writing Unit Tests
------------------

Create all new test cases under the `tests` folder with filenames prefixed with
`test_`. In those files, create a new class (name does not matter at all, but
it's recommended to prefix class names with `WP_Test_`) that extends
`WP_UnitTestCase`. All methods in this class prefixed with `test_` will be run
as unit tests. See the [PHPUnit documentation](http://www.phpunit.de/manual/current/en/)
for available assertions and other API available for writing tests.

An example has been provided at `tests/test_wordpress_plugin_tests.php`.

Running Unit Tests Locally
--------------------------

1. Checkout a copy of the WordPress unit tests from Subversion:

   ```svn checkout http://unit-tests.svn.wordpress.org/trunk wordpress-tests```

2. Copy your plugin (along with unit testing files) into the copy of WordPress
   that was included in the unit tests checkout under: `wordpress/wp-content/plugins`
3. Copy the `wp-tests-config-sample.php` file in the root `wordpress-tests`
   folder to `wp-tests-config.php`, and make the appropriate changes pointing
   it to a new, empty MySQL database it can use for testing. DO NOT USE A
   WORKING WORDPRESS DATABASE, IT WILL BE LOST!
4. Run `phpunit` from your plugin's root folder.

Configuring Travis CI
---------------------

Using Travis CI to run your unit tests absolutely requires that your plugin
is maintained on GitHub in a public repository. This will not work otherwise.

1. [Activate Travis CI](http://travis-ci.org/profile) for your plugin.
2. The first test run needs to be triggered by a push to your plugin's GitHub
   repository after you have activated it in Travis CI.

Any git push to your plugin repository from here on out will automatically
trigger new test runs on Travis CI.

You will likely want to customize `.travis.yml` to suite your plugin's needs in
regards to compatible versions of PHP, WordPress, and whether it supports
multisite or not.