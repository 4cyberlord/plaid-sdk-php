<?php

namespace TomorrowIdeas\Plaid\Tests;

use Capsule\Response;
use TomorrowIdeas\Plaid\PlaidRequestException;

/**
 * @covers TomorrowIdeas\Plaid\PlaidRequestException
 */
class PlaidRequestExceptionTest extends TestCase
{
    public function test_getting_code_from_exception()
    {
        $response = new Response(
            404,
            '{"display_message": "Foo not found"}'
        );

        $plaidRequestException = new PlaidRequestException($response);

        $this->assertEquals(404, $plaidRequestException->getCode());
    }

    public function test_getting_display_message_on_exception()
    {
        $response = new Response(
            404,
            '{"display_message": "Foo not found"}'
        );

        $plaidRequestException = new PlaidRequestException($response);

        $this->assertEquals("Foo not found", $plaidRequestException->getMessage());
    }

    public function test_getting_fallback_message()
    {
        $response = new Response(
            404,
            '{"error": "Foo not found"}'
        );

        $plaidRequestException = new PlaidRequestException($response);

        $this->assertEquals("Not Found", $plaidRequestException->getMessage());
    }

    public function test_getting_fallback_message_for_unknown_payload()
    {
        $response = new Response(
            404,
            "Foo not found"
        );

        $plaidRequestException = new PlaidRequestException($response);

        $this->assertEquals("Not Found", $plaidRequestException->getMessage());
    }

    public function test_getting_payload_from_exception()
    {
        $response = new Response(
            404,
            '{"display_message": "Foo not found"}'
        );

        $plaidRequestException = new PlaidRequestException($response);

        $this->assertEquals(
            (object) ["display_message" => "Foo not found"],
            $plaidRequestException->getResponse()
        );
    }
}