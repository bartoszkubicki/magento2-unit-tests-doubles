<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Integration\Customer;

use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStub;
use BKubicki\Magento2TestDoubles\Customer\Api\FailingCustomerRepositoryStubBuilder;
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
        $customerRepositoryStub = FailingCustomerRepositoryStubBuilder::customerRepositoryStub()
            ->shouldSaveThrowInputException()
            ->shouldGetMethodsThrowLocalizedException()
            ->shouldDeleteMethodsThrowNoSuchEntityException()
            ->withCustomersListLoaded(
                new CustomerStub(),
                new CustomerStub(),
                new CustomerStub()
            )->build();

        $this->assertCount(3, $customerRepositoryStub->getList(new SearchCriteria())->getItems());

        $this->expectException(InputException::class);
        $customerRepositoryStub->save(new CustomerStub());

        $this->expectException(LocalizedException::class);
        $customerRepositoryStub->get('test@invalid');

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
        $customerRepositoryStub = FailingCustomerRepositoryStubBuilder::customerRepositoryStub()->build();

        $this->expectException(LocalizedException::class);
        $customerRepositoryStub->save(new CustomerStub());

        $this->expectException(NoSuchEntityException::class);
        $customerRepositoryStub->getById(33);

        $this->expectException(CouldNotDeleteException::class);
        $customerRepositoryStub->deleteById(3);
    }

    /**
     * @test
     * @return void
     * @throws InputException
     * @throws InputMismatchException
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function testIfBuilderIsReusable(): void
    {
        $failingCustomerRepositoryStubBuilder = FailingCustomerRepositoryStubBuilder::customerRepositoryStub();
        $customerRepositoryStubThrowingInputException = $failingCustomerRepositoryStubBuilder
            ->shouldSaveThrowInputException()->build();
        $this->expectException(InputException::class);
        $customerRepositoryStubThrowingInputException->save(new CustomerStub());

        $customerRepositoryStubThrowingCouldNotSaveExceptionException = $failingCustomerRepositoryStubBuilder
            ->shouldSaveThrowInputMismatchException()->build();
        $this->expectException(InputMismatchException::class);
        $customerRepositoryStubThrowingCouldNotSaveExceptionException->save(new CustomerStub());
    }
}
