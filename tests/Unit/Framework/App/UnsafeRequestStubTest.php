<?php

declare(strict_types=1);

/**
 * File: UnsafeRequestStubTest.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Unit\Framework\App;

use BKubicki\Magento2TestDoubles\Framework\App\UnsafeRequestStub;

/**
 * Class UnsafeRequestStubTest
 * @package BKubicki\Magento2TestDoubles\Unit\Framework\App
 */
class UnsafeRequestStubTest extends AbstractRequestStubTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->requestStub = new UnsafeRequestStub($this->exampleParams, $this->exampleCookies);
    }

    /**
     * @test
     * @return void
     */
    public function testIsSecureReturnsCorrectValue(): void
    {
        $this->assertFalse($this->requestStub->isSecure());
    }
}
