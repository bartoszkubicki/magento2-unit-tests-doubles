<?php

declare(strict_types=1);

/**
 * File: SuccessfulProductRepositoryStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api;

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Class SuccessfulProductRepositoryStub
 * @package BKubicki\Magento2TestDoubles\Stub\Catalog\Api\ProductRepository
 * @codeCoverageIgnore
 */
class SuccessfulProductRepositoryStub extends AbstractProductRepositoryStub
{
    /**
     * @var ProductInterface
     */
    private $productLoaded;

    /**
     * SuccessfulProductRepositoryStub constructor.
     * @param ProductInterface $productLoaded
     * @param ProductInterface|null ...$productsListLoaded
     */
    public function __construct(ProductInterface $productLoaded, ?ProductInterface ...$productsListLoaded)
    {
        parent::__construct(... $productsListLoaded);
        $this->productLoaded = $productLoaded;
    }

    /**
     * @param ProductInterface $product
     * @param bool $saveOptions
     * @return ProductInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function save(ProductInterface $product, $saveOptions = false): ProductInterface
    {
        return $product;
    }

    /**
     * @param string $sku
     * @param bool $editMode
     * @param null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false): ProductInterface
    {
        return $this->productLoaded;
    }

    /**
     * @param int $productId
     * @param bool $editMode
     * @param null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getById($productId, $editMode = false, $storeId = null, $forceReload = false): ProductInterface
    {
        return $this->productLoaded;
    }

    /**
     * @param ProductInterface $product
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function delete(ProductInterface $product): bool
    {
        return true;
    }

    /**
     * @param string $sku
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function deleteById($sku): bool
    {
        return true;
    }
}
