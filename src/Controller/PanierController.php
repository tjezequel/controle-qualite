<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index()
    {
        $panier = new Panier();
        $panier->addProduct(new Produit(70.0, true));
        $panier->addProduct(new Produit(20.0, false));
        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }
}
