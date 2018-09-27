<?php
    /**
     * Created by PhpStorm.
     * User: thomas
     * Date: 2018-09-27
     * Time: 14:44
     */

    namespace App\Tests\Controller;

    use App\Controller\PanierController;
    use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
    use Symfony\Component\HttpKernel\Client;

    class PanierControllerTest extends WebTestCase
    {

        /**
         * @var Client
         */
        protected $client;

        protected function setUp()
        {
            parent::setUp();
            $this->client = static::createClient();
        }

        public function testPanierCode()
        {
            $this->client->request('GET', '/panier');

            $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        }

        public function testAffichagePanier() {

            $crawler = $this->client->request('GET', '/panier');

            $this->assertGreaterThan(0, $crawler->filter('#totalPrice')->count());
            $this->assertGreaterThan(0, $crawler->filter('#transportPrice')->count());
            $this->assertGreaterThan(0, $crawler->filter('#tvaPrice')->count());
        }
    }
