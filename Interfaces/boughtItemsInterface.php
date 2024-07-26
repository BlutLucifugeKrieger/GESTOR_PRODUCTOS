<?php


 interface boughtItemsInterface {


    public function getAllItems();
    public function createNewItem(boughtItemsModel $b);
    

    public function actualDateTime();
    

    public function buyAnItem($itemPrice, $productID, $userID, $userCash);
    public function comparePrices($itemPrice, $productID, $userID, $userCash, $nombre, $referencia, $categoria);
    public function getAllitemsOfAnCustomer(boughtItemsModel $b);
    
    public function handleCreateAnewItemBought();
 }





?>