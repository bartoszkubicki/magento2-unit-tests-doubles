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
     * @var string
     */
    private const VIRTUAL_PRODUCT_TYPE = 'virtual';

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

    /**
     * @test
     * @return void
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function testIfBuilderIsReusable(): void
    {

        $virtualProductBuilder = ProductStubBuilder::productStub()->withData(['type_id' => self::VIRTUAL_PRODUCT_TYPE]);

        $disabledProduct = $virtualProductBuilder->withData(['status' => Status::STATUS_DISABLED])->build();
        $this->assertSame(Status::STATUS_DISABLED, $disabledProduct->getStatus());

        $hiddenProduct = $virtualProductBuilder->withData(['visibility' => Visibility::VISIBILITY_NOT_VISIBLE])
            ->build();

        $this->assertSame(Visibility::VISIBILITY_NOT_VISIBLE, $hiddenProduct->getVisibility());
        $visibleAndEnabledProduct = $virtualProductBuilder->build();

        $this->assertSame(self::VIRTUAL_PRODUCT_TYPE, $visibleAndEnabledProduct->getTypeId());
        $this->assertSame(Visibility::VISIBILITY_BOTH, $visibleAndEnabledProduct->getVisibility());
        $this->assertSame(Status::STATUS_ENABLED, $visibleAndEnabledProduct->getStatus());
    }
}
