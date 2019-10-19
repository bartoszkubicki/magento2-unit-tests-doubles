<?php

declare(strict_types=1);

/**
 * File: AbstractRequestStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Framework\App;

use Magento\Framework\App\RequestInterface;

/**
 * Only working methods for this stub are ones getting/setting
 * params, as they are often used + safe/unsafe implementation.
 * Others methods, as rarely used in custom code, are mocked to return
 * some example values.
 *
 * Class AbstractRequestStub
 * @package BKubicki\Magento2TestDoubles\Framework\App
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
abstract class AbstractRequestStub implements RequestInterface
{
    /**
     * @var array
     */
    private $params;

    /**
     * @var array
     */
    private $cookies;

    /**
     * RequestStub constructor.
     * @param array $params
     * @param array $cookies
     */
    public function __construct(
        array $params = [],
        array $cookies = []
    ) {
        $this->params = $params;
        $this->cookies = $cookies;
    }

    /**
     * @return string|void
     * @codeCoverageIgnore
     */
    public function getModuleName(): string
    {
        return 'test';
    }

    /**
     * @param string $name
     * @return AbstractRequestStub
     * @codeCoverageIgnore
     */
    public function setModuleName($name): self
    {
        return $this;
    }

    /**
     * @return string|void
     * @codeCoverageIgnore
     */
    public function getActionName(): string
    {
        return 'other';
    }

    /**
     * @param string $name
     * @return AbstractRequestStub
     * @codeCoverageIgnore
     */
    public function setActionName($name): self
    {
        return $this;
    }

    /**
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed|null
     */
    public function getParam($key, $defaultValue = null)
    {
        return $this->params[$key] ?? $defaultValue;
    }

    /**
     * @param array $params
     * @return SafeRequestStub
     */
    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param string|null $name
     * @param string|null $default
     * @return string|void|null
     */
    public function getCookie($name, $default)
    {
        return $this->cookies[$name] ?? $default;
    }
}
