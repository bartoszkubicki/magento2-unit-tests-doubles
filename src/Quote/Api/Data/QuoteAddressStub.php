<?php
declare(strict_types=1);

namespace BKubicki\Magento2TestDoubles\Quote\Api\Data;

use BKubicki\Magento2TestDoubles\Framework\Api\CustomAttributesDataStub;
use Magento\Quote\Api\Data\AddressInterface;

class QuoteAddressStub extends CustomAttributesDataStub implements AddressInterface
{
    public function getId()
    {
        return $this->getData(self::KEY_ID);
    }

    public function setId($id)
    {
        return $this->setData(self::KEY_ID, $id);
    }

    public function getRegion()
    {
        return $this->getData(self::KEY_REGION);
    }

    public function setRegion($region)
    {
        return $this->setData(self::KEY_REGION, $region);
    }

    public function getRegionId()
    {
        return $this->getData(self::KEY_REGION_ID);
    }

    public function setRegionId($regionId)
    {
        return $this->setData(self::KEY_REGION_ID, $regionId);
    }

    public function getRegionCode()
    {
        return $this->getData(self::KEY_REGION_CODE);
    }

    public function setRegionCode($regionCode)
    {
        return $this->setData(self::KEY_REGION_CODE, $regionCode);
    }

    public function getCountryId()
    {
        return $this->getData(self::KEY_COUNTRY_ID);
    }

    public function setCountryId($countryId)
    {
        return $this->setData(self::KEY_COUNTRY_ID, $countryId);
    }

    public function getStreet()
    {
        return $this->getData(self::KEY_STREET);
    }

    public function setStreet($street)
    {
        return $this->setData(self::KEY_STREET, $street);
    }

    public function getCompany()
    {
        return $this->getData(self::KEY_COMPANY);
    }

    public function setCompany($company)
    {
        return $this->setData(self::KEY_COMPANY, $company);
    }

    public function getTelephone()
    {
        return $this->getData(self::KEY_TELEPHONE);
    }

    public function setTelephone($telephone)
    {
        return $this->setData(self::KEY_TELEPHONE, $telephone);
    }

    public function getFax()
    {
        return $this->getData(self::KEY_FAX);
    }

    public function setFax($fax)
    {
        return $this->setData(self::KEY_FAX, $fax);
    }

    public function getPostcode()
    {
        return $this->getData(self::KEY_POSTCODE);
    }

    public function setPostcode($postcode)
    {
        return $this->setData(self::KEY_POSTCODE, $postcode);
    }

    public function getCity()
    {
        return $this->getData(self::KEY_CITY);
    }

    public function setCity($city)
    {
        return $this->setData(self::KEY_CITY, $city);
    }

    public function getFirstname()
    {
        return $this->getData(self::KEY_FIRSTNAME);
    }

    public function setFirstname($firstname)
    {
        return $this->setData(self::KEY_FIRSTNAME, $firstname);
    }

    public function getLastname()
    {
        return $this->getData(self::KEY_LASTNAME);
    }

    public function setLastname($lastname)
    {
        return $this->setData(self::KEY_LASTNAME, $lastname);
    }

    public function getMiddlename()
    {
        return $this->getData(self::KEY_MIDDLENAME);
    }

    public function setMiddlename($middlename)
    {
        return $this->setData(self::KEY_MIDDLENAME, $middlename);
    }

    public function getPrefix()
    {
        return $this->getData(self::KEY_PREFIX);
    }

    public function setPrefix($prefix)
    {
        return $this->setData(self::KEY_PREFIX, $prefix);
    }

    public function getSuffix()
    {
        return $this->getData(self::KEY_SUFFIX);
    }

    public function setSuffix($suffix)
    {
        return $this->setData(self::KEY_SUFFIX, $suffix);
    }

    public function getVatId()
    {
        return $this->getData(self::KEY_VAT_ID);
    }

    public function setVatId($vatId)
    {
        return $this->setData(self::KEY_VAT_ID, $vatId);
    }

    public function getCustomerId()
    {
        return $this->getData(self::KEY_CUSTOMER_ID);
    }

    public function setCustomerId($customerId)
    {
        return $this->setData(self::KEY_CUSTOMER_ID, $customerId);
    }

    public function getEmail()
    {
        return $this->getData(self::KEY_EMAIL);
    }

    public function setEmail($email)
    {
        return $this->setData(self::KEY_EMAIL, $email);
    }

    public function getSameAsBilling()
    {
        return $this->getData(self::SAME_AS_BILLING);
    }

    public function setSameAsBilling($sameAsBilling)
    {
        return $this->setData(self::SAME_AS_BILLING, $sameAsBilling);
    }

    public function getCustomerAddressId()
    {
        return $this->getData(self::CUSTOMER_ADDRESS_ID);
    }

    public function setCustomerAddressId($customerAddressId)
    {
        return $this->setData(self::CUSTOMER_ADDRESS_ID, $customerAddressId);
    }

    public function getSaveInAddressBook()
    {
        return $this->getData(self::SAVE_IN_ADDRESS_BOOK);
    }

    public function setSaveInAddressBook($saveInAddressBook)
    {
        return $this->setData(self::SAVE_IN_ADDRESS_BOOK, $saveInAddressBook);
    }

    public function getExtensionAttributes()
    {
        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
    }

    public function setExtensionAttributes(\Magento\Quote\Api\Data\AddressExtensionInterface $extensionAttributes)
    {
        return $this->setData(self::EXTENSION_ATTRIBUTES_KEY, $extensionAttributes);
    }
}
