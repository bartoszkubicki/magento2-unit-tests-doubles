<?php

declare(strict_types=1);

/**
 * File: AbstractCustomerRepositoryTestCase.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Customer\Api;

use BKubicki\Magento2TestDoubles\Customer\Api\CustomerRepository\AbstractCustomerRepositoryStub;
use BKubicki\Magento2TestDoubles\Customer\Api\Data\CustomerStub;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Api\Search\SearchCriteria;
use Magento\Framework\Api\SearchResultsInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractCustomerRepositoryTestCase
 * @package BKubicki\Magento2TestDoubles\Unit\Customer\Api
 */
abstract class AbstractCustomerRepositoryTestCase extends TestCase
{
    /**
     * @var CustomerInterface[]
     */
    protected $customerListLoaded;

    /**
     * @var AbstractCustomerRepositoryStub
     */
    protected $repositoryStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->customerListLoaded = [new CustomerStub()];
    }

    /**
     * @test
     * @return void
     */
    public function testGetListReturnsCorrectObject(): void
    {
        $this->assertInstanceOf(
            SearchResultsInterface::class,
            $this->repositoryStub->getList(new SearchCriteria())
        );
    }
}
