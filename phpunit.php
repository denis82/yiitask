<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="./tests/_bootstrap.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Feature Tests">
            <directory >./tests</directory>
        </testsuite>

        <testsuite name="Unit Tests">
            <directory suffix="Test.php">./tests/Unit</directory>
        </testsuite>
    </testsuites>
    <filter>
        <blacklist>
            <directory suffix=".php">./vendor</directory>
        </blacklist>
    </filter>
</phpunit>