<?php

declare(strict_types=1);

/**
 * File: CustomAttributesDataStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Framework\Api;

use BKubicki\Magento2TestDoubles\Framework\Api\CustomAttributesDataStub;
use Magento\Framework\Api\AttributeValue;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomAttributesDataStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Framework\Api
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class CustomAttributesDataStubTest extends TestCase
{
    /**
     * @var CustomAttributesDataStub
     */
    private $customAttributesDataStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->customAttributesDataStub = new CustomAttributesDataStub(
            [
                CustomAttributesDataStub::CUSTOM_ATTRIBUTES => ['test' => 'some_value']
            ],
            [
                'test'
            ]
        );
    }

    /**
     * @test
     * @return void
     */
    public function testGetCustomAttributeReturnsCorrectValues(): void
    {
        $attributeValue = $this->customAttributesDataStub->getCustomAttribute('test');

        $this->assertInstanceOf(
            AttributeValue::class,
            $attributeValue
        );

        $this->assertSame(
            'some_value',
            $attributeValue->getValue()
        );
    }

    /**
     * @test
     * @return void
     */
    public function testGetCustomAttributeHasNoValue(): void
    {
        $this->assertNull(
            $this->customAttributesDataStub->getCustomAttribute('other')
        );

        $this->customAttributesDataStub->unsetData();
        $this->assertNull(
            $this->customAttributesDataStub->getCustomAttribute('other')
        );
    }

    /**
     * @test
     * @return void
     */
    public function testSetCustomAttributeWhenIsInArrayOfCustomAttributeCodes(): void
    {
        $exampleCode = 'test';
        $exampleValue = 'sth';

        $this->customAttributesDataStub->setCustomAttribute($exampleCode, $exampleValue);
        $attributeValue = $this->customAttributesDataStub->getCustomAttribute($exampleCode);

        $this->assertSame(
            $exampleValue,
            $attributeValue->getValue()
        );
    }

    /**
     * @test
     * @return void
     */
    public function testGetCustomAttributesCorrectlyReturnsValues(): void
    {
        $this->assertIsArray($this->customAttributesDataStub->getCustomAttributes());
        $this->assertSame(['some_value'], $this->customAttributesDataStub->getCustomAttributes());
    }

    /**
     * @test
     * @return void
     */
    public function testSetCustomAttributesCorrectlySetsValues(): void
    {
        $values = [
            'test' => 'st_other',
            'test2' => 'ff'
        ];

        $this->customAttributesDataStub->setCustomAttributes($values);
        $attributeValue = $this->customAttributesDataStub->getCustomAttribute('test');

        $this->assertSame(
            'st_other',
            $attributeValue->getValue()
        );

        $this->assertNull($this->customAttributesDataStub->getCustomAttribute('test2'));
    }
}
