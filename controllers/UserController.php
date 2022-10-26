<?php
include_once(getenv('ROOT_DIR') . "/models/UserModel.php");
include_once(getenv('ROOT_DIR') . "/lib/BaseController.php");

// The user controller class
class UserController extends BaseController
{

    // list of all products
    // detail of action function params check lib/Route.php
    public function findAll($url_matchs, $request_method, $options)
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        $this->returnJson($users);
    }

    // find a users by id
    public function findById($url_matchs)
    {
        // get id from url match
        $id = $url_matchs[1];
        $userModel = new UserModel();
        $user = $userModel->findUsersById($id);
        $this->returnJson($user);
    }

    // insert a users
    public function insertUsers($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            $userData = json_decode($data['body'], true);
            $userModel = new UserModel();
            $user = $userModel->insertUsers($userData);
            $this->returnJson($user);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    // update a users
    public function updateUsers($url_matchs, $params, $data)
    {
        // parse json from post body
        try {
            // patch data
            $userData = json_decode($data['body'], true);
            // get id from url match
            $id = $url_matchs[1];

            $userModel = new UserModel();
            $user = $userModel->updateUsers($id, $userData);
            $this->returnJson($user);
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }

    // delete a users
    public function deleteUsers($url_matchs)
    {
        try {
            // get id from url match
            $id = $url_matchs[1];
            $userModel = new UserModel();
            $userModel->deleteUsers($id);
            $this->returnJson(array("deleted" => $id));
        } catch (Exception $e) {
            $this->returnJson(array("error" => $e->getMessage()));
        }
    }
}
