<?php

declare(strict_types=1);

/**
 * File: CustomAttributesDataStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\Api;

use Magento\Framework\Api\AttributeValue;
use Magento\Framework\Api\CustomAttributesDataInterface;
use Magento\Framework\DataObject;

/**
 * Class CustomAttributesDataStub
 * @package BKubicki\Magento2TestDoubles\Framework\Api
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class CustomAttributesDataStub extends DataObject implements CustomAttributesDataInterface
{
    /**
     * @var array
     */
    private $customAttributesCodes;

    /**
     * CustomAttributesDataStub constructor.
     * @param array $data
     * @param array $customAttributesCodes
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function __construct(array $data = [], array $customAttributesCodes = [])
    {
        parent::__construct($data);
        $this->customAttributesCodes = $customAttributesCodes;
    }

    /**
     * @param string $attributeCode
     * @return AttributeValue|null
     */
    public function getCustomAttribute($attributeCode) :?AttributeValue
    {
        if (isset($this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode])) {
            $value = $this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode];
            if ($value instanceof AttributeValue) {
                return $value;
            }

            $attributeValue = new AttributeValue();
            return $attributeValue->setAttributeCode($attributeCode)->setValue($value);
        }

        return null;
    }

    /**
     * @param string $attributeCode
     * @param mixed $attributeValue
     * @return CustomAttributesDataStub
     */
    public function setCustomAttribute($attributeCode, $attributeValue): self
    {
        if (in_array($attributeCode, $this->customAttributesCodes, true)) {
            $attributeValueObject = new AttributeValue();
            $attributeValueObject->setAttributeCode($attributeCode)->setValue($attributeValue);
            $this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode] = $attributeValueObject;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getCustomAttributes(): array
    {
        return array_values($this->_data[self::CUSTOM_ATTRIBUTES]);
    }

    /**
     * @param array $attributes
     * @return CustomAttributesDataStub
     */
    public function setCustomAttributes(array $attributes): self
    {
        foreach ($attributes as $attributeCode => $attributeValue) {
            if (in_array($attributeCode, $this->customAttributesCodes, true)) {
                $attributeValueObject = new AttributeValue();
                $attributeValueObject->setAttributeCode($attributeCode)->setValue($attributeValue);
                $this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode] = $attributeValueObject;
            }
        }

        return $this;
    }
}
