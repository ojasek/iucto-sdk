<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Models;

use Ojasek\IuctoSdk\Enums\Language;
use Ojasek\IuctoSdk\Enums\PaymentMethod;
use Ojasek\IuctoSdk\Utils\EnumValidator;

class Customer
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $comid
     */
    private $comid;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string phone
     */
    private $phone;

    /**
     * @var string $cellphone
     */
    private $cellphone;

    /**
     * @var int $customerGroupId
     */
    private $customerGroupId;

    /**
     * @var bool $vatPayer
     */
    private $vatPayer;

    /**
     * @var string $vatId
     */
    private $vatId;

    /**
     * @var Address $address
     */
    private $address;

    /**
     * @var int $usualMaturity
     */
    private $usualMaturity;

    /**
     * @var string $preferredPaymentMethod
     */
    private $preferredPaymentMethod;

    /**
     * @var string $invoiceLanguage
     */
    private $invoiceLanguage;

    public function __construct(array $data = [])
    {
        if(empty($data))
            return;

        $this->id = isset($data["id"]) ? $data["id"] : null;
        $this->name = $data["name"];
        $this->comid = $data["comid"];
        $this->email = $data["email"];
        $this->phone = $data["phone"];
        $this->cellphone = $data["cellphone"];
        $this->customerGroupId = (isset($data["customer_group_id"])) ? $data["customer_group_id"] : null;
        $this->vatPayer = $data["vat_payer"];
        $this->vatId = $data["vatid"];
        $this->address = (isset($data["address"])) ? new Address($data["address"]) : new Address();
        $this->invoiceLanguage = isset($data["invoice_language"]) ? $data["invoice_language"] : null;
        $this->preferredPaymentMethod = isset($data["preferred_payment_method"]) ? $data["preferred_payment_method"] : null;
        $this->usualMaturity = isset($data["usual_maturity"]) ? $data["usual_maturity"] : null;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'comid' => $this->comid,
            'email' => $this->email,
            'phone' => $this->phone,
            'cellphone' => $this->cellphone,
            'customerGroupId' => $this->customerGroupId,
            'vatPayer' => $this->vatPayer,
            'vatId' => $this->vatId,
            'address' => $this->address,
            'invoiceLanguage' => $this->invoiceLanguage,
            'preferredPaymentMethod' => $this->preferredPaymentMethod,
            'usualMaturity' => $this->usualMaturity,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getComid(): ?string
    {
        return $this->comid;
    }

    /**
     * @param string $comid
     */
    public function setComid(string $comid): void
    {
        $this->comid = $comid;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCellphone(): ?string
    {
        return $this->cellphone;
    }

    /**
     * @param string $cellphone
     */
    public function setCellphone(string $cellphone): void
    {
        $this->cellphone = $cellphone;
    }

    /**
     * @return int
     */
    public function getCustomerGroupId(): ?int
    {
        return $this->customerGroupId;
    }

    /**
     * @param int $customerGroupId
     */
    public function setCustomerGroupId(int $customerGroupId): void
    {
        $this->customerGroupId = $customerGroupId;
    }

    /**
     * @return bool
     */
    public function getVatPayer(): bool
    {
        return $this->vatPayer;
    }

    /**
     * @param bool $vatPayer
     */
    public function setVatPayer(bool $vatPayer): void
    {
        $this->vatPayer = $vatPayer;
    }

    /**
     * @return string
     */
    public function getVatId(): string
    {
        return $this->vatId;
    }

    /**
     * @param string $vatId
     */
    public function setVatId(string $vatId): void
    {
        $this->vatId = $vatId;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getUsualMaturity(): ?int
    {
        return $this->usualMaturity;
    }

    /**
     * @param int $usualMaturity
     */
    public function setUsualMaturity(int $usualMaturity): void
    {
        $this->usualMaturity = $usualMaturity;
    }

    /**
     * @return string
     */
    public function getPreferredPaymentMethod(): ?string
    {
        return $this->preferredPaymentMethod;
    }

    /**
     * @param string $preferredPaymentMethod
     */
    public function setPreferredPaymentMethod(string $preferredPaymentMethod): void
    {
        if(!EnumValidator::isValidValue(PaymentMethod::class, $preferredPaymentMethod))
            throw new \InvalidArgumentException("Wrong enum value");

        $this->preferredPaymentMethod = $preferredPaymentMethod;
    }

    /**
     * @return string
     */
    public function getInvoiceLanguage(): ?string
    {
        return $this->invoiceLanguage;
    }

    /**
     * @param string $invoiceLanguage
     */
    public function setInvoiceLanguage(string $invoiceLanguage): void
    {
        if(!EnumValidator::isValidValue(Language::class, $invoiceLanguage))
            throw new \InvalidArgumentException("Wrong enum value");

        $this->invoiceLanguage = $invoiceLanguage;
    }


}

?>
