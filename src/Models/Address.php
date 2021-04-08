<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Models;

use Ojasek\IuctoSdk\Enums\Country;
use Ojasek\IuctoSdk\Utils\EnumValidator;

class Address
{
    /**
     * @var string $street
     */
    private $street;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $postalcode
     */
    private $postalcode;

    /**
     * @var string $country
     */
    private $country;

    public function __construct(array $data = [])
    {
        if(empty($data))
            return;

        $this->street = $data["street"];
        $this->city = $data["city"];
        $this->postalcode = $data["postalcode"];
        $this->setCountry($data["country"]); //@TODO: asi setovat všude přes settery to vzdy projde pres pripadnou validaci
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostalcode(): string
    {
        return $this->postalcode;
    }

    /**
     * @param string $postalcode
     */
    public function setPostalcode(string $postalcode): void
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        if(!EnumValidator::isValidValue(Country::class, $country))
            throw new \InvalidArgumentException("Wrong enum value");

        $this->country = $country;
    }





}