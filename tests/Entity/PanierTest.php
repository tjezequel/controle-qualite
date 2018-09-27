<?php
    /**
     * Created by PhpStorm.
     * User: thomas
     * Date: 2018-09-27
     * Time: 13:49
     */

    namespace App\Tests\Entity;

    use App\Entity\Panier;
    use App\Entity\Produit;
    use PHPUnit\Framework\TestCase;

    class PanierTest extends TestCase
    {


        public function testTVAProduitNonLivre() {
            $panier = new Panier();
            $panier->addProduct(new Produit(20.0, false));
            $this->assertEquals(4.0, $panier->getVat());
        }

        public function testTVAProduitLivre() {
            $panier = new Panier();
            $panier->addProduct(new Produit(20.0, true));
            $this->assertEquals(1.1, $panier->getVat());
        }

        public function testPanierFraisDePortsGratuits() {
            $panier = new Panier();
            $panier->addProduct(new Produit(30.0, false));
            $panier->addProduct(new Produit(36.0, true));
            $this->assertEquals(0.0, $panier->getTransportation());
        }

        public function testPanierFraisDePortsNonGratuits() {
            $panier = new Panier();
            $panier->addProduct(new Produit(20.0, false));
            $panier->addProduct(new Produit(10.0, true));
            $this->assertEquals(5.0, $panier->getTransportation());
        }

        public function testTotalPanierMixteAvecFraisDePort() {
            $panier = new Panier();
            $panier->addProduct(new Produit(10.0, false));
            $panier->addProduct(new Produit(10.0, true));
            $this->assertEquals(27.55, $panier->getTotal());
        }

        public function testTotalPanierMixteSansFraisDePort() {
            $panier = new Panier();
            $panier->addProduct(new Produit(30.0, false));
            $panier->addProduct(new Produit(35.0, true));
            $this->assertEquals(72.93, $panier->getTotal());
        }
    }
