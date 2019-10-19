<?php

declare(strict_types=1);

/**
 * File: SuccessfulCustomerRepositoryStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api;

use Magento\Customer\Api\Data\CustomerInterface;

/**
 * Class SuccessfulStub
 * @package BKubicki\Magento2TestDoubles\Customer\Api
 * @codeCoverageIgnore
 */
class SuccessfulCustomerRepositoryStub extends AbstractCustomerRepositoryStub
{
    /**
     * @var CustomerInterface
     */
    private $customerLoaded;

    /**
     * AbstractStub constructor.
     * @param CustomerInterface $customerLoaded
     * @param CustomerInterface[]|null[] $customersListLoaded
     */
    public function __construct(CustomerInterface $customerLoaded, ?CustomerInterface ...$customersListLoaded)
    {
        parent::__construct(... $customersListLoaded);
        $this->customerLoaded = $customerLoaded;
    }

    /**
     * @param CustomerInterface $customer
     * @param null $passwordHash
     * @return CustomerInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function save(CustomerInterface $customer, $passwordHash = null): CustomerInterface
    {
        return $customer;
    }

    /**
     * @param string $email
     * @param null $websiteId
     * @return CustomerInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function get($email, $websiteId = null): CustomerInterface
    {
        return $this->customerLoaded;
    }

    /**
     * @param int $customerId
     * @return CustomerInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getById($customerId): CustomerInterface
    {
        return $this->customerLoaded;
    }

    /**
     * @param CustomerInterface $customer
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function delete(CustomerInterface $customer): bool
    {
        return true;
    }

    /**
     * @param int $customerId
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function deleteById($customerId): bool
    {
        return true;
    }
}
