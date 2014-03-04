WordPress Plugin Tests
======================

This repo contains unit testing skeleton files designed for use in WordPress
plugins that utilize WordPress's own unit testing framework and
[PHPUnit](https://github.com/sebastianbergmann/phpunit/). We've outlined two
methods of unit testing your WordPress plugin. First within a local installation
of WordPress, and a second method using [Travis CI](http://travis-ci.org/).

[![Build Status](https://travis-ci.org/tierra/wordpress-plugin-tests.png?branch=master)](https://travis-ci.org/tierra/wordpress-plugin-tests)

Installation
------------

1. Copy `.travis.yml`, `phpunit.xml.dist`, and the `tests` directory into the
   root folder of your plugin.
2. Open `tests/bootstrap.php` and update the `active_plugins` setting to point
   to your main plugin file.

Running Unit Tests Locally
--------------------------

1. Clone a copy of WordPress from this GitHub mirror of the official
   develop.svn.wordpress.org repository:

   ```git clone git://develop.git.wordpress.org/ wordpress```

2. Copy your plugin (along with unit testing files) into the copy of WordPress
   that was included in the clone above under: `src/wp-content/plugins`
3. Copy the `wp-tests-config-sample.php` file in the root of the `wordpress`
   folder to `wp-tests-config.php`, and make the appropriate changes pointing
   it to a new, empty MySQL database it can use for testing. DO NOT USE A
   WORKING WORDPRESS DATABASE, IT WILL BE LOST!
4. Run `phpunit` from your plugin's root folder.

Writing Unit Tests
------------------

Create all new test cases under the `tests` folder with filenames prefixed with
`test_`. In those files, create a new class (name does not matter at all, but
it's recommended to prefix class names with `WP_Test_`) that extends
`WP_UnitTestCase`. All methods in this class prefixed with `test_` will be run
as unit tests. See the [PHPUnit documentation](http://www.phpunit.de/manual/current/en/)
for available assertions and other API available for writing tests.

An example has been provided at `tests/test_wordpress_plugin_tests.php`.

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
regards to compatible versions of PHP and WordPress.

### Using Grunt? No problem.

Just add these commands to your `before_script` step in `.travis.yml`:

```
    - npm install -g grunt-cli
    - npm install
```

If you use the same method that WordPress does for
[adding a phpunit task](http://core.trac.wordpress.org/browser/trunk/Gruntfile.js)
to your plugin, then you can just use `grunt test` instead of `phpunit` for your
`script`.
