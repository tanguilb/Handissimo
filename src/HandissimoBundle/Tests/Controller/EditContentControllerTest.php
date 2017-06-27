<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 21/06/17
 * Time: 08:38
 */

namespace HandissimoBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EditContentControllerTest extends WebTestCase
{
    public function testHowToUse()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/solution');
        $this->assertEquals(1, $crawler->filter('h1:contains("Comment ça marche ?")')->count());
    }

    public function testHowToHelp()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/help');
        $this->assertEquals(1, $crawler->filter('h1:contains("Comment nous aider ?")')->count());
    }
}