<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Customers;

use Ojasek\IuctoSdk\Customers\Requests\CustomerCreateRequest;
use Ojasek\IuctoSdk\Exception\IUctoException;
use Ojasek\IuctoSdk\HttpClient;
use Ojasek\IuctoSdk\Models\Customer;
use Ojasek\IuctoSdk\Models\ModelsList;

class CustomerManager
{
    const ENDPOINT = "customer";

    private $client;

    public function __construct(HttpClient $httpClient)
    {
        $this->client = $httpClient;
    }

    /**
     * @param  array $params
     * @return ModelsList
     * @throws IUctoException
     */
    public function listCustomers(array $params = [])
    {
        $response = $this->client->request(HttpClient::GET, self::ENDPOINT, $params);
        $modelsList = new ModelsList(Customer::class, $response, self::ENDPOINT);
        return $modelsList;
    }

    /**
     * @param  Customer $customer
     * @return Customer
     * @throws IUctoException
     */
    public function create(Customer $customer)
    {
        $request = new CustomerCreateRequest($customer);
        $data = $request->getData();
        $response = $this->client->request(HttpClient::POST, self::ENDPOINT, $data);
        return new Customer($response);
    }

    /**
     * @param  int $id
     * @return Customer
     * @throws IUctoException
     */
    public function detail(int $id)
    {
        $endpoint = self::ENDPOINT . "/" . $id;
        $response = $this->client->request(HttpClient::GET, $endpoint);
        return new Customer($response);
    }

    /**
     * @param  int $id
     * @return bool
     * @throws IUctoException
     */
    public function delete(int $id)
    {
        $endpoint = self::ENDPOINT . "/" . $id;
        $this->client->request(HttpClient::DELETE, $endpoint);
        return true;
    }
}
