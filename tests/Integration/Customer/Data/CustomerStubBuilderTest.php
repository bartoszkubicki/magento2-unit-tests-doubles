<?php

declare(strict_types=1);

/**
 * File: CustomerStubBuilderTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Integration\Customer\Data;

use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStubBuilder;
use Magento\Customer\Api\Data\CustomerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomerStubBuilderTest
 * @package BKubicki\Magento2TestDoubles\Integration\Customer\Data
 */
class CustomerStubBuilderTest extends TestCase
{
    /**
     * @test
     * @return void
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function testBuildingCustomerStub(): void
    {
        $id = 56;
        $email = 'test2@gmail.com';
        $firstName = 'Jan';
        $lastName = 'Kowalski';

        $customerStubBuilder = CustomerStubBuilder::customerStub();
        $customerStubBuilder->withId($id);
        $customerStubBuilder->withEmail($email);
        $customerStubBuilder->withData(
            [
                CustomerInterface::FIRSTNAME => $firstName,
                CustomerInterface::LASTNAME => $lastName
            ]
        );

        $customerStub = $customerStubBuilder->build();

        $this->assertSame($id, $customerStub->getId());
        $this->assertSame($email, $customerStub->getEmail());
        $this->assertSame($firstName, $customerStub->getFirstname());
        $this->assertSame($lastName, $customerStub->getLastname());

        $customerStubBuilder = CustomerStubBuilder::customerStub();
        $customerStubBuilder->withId($id);
        $customerStub = $customerStubBuilder->build();

        $this->assertSame($id, $customerStub->getId());
        $this->assertSame('test@gmail.com', $customerStub->getEmail());
        $this->assertSame('Joe', $customerStub->getFirstname());
        $this->assertSame('Doe', $customerStub->getLastname());
    }

    /**
     * @test
     * @return void
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function testBuildingCustomerStubWithDefaultArguments(): void
    {
        $customerStubBuilder = CustomerStubBuilder::customerStub();
        $customerStub = $customerStubBuilder->build();

        $this->assertSame(10, $customerStub->getId());
        $this->assertSame('test@gmail.com', $customerStub->getEmail());
        $this->assertSame('Joe', $customerStub->getFirstname());
        $this->assertSame('Doe', $customerStub->getLastname());
    }
}
