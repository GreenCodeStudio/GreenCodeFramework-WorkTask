<?php
namespace WorkTask\Ajax;

class WorkTaskAjax extends \Core\AjaxController
{
    public function getTable($options)
    {
        $this->will('WorkTask', 'show');
        $WorkTask = new \WorkTask\WorkTask();
        return $WorkTask->getDataTable($options);
    }

    public function update($data)
    {
        $this->will('WorkTask', 'edit');
        $WorkTask = new \WorkTask\WorkTask();
        $WorkTask->update($data->id, $data);
    }
    
    public function updateMultiple(array $data)
    {      
        $this->will('WorkTask', 'edit');
        $WorkTask = new \WorkTask\WorkTask();
        foreach ($data as $row) {
            $WorkTask->update($row->id, $row->data);
        }
    }

    public function insert($data)
    {
        $this->will('WorkTask', 'add');
        $WorkTask = new \WorkTask\WorkTask();
        $id = $WorkTask->insert($data);
    }
}