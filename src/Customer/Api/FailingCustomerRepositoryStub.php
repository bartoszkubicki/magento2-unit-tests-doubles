<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;

/**
 * Class FailingCustomerRepositoryStub
 * @package BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class FailingCustomerRepositoryStub extends AbstractCustomerRepositoryStub
{
    /**
     * @var string
     */
    private $exceptionClassForSave;

    /**
     * @var string
     */
    private $exceptionClassForGetMethods;

    /**
     * @var string
     */
    private $exceptionClassForDeleteMethods;

    /**
     * FailingCustomerRepositoryStub constructor.
     * @param string $exceptionClassForSave
     * @param string $exceptionClassForGetMethods
     * @param string $exceptionClassForDeleteMethods
     * @param CustomerInterface|null ...$customersList
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function __construct(
        string $exceptionClassForSave = LocalizedException::class,
        string $exceptionClassForGetMethods = NoSuchEntityException::class,
        string $exceptionClassForDeleteMethods = CouldNotDeleteException::class,
        ?CustomerInterface ...$customersList
    ) {
        parent::__construct(... $customersList);
        $this->exceptionClassForSave = $exceptionClassForSave;
        $this->exceptionClassForGetMethods = $exceptionClassForGetMethods;
        $this->exceptionClassForDeleteMethods = $exceptionClassForDeleteMethods;
    }

    /**
     * @param CustomerInterface $customer
     * @param null $passwordHash
     * @return CustomerInterface
     * @throws InputException
     * @throws InputMismatchException
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function save(CustomerInterface $customer, $passwordHash = null): CustomerInterface
    {
        throw new $this->exceptionClassForSave(__());
    }

    /**
     * @param string $email
     * @param null $websiteId
     * @return CustomerInterface
     * @throws NoSuchEntityException
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function get($email, $websiteId = null): CustomerInterface
    {
        throw new $this->exceptionClassForGetMethods(__());
    }

    /**
     * @param int $customerId
     * @return CustomerInterface
     * @throws NoSuchEntityException
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getById($customerId): CustomerInterface
    {
        throw new $this->exceptionClassForGetMethods(__());
    }

    /**
     * @param CustomerInterface $customer
     * @return bool
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function delete(CustomerInterface $customer): bool
    {
        throw new $this->exceptionClassForDeleteMethods(__());
    }

    /**
     * @param int $customerId
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function deleteById($customerId): bool
    {
        throw new $this->exceptionClassForDeleteMethods(__());
    }
}
