The phpunit in this composer.json is locked to 8.5.8 and everything works as expected:

To set up, clone this repo, and `composer install`

## Normal Functionality

`vendor/bin/phpunit -v test.php --testdox`

The test passes:

```
PHPUnit 8.5.8 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.3.19-1~deb10u1

Unnamed Tests (App\Tests\UnnamedTests)
 ✔  [1321.92 ms]

Time: 1.55 seconds, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

Or if you do not have a seleium server running the test will be skipped:

```
PHPUnit 8.5.8 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.3.19-1~deb10u1

Unnamed Tests (App\Tests\UnnamedTests)
 ↩  [7.44 ms]
   │
   │ The Selenium Server is not active on host localhost at port 4444.
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:345
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:384
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

Time: 80 ms, Memory: 6.00 MB


OK, but incomplete, skipped, or risky tests!
Tests: 1, Assertions: 0, Skipped: 1.
````

## Broken Functionality

Something weird happens after the phpunit 8.5.9 update:

`composer require phpunit/phpunit:8.5.9 --update-with-dependencies`

```
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 0 installs, 1 update, 0 removals
  - Updating phpunit/phpunit (8.5.8 => 8.5.9): Loading from cache
Package phpunit/php-token-stream is abandoned, you should avoid using it. No replacement was suggested.
Writing lock file
Generating autoload files
```

`vendor/bin/phpunit -v test.php --testdox`

```
PHPUnit 8.5.9 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.3.19-1~deb10u1

Unnamed Tests (App\Tests\UnnamedTests)
 ☢ Set up [1022.11 ms]
   │
   │ This test did not perform any assertions
   │
   │ /home/bob/Projects/phpunittest/test.php:8
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✔  [1350.83 ms]
 ✘ Share session [1183.80 ms]
   │
   │ ArgumentCountError: Too few arguments to function PHPUnit\Extensions\Selenium2TestCase::shareSession(), 0 passed in /home/bob/Projects/phpunittest/vendor/phpunit/phpunit/src/Framework/TestCase.php on line 1415 and exactly 1 expected
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:199
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✘ Keep session on failure [1149.94 ms]
   │
   │ ArgumentCountError: Too few arguments to function PHPUnit\Extensions\Selenium2TestCase::keepSessionOnFailure(), 0 passed in /home/bob/Projects/phpunittest/vendor/phpunit/phpunit/src/Framework/TestCase.php on line 1415 and exactly 1 expected
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:213
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✘ Session strategy [1730.11 ms]
   │
   │ BadMethodCallException: The command 'sessionStrategy' is not existent or not supported yet.
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase/CommandsHolder.php:159
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase/CommandsHolder.php:105
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:440
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✘ Default session strategy [1119.84 ms]
   │
   │ BadMethodCallException: The command 'defaultSessionStrategy' is not existent or not supported yet.
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase/CommandsHolder.php:159
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase/CommandsHolder.php:105
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:440
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ☢ Default wait until timeout [1086.11 ms]
   │
   │ This test did not perform any assertions
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:240
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✘ Set default wait until timeout [1100.62 ms]
   │
   │ ArgumentCountError: Too few arguments to function PHPUnit\Extensions\Selenium2TestCase::setDefaultWaitUntilTimeout(), 0 passed in /home/bob/Projects/phpunittest/vendor/phpunit/phpunit/src/Framework/TestCase.php on line 1415 and exactly 1 expected
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:248
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ☢ Default wait until sleep interval [1215.09 ms]
   │
   │ This test did not perform any assertions
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:257
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │

 ✘ Set default wait until sleep interval [1176.35 ms]
   │
   │ ArgumentCountError: Too few arguments to function PHPUnit\Extensions\Selenium2TestCase::setDefaultWaitUntilSleepInterval(), 0 passed in /home/bob/Projects/phpunittest/vendor/phpunit/phpunit/src/Framework/TestCase.php on line 1415 and exactly 1 expected
   │
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:265
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:395
   │ /home/bob/Projects/phpunittest/vendor/phpunit/phpunit-selenium/PHPUnit/Extensions/Selenium2TestCase.php:360
   │
^C
```

And it just goes on and on!!

