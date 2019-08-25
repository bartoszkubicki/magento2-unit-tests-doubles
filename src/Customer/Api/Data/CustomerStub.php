<?php

declare(strict_types=1);

/**
 * File: CustomerStub.php
 *
 * @author Bartosz Kubicki b.w.kubicki@gmail.com>
 * Github: https://github.com/bartoszkubicki
 */

namespace BKubicki\Magento2TestDoubles\Customer\Api\Data;

use BKubicki\Magento2TestDoubles\Framework\Api\CustomAttributesDataStub;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerExtensionInterface;

/**
 * Class CustomerStub
 * @package BKubicki\Magento2TestDoubles\Customer\Api\Data
 * @codeCoverageIgnore
 */
class CustomerStub extends CustomAttributesDataStub implements CustomerInterface
{
    /**
     * @return string|null
     */
    public function getDefaultBilling(): ?string
    {
        return $this->getData(self::DEFAULT_BILLING);
    }

    /**
     * @return string|null
     */
    public function getDefaultShipping(): ?string
    {
        return $this->getData(self::DEFAULT_SHIPPING);
    }

    /**
     * @return string|null
     */
    public function getConfirmation(): ?string
    {
        return $this->getData(self::CONFIRMATION);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @return string|null
     */
    public function getCreatedIn(): ?string
    {
        return $this->getData(self::CREATED_IN);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @return string|null
     */
    public function getDob(): ?string
    {
        return $this->getData(self::DOB);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->getData(self::FIRSTNAME);
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->getData(self::GENDER);
    }

    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->getData(self::GROUP_ID);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->getData(self::LASTNAME);
    }

    /**
     * @return string|null
     */
    public function getMiddlename(): ?string
    {
        return $this->getData(self::MIDDLENAME);
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->getData(self::PREFIX);
    }

    /**
     * @return int|null
     */
    public function getStoreId(): ?int
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->getData(self::SUFFIX);
    }

    /**
     * @return string|null
     */
    public function getTaxvat(): ?string
    {
        return $this->getData(self::TAXVAT);
    }

    /**
     * @return int|null
     */
    public function getWebsiteId(): ?int
    {
        return $this->getData(self::WEBSITE_ID);
    }

    /**
     * @return AddressInterface[]|null
     */
    public function getAddresses(): ?array
    {
        return $this->getData(self::KEY_ADDRESSES);
    }

    /**
     * @return int|null
     */
    public function getDisableAutoGroupChange(): ?int
    {
        return $this->getData(self::DISABLE_AUTO_GROUP_CHANGE);
    }

    /**
     * Set customer id
     *
     * @param int $id
     * @return $this
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function setId($id): self
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param int $groupId
     * @return $this
     */
    public function setGroupId($groupId): self
    {
        return $this->setData(self::GROUP_ID, $groupId);
    }

    /**
     * @param string $defaultBilling
     * @return $this
     */
    public function setDefaultBilling($defaultBilling): self
    {
        return $this->setData(self::DEFAULT_BILLING, $defaultBilling);
    }

    /**
     * @param string $defaultShipping
     * @return $this
     */
    public function setDefaultShipping($defaultShipping): self
    {
        return $this->setData(self::DEFAULT_SHIPPING, $defaultShipping);
    }

    /**
     * @param string $confirmation
     * @return $this
     */
    public function setConfirmation($confirmation): self
    {
        return $this->setData(self::CONFIRMATION, $confirmation);
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt): self
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt): self
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @param string $createdIn
     * @return $this
     */
    public function setCreatedIn($createdIn): self
    {
        return $this->setData(self::CREATED_IN, $createdIn);
    }

    /**
     * @param string $dob
     * @return $this
     */
    public function setDob($dob): self
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email): self
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname): self
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * @param string $lastname
     * @return string
     */
    public function setLastname($lastname): self
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * @param string $middlename
     * @return $this
     */
    public function setMiddlename($middlename): self
    {
        return $this->setData(self::MIDDLENAME, $middlename);
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function setPrefix($prefix): self
    {
        return $this->setData(self::PREFIX, $prefix);
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function setSuffix($suffix): self
    {
        return $this->setData(self::SUFFIX, $suffix);
    }

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender($gender): self
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * @param int $storeId
     * @return $this
     */
    public function setStoreId($storeId): self
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @param string $taxvat
     * @return $this
     */
    public function setTaxvat($taxvat): self
    {
        return $this->setData(self::TAXVAT, $taxvat);
    }

    /**
     * @param int $websiteId
     * @return $this
     */
    public function setWebsiteId($websiteId): self
    {
        return $this->setData(self::WEBSITE_ID, $websiteId);
    }

    /**
     * @param AddressInterface[] $addresses
     * @return $this
     */
    public function setAddresses(array $addresses = null): self
    {
        return $this->setData(self::KEY_ADDRESSES, $addresses);
    }

    /**
     * @param int $disableAutoGroupChange
     * @return $this
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setDisableAutoGroupChange($disableAutoGroupChange): self
    {
        return $this->setData(self::DISABLE_AUTO_GROUP_CHANGE, $disableAutoGroupChange);
    }

    /**
     * @return CustomerExtensionInterface|null
     */
    public function getExtensionAttributes(): ?CustomerExtensionInterface
    {
        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
    }

    /**
     * @param CustomerExtensionInterface $extensionAttributes
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setExtensionAttributes(CustomerExtensionInterface $extensionAttributes): self
    {
        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
    }
}