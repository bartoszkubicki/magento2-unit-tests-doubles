<?php

declare(strict_types=1);

/**
 * File: AbstractRequestStubTestCase.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Framework\App;

use BKubicki\Magento2TestDoubles\Framework\App\AbstractRequestStub;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractRequestStubTestCase
 * @package BKubicki\Magento2TestDoubles\Unit\Framework\App
 */
class AbstractRequestStubTestCase extends TestCase
{
    /**
     * @var array
     */
    protected $exampleParams = [
        'test' => 'sth'
    ];

    /**
     * @var array
     */
    protected $exampleCookies = [
        'other' => 'ttt'
    ];

    /**
     * @var AbstractRequestStub
     */
    protected $requestStub;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     * @return void
     */
    public function testGetParamReturnsCorrectValue(): void
    {
        $this->assertSame('sth', $this->requestStub->getParam('test'));
        $this->assertSame('ff', $this->requestStub->getParam('sth_other', 'ff'));
    }

    /**
     * @test
     * @return void
     */
    public function testSetParamsCorrectlyChangesParamsValue(): void
    {
        $params = ['ss' => 'aa'];
        $this->requestStub->setParams($params);
        $this->assertSame($params, $this->requestStub->getParams());
    }

    /**
     * @test
     * @return void
     */
    public function testGetCookieReturnsCorrectValue(): void
    {
        $this->assertSame('ttt', $this->requestStub->getCookie('other', 'aa'));
        $this->assertSame('ff', $this->requestStub->getCookie('sth_other', 'ff'));
    }
}
