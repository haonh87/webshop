<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userModel;

    /**
     * UserService constructor.
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllUserPaginator()
    {
    	return $this->userModel->paginate(PAGINATE);
    }

    public function createUser($dataUser)
    {
    	$dataUser['password'] = Hash::make($dataUser['password']);
    	$this->userModel->fill($dataUser)->save();
        return $this->userModel->id;
    }

    public function getUserById($id)
    {
    	return $this->userModel->with('roles')->find($id);
    }

    public function udpateUser($data, $id)
    {
    	try {
    		$user = $this->userModel->find($id);
    		$user->update($data);
    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    public function deleteUserById($id) 
    {
    	$this->userModel->find($id)->delete();
    }

    public function createUserFacebook($create) {
        $data = $this->userModel->where('facebook_id', $create['facebook_id'])->get()->first();
        if (isset($data->id)) {
            return $data->id;
        }
        $this->userModel->fill($create)->save();
        return $this->userModel->id;
    }
}