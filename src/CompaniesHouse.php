<?php

namespace Mchlbowyer\CompaniesHouse;

use Mchlbowyer\CompaniesHouse\Traits\Search;
use Exception;
use GuzzleHttp\Client;

class CompaniesHouse
{
    use Search;

    /**
     * Set the base url that all API requests use
     * @var string
     */
    protected static $baseUrl = 'https://api.company-information.service.gov.uk/';

    /**
     * __call catches all requests when no found method is requested
     * @param  $function - the verb to execute
     * @param  $args - array of arguments
     * @return guzzle request
     */
    public function __call($function, $args)
    {
        $options = ['get'];
        $path = (isset($args[0])) ? $args[0] : null;

        if (in_array($function, $options)) {
            return self::guzzle($path);
        } else {
            //request verb is not in the $options array
            throw new Exception($function . ' is not a valid HTTP Verb');
        }
    }

    /**
     * run guzzle to process requested url
     * @param  $request string
     * @return object
     */
    protected function guzzle($request)
    {
        try {
            $client = new Client;

            $response = $client->get(self::$baseUrl . $request, [
                'headers' => [
                    'Authorization' => config('companieshouse.key'),
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (Exception $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
    }
}
