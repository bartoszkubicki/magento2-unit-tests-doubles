<?php

declare(strict_types=1);

/**
 * File: FailingProductRepositoryStub.php
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
 * Class FailingProductRepositoryStub
 * @package BKubicki\Magento2TestDoubles\Catalog\Api\ProductRepository
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class FailingProductRepositoryStub extends AbstractProductRepositoryStub
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
     * ThrowingException constructor.
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
        parent::__construct(... $productsLoaded);
        $this->exceptionClassForSave = $exceptionClassForSave;
        $this->exceptionClassForDeleteById = $exceptionClassForDeleteById;
    }

    /**
     * @param ProductInterface $product
     * @param bool $saveOptions
     * @return ProductInterface
     * @throws InputException
     * @throws StateException
     * @throws CouldNotSaveException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function save(ProductInterface $product, $saveOptions = false): ProductInterface
    {
        throw new $this->exceptionClassForSave(__());
    }

    /**
     * @param string $sku
     * @param bool $editMode
     * @param null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @throws NoSuchEntityException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false): ProductInterface
    {
        throw new NoSuchEntityException(__());
    }

    /**
     * @param int $productId
     * @param bool $editMode
     * @param null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @throws NoSuchEntityException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getById($productId, $editMode = false, $storeId = null, $forceReload = false): ProductInterface
    {
        throw new NoSuchEntityException(__());
    }

    /**
     * @param ProductInterface $product
     * @return bool
     * @throws StateException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function delete(ProductInterface $product): bool
    {
        throw new StateException(__());
    }

    /**
     * @param string $sku
     * @return bool
     * @throws NoSuchEntityException
     * @throws StateException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function deleteById($sku): bool
    {
        throw new $this->exceptionClassForDeleteById(__());
    }
}
