<?php

declare(strict_types=1);

/**
 * File: FailingProductRepositoryStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Integration\Catalog;

use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStub;
use BKubicki\Magento2TestDoubles\Catalog\Api\FailingProductRepositoryStubBuilder;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use PHPUnit\Framework\TestCase;

/**
 * Class FailingProductRepositoryStubBuilderTest
 * @package BKubicki\Magento2TestDoubles\Integration\Catalog
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class FailingProductRepositoryStubBuilderTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws InputException
     * @throws NoSuchEntityException
     * @throws StateException
     * @throws CouldNotSaveException
     */
    public function testBuildingFailingProductRepositoryStub(): void
    {
        $failingProductRepositoryStubBuilder = FailingProductRepositoryStubBuilder::productRepositoryStub();
        $failingProductRepositoryStubBuilder->withProductsListLoaded(new ProductStub(), new ProductStub());
        $failingProductRepositoryStubBuilder->shouldSaveThrowInputException();
        $failingProductRepositoryStubBuilder->shouldDeleteByIdThrowNoSuchEntityException();
        $failingProductRepositoryStub = $failingProductRepositoryStubBuilder->build();

        $this->assertCount(2, $failingProductRepositoryStub->getList(new SearchCriteria())->getItems());
        $this->expectException(InputException::class);
        $failingProductRepositoryStub->save(new ProductStub());

        $this->expectException(NoSuchEntityException::class);
        $failingProductRepositoryStub->get('test');

        $this->expectException(NoSuchEntityException::class);
        $failingProductRepositoryStub->getById(56);

        $this->expectException(NoSuchEntityException::class);
        $failingProductRepositoryStub->deleteById('anything');

        $this->expectException(StateException::class);
        $failingProductRepositoryStub->delete(new ProductStub());
    }
}
