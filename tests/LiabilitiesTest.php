<?php

namespace TomorrowIdeas\Plaid\Tests;

/**
 * @covers TomorrowIdeas\Plaid\Plaid
 */
class LiabilitiesTest extends TestCase
{
    public function test_get_liabilities()
    {
        $response = $this->getPlaidClient()->getLiabilities("access_token");

        $this->assertEquals("POST", $response->method);
        $this->assertEquals("2019-05-29", $response->version);
        $this->assertEquals("application/json", $response->content);
        $this->assertEquals("/liabilities/get", $response->path);
        $this->assertEquals("client_id", $response->params->client_id);
        $this->assertEquals("secret", $response->params->secret);
        $this->assertEquals("access_token", $response->params->access_token);
        $this->assertEquals(new \StdClass, $response->params->options);
    }
}