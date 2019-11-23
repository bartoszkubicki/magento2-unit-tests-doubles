# BKubicki Magento 2 Unit Tests Doubles


## Overview
Library provides useful doubles of different kinds for unit testing of Magento 2.3+. Some of doubles can be created using
dedicated builders, which helps in configuring desired behavior of doubles.
By using these doubles you can get rid of over-mocking in unit tests and time spent on writing unit should decrease. 
It is can be achieved because of the fact that all doubles inherits or implements replaced object or interface,
so type consistency is preserved. Examples in [here](EXAMPLES.md).


## Prerequisites
* PHP 7.2


## Installation ###

To install the extension use the following commands:

```bash
 composer require bkubicki/magento2-unit-tests-doubles
 ```
 

## Tests ##


### Unit ###
1. Run command
```
./vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-html coverage/coverage-html --colors=always
```

2. You can also use some alias:
  - `test-unit-coverage` - _`vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-html coverage/coverage-html --colors=always`_

  
### Integration
1. Run command 
```
./vendor/bin/phpunit -c phpunit.xml --testsuite "Integration" --colors=always
```

2.You can also use alias:
    - `test-integration` - _`vendor/bin/phpunit -c phpunit.xml --testsuite 'Integration' --colors=always`_

    
### Infection tests ###

1. Infection tests requires xDebug enabled.

2. Infection tests requires coverage generated in xml along with report.
   Run unit tests with these parameters, from inside container: 
    ```
    ./vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-xml coverage/coverage-xml --log-junit coverage/phpunit.junit.xml

    ```
3. Run:    
    ```
    ./vendor/bin/infection --coverage=coverage --only-covered --show-mutations
    ```
    
5. By default, detailed report from mutations is available in ```var/log/dev/infection.log```.

6. You also can use alias, which does all job for you:
    - `test-infection` - _`./scripts/tests/infection.sh`_

  
## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/bartoszkubicki/background-process-screen/tags).


## Changelog

See changelog [here](CHANGELOG.md).


## Authors

* [Bartosz Kubicki](https://github.com/bartoszkubicki)


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details.
