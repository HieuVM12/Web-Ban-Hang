<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = null;
    public $totalPrice = 0 ;
    public $totalQuanty = 0 ;

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }

    public function AddCart($product,$id ){
        $newProduct = ['quanty'=>0,'sale'=>$product->sale,'productInfo'=>$product];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['sale'] = $newProduct['quanty'] * $product->sale;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->sale;
        $this->totalQuanty++ ;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['sale'];
        unset($this->products[$id]);
    }
}
