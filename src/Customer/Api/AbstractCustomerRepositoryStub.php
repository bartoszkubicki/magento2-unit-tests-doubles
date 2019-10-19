<?php

declare(strict_types=1);

/**
 * File: AbstractCustomerRepositoryStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api;

use BKubicki\Magento2TestDoubles\Framework\Api\SearchResultsStub;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Class AbstractStub
 * @package BKubicki\Magento2TestDoubles\Customer\Api
 */
abstract class AbstractCustomerRepositoryStub implements CustomerRepositoryInterface
{
    /**
     * @var CustomerInterface[]|null[]
     */
    protected $customersListLoaded;

    /**
     * AbstractStub constructor.
     * @param CustomerInterface[]|null[] $customersListLoaded
     */
    public function __construct(?CustomerInterface ... $customersListLoaded)
    {
        $this->customersListLoaded = $customersListLoaded;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsStub
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        return new SearchResultsStub($this->customersListLoaded);
    }
}
