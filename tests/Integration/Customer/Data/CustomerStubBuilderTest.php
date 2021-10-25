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
        $email = 'jan.kowalski@example.com';
        $firstName = 'Jan';
        $lastName = 'Kowalski';

        $customerStub = CustomerStubBuilder::customerStub()
            ->withId($id)
            ->withEmail($email)
            ->withData(
                [
                    CustomerInterface::FIRSTNAME => $firstName,
                    CustomerInterface::LASTNAME => $lastName
                ]
            )->build();

        $this->assertSame($id, $customerStub->getId());
        $this->assertSame($email, $customerStub->getEmail());
        $this->assertSame($firstName, $customerStub->getFirstname());
        $this->assertSame($lastName, $customerStub->getLastname());

        $customerStub = CustomerStubBuilder::customerStub()->withId($id)->build();

        $this->assertSame($id, $customerStub->getId());
        $this->assertSame('joe.doe@example.com', $customerStub->getEmail());
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
        $customerStub = CustomerStubBuilder::customerStub()->build();

        $this->assertSame(10, $customerStub->getId());
        $this->assertSame('joe.doe@example.com', $customerStub->getEmail());
        $this->assertSame('Joe', $customerStub->getFirstname());
        $this->assertSame('Doe', $customerStub->getLastname());
    }

    /**
     * @test
     * @return void
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function testIfBuilderIsReusable(): void
    {
        $exampleEmail1 = 'first@example.com';
        $exampleEmail2 = 'other@example.com';
        $exampleId = 17;

        $customerStubBuilder = CustomerStubBuilder::customerStub();
        $customerStubOne = $customerStubBuilder->withEmail($exampleEmail1)->withId($exampleId)->build();
        $this->assertSame($exampleEmail1, $customerStubOne->getEmail());

        $customerStubTwo = $customerStubBuilder->withEmail($exampleEmail2)->build();
        $this->assertNotSame($exampleId, $customerStubTwo->getId());
        $this->assertSame($exampleEmail2, $customerStubTwo->getEmail());
    }
}
