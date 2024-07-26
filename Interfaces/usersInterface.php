<?php



    interface usersInterface{


        public function getAllUsers();
        public function createNewUser(usersModel $u);
        public function updateAuser(usersModel $u);
        public function deleteAuser(usersModel $u);
        public function userLogIn(usersModel $u);
        public function increaseMoney(usersModel $u);
        public function getMoneyFromUser($id);
    }




?>