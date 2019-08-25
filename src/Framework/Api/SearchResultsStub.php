<?php

declare(strict_types=1);

/**
 * File: SearchResultsStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\Api;

use Magento\Framework\Api\ExtensibleDataInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Class SearchResultsStub
 * @package BKubicki\Magento2TestDoubles\Framework
 */
class SearchResultsStub implements SearchResultsInterface
{
    /**
     * @var array
     */
    private $items;

    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;

    /**
     * SearchResultsStub constructor.
     * @param array $items
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function __construct($items = [], SearchCriteriaInterface $searchCriteria = null)
    {
        $this->items = $items;
        $this->searchCriteria = $searchCriteria;
    }

    /**
     * @return ExtensibleDataInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return SearchResultsStub
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return SearchCriteriaInterface|null
     */
    public function getSearchCriteria(): ?SearchCriteriaInterface
    {
        return $this->searchCriteria;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsStub
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria): self
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return count($this->items);
    }

    /**
     * @param int $totalCount
     * @return SearchResultsStub
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setTotalCount($totalCount): self
    {
        return $this;
    }
}
