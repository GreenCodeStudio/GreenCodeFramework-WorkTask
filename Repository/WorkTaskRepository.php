<?php

namespace WorkTask\Repository;

use Core\Database\DB;
use Exception;


class WorkTaskRepository extends \Core\Repository
{

    public function __construct()
    {
        $this->archiveMode = static::ArchiveMode_OnlyExisting;
    }
    public function defaultTable(): string
    {
        return 'work_task';
    }
    public function getDataTable($options)
    {
        $start = (int)$options->start;
        $limit = (int)$options->limit;
        $sqlOrder = $this->getOrderSQL($options);
        $rows = DB::get("
SELECT wt.id, wt.title, CONCAT(wtp.name, ' / ', wtc.name) as workTaskColumnTitle
FROM work_task wt 
    LEFT JOIN work_task_column wtc ON wtc.id = wt.workTaskColumn_id 
    LEFT JOIN work_task_project wtp ON wtp.id = wtc.workTaskProject_id
    $sqlOrder LIMIT $start,$limit");
        $total = DB::get("SELECT count(*) as count FROM work_task")[0]->count;
        return ['rows' => $rows, 'total' => $total];
    }
        private function getOrderSQL($options)
    {
        if (empty($options->sort))
            return "";
        else {
            $mapping = ['title'=> 'title', 'description'=> 'description', 'workTaskColumn_id'=> 'workTaskColumn_id'];
            if (empty($mapping[$options->sort->col]))
                throw new Exception();
            return ' ORDER BY '.DB::safeKey($mapping[$options->sort->col]).' '.($options->sort->desc ? 'DESC' : 'ASC').' ';
        }
    }    public function getAll()
    {
        if($this->archiveMode == static::ArchiveMode_OnlyExisting)
            return DB::get("SELECT * FROM work_task WHERE is_archived = 0");
        else
            return DB::get("SELECT * FROM work_task");
    }
}
