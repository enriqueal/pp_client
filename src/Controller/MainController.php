<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use App\Entity\Items;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/list", name="list_orders")
     */
    public function listOrders()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $orders = $entityManager->getRepository(Orders::class)->findAll();
        
        return $this->render('main/list.html.twig', [
            'orders' => $orders,
        ]);
    }
    
    /**
     * @Route("/item/{id}", name="list_items")
     */
    public function listItem($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $items = $entityManager->getRepository(Items::class)->findBy(['order_id' => $id]);       
        
        return $this->render('main/item.html.twig', [
            'items' => $items,
        ]);
    }
}
