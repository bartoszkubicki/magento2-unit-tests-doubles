<?php

declare(strict_types=1);

/**
 * File: SearchResultsStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Framework\Api;


use BKubicki\Magento2TestDoubles\Framework\Api\SearchResultsStub;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class SearchResultsStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Framework\Api
 */
class SearchResultsStubTest extends TestCase
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @var MockObject|SearchCriteriaInterface
     */
    private $searchCriteriaMock;

    /**
     * @var SearchResultsStub
     */
    private $searchResultStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->items = [$this->getMockBuilder(ProductInterface::class)->getMock()];
        $this->searchCriteriaMock = $this->getMockBuilder(SearchCriteriaInterface::class)->getMock();

        $this->searchResultStub = new SearchResultsStub($this->items, $this->searchCriteriaMock);
    }

    /**
     * @test
     * @return void
     */
    public function testGetItemsReturnsCorrectValue(): void
    {
        $expected = $this->searchResultStub->getItems();
        $this->assertSame($this->items, $expected);
    }

    /**
     * @test
     * @return void
     */
    public function testSetItemsCorrectlyAddsItems(): void
    {
        $searchResultsStub = new SearchResultsStub([], $this->searchCriteriaMock);
        $searchResultsStub->setItems($this->items);
        $this->assertSame($this->items, $searchResultsStub->getItems());
    }

    /**
     * @test
     * @return void
     */
    public function testGetSearchCriteriaReturnsCorrectInstance(): void
    {
        $this->assertInstanceOf(
            SearchCriteriaInterface::class,
            $this->searchResultStub->getSearchCriteria()
        );
    }

    /**
     * @test
     * @return void
     */
    public function testSetSearchCriteriaCorrectlyAddsSearchCriteria(): void
    {
        $searchResultStub = new SearchResultsStub();
        $searchResultStub->setSearchCriteria($this->searchCriteriaMock);
        $this->assertInstanceOf(SearchCriteriaInterface::class, $searchResultStub->getSearchCriteria());
    }

    /**
     * @test
     * @return void
     */
    public function testFunctionForTotalCountIfTheyCorrectlyCountsItems(): void
    {
        $this->assertSame(1, $this->searchResultStub->getTotalCount());

        //We check if setTotalCount is completely dummy method
        $this->searchResultStub->setTotalCount(10);
        $this->assertSame(1, $this->searchResultStub->getTotalCount());
    }
}
