<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Misc\DataTable;
use App\Misc\HTML;
use App\Misc\FlashMsg;
use App\Form;

class UserController extends CommonDataController
{
    protected $modelClass = User::class;
    
    protected $enableSearch = true;

    protected $sort = 'oldest';   

    public function moreItemActions($dataItem = null)
    {
        return [
            'change-password' => [
                'icon' => 'icon-key',
                'label' => __('common.change_password')
            ],
        ];
    }

    public function moreBulkActions()
    {
        return [
            // 'change-status' => [
            //     'label' => 'Change status'
            // ],
        ];
    }

    public function initDataTable($dataTable)
    {
        $dataTable->addSimpleColumn('login_name', __('user.login_name'));
        $dataTable->addColumn('name', __('user.name'), function ($item)
        {
            return $item->getName();
        });
        $dataTable->addColumn('name_kana', __('user.name_kana'), function ($item)
        {
            return $item->getNameKana();
        });
        $dataTable->addSimpleColumn('email', __('common.email'));
        $dataTable->addColumn('role', __('user.role'), function ($item)
        {
            return $item->roleName();
        });
        $dataTable->addLabelColumn('status', __('common.status'), function ($item)
        {
            return [$item->status, $item->statusName()];
        },[
            'active' => 'badge badge-success'
        ]);
    }

    protected function search($query, $searchString) {
        return $query->where(function ($query) use($searchString)
        {
            $query->where(DB::raw('concat(sei,"",mei)') , 'LIKE' , $searchString);
            $query->orWhere(DB::raw('concat(sei_kana,"",mei_kana)') , 'LIKE' , $searchString);
            $query->orWhere('login_name' , 'LIKE' , $searchString);
            $query->orWhere('email' , 'LIKE' , $searchString);
        });
    }

    protected function initFormEdit($form, $dataItem)
    {          
        $form->addGroups([
            new Form\Text([
                'name' => 'login_name',
                'label' => __('user.login_name'),
                'required' => true,
                'data' => $dataItem->login_name                       
            ]),
            new Form\NameSeiMei([
                'name' => 'name',
                'label' => __('user.name'),
                'data' => [
                    'sei' => $dataItem->sei,
                    'mei' => $dataItem->mei,
                    'sei_kana' => $dataItem->sei_kana,
                    'mei_kana' => $dataItem->mei_kana
                ]
            ]),
            new Form\Text([
                'name' => 'email',
                'type' => 'email',
                'label' => __('common.email'),
                'data' => $dataItem->email                
            ]),
            new Form\Select([
                'name' => 'role',
                'label' => __('user.role'),
                'options' => User::roleList(),
                'required' => true,
                'data' => $dataItem->role
            ])            
        ]);

        if (!$dataItem->id) {
            $form->addGroups([
                new Form\Password([
                    'name' => 'password',
                    'label' => __('common.password'),
                    'required' => true,
                ]),
                new Form\Password([
                    'name' => 'password_confirmation',
                    'label' => __('common.repeat_password'),
                    'required' => true,                
                ])
            ]);            
        }

        $form->addGroups([
            new Form\Select([
                'name' => 'status',
                'label' => __('common.status'),
                'options' => User::statusList(),
                'required' => true,
                'data' => $dataItem->status
            ])
        ]);

        $form->addGroups([
            new Form\Upload([
                'name' => 'avatar_image_id',
                'label' => __('user.avatar'),
                'multiple' => false,
                'data' => $dataItem->avatar_image_id
            ]),
            new Form\Radio([
                'name' => 'gender',
                'label' => __('user.gender'),
                'options' => [
                    'male' => __('user.genders.male'),
                    'female' => __('user.genders.female'),
                    'secret' => __('user.genders.secret')
                ],
                'data' => $dataItem->gender,
                'inline' => true
            ]),
            new Form\Date([
                'name' => 'date_of_birth',
                'type' => 'date',
                'label' => __('user.date_of_birth'),
                'data' => $dataItem->date_of_birth,
                'inline' => true
            ]),
        ]);
        

    }

    public function ruleEdit($item)
    {
        $rule = [
            'login_name' => ['required', 'between:2,32', 'alpha_dash', 
                    Rule::unique('users')->ignore($item->id)],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($item->id)],
            'role' => ['required'],
            'status' => ['required'],
        ];
        if (!$item->id) {
            $rule['password'] = ['required', 'between:6,32', 'confirmed'];
        }
        return $rule;
    }


    protected function saveNewOrUpdate(Request $request, $item) {
        if(!$item->id) {
            $item->password = Hash::make($request->input('password'));
            $item->fields = [];
        }

        $item->fields = $request->input('test_texteditor');
        $item->login_name = $request->input('login_name');
        $item->sei = $request->input('name.sei');
        $item->mei = $request->input('name.mei');
        $item->sei_kana = $request->input('name.sei_kana');
        $item->mei_kana = $request->input('name.mei_kana');
        $item->email = $request->input('email');
        $item->role = $request->input('role');
        $item->status = $request->input('status');        
        $item->avatar_image_id = $request->input('avatar_image_id');
        $item->gender = $request->input('gender');
        $item->date_of_birth = $request->input('date_of_birth');        
        $item->save();
    }

    protected function getItemChangePassword(Request $request, $id)
    {
        $dataItem = $this->modelClass::find($id);
        if (!$dataItem) {
            return $this->showErrorPage(__('message.data_not_found'));
        }

        $form = new Form\Form;        
        $this->initFormChangePassword($form, $dataItem);

        return $this->getView('item-edit')
        ->with([
            'dataItem' => $dataItem,
            'form' => $form,
            'pageTitle' => __('common.change_user_password')
        ]);
    }  

    public function initFormChangePassword($form)
    {
        $form->addGroups([
            new Form\Password([
                'name' => 'password',
                'label' => __('common.password')
            ]),
            new Form\Password([
                'name' => 'password_confirmation',
                'label' => __('common.repeat_password')                    
            ])
        ]);        
    }

    protected function postItemChangePassword(Request $request, $id)
    {   
        $dataItem = $this->modelClass::find($id);
        if (!$dataItem) {
            return $this->showErrorPage(__('message.data_not_found'));
        }  

        $form = new Form\Form;
        $this->initFormChangePassword($form, $dataItem);

        $request->validate([
            'password' => ['required', 'between:6,32', 'confirmed']
        ]);

        $this->DBTransaction(function ($request, $dataItem)
        {
            $dataItem->password = Hash::make($request->input('password'));
            $dataItem->save();
        }, [$request, $dataItem]);  

        if($this->hasTransactionError) {
            FlashMsg::addError(__('message.unknown_error'));
            return back();
        }

        FlashMsg::addSuccess(__('message.user_password_changed', ['item' => $this->modelName]));

        return back();
    }


   
}