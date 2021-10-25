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
Run command
```
composer test-unit-coverage
```

which is an alias for
```
./vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-html coverage/coverage-html --colors=always
```

  
### Integration
Run command 
```
composer test-integration
```

which is an alias for
```
./vendor/bin/phpunit -c phpunit.xml --testsuite "Integration" --colors=always
```

    
### Mutation tests (using Infection) ###

1. Infection tests requires xDebug enabled.

2. Run command
   ```
   composer test-infection
   ```

    which does the following:
    - Run PHPUnit tests and generate coverage in xml:
      ```
      ./vendor/bin/phpunit -c phpunit.xml --testsuite "Unit" --coverage-xml coverage/coverage-xml --log-junit coverage/phpunit.junit.xml
      ```
    - Run Infection mutation tests for covered code    
      ```
      ./vendor/bin/infection --coverage=coverage --only-covered --show-mutations
      ```
    
3. Find detailed report from mutations in ```var/log/dev/infection.log```.


  
## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/bartoszkubicki/magento2-unit-tests-doubles/tags).


## Changelog

See changelog [here](CHANGELOG.md).


## Authors

* [Bartosz Kubicki](https://github.com/bartoszkubicki)


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details.
