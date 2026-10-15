<?php
namespace WorkTask\Ajax;

class WorkTaskProjectAjax extends \Core\AjaxController
{
    public function getTable($options)
    {
        $this->will('WorkTask', 'show');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        return $WorkTaskProject->getDataTable($options);
    }

    public function update($data)
    {
        $this->will('WorkTask', 'edit');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $WorkTaskProject->update($data->id, $data);
    }

    public function updateMultiple(array $data)
    {
        $this->will('WorkTask', 'edit');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        foreach ($data as $row) {
            $WorkTaskProject->update($row->id, $row->data);
        }
    }

    public function insert($data)
    {
        $this->will('WorkTask', 'add');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $id = $WorkTaskProject->insert($data);
    }
}
