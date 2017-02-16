<?php

namespace Liven\InSales\Tests\ApiClient\CRUD;

use Liven\InSales\API\ApiResponse;
use Liven\InSales\TestCase;

class ApplicationChargeTest extends TestCase
{
    public function testTest()
    {
        $client = $this->getApiClient(true);
        /** @var ApiResponse $response */
        $response = $client->createApplicationCharge(
            [
                'application_charge' => [
                    'name' => uniqid(),
                    'price' => 1
                ]
            ]
        );
        $this->assertTrue(in_array($response->getHttpCode(), [200,201]));
        $id = $response->getData()['id'];
        $response = $client->declineApplicationCharge($id);
        $this->assertTrue(in_array($response->getHttpCode(), [200,201]));
    }
}