<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk;

use Ojasek\IuctoSdk\Customers\CustomerManager;

class IUctoApi
{
    public $customers;
    private $httpClient;

    /**
     * IUctoApi constructor.
     *
     * @param string $apiKey
     * @param string $version
     */
    public function __construct(string $apiKey, $version = ApiVersion::ACTUAL_VERSION)
    {
        $this->httpClient = new HttpClient($apiKey, $version);
        $this->customers = new CustomerManager($this->httpClient);
    }
}
