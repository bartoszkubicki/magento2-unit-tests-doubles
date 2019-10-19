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
        'test' => 'sth',
        4 => 'sth_else'
    ];

    /**
     * @var array
     */
    protected $exampleCookies = [
        'other' => 'ttt',
        3 => 'rr'
    ];

    /**
     * @var AbstractRequestStub
     */
    protected $requestStub;

    /**
     * @test
     * @return void
     */
    public function testGetParamReturnsCorrectValue(): void
    {
        $this->assertSame('sth', $this->requestStub->getParam('test'));
        $this->assertSame('ff', $this->requestStub->getParam('sth_other', 'ff'));
        $this->assertSame('sth_else', $this->requestStub->getParam(4.00));
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
        $this->assertSame('rr', $this->requestStub->getCookie(3.00, 'f'));
    }
}
