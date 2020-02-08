<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use App\Entity\Orders;
use App\Entity\Items;

class RestController extends AbstractController
{
    const POST = "POST";
    const GET = "GET";
    const URL_ORDER_MOCK = "http://localhost/test/public/index.php/orders/";
    const URL_SEARCH_ORDER_MOCK = "http://localhost/test/public/index.php/orders_search";
    
    /**
     * @Route("/api/rest", name="api_rest")
     */
    public function index()
    {
        return $this->render('rest/index.html.twig', [
            'controller_name' => 'ApiRestController',
        ]);
    }
    
    /**
     * @Route("/api/order/{orderId}", name="call_order")
     */
    public function callOrder($orderId)
    {       
        $url = self::URL_ORDER_MOCK . $orderId;
        $callResponse = $this->call(self::GET, $url, null);
        $data = json_decode($callResponse, true);

        try {
            $lastInsertId = $this->addOrder($data);            
            $this->addItem($data, $lastInsertId);
            $response[] = "Added to the system correctly: ". $data["orderId"];
        } catch (\Exception $ex) {            
            $response[] = "The process has failed orderId ". $data["orderID"] .": " . $ex->getMessage();
        }
        
        return $this->render('rest/response.html.twig', [
            'response' => $response
        ]);
    }
    
    /**
     * @Route("/api/searchorders", name="call_search_order")
     */
    public function callsearchOrder()
    {
        $body = [
            'body' => [
                'count' => 1,
                'date_from' => 20200105,
                'date_to' => 20200108
            ]
        ];
        $callResponse = $this->call(self::POST, self::URL_SEARCH_ORDER_MOCK, $body);
        $orders = json_decode($callResponse, true);
        
        foreach ($orders as $data) {
            try {
                $lastInsertId = $this->addOrder($data);            
                $this->addItem($data, $lastInsertId);
                $response[] = "Added to the system correctly: ". $data["orderId"];
            } catch (\Exception $ex) {            
                $response[] = "The process has failed orderId ". $data["orderID"] .": " . $ex->getMessage();
            }        
        }
        
        return $this->render('rest/response.html.twig', [
            'response' => $response
        ]);        
    }
    
    /**
     * 
     * @param type $method
     * @param type $url
     * @param type $body
     * @return type
     */
    private function call($method, $url, $body)
    {
        $client = HttpClient::create();
        
        if (!empty($body)) {
            $response = $client->request($method, $url, $body);
        } else {
            $response = $client->request($method, $url);
        }
        
        return $response->getContent();
    }
    
    /**
     * 
     * @param type $data
     * @return type
     */
    private function addOrder($data)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $order = new Orders();
        $order->setOrderId($data["orderId"]);
        $order->setPhone($data["phone"]);
        $order->setShippingStatus($data["payment_status"]);
        $order->setShippingPrice($data["shipping_price"]);        
        $order->setShippingPaymentStatus($data["shipping_payment_status"]);
        $order->setPaymentStatus($data["payment_status"]);
        
       $entityManager->persist($order);
       $entityManager->flush();
       
       return $order->getId();
    }
    
    /**
     * 
     * @param type $data
     * @param type $lastInsertId
     */
    private function addItem($data, $lastInsertId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($data["orderItems"] as $product) {            
            $item = new Items();
            $item->setPrice($product["price"]);
            $item->setCost($product["cost"]);
            $item->setTaxPerc($product["tax_perc"]);
            $item->setTaxAmt($product["tax_amt"]);
            $item->setQuantity($product["quantity"]);
            $item->setTrackingNumber($product["tracking_number"]);
            $item->setCanceled((!empty($product["canceled"])) ? $product["canceled"] : $product["Canceled"]);            
            $item->setShippedStatusSku($product["shipped_status_sku"]);            
            $item->setOrderId($lastInsertId);
            
            $reference = (!empty($product["barcode"])) ? $product["barcode"] : $product["item_sid"];            
            $item->setReference($reference); 
            
            $entityManager->persist($item);            
        }
        $entityManager->flush();
    }
}
