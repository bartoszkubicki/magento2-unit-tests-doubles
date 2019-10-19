## General usage of doubles ##
If we want to replace mocks in our tests with provided tests doubles it is enough to create them by keyword `new`:

`$this->request = new SafeRequestStub();`
`new ProductStub()`

Majority of doubles don't have required arguments, so they are really easy to instantiate, so there is no special care
needed for its dependencies. Otherwise, if any double has some required argument, it is rather essential to use it.


## Configuring doubles ##
Most of object also has some default real-life data, that can be used in tests and cover more of cases. You can configure
doubles in different way listed above. By configuring, you can replace or add data to doubles or even replace default behavior
for some objects.


### Constructor configuration ### 
Most of doubles can be configured using constructor arguments:

`$this->request = new SafeRequestStub([self::QUOTE_ITEM_ID_PARAM => 45]);`
`
new CustomAttributesDataStub(
            [
                CustomAttributesDataStub::CUSTOM_ATTRIBUTES => ['test' => 'some_value']
            ],
            [
                'test'
            ]
        );
`

### Dedicated builders configuration ###
Some classes have dedicated double builders for more expressive and smooth double creation, when test case requires not-standard
instance. Here we have `ProductStub` builder. We replace default id with our and then we create stub instance.

`$this->product = ProductStubBuilder::productStub()->withId(6)->build();`

`
$customerRepositoryStub = FailingCustomerRepositoryStubBuilder::customerRepository()
             ->shouldSaveThrowInputException()
             ->shouldGetMethodsThrowLocalizedException()
             ->shouldDeleteMethodsThrowNoSuchEntityException()
             ->withCustomersListLoaded(
                 new CustomerStub(),
                 new CustomerStub(),
                 new CustomerStub()
             )->build();
`

## Final thought ##
As there are quite 
a few objects in library I advise taking closer look on builder, we are going to use. All classes are kept as simple as possible,
and generally stubs implementation are similar.