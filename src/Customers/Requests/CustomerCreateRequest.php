<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Customers\Requests;

use Ojasek\IuctoSdk\Models\Customer;

class CustomerCreateRequest
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getData()
    {
        $data = $this->customer->toArray();
        unset($data['id']);
        return $data;
    }
}
