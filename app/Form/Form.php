<?php
namespace App\Form;

class Form
{    
    protected $groups = [];
    
    public function addGroups(array $groups = [])
    {
        foreach($groups as $group) 
        {            
            $this->addGroup($group);            
        }
    }

    public function addGroup($group)
    {
        $group->form = $this;
        $this->groups[] = $group;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function getGroup($groupName)
    {
        if(!empty($this->groups[$groupName])) {
            $this->groups[$groupName];
        }
    }

    public function showGrop($groupName, $mode = 'edit')
    {
        if($group = $this->getGroup($groupName)) {
            return $group->{$mode. 'Mode'}();
        }
    }
}