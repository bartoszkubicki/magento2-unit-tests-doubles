<?php

declare(strict_types=1);

/**
 * File: ProductStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api\Data;

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
    private $data = [];

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
    private $customAttributesCodes = [];

    /**
     * @var array
     */
    private $links = [];

    /**
     * @var array
     */
    private $mediaGalleryEntries = [];

    /**
     * @var array
     */
    private $tierPrices = [];

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
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * @param int $id
     * @return ProductStubBuilder
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function withId(int $id): self
    {
        $this->data['entity_id'] = $id;
        return $this;
    }

    /**
     * @param string $name
     * @return ProductStubBuilder
     */
    public function withName(string $name): self
    {
        $this->data[ProductInterface::NAME] = $name;
        return $this;
    }

    /**
     * @param string $sku
     * @return ProductStubBuilder
     */
    public function withSku(string $sku): self
    {
        $this->data[ProductInterface::SKU] = $sku;
        return $this;
    }

    /**
     * @param float $price
     * @return ProductStubBuilder
     */
    public function withPrice(float $price): self
    {
        $this->data[ProductInterface::PRICE] = $price;
        return $this;
    }

    /**
     * @param array $codes
     * @return ProductStubBuilder
     */
    public function withCustomAttributesCodes(array $codes): self
    {
        $this->customAttributesCodes = $codes;
        return $this;
    }

    /**
     * @param array $links
     * @return ProductStubBuilder
     */
    public function withLinks(array $links): self
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @param array $entries
     * @return ProductStubBuilder
     */
    public function withMediaGalleryEntries(array $entries): self
    {
        $this->mediaGalleryEntries = $entries;
        return $this;
    }

    /**
     * @param array $tierPrices
     * @return ProductStubBuilder
     */
    public function withTierPrices(array $tierPrices): self
    {
        $this->tierPrices = $tierPrices;
        return $this;
    }

    /**
     * @return ProductStub
     */
    public function build(): ProductStub
    {
        return new ProductStub(
            array_merge($this->defaultData, $this->data),
            $this->customAttributesCodes,
            $this->links,
            $this->mediaGalleryEntries,
            $this->tierPrices
        );
    }
}
