<?php

declare(strict_types=1);

/**
 * File: FailingProductRepositoryStubBuilder.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class FailingProductRepositoryStubBuilder
 * @package BKubicki\Magento2TestDoubles\Catalog\Api
 * @SuppressWarnings(PHPMD.LongVariable)
 * @codeCoverageIgnore
 */
class FailingProductRepositoryStubBuilder
{
    /**
     * @var string
     */
    private $exceptionClassForSave;

    /**
     * @var string
     */
    private $exceptionClassForDeleteById;

    /**
     * @var ProductInterface[]
     */
    private $productsListLoaded;

    /**
     * FailingProductRepositoryStubBuilder constructor.
     * @param string $exceptionClassForSave
     * @param string $exceptionClassForDeleteById
     * @param ProductInterface|null ...$productsLoaded
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function __construct(
        string $exceptionClassForSave = CouldNotSaveException::class,
        string $exceptionClassForDeleteById = StateException::class,
        ?ProductInterface ...$productsLoaded
    ) {
        $this->exceptionClassForSave = $exceptionClassForSave;
        $this->exceptionClassForDeleteById = $exceptionClassForDeleteById;
        $this->productsListLoaded = $productsLoaded;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public static function productRepositoryStub(): self
    {
        return new self();
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldSaveThrowInputException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = InputException::class;
        return $builder;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldSaveThrowStateException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = StateException::class;
        return $builder;
    }


    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldSaveThrowCouldNotSaveException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForSave = CouldNotSaveException::class;
        return $builder;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldDeleteByIdThrowNoSuchEntityException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForDeleteById = NoSuchEntityException::class;
        return $builder;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldDeleteBeIdThrowStateException(): self
    {
        $builder = clone $this;
        $builder->exceptionClassForDeleteById = StateException::class;
        return $builder;
    }

    /**
     * @param ProductInterface ...$productListLoaded
     * @return FailingProductRepositoryStubBuilder
     */
    public function withProductsListLoaded(ProductInterface ...$productListLoaded): self
    {
        $builder = clone $this;
        $builder->productsListLoaded = $productListLoaded;
        return $builder;
    }

    /**
     * @return FailingProductRepositoryStub
     */
    public function build(): FailingProductRepositoryStub
    {
        $builder = clone $this;
        return new FailingProductRepositoryStub(
            $builder->exceptionClassForSave,
            $builder->exceptionClassForDeleteById,
            ... $builder->productsListLoaded
        );
    }
}
