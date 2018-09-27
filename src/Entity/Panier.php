<?php
    /**
     * Created by PhpStorm.
     * User: thomas
     * Date: 2018-09-27
     * Time: 13:49
     */

    namespace App\Entity;


    class Panier
    {

        /**
         * @var []Produit
         */
        protected $produits = [];

        public function addProduct(Produit $produit) {
            $this->produits[] = $produit;
        }

        public function getVat() {
            $totalTVA = 0.0;
            foreach ($this->produits as $produit) {
                if ($produit->isBook()) {
                    $totalTVA += $produit->getPrix() * 0.055;
                } else {
                    $totalTVA += $produit->getPrix() * 0.2;
                }
            }
            return round($totalTVA, 2);
        }

        public function getTransportation() {
            if ($this->getHT() > 50.0) {
                return 0.0;
            } else {
                return 5.0;
            }
        }

        public function getHT() {
            $totalHT = 0.0;
            foreach ($this->produits as $produit) {
                $totalHT += $produit->getPrix();
            }
            return round($totalHT,2);
        }

        public function getTotal() {
            $total = 0.0;
            $total += $this->getHT();
            $total += $this->getTransportation();
            $total += $this->getVat();
            return $total;
        }

        /**
         * @return mixed
         */
        public function getProduits()
        {
            return $this->produits;
        }

    }