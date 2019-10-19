<?php

declare(strict_types=1);

/**
 * File: ProductStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api\Data;

use function array_merge;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Visibility;

/**
 * Class ProductStubBuilder
 * @package BKubicki\Magento2TestDoubles\Catalog\Api\Data
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class ProductStubBuilder
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $defaultData = [
        'entity_id' => 10,
        ProductInterface::SKU => 'test',
        ProductInterface::ATTRIBUTE_SET_ID => '4',
        ProductInterface::NAME => 'other',
        ProductInterface::PRICE => '35.00',
        ProductInterface::CREATED_AT => '2010-07-05 06:00',
        ProductInterface::TYPE_ID => 'simple',
        ProductInterface::STATUS => Status::STATUS_ENABLED,
        ProductInterface::VISIBILITY => Visibility::VISIBILITY_BOTH
    ];

    /**
     * @var array
     */
    private $customAttributesCodes;

    /**
     * @var array
     */
    private $links;

    /**
     * @var array
     */
    private $mediaGalleryEntries;

    /**
     * @var array
     */
    private $tierPrices;

    /**
     * ProductStubBuilder constructor.
     * @param array $data
     * @param array $customAttributesCodes
     * @param array $links
     * @param array $mediaGalleryEntries
     * @param array $tierPrices
     */
    public function __construct(
        array $data = [],
        array $customAttributesCodes = [],
        array $links = [],
        array $mediaGalleryEntries = [],
        array $tierPrices = []
    ) {
        $this->data = $data;
        $this->customAttributesCodes = $customAttributesCodes;
        $this->links = $links;
        $this->mediaGalleryEntries = $mediaGalleryEntries;
        $this->tierPrices = $tierPrices;
    }

    /**
     * @return ProductStubBuilder
     */
    public static function productStub(): self
    {
        return new self();
    }

    /**
     * @param array $data
     * @return ProductStubBuilder
     */
    public function withData(array $data): self
    {
        $builder = clone $this;
        $builder->data = array_merge($builder->data, $data);
        return $builder;
    }

    /**
     * @param int $id
     * @return ProductStubBuilder
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function withId(int $id): self
    {
        $builder = clone $this;
        $builder->data['entity_id'] = $id;
        return $builder;
    }

    /**
     * @param string $name
     * @return ProductStubBuilder
     */
    public function withName(string $name): self
    {
        $builder = clone $this;
        $builder->data[ProductInterface::NAME] = $name;
        return $builder;
    }

    /**
     * @param string $sku
     * @return ProductStubBuilder
     */
    public function withSku(string $sku): self
    {
        $builder = clone $this;
        $builder->data[ProductInterface::SKU] = $sku;
        return $builder;
    }

    /**
     * @param float $price
     * @return ProductStubBuilder
     */
    public function withPrice(float $price): self
    {
        $builder = clone $this;
        $builder->data[ProductInterface::PRICE] = $price;
        return $builder;
    }

    /**
     * @param array $codes
     * @return ProductStubBuilder
     */
    public function withCustomAttributesCodes(array $codes): self
    {
        $builder = clone $this;
        $builder->customAttributesCodes = $codes;
        return $builder;
    }

    /**
     * @param array $links
     * @return ProductStubBuilder
     */
    public function withLinks(array $links): self
    {
        $builder = clone $this;
        $builder->links = $links;
        return $builder;
    }

    /**
     * @param array $entries
     * @return ProductStubBuilder
     */
    public function withMediaGalleryEntries(array $entries): self
    {
        $builder = clone $this;
        $builder->mediaGalleryEntries = $entries;
        return $builder;
    }

    /**
     * @param array $tierPrices
     * @return ProductStubBuilder
     */
    public function withTierPrices(array $tierPrices): self
    {
        $builder = clone $this;
        $builder->tierPrices = $tierPrices;
        return $builder;
    }

    /**
     * @return ProductStub
     */
    public function build(): ProductStub
    {
        $builder = clone $this;
        return new ProductStub(
            array_merge($builder->defaultData, $builder->data),
            $builder->customAttributesCodes,
            $builder->links,
            $builder->mediaGalleryEntries,
            $builder->tierPrices
        );
    }
}
