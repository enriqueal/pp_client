<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\MockResponseRepository;


class MockResponseController extends AbstractController
{
    private $mockResponseRepository;
    
    public function __construct()
    {
        $this->mockResponseRepository = new MockResponseRepository();
    }
    
    /**
     * @Route("/orders/{order_id}", name="order_mock_response")
     */
    public function orderResponse()
    {
        return new JsonResponse($this->mockResponseRepository->getOrderResponseMock());
    }
    
    /**
     * @Route("/orders_search", name="search_mock_response")
     */
    public function searchResponse()
    {
        return new JsonResponse($this->mockResponseRepository->getSearchOrderResponseMock());
    }    
}
