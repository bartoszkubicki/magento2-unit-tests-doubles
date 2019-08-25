<?php

declare(strict_types=1);

/**
 * File: AbstractProductRepositoryStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Catalog\Api;

use BKubicki\Magento2TestDoubles\Framework\Api\SearchResultsStub;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductSearchResultsInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Class AbstractProductRepositoryStub
 * @package BKubicki\Magento2TestDoubles\Stub\Catalog\Api
 */
abstract class AbstractProductRepositoryStub implements ProductRepositoryInterface
{
    /**
     * @var ProductInterface[]
     */
    protected $productsListLoaded;

    /**
     * AbstractProductRepositoryStub constructor.
     * @param ProductInterface|null ... $productsListLoaded
     */
    public function __construct(?ProductInterface ... $productsListLoaded)
    {
        $this->productsListLoaded = $productsListLoaded;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ProductSearchResultsInterface|void
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        return new SearchResultsStub($this->productsListLoaded, $searchCriteria);
    }
}
