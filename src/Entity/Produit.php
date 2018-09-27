<?php
    /**
     * Created by PhpStorm.
     * User: thomas
     * Date: 2018-09-27
     * Time: 14:00
     */

    namespace App\Entity;


    class Produit
    {

        /**
         * @var float
         */
        protected $prix;

        /**
         * @var bool
         */
        protected $isBook;

        public function __construct(float $prix, bool $isBook)
        {
            $this->isBook = $isBook;
            $this->prix = $prix;
        }

        /**
         * @return bool
         */
        public function isBook(): bool
        {
            return $this->isBook;
        }

        /**
         * @return float
         */
        public function getPrix(): float
        {
            return $this->prix;
        }

    }