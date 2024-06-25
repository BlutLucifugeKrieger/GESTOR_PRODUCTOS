<?php



    interface usersHandlersInterface{


        public function newUserCreationHandle();
        public function handleSettingNewUser();
        public function handleCreateAnewUser();

        public function updateUserHandle();
        public function handleSettingAnUpdatedUser();
        public function handleUpdateUser();

        public function deleteUserHandle();
        public function handleSettingsToDeleteAuser();
        public function handleDeleteAnuser();

        public function userLoginHandle();
        public function handleSettingsToLogin();
        public function handleLoginAnUser();


        public function userMONEYHandle();
        public function handleSettingsToMONEY();
        

        public function userActualMoneyHandle();
        public function handleSettingsToActualMoney();
    



    }




?>