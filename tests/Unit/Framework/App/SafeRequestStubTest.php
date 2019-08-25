<?php

declare(strict_types=1);

/**
 * File: SafeRequestStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Framework\App;

use BKubicki\Magento2TestDoubles\Framework\App\SafeRequestStub;

/**
 * Class SafeRequestStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Framework\App
 */
class SafeRequestStubTest extends AbstractRequestStubTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->requestStub = new SafeRequestStub($this->exampleParams, $this->exampleCookies);
    }

    /**
     * @test
     * @return void
     */
    public function testIsSecureReturnsCorrectValue(): void
    {
        $this->assertTrue($this->requestStub->isSecure());
    }
}
