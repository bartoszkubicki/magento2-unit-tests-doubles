<?php

declare(strict_types=1);

/**
 * File: SuccessfulCustomerRepositoryStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Customer\Api;

use BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository\SuccessfulCustomerRepositoryStub;
use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStub;
use BKubicki\Magento2TestDoubles\Unit\Catalog\Api\AbstractProductRepositoryStubTestCase;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class SuccessfulCustomerRepositoryStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Customer\Api
 */
class SuccessfulCustomerRepositoryStubTest extends AbstractProductRepositoryStubTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->repositoryStub = new SuccessfulCustomerRepositoryStub(new CustomerStub());
    }

    /**
     * @test
     * @return void
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws StateException
     */
    public function testSaveReturnsCustomerAndThrowsNoException(): void
    {
        $this->assertInstanceOf(CustomerInterface::class, $this->repositoryStub->save(new CustomerStub()));
    }


    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetReturnsCustomerAndThrowsNoException(): void
    {
        $this->assertInstanceOf(CustomerInterface::class, $this->repositoryStub->get('test@gamil.com'));
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetByIdReturnsCustomerAndThrowsNoException(): void
    {
        $this->assertInstanceOf(CustomerInterface::class, $this->repositoryStub->getById(56));
    }

    /**
     * @return void
     * @throws StateException
     */
    public function testDeleteReturnsTrueAndThrowsNoException(): void
    {
        $this->assertTrue($this->repositoryStub->delete(new CustomerStub()));
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     * @throws StateException
     */
    public function testDeleteByIdReturnsTrueAndThrowsNoException(): void
    {
        $this->assertTrue($this->repositoryStub->deleteById(45));
    }
}
