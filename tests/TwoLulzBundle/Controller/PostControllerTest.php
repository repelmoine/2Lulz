<?php
/**
 * Created by PhpStorm.
 * User: RmX63
 * Date: 25/06/2017
 * Time: 13:41
 */

namespace TwoLulzBundle\Tests\Controller;


use FOS\RestBundle\Tests\Functional\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testLoginRedirect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
        $this->assertTrue($client->getResponse()->isRedirect());
    }

    public function testJsonResponse(){

        $client = static::createClient();

        $crawler = $client->request('GET', '/api/posts');

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ),
            'the "Content-Type" header is "application/json"' // optional message shown on failure
        );
    }
}