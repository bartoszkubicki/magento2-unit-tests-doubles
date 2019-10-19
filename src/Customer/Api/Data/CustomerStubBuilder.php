<?php

declare(strict_types=1);

/**
 * File: CustomerStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api\Data;

use function array_merge;
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
    private $data;

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
    private $customAttributesCodes;

    /**
     * CustomerStubBuilder constructor.
     * @param array $data
     * @param array $customAttributesCodes
     */
    public function __construct(array $data = [], array $customAttributesCodes = [])
    {
        $this->data = $data;
        $this->customAttributesCodes = $customAttributesCodes;
    }

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
        $builder = clone $this;
        $builder->data[CustomerInterface::ID] = $id;
        return $builder;
    }

    /**
     * @param string $email
     * @return CustomerStubBuilder
     */
    public function withEmail(string $email): self
    {
        $builder = clone $this;
        $builder->data[CustomerInterface::EMAIL] = $email;
        return $builder;
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
     * @return CustomerStub
     */
    public function build(): CustomerStub
    {
        $builder = clone $this;
        return new CustomerStub(
            array_merge($builder->defaultData, $builder->data),
            $builder->customAttributesCodes
        );
    }
}
