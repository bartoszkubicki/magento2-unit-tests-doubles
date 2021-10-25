<?php
declare(strict_types=1);

namespace BKubicki\Magento2TestDoubles\Quote\Api\Data;

use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStubBuilder;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Quote\Api\Data\AddressInterface;

class QuoteAddressStubBuilder
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $defaultData = [
        AddressInterface::KEY_ID => 1,
        AddressInterface::KEY_CITY => 'Austin',
        AddressInterface::KEY_COMPANY => 'Adobe Inc.',
        AddressInterface::KEY_COUNTRY_ID => 'US',
        AddressInterface::KEY_FIRSTNAME => 'Veronica',
        AddressInterface::KEY_LASTNAME => 'Costello',
        AddressInterface::KEY_EMAIL => 'veronica@example.com',
        AddressInterface::KEY_POSTCODE => '78758',
        AddressInterface::KEY_PREFIX => 'Mrs',
        AddressInterface::KEY_REGION => 'Texas',
        AddressInterface::KEY_REGION_CODE => 'TX',
        AddressInterface::KEY_STREET => ['11501 Domain Dr #110'],
    ];

    /**
     * @var array
     */
    private $customAttributesCodes;

    /**
     * @param array<string,mixed> $data
     * @param array<string> $customAttributesCodes
     */
    public function __construct(array $data = [], array $customAttributesCodes = [])
    {
        $this->data = $data;
        $this->customAttributesCodes = $customAttributesCodes;
    }

    /**
     * @return QuoteAddressStubBuilder
     */
    public static function addressStub(): self
    {
        return new self();
    }


    /**
     * @param array $data
     * @return CustomerStubBuilder
     */
    public function withData(array $data): self
    {
        $builder = clone $this;
        $builder->data = array_merge($builder->data, $data);
        return $builder;
    }

    /**
     * @return QuoteAddressStub
     */
    public function build(): QuoteAddressStub
    {
        $builder = clone $this;
        return new QuoteAddressStub(
            array_merge($builder->defaultData, $builder->data),
            $builder->customAttributesCodes
        );
    }

    public function withId(int $id): self
    {
        $builder = clone $this;
        $builder->data[AddressInterface::KEY_ID] = $id;
        return $builder;
    }

    public function withEmail(string $email): self
    {
        $builder = clone $this;
        $builder->data[AddressInterface::KEY_EMAIL] = $email;
        return $builder;
    }
}
