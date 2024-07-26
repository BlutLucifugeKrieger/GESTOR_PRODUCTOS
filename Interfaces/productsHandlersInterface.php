
<?php

    interface productsHandlersInterface{

        public function newProductCreationHandle();
        public function handleSettingNewProduct();
        public function handleCreateAnewProduct();

        public function updateProductHandle();
        public function handleSettingAnUpdatedProduct();
        public function handleUpdateAproduct();

        public function deleteProductHandle();
        public function handleSettingsToDeleteAProduct();
        public function handleDeleteAproduct();

    }

?>