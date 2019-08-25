<?php

declare(strict_types=1);

/**
 * File: ProductStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Integration\Catalog\Api;

use BKubicki\Magento2TestDoubles\Catalog\Api\Data\ProductStubBuilder;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Visibility;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductStubBuilderTest
 * @package BKubicki\Magento2TestDoubles\Integration\Catalog\Api
 */
class ProductStubBuilderTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function testBuildingProductStub(): void
    {
        $exampleData = ['sth' => 'value'];
        $exampleId = 11;
        $exampleName = 'testing';
        $exampleTierPrices = ['1' => 25.00];
        $exampleLinks = ['1_link'];

        $productStub = ProductStubBuilder::productStub()
            ->withId($exampleId)
            ->withData($exampleData)
            ->withName($exampleName)
            ->withTierPrices($exampleTierPrices)
            ->withLinks($exampleLinks)
            ->build();

        $mergedData = [
            'entity_id' => $exampleId,
            ProductInterface::SKU => 'test',
            ProductInterface::ATTRIBUTE_SET_ID => '4',
            ProductInterface::NAME => $exampleName,
            ProductInterface::PRICE => '35.00',
            ProductInterface::CREATED_AT => '2010-07-05 06:00',
            ProductInterface::TYPE_ID => 'simple',
            ProductInterface::STATUS => Status::STATUS_ENABLED,
            ProductInterface::VISIBILITY => Visibility::VISIBILITY_BOTH,
            'sth' => 'value'
        ];

        $this->assertSame(
            $mergedData,
            $productStub->getData()
        );

        $this->assertSame(
            $exampleTierPrices,
            $productStub->getTierPrices()
        );

        $this->assertSame(
            $exampleLinks,
            $productStub->getProductLinks()
        );

        $this->assertSame(
            'simple',
            $productStub->getTypeId()
        );

        $this->assertEmpty($productStub->getMediaGalleryEntries());
    }
}
