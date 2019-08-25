<?php

declare(strict_types=1);

/**
 * File: ProductStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Catalog\Api\Data;

use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStub;
use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStubBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductStubBuilderTest
 * @package BKubicki\Magento2TestDoubles\Unit\Catalog\Api\Data
 */
class ProductStubBuilderTest extends TestCase
{
    /**
     * @var ProductStubBuilder
     */
    private $productStubBuilder;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->productStubBuilder = new ProductStubBuilder();
    }

    /**
     * @test
     * @return void
     */
    public function testBuildReturnsCorrectInstance(): void
    {
        $this->assertInstanceOf(ProductStub::class, $this->productStubBuilder->build());
    }
}
