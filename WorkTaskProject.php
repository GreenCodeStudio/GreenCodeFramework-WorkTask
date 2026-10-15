<?php
namespace WorkTask;

use WorkTask\Repository\WorkTaskColumnRepository;
use WorkTask\Repository\WorkTaskProjectRepository;

class WorkTaskProject extends \Core\BussinesLogic
{
    public function __construct()
    {
        $this->defaultDB = new WorkTaskProjectRepository();
    }

    public function getDataTable($options)
    {
        return $this->defaultDB->getDataTable($options);
    }

    public function update(int $id, $data)
    {
        $filtered = $this->filterData($data);
        $this->defaultDB->update($id, $filtered);
        \Core\WebSocket\Sender::sendToUsers(["WorkTask", "WorkTaskProject", "Update", $id]);
    }

    protected function filterData($data)
    {
        $ret = [];
        $ret['name'] = $data->name;

        return $ret;
    }

    public function insert($data):int
    {
        $filtered = $this->filterData($data);

        $id = $this->defaultDB->insert($filtered);
        $columnRepository = new WorkTaskColumnRepository();
        $columnRepository->insert(['name' => 'To do', 'workTaskProject_id' => $id]);
        $columnRepository->insert(['name' => 'In Progress', 'workTaskProject_id' => $id]);
        $columnRepository->insert(['name' => 'Done', 'workTaskProject_id' => $id]);
        \Core\WebSocket\Sender::sendToUsers(["WorkTask", "WorkTaskProject", "Insert", $id]);
        return $id;
    }
    public function getAll()
    {
        return $this->defaultDB->getAll();
    }


}
