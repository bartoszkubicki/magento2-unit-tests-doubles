<?php

declare(strict_types=1);

/**
 * File: registration.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */


use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::LIBRARY,
    'BKubicki_Magento2TestDoubles',
    __DIR__ . '/src'
);
