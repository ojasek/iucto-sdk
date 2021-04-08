<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Ojasek\IuctoSdk\Exception\BadRequestException;
use Ojasek\IuctoSdk\Exception\ForbiddenException;
use Ojasek\IuctoSdk\Exception\IUctoException;
use Ojasek\IuctoSdk\Exception\NotFoundException;
use Ojasek\IuctoSdk\Exception\ServerErrorException;
use Ojasek\IuctoSdk\Exception\UnauthorizedException;

class HttpClient
{
    const API_URL = "http://online.iucto.cz/api"; // @TODO: asi presunout jeste do nejakeho configu

    const GET = "GET";
    const PUT = "PUT";
    const POST = "POST";
    const DELETE = "DELETE";
    const PATCH = "PATCH";

    /**
     * @var string $version
     */
    private $version;

    /**
     * @var string $apiKey
     */
    private $apiKey;

    /**
     * @var \GuzzleHttp\Client $httpClient
     */
    private  $httpClient;


    /**
     * Create a new Client Instance
     */
    public function __construct(string $apiKey, string $version)
    {
        $this->apiKey = $apiKey;
        $this->version = $version;
        $this->httpClient = new \GuzzleHttp\Client(
            [
            'headers' => [
                'X-Auth-Key' => $apiKey,
                'Content-Type' => 'application/json'
            ],
            'verify' => false // @TODO: musel jsem dát pro lokální spuštění - bez toho jsem se dostavál do curl60 SSL error
            ]
        );
    }


    /**
     * @param  string $method
     * @param  string $endpoint
     * @param  array  $body
     * @return array
     * @throws IUctoException
     */
    public function request(string $method, string $endpoint, array $body = [])
    {
        // make request options
        $options = [];
        if(!empty($body) && in_array($method, [self::POST, self::PUT, self::PATCH])) {
            $options[RequestOptions::JSON] = $body;
        }
        if(!empty($body) && $method == self::GET) {
            $options[RequestOptions::QUERY] = $body;
        }
        // build url
        $url = $this->buildUrl($endpoint);

        try{

            $response = $this->httpClient->request($method, $url, $options);
            $responseContents = $response->getBody()->getContents();

            if ($response->getStatusCode() >= 500) {
                throw new ServerErrorException('Server error', $response->getStatusCode());
            } elseif ($response->getStatusCode() >= 400) {
                switch ($response->getStatusCode()) {
                case 400:
                    throw new BadRequestException('Bad request', $response->getStatusCode());
                        break;
                case 401:
                    throw new UnauthorizedException('Unauthorized.', $response->getStatusCode());
                        break;
                case 403:
                    throw new ForbiddenException('Forbidden.', $response->getStatusCode());
                        break;
                case 404:
                    throw new NotFoundException('Not found', $response->getStatusCode());
                        break;
                default:
                    throw new IUctoException('Error.', $response->getStatusCode());
                        break;
                }
            } else {
                return json_decode($responseContents, true);
            }

        } catch (GuzzleException $guzzleException) {
            throw new IUctoException("Connecting error");
        } catch (\Exception $exception) {
            throw new IUctoException("Error");
        }
    }

    public function buildUrl($endpoint)
    {
        return self::API_URL . "/" . $this->version . "/" . $endpoint;
    }

}
