<?php

declare(strict_types=1);

/**
 * File: SuccessfulProductRepositoryStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Catalog\Api;

use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStub;
use BKubicki\Magento2TestDoubles\Catalog\Api\SuccessfulProductRepositoryStub;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class SuccessfulProductRepositoryStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Catalog\Api
 */
class SuccessfulProductRepositoryStubTest extends AbstractProductRepositoryStubTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->repositoryStub = new SuccessfulProductRepositoryStub(
            new ProductStub(),
            new ProductStub(),
            new ProductStub()
        );
    }

    /**
     * @return void
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws StateException
     */
    public function testSaveReturnsSavedProductAndThrowsNoException(): void
    {
        $this->assertInstanceOf(
            ProductInterface::class,
            $this->repositoryStub->save(new ProductStub())
        );
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetReturnsSomeProductAndThrowsNoException(): void
    {
        $this->assertInstanceOf(
            ProductInterface::class,
            $this->repositoryStub->get('some_sku')
        );
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetByIdReturnsSomeProductAndThrowsNoException(): void
    {
        $this->assertInstanceOf(
            ProductInterface::class,
            $this->repositoryStub->getById(10)
        );
    }

    /**
     * @return void
     * @throws StateException
     */
    public function testDeleteReturnsTrueAndThrowsNoException(): void
    {
        $this->assertTrue($this->repositoryStub->delete(new ProductStub()));
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     * @throws StateException
     */
    public function testDeleteByIdReturnsTrueAndThrowsNoException(): void
    {
        $this->assertTrue($this->repositoryStub->deleteById('some_sku'));
    }
}
