<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Models;

class ModelsList
{
    private $data;

    /**
     * ModelsList constructor.
     *
     * @param $class
     * @param $data
     */
    public function __construct($class, $data, $endpoint)
    {

        if(isset($data['_embedded'][$endpoint])) {
            foreach ($data['_embedded'][$endpoint] as $item) {
                $this->data[] = new $class($item);
            }
        }else{
            throw new \InvalidArgumentException("List data contains no _embedded index");
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


}
