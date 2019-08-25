<?php

declare(strict_types=1);

/**
 * File: AbstractProductRepositoryStubTestCase.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Catalog\Api;

use BKubicki\Magento2TestDoubles\Catalog\Api\AbstractProductRepositoryStub;
use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStub;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\Search\SearchCriteria;
use Magento\Framework\Api\SearchResultsInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractProductRepositoryStubTestCase
 *
 * @package BKubicki\Magento2TestDoubles\Unit\Catalog\Api
 */
abstract class AbstractProductRepositoryStubTestCase extends TestCase
{
    /**
     * @var ProductInterface[]
     */
    protected $productListLoaded;

    /**
     * @var AbstractProductRepositoryStub
     */
    protected $repositoryStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->productListLoaded = [new ProductStub()];
    }

    /**
     * @test
     * @return void
     */
    public function testGetListReturnsCorrectObject(): void
    {
        $this->assertInstanceOf(
            SearchResultsInterface::class,
            $this->repositoryStub->getList(new SearchCriteria())
        );
    }
}
