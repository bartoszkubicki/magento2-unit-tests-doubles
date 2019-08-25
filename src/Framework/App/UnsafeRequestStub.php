<?php

declare(strict_types=1);

/**
 * File: UnsafeRequestStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\App;

/**
 * Class UnsafeRequestStub
 * @package BKubicki\Magento2TestDoubles\Framework\App
 */
class UnsafeRequestStub extends AbstractRequestStub
{
    /**
     * @return bool
     */
    public function isSecure(): bool
    {
        return false;
    }
}
