<?php

declare(strict_types=1);

/**
 * File: ProductStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api\Data;

use BKubicki\Magento2TestDoubles\Framework\Api\CustomAttributesDataStub;
use Magento\Catalog\Api\Data\ProductExtensionInterface;
use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Class ProductStub
 * @package BKubicki\Magento2TestDoubles\Catalog\Api\Data
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class ProductStub extends CustomAttributesDataStub implements ProductInterface
{
    /**
     * @var array
     */
    protected $links;

    /**
     * @var array
     */
    protected $mediaGalleryEntries;

    /**
     * @var array
     */
    protected $tierPrices;

    /**
     * AbstractProductStub constructor.
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
        parent::__construct($data, $customAttributesCodes);
        $this->links = $links;
        $this->mediaGalleryEntries = $mediaGalleryEntries;
        $this->tierPrices = $tierPrices;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->_getData('entity_id');
    }

    /**
     * @param int $id
     * @return ProductStub
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function setId($id): self
    {
        $this->setData('entity_id', $id);
        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): ?string
    {
        return $this->getData(self::SKU);
    }

    /**
     * @param string $sku
     * @return ProductStub
     */
    public function setSku($sku): self
    {
        $this->setData(self::SKU, $sku);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     * @return ProductStub
     */
    public function setName($name): self
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAttributeSetId(): ?int
    {
        return $this->getData(self::ATTRIBUTE_SET_ID);
    }

    /**
     * @param int $attributeSetId
     * @return ProductStub
     */
    public function setAttributeSetId($attributeSetId): self
    {
        $this->setData(self::ATTRIBUTE_SET_ID, $attributeSetId);
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @param float $price
     * @return ProductStub
     */
    public function setPrice($price): self
    {
        $this->setData(self::PRICE, $price);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @param int $status
     * @return ProductStub
     */
    public function setStatus($status): self
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVisibility(): ?int
    {
        return $this->getData(self::VISIBILITY);
    }

    /**
     * @param int $visibility
     * @return ProductStub
     */
    public function setVisibility($visibility): self
    {
        $this->setData(self::VISIBILITY, $visibility);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTypeId(): ?string
    {
        return $this->getData(self::TYPE_ID);
    }

    /**
     * @param string $typeId
     * @return ProductStub
     */
    public function setTypeId($typeId): self
    {
        $this->setData(self::TYPE_ID, $typeId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return ProductStub
     */
    public function setCreatedAt($createdAt): self
    {
        $this->setData(self::CREATED_AT, $createdAt);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $updatedAt
     * @return ProductStub
     */
    public function setUpdatedAt($updatedAt): self
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWeight(): ?string
    {
        return $this->getData(self::WEIGHT);
    }

    /**
     * @param float $weight
     * @return ProductStub
     */
    public function setWeight($weight): self
    {
        $this->setData(self::WEIGHT, $weight);
        return $this;
    }

    /**
     * @return ProductExtensionInterface|null
     */
    public function getExtensionAttributes(): ?ProductExtensionInterface
    {
        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
    }

    /**
     * @param ProductExtensionInterface $extensionAttributes
     * @return ProductStub
     */
    public function setExtensionAttributes(ProductExtensionInterface $extensionAttributes): self
    {
        $this->setData(self::EXTENSION_ATTRIBUTES_KEY, $extensionAttributes);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProductLinks(): ?array
    {
        return $this->links;
    }

    /**
     * @param array|null $links
     * @return ProductStub
     */
    public function setProductLinks(array $links = null): self
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getOptions(): ?array
    {
        return $this->getData('options');
    }

    /**
     * @param array|null $options
     * @return ProductStub
     */
    public function setOptions(array $options = null): self
    {
        $this->setData('options', $options);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getMediaGalleryEntries(): ?array
    {
        return $this->mediaGalleryEntries;
    }

    /**
     * @param array|null $mediaGalleryEntries
     * @return ProductStub
     */
    public function setMediaGalleryEntries(array $mediaGalleryEntries = null): self
    {
        $this->mediaGalleryEntries = $mediaGalleryEntries;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTierPrices(): ?array
    {
        return $this->tierPrices;
    }

    /**
     * @param array|null $tierPrices
     * @return ProductStub
     */
    public function setTierPrices(array $tierPrices = null): self
    {
        $this->tierPrices = $tierPrices;
        return $this;
    }
}
