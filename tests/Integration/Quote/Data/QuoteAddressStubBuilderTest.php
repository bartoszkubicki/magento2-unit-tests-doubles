<?php

declare(strict_types=1);

namespace BKubicki\Magento2TestDoubles\Integration\Quote\Data;

use BKubicki\Magento2TestDoubles\Quote\Api\Data\QuoteAddressStubBuilder;
use Magento\Quote\Api\Data\AddressInterface;
use PHPUnit\Framework\TestCase;

class QuoteAddressStubBuilderTest extends TestCase
{
    public function testBuildingAddressStub(): void
    {
        $id = 56;
        $email = 'kowalski@example.com';
        $firstName = 'Jan';
        $lastName = 'Kowalski';

        $addressStub = QuoteAddressStubBuilder::addressStub()
            ->withId($id)
            ->withEmail($email)
            ->withData(
                [
                    AddressInterface::KEY_FIRSTNAME => $firstName,
                    AddressInterface::KEY_LASTNAME => $lastName
                ]
            )->build();

        $this->assertSame($id, $addressStub->getId());
        $this->assertSame($email, $addressStub->getEmail());
        $this->assertSame($firstName, $addressStub->getFirstname());
        $this->assertSame($lastName, $addressStub->getLastname());
    }

    public function testBuildingAddressStubWithDefaultArguments(): void
    {
        $addressStub = QuoteAddressStubBuilder::addressStub()->build();

        $this->assertSame(1, $addressStub->getId());
        $this->assertSame('veronica@example.com', $addressStub->getEmail());
        $this->assertSame('Austin', $addressStub->getCity());
        $this->assertSame('Adobe Inc.', $addressStub->getCompany());
        $this->assertSame('US', $addressStub->getCountry_id());
        $this->assertSame('Veronica', $addressStub->getFirstname());
        $this->assertSame('Costello', $addressStub->getLastname());
        $this->assertSame('veronica@example.com', $addressStub->getEmail());
        $this->assertSame('78758', $addressStub->getPostcode());
        $this->assertSame('Mrs', $addressStub->getPrefix());
        $this->assertSame('Texas', $addressStub->getRegion());
        $this->assertSame('TX', $addressStub->getRegionCode());
        $this->assertSame(['11501 Domain Dr #110'], $addressStub->getStreet());
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

        $addressStubBuilder = QuoteAddressStubBuilder::addressStub();
        $firstAddressStub = $addressStubBuilder->withEmail($exampleEmail1)->withId($exampleId)->build();
        $this->assertSame($exampleEmail1, $firstAddressStub->getEmail());

        $otherAddressStub = $addressStubBuilder->withEmail($exampleEmail2)->build();
        $this->assertNotSame($exampleId, $otherAddressStub->getId());
        $this->assertSame($exampleEmail2, $otherAddressStub->getEmail());
    }
}
