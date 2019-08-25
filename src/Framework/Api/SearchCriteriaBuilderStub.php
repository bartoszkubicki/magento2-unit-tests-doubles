<?php

declare(strict_types=1);

/**
 * File: SearchCriteriaBuilderStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\Api;

use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;

/**
 * Class SearchCriteriaBuilderStub
 * @package BKubicki\Magento2TestDoubles\Framework
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 * @codeCoverageIgnore
 */
class SearchCriteriaBuilderStub extends SearchCriteriaBuilder
{
    /**
     * SearchCriteriaBuilderStub constructor.
     */
    public function __construct()
    {
        //We omit parent construct to dont have to instantiate parent dependencies
    }

    /**
     * @return SearchCriteria
     */
    public function create(): SearchCriteria
    {
        return new SearchCriteria();
    }

    /**
     * @param array $filter
     * @return SearchCriteriaBuilderStub
     */
    public function addFilters(array $filter): self
    {
        return $this;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @param string $conditionType
     * @return SearchCriteriaBuilderStub
     */
    public function addFilter($field, $value, $conditionType = 'eq'): self
    {
        return $this;
    }

    /**
     * @param array $filterGroups
     * @return SearchCriteriaBuilderStub
     */
    public function setFilterGroups(array $filterGroups): self
    {
        return $this;
    }

    /**
     * @param SortOrder $sortOrder
     * @return SearchCriteriaBuilderStub
     */
    public function addSortOrder($sortOrder): self
    {
        return $this;
    }

    /**
     * @param array $sortOrders
     * @return SearchCriteriaBuilderStub
     */
    public function setSortOrders(array $sortOrders): self
    {
        return $this;
    }

    /**
     * @param int $pageSize
     * @return SearchCriteriaBuilderStub
     */
    public function setPageSize($pageSize): self
    {
        return $this;
    }

    /**
     * @param int $currentPage
     * @return SearchCriteriaBuilderStub
     */
    public function setCurrentPage($currentPage): self
    {
        return $this;
    }
}
