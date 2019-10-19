<?php

declare(strict_types=1);

/**
 * File: SafeRequestStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\App;

/**
 * Class SafeRequestStub
 * @package BKubicki\Magento2TestDoubles\Framework\App
 */
class SafeRequestStub extends AbstractRequestStub
{
    /**
     * @return bool
     */
    public function isSecure(): bool
    {
        return true;
    }
}
