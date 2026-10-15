<?php

namespace WorkTask;

use Core\Database\DB;
use WorkTask\Repository\WorkTaskColumnRepository;
use WorkTask\Repository\WorkTaskRepository;

class WorkTask extends \Core\BussinesLogic
{
    public function __construct()
    {
        $this->defaultDB = new WorkTaskRepository();
    }

    public function getDataTable($options)
    {
        return $this->defaultDB->getDataTable($options);
    }

    public function update(int $id, $data)
    {
        $filtered = $this->filterData($data);
        $this->defaultDB->update($id, $filtered);
        \Core\WebSocket\Sender::sendToUsers(["WorkTask", "WorkTask", "Update", $id]);
    }

    protected function filterData($data)
    {
        $ret = [];
        $ret['title'] = $data->title;
        $ret['description'] = $data->description;
        $ret['workTaskColumn_id'] = $data->workTaskColumn_id;

        return $ret;
    }

    public function insert($data): int
    {
        $filtered = $this->filterData($data);

        $id = $this->defaultDB->insert($filtered);


        \Core\WebSocket\Sender::sendToUsers(["WorkTask", "WorkTask", "Insert", $id]);
        return $id;
    }

    public function getAll()
    {
        return $this->defaultDB->getAll();
    }

    public function getSelects()
    {
        $ret = [];
        $work_task_column = new WorkTaskColumnRepository();
        $ret["work_task_column"] = $work_task_column->getSelect();
        return $ret;
    }

}
