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

    public function moreItemActions($dataItem = null)
    {
        return [
            'change-password' => [
                'icon' => 'icon-key',
                'label' => __('Change password')
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
        $dataTable->addSimpleColumn('name', __('user.name'));
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
            $query->where('login_name', 'like', $searchString)
                ->orWhere('email', 'like', $searchString);
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
            // new Form\Text([
            //     'name' => 'name',
            //     'label' => __('Display name'),
            //     'data' => $dataItem->name
            // ]),
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

    }

    public function ruleEdit($item)
    {
        $rule = [
            'login_name' => ['required', 'between:2,32', 'alpha_dash', 
                    Rule::unique('users')->ignore($item->id),],
            'email' => ['nullable', 'email'],
            'password' => [],
            'role' => ['required'],
            'status' => ['required'],
        ];
        if (!$item->id) {
            $rule['password'] = ['required', 'between:6,32', 'confirmed'];
        }
        return $rule;
    }


    protected function updateItem(Request $request, $item) {
        $item->login_name = $request->input('login_name');
        
        $item->email = $request->input('email');
        $item->role = $request->input('role');
        $item->status = $request->input('status');
        if(!$item->id) {
            $item->password = Hash::make($request->input('password'));            
        }        
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