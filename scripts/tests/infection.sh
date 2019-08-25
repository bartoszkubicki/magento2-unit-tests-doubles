#!/bin/bash

./vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-xml coverage/coverage-xml --log-junit coverage/phpunit.junit.xml --colors=always
./vendor/bin/infection --coverage=coverage --log-verbosity=all --only-covered