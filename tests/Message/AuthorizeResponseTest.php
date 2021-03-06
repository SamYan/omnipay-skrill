<?php
namespace Omnipay\Skrill\Message;

use Omnipay\Tests\TestCase;

class AuthorizeResponseTest extends TestCase
{
    public function testAuthorizeSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('AuthorizeSuccess.txt');
        $xml = simplexml_load_string($httpResponse->getBody()->getContents());

        $response = new AuthorizeResponse($this->getMockRequest(), $xml);

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('761d416b605f1d438326b890025ad562', $response->getSessionId());
        $this->assertNull($response->getCode());
        $this->assertNull($response->getMessage());
    }
}
