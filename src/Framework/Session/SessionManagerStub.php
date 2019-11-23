<?php

declare(strict_types=1);

/**
 * File: SessionManagerStub.php
 *
 * @author Bartosz Kubicki bartosz.kubicki@lizardmedia.pl>
 * @copyright Copyright (C) 2019 Lizard Media (http://lizardmedia.pl)
 */

namespace BKubicki\Magento2TestDoubles\Framework\Session;

use Exception;
use InvalidArgumentException;
use Magento\Framework\DataObject;
use Magento\Framework\Session\SessionManagerInterface;

/**
 * Class SessionManagerStub
 * @package BKubicki\Magento2TestDoubles\Framework\Session
 * @codeCoverageIgnore
 */
class SessionManagerStub implements SessionManagerInterface
{
    /**
     * @var null|string
     */
    private $sessionId;

    /**
     * @var null|string
     */
    private $sessionName = '';

    /**
     * @var array
     */
    private $storage;

    /**
     * SessionManagerStub constructor.
     * @param DataObject $storage
     */
    public function __construct(DataObject $storage = null)
    {
        if (!$storage instanceof DataObject) {
            $storage = new DataObject();
        }

        $this->storage = $storage;
    }

    /**
     * @return SessionManagerStub
     * @throws Exception
     */
    public function start(): self
    {
        $this->sessionId = $this->generateSid();
        return $this;
    }

    /**
     * @return void
     */
    public function writeClose(): void
    {
    }

    /**
     * @return bool
     */
    public function isSessionExists(): bool
    {
        return !empty($this->sessionId);
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return (string) $this->sessionId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string) $this->sessionName;
    }

    /**
     * @param string $name
     * @return SessionManagerStub
     */
    public function setName($name): self
    {
        $this->sessionName = $name;
        return $this;
    }

    /**
     * @param array|null $options
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function destroy(array $options = null): void
    {
        $this->storage->unsetData();
    }

    /**
     * @return SessionManagerStub
     */
    public function clearStorage(): self
    {
        $this->storage->unsetData();
        return $this;
    }

    /**
     * @return string
     */
    public function getCookieDomain(): string
    {
        return 'some_domain';
    }

    /**
     * @return string
     */
    public function getCookiePath(): string
    {
        return 'some_path';
    }

    /**
     * @return int
     */
    public function getCookieLifetime(): int
    {
        try {
            return random_int(2000, 2020);
        } catch (Exception $exception) {
            return 86400;
        }
    }

    /**
     * @param string|null $sessionId
     * @return SessionManagerStub
     */
    public function setSessionId($sessionId): self
    {
        $this->sessionId = (string) $sessionId;
        return $this;
    }

    /**
     * @return SessionManagerStub
     */
    public function regenerateId(): self
    {
        return $this;
    }

    /**
     * @return void
     */
    public function expireSessionCookie(): void
    {
    }

    /**
     * @param string $urlHost
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getSessionIdForHost($urlHost): string
    {
        return (string) $this->sessionId;
    }

    /**
     * @param string $host
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function isValidForHost($host): bool
    {
        return true;
    }

    /**
     * @param string $path
     * @return bool|void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function isValidForPath($path): bool
    {
        return true;
    }

    /**
     * @param $method
     * @param $args
     * @return SessionManagerStub|mixed
     */
    public function __call($method, $args)
    {
        if (!in_array(substr($method, 0, 3), ['get', 'set', 'uns', 'has'])) {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid method %s::%s(%s)',
                    get_class($this),
                    $method,
                    print_r($args, 1)
                )
            );
        }

        $return = call_user_func_array([$this->storage, $method], $args);
        return $return === $this->storage ? $this : $return;
    }

    /**
     * @param string $key
     * @param bool $clear
     * @return mixed
     */
    public function getData($key = '', $clear = false)
    {
        $data = $this->storage->getData($key);

        if ($clear && isset($data)) {
            $this->storage->unsetData($key);
        }

        return $data;
    }

    /**
     * @return string
     */
    private function generateSid(): string
    {
        return (string) uniqid('session', true);
    }
}
