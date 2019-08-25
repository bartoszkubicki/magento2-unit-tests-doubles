<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Customer\Api;

use BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository\FailingCustomerRepositoryStub;
use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStub;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;

/**
 * Class FailingCustomerRepositoryStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Customer\Api
 */
class FailingCustomerRepositoryStubTest extends AbstractCustomerRepositoryTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->repositoryStub = new FailingCustomerRepositoryStub();
    }

    /**
     * @test
     * @return void
     * @throws LocalizedException
     * @throws InputException
     * @throws InputMismatchException
     */
    public function testSaveThrowsException(): void
    {
        $this->expectException(LocalizedException::class);
        $this->repositoryStub->save(new CustomerStub());
    }

    /**
     * @test
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function testGetThrowsException(): void
    {
        $this->expectException(NoSuchEntityException::class);
        $this->repositoryStub->get('test@gmail.com');
    }

    /**
     * @test
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function testGetByIdThrowsException(): void
    {
        $this->expectException(NoSuchEntityException::class);
        $this->repositoryStub->getById(23);
    }

    /**
     * @return void
     * @throws LocalizedException
     */
    public function testDeleteThrowsException(): void
    {
        $this->expectException(CouldNotDeleteException::class);
        $this->repositoryStub->delete(new CustomerStub());
    }

    /**
     * @return void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function testDeleteById(): void
    {
        $this->expectException(CouldNotDeleteException::class);
        $this->repositoryStub->deleteById(44);
    }
}
