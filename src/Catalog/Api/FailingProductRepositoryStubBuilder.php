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
    private $exceptionClassForSave = CouldNotSaveException::class;

    /**
     * @var string
     */
    private $exceptionClassForDeleteById  = StateException::class;

    /**
     * @var ProductInterface[]|null[]
     */
    private $productsListLoaded = [];

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
        $this->exceptionClassForSave = InputException::class;
        return $this;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldSaveThrowStateException(): self
    {
        $this->exceptionClassForSave = StateException::class;
        return $this;
    }


    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldSaveThrowCouldNotSaveException(): self
    {
        $this->exceptionClassForSave = CouldNotSaveException::class;
        return $this;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldDeleteByIdThrowNoSuchEntityException(): self
    {
        $this->exceptionClassForDeleteById = NoSuchEntityException::class;
        return $this;
    }

    /**
     * @return FailingProductRepositoryStubBuilder
     */
    public function shouldDeleteBeIdThrowStateException(): self
    {
        $this->exceptionClassForDeleteById = StateException::class;
        return $this;
    }

    /**
     * @param ProductInterface ...$productListLoaded
     * @return FailingProductRepositoryStubBuilder
     */
    public function withProductsListLoaded(ProductInterface ...$productListLoaded): self
    {
        $this->productsListLoaded = $productListLoaded;
        return $this;
    }

    /**
     * @return FailingProductRepositoryStub
     */
    public function build(): FailingProductRepositoryStub
    {
        return new FailingProductRepositoryStub(
            $this->exceptionClassForSave,
            $this->exceptionClassForDeleteById,
            ... $this->productsListLoaded
        );
    }
}
