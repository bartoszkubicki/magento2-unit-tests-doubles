<?php

declare(strict_types=1);

/**
 * File: CustomerStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api\Data;

use Magento\Customer\Api\Data\CustomerInterface;

/**
 * Class CustomerStubBuilder
 * @package BKubicki\Magento2TestDoubles\Customer\Api\Data
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class CustomerStubBuilder
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $defaultData = [
        CustomerInterface::ID => 10,
        CustomerInterface::EMAIL => 'test@gmail.com',
        CustomerInterface::FIRSTNAME => 'Joe',
        CustomerInterface::LASTNAME => 'Doe',
        CustomerInterface::WEBSITE_ID => 1
    ];

    /**
     * @var array
     */
    private $customAttributesCodes = [];

    /**
     * @return CustomerStubBuilder
     */
    public static function customerStub(): self
    {
        return new self();
    }

    /**
     * @param int $id
     * @return CustomerStubBuilder
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function withId(int $id): self
    {
        $this->data[CustomerInterface::ID] = $id;
        return $this;
    }

    /**
     * @param string $email
     * @return CustomerStubBuilder
     */
    public function withEmail(string $email): self
    {
        $this->data[CustomerInterface::EMAIL] = $email;
        return $this;
    }

    /**
     * @param array $data
     * @return CustomerStubBuilder
     */
    public function withData(array $data): self
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * @return CustomerStub
     */
    public function build(): CustomerStub
    {
        return new CustomerStub(
            array_merge($this->defaultData, $this->data),
            $this->customAttributesCodes
        );
    }
}
