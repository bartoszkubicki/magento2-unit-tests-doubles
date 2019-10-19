<?php

declare(strict_types=1);

/**
 * File: FailingCustomerRepositoryStubBuilder.php
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
 * Class FailingCustomerRepositoryStubBuilder
 * @package BKubicki\Magento2TestDoubles\Customer\Api
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class FailingCustomerRepositoryStubBuilder
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
     * @var CustomerInterface[]|null[]
     */
    protected $customersListLoaded = [];

    /**
     * FailingCustomerRepositoryStubBuilder constructor.
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
        $this->exceptionClassForSave = $exceptionClassForSave;
        $this->exceptionClassForGetMethods = $exceptionClassForGetMethods;
        $this->exceptionClassForDeleteMethods = $exceptionClassForDeleteMethods;
        $this->customersListLoaded = $customersList;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public static function customerRepositoryStub(): self
    {
        return new self();
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowInputException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = InputException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowInputMismatchException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = InputMismatchException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldSaveThrowLocalizedException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = LocalizedException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldGetMethodsThrowNoSuchEntityException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForGetMethods = NoSuchEntityException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldGetMethodsThrowLocalizedException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForGetMethods = LocalizedException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldDeleteMethodsThrowNoSuchEntityException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForDeleteMethods = NoSuchEntityException::class;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function shouldDeleteMethodsThrowLocalizedException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForDeleteMethods = LocalizedException::class;
        return $builder;
    }

    /**
     * @param CustomerInterface ...$customersListLoaded
     * @return FailingCustomerRepositoryStubBuilder
     */
    public function withCustomersListLoaded(CustomerInterface ...$customersListLoaded): self
    {
        $builder = clone $this;
        $builder->customersListLoaded = $customersListLoaded;
        return $builder;
    }

    /**
     * @return FailingCustomerRepositoryStub
     */
    public function build(): FailingCustomerRepositoryStub
    {
        $builder = clone $this;
        return new FailingCustomerRepositoryStub(
            $builder->exceptionClassForSave,
            $builder->exceptionClassForGetMethods,
            $builder->exceptionClassForDeleteMethods,
            ... $builder->customersListLoaded
        );
    }
}
