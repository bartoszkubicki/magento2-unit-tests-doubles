<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Integration\Customer;

use BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository\FailingCustomerRepositoryStubBuilder;
use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStub;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;
use PHPUnit\Framework\TestCase;

/**
 * Class FailingCustomerRepositoryStubBuilderTest
 * @package BKubicki\Magento2TestDoubles\Integration\Customer
 */
class FailingCustomerRepositoryStubBuilderTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws InputException
     * @throws LocalizedException
     * @throws NoSuchEntityException
     * @throws InputMismatchException
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function testBuildingFailingCustomerRepositoryStub(): void
    {
        $customerRepositoryStubBuilder = FailingCustomerRepositoryStubBuilder::customerRepository();
        $customerRepositoryStubBuilder->shouldSaveThrowInputException();
        $customerRepositoryStubBuilder->shouldGetMethodsThrowLocalizedException();
        $customerRepositoryStubBuilder->shouldDeleteMethodsThrowNoSuchEntityException();
        $customerRepositoryStubBuilder->withCustomersListLoaded(
            new CustomerStub(),
            new CustomerStub(),
            new CustomerStub()
        );

        $customerRepositoryStub = $customerRepositoryStubBuilder->build();

        $this->assertCount(3, $customerRepositoryStub->getList(new SearchCriteria())->getItems());

        $this->expectException(InputException::class);
        $customerRepositoryStub->save(new CustomerStub());

        $this->expectException(LocalizedException::class);
        $customerRepositoryStub->get('test@gmail');

        $this->expectException(LocalizedException::class);
        $customerRepositoryStub->getById(33);

        $this->expectException(NoSuchEntityException::class);
        $customerRepositoryStub->deleteById(3);
    }

    /**
     * @test
     * @return void
     * @throws InputException
     * @throws LocalizedException
     * @throws NoSuchEntityException
     * @throws InputMismatchException
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function testBuildingFailingCustomerRepositoryStubWithDefaultValues(): void
    {
        $customerRepositoryStubBuilder = FailingCustomerRepositoryStubBuilder::customerRepository();
        $customerRepositoryStub = $customerRepositoryStubBuilder->build();

        $this->expectException(LocalizedException::class);
        $customerRepositoryStub->save(new CustomerStub());

        $this->expectException(NoSuchEntityException::class);
        $customerRepositoryStub->getById(33);

        $this->expectException(CouldNotDeleteException::class);
        $customerRepositoryStub->deleteById(3);
    }
}
