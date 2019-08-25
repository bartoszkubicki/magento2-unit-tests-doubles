<?php

declare(strict_types=1);

/**
 * File: FailingProductRepositoryStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Catalog\Api;

use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStub;
use BKubicki\Magento2TestDoubles\Catalog\Api\FailingProductRepositoryStub;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class FailingProductRepositoryStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Catalog\Api
 */
class FailingProductRepositoryStubTest extends AbstractProductRepositoryStubTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->repositoryStub = new FailingProductRepositoryStub();
    }

    /**
     * @return void
     * @throws CouldNotSaveException
     * @throws InputException
     * @throws StateException
     */
    public function testSaveThrowsException(): void
    {
        $this->expectException(CouldNotSaveException::class);
        $this->repositoryStub->save(new ProductStub());
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetThrowsException(): void
    {
        $this->expectException(NoSuchEntityException::class);
        $this->repositoryStub->get('test');
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     */
    public function testGetByIdThrowsException(): void
    {
        $this->expectException(NoSuchEntityException::class);
        $this->repositoryStub->getById(45);
    }

    /**
     * @return void
     * @throws StateException
     */
    public function testDeleteThrowsException(): void
    {
        $this->expectException(StateException::class);
        $this->repositoryStub->delete(new ProductStub());
    }

    /**
     * @return void
     * @throws NoSuchEntityException
     * @throws StateException
     */
    public function testDeleteByIdThrowsException(): void
    {
        $this->expectException(StateException::class);
        $this->repositoryStub->deleteById('test');
    }
}
