<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\UsersRepositoryInterface;
use App\Models\User;
use App\Models\UserContactDetailsModel;
use App\Models\UserMediaModel;
use App\Models\UserPersonalDetailsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function create(array $data){
        // customer user create
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = isset($data['last_name'])?$data['last_name']:'';
        $user->email = $data['email'];
        $user->password = Hash::make(str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT));
        $user->uid = (string) Str::uuid();
        $user->save();
        // customer image store
        /*if(isset($data['image']))
        {
            UserMediaModel::insert([
                'user_id' => $user->id,
                'image' => $data['image'],
                'created_at' => date('Y-m-d H:i:s')
            ]);

        }*/
        // customer personal details store
        if(isset($data['dob']) || isset($data['gender']))
        {
            UserPersonalDetailsModel::insert([
                'user_id' => $user->id,
                'dob' => isset($data['dob'])?$data['dob']:'',
                'gender' => isset($data['gender'])?$data['gender']:'',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        // customer contact details store
        if(isset($data['country']))
        {
            UserContactDetailsModel::insert([
                'user_id' => $user->id,
                'address_1' => $data['address_1'],
                'address_2' => isset($data['address_2'])?$data['address_2']:'',
                'country' => $data['country'],
                'country_isd_code' => isset($data['country_isd_code'])?$data['country_isd_code']:'',
                'state' => isset($data['state'])?$data['state']:'',
                'city' => isset($data['city'])?$data['city']:'',
                'zipcode' => isset($data['zipcode'])?$data['zipcode']:'',
                'phone' => isset($data['phone'])?$data['phone']:'',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
        return $user;
    }
    public function update(array $data){
        //user check
        $userInfo = User::find($data['user_id']);
        if($userInfo != null)
        {
            // user table data update
            User::where('id',$data['user_id'])
                ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            // customer personal details update
            if(isset($data['dob']) || isset($data['gender']))
            {
                UserPersonalDetailsModel::updateOrCreate(
                    [
                        'user_id' => $data['user_id']
                    ],
                    [
                        'dob' => $data['dob'],
                        'gender' => $data['gender'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            }
            // customer contact details update
            if(isset($data['country']))
            {
                UserContactDetailsModel::updateOrCreate(
                    ['user_id' => $data['user_id']],
                    [
                        'address_1' => $data['address_1'],
                        'address_2' => $data['address_2'],
                        'country' => $data['country'],
                        'country_isd_code' => $data['country_isd_code'],
                        'state' => $data['state'],
                        'city' => $data['city'],
                        'zipcode' => $data['zipcode'],
                        'phone' => $data['phone'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );
            }
            return true;
        }
        else{
            return false;
        }
    }
    public function find($id){

    }
    public function findAll($id){

    }
    public function delete($id)
    {

    }
    public function userInfo($id){
        $userData = User::leftjoin('user_personal_details','user_personal_details.user_id','users.id')
            ->leftjoin('user_contact_details','user_contact_details.user_id','users.id')
            ->leftjoin('user_media','user_media.user_id','users.id')
            ->where('users.id',$id)
            ->select('users.*','user_contact_details.*','user_personal_details.*','user_media.*','users.id as id')
            ->first();
        return $userData;
    }
}
