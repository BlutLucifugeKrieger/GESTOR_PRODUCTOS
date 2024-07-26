
<?php

    
    interface productsInterface {


        public function getAllProducts();
        public function createNewProduct(productsModel $p);
        public function updateAproduct(productsModel $p);
        public function deleteAproduct(productsModel $p);

        public function actualDateTime();
        public function actualDate();

    }