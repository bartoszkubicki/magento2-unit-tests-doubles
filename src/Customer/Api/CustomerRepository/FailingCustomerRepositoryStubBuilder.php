<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;

/**
 * Class FailingCustomerRepositoryStubBuilder
 * @package BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class FailingCustomerRepositoryStubBuilder
{
    /**
     * @var string
     */
    private $exceptionClassForSave = LocalizedException::class;

    /**
     * @var string
     */
    private $exceptionClassForGetMethods = NoSuchEntityException::class;

    /**
     * @var string
     */
    private $exceptionClassForDeleteMethods = CouldNotDeleteException::class;

    /**
     * @var CustomerInterface[]|null[]
     */
    protected $customersListLoaded = [];

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public static function customerRepository(): self
    {
        return new self();
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowInputException(): self
    {
        $this->exceptionClassForSave = InputException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowInputMismatchException(): self
    {
        $this->exceptionClassForSave = InputMismatchException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowLocalizedException(): self
    {
        $this->exceptionClassForSave = LocalizedException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldGetMethodsThrowNoSuchEntityException(): self
    {
        $this->exceptionClassForGetMethods = NoSuchEntityException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldGetMethodsThrowLocalizedException(): self
    {
        $this->exceptionClassForGetMethods = LocalizedException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldDeleteMethodsThrowNoSuchEntityException(): self
    {
        $this->exceptionClassForDeleteMethods = NoSuchEntityException::class;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldDeleteMethodsThrowLocalizedException(): self
    {
        $this->exceptionClassForDeleteMethods = LocalizedException::class;
        return $this;
    }

    /**
     * @param CustomerInterface ...$customersListLoaded
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function withCustomersListLoaded(CustomerInterface ... $customersListLoaded): self
    {
        $this->customersListLoaded = $customersListLoaded;
        return $this;
    }

    /**
     * @return FailingCustomerRepositoryStub
     */
    public function build(): FailingCustomerRepositoryStub
    {
        return new FailingCustomerRepositoryStub(
            $this->exceptionClassForSave,
            $this->exceptionClassForGetMethods,
            $this->exceptionClassForDeleteMethods,
            ... $this->customersListLoaded
        );
    }
}
