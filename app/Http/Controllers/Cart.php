<?php

namespace App\Http\Controllers;

class Cart
{
    public $product = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->product = $cart->product;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }
    public function AddCart($product, $id)
    {
        $new_product = ['qty' => 0, 'price' => $product->product_price, 'product_info' => $product];
        if ($this->product) {
            if (array_key_exists($id, $this->product)) {
                $new_product = $this->product[$id];
            }
        }
        $new_product['qty']++;
        $new_product['price'] = $new_product['qty'] * $product->product_price;
        $this->product[$id] = $new_product;
        $this->totalQuantity++;
        $this->totalPrice += $product->product_price;
    }

    public function AddCartDT($product, $id, $qty)
    {
        $new_product = ['qty' => 0, 'price' => $product->product_price, 'product_info' => $product];
        if ($this->product) {
            if (array_key_exists($id, $this->product)) {
                $new_product = $this->product[$id];
            }
        }
        for( $i = 0 ; $i < $qty ; $i++ ) {
            $new_product['qty']++;
        }
        $new_product['price'] = $new_product['qty'] * $product->product_price;
        $this->product[$id] = $new_product;
        $this->totalQuantity += $this->product[$id]['qty'];
        // dd($this->totalQuantity);
        $this->totalPrice = $this->product[$id]['qty']*$product->product_price;
    }

    public function DeleteItemCart($id)
    {
        $this->totalQuantity -= $this->product[$id]['qty'];
        $this->totalPrice -= $this->product[$id]['price'];
        unset($this->product[$id]);
    }
    
    public function SaveItemListCart($id,$qty){
        $this->totalQuantity -= $this->product[$id]['qty'];
        $this->totalPrice -= $this->product[$id]['price'];

        $this->product[$id]['qty'] = $qty;
        $this->product[$id]['price'] = $this->product[$id]['qty'] * $this->product[$id]['product_info']->product_price;

        $this->totalPrice += $this->product[$id]['price'];
        $this->totalQuantity += $this->product[$id]['qty'];
    }
}
