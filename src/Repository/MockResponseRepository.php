<?php
namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Orders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orders|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orders[]    findAll()
 * @method Orders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MockResponseRepository extends ServiceEntityRepository
{
    public function __construct()
    {        
    }
    
    public function getSearchOrderResponseMock()
    {
        return array (
            0 => array (
                'orderItems' => array (
                    0 => array (
                        'barcode' => '4062345021658',
                        'price' => 24300,
                        'cost' => 24300,
                        'tax_perc' => 20,
                        'tax_amt' => 4050,
                        'quantity' => 1,
                        'tracking_number' => '1Z05V36Y7951053268',
                        'canceled' => 'N',
                        'shipped_status_sku' => 'not sent',
                    ),
                    1 => array (
                        'item_sid' => '4062345067851',
                        'price' => 37800,
                        'cost' => 37800,
                        'tax_perc' => 20,
                        'tax_amt' => 63000,
                        'quantity' => 1,
                        'tracking_number' => '1Z05V36Y7951053268',
                        'Canceled' => 'N',
                        'shipped_status_sku' => 'not sent',
                    ),
                ),
                'orderId' => 'PP0400104913',
                'phone' => '+79620230303',
                'shipping_status' => 'not sent',
                'shipping_price' => 1000,
                'shipping_payment_status' => 'paid',
                'payment_status' => 'paid',
            ),
            1 => array (
                'orderItems' => array (
                    0 => array (
                        'barcode' => '4062345021658',
                        'price' => 24300,
                        'cost' => 24300,
                        'tax_perc' => 20,
                        'tax_amt' => 4050,
                        'quantity' => 1,
                        'tracking_number' => '1Z05V36Y7951053268',
                        'canceled' => 'N',
                        'shipped_status_sku' => 'not sent',
                    ),
                    1 => array (
                        'item_sid' => '4062345067851',
                        'price' => 37800,
                        'cost' => 37800,
                        'tax_perc' => 20,
                        'tax_amt' => 63000,
                        'quantity' => 1,
                        'tracking_number' => '1Z05V36Y7951053268',
                        'Canceled' => 'N',
                        'shipped_status_sku' => 'not sent',
                    ),
                ),
                'orderId' => 'PP040023123',
                'phone' => '+79620230303',
                'shipping_status' => 'not sent',
                'shipping_price' => 1000,
                'shipping_payment_status' => 'not paid',
                'payment_status' => 'not paid',
            ),
        );
    }
    
    public function getOrderResponseMock()
    {
        return array (
            'orderItems' => 
            array (
                0 => array (
                    'barcode' => '4062345021658',
                    'price' => 24300.0,
                    'cost' => 24300.0,
                    'tax_perc' => 20,
                    'tax_amt' => 4050.0,
                    'quantity' => 1,
                    'tracking_number' => '1Z05V36Y7951053268',
                    'canceled' => 'N',
                    'shipped_status_sku' => 'not sent',
                ),
                1 => array (
                    'item_sid' => '4062345067851',
                    'price' => 37800.0,
                    'cost' => 37800.0,
                    'tax_perc' => 20,
                    'tax_amt' => 63000.0,
                    'quantity' => 1,
                    'tracking_number' => '1Z05V36Y7951053268',
                    'Canceled' => 'N',
                    'shipped_status_sku' => 'not sent',
                ),
            ),
            'orderId' => 'PP0400104913',
            'phone' => '+79620230303',
            'shipping_status' => 'not sent',
            'shipping_price' => 1000.0,
            'shipping_payment_status' => 'not paid',
            'payment_status' => 'not paid',
        );
    }
}
