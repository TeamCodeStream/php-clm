<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product")
     */
    public function createProduct(EntityManagerInterface $entityManager): Response
    {        
        $product = new Product();
        $product->setName('T-shirt');
        $product->setPrice(30);
        $product->setDescription('Cats in space!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        sleep(1);

        return new Response('Saved new product with id ' . $product->getId());
    
    }
}
