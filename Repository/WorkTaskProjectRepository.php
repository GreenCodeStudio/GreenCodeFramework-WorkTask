<?php

namespace WorkTask\Repository;

use Core\Database\DB;
use Exception;


class WorkTaskProjectRepository extends \Core\Repository
{

    public function __construct()
    {
        $this->archiveMode = static::ArchiveMode_OnlyExisting;
    }
    public function defaultTable(): string
    {
        return 'work_task_project';
    }
    public function getDataTable($options)
    {
        $start = (int)$options->start;
        $limit = (int)$options->limit;
        $sqlOrder = $this->getOrderSQL($options);
        $rows = DB::get("SELECT * FROM work_task_project $sqlOrder LIMIT $start,$limit");
        $total = DB::get("SELECT count(*) as count FROM work_task_project")[0]->count;
        return ['rows' => $rows, 'total' => $total];
    }
        private function getOrderSQL($options)
    {
        if (empty($options->sort))
            return "";
        else {
            $mapping = ['name'=> 'name'];
            if (empty($mapping[$options->sort->col]))
                throw new Exception();
            return ' ORDER BY '.DB::safeKey($mapping[$options->sort->col]).' '.($options->sort->desc ? 'DESC' : 'ASC').' ';
        }
    }    public function getAll()
    {
        if($this->archiveMode == static::ArchiveMode_OnlyExisting)
            return DB::get("SELECT * FROM work_task_project WHERE is_archived = 0");
        else
            return DB::get("SELECT * FROM work_task_project");
    }

    public function getByIdWithTasks(int $id)
    {
        $item = DB::get("SELECT * FROM work_task_project WHERE id = ?", [$id])[0] ?? null;
        if (empty($item))
            return null;
    $item->columns = DB::get("SELECT * FROM work_task_column WHERE workTaskProject_id = ?", [$id]);
    $columnsById = [];
    foreach ($item->columns as $column) {
            $columnsById[$column->id] = $column;
            $column->tasks = [];
    }
        $tasks = DB::get("SELECT wt.* FROM work_task wt JOIN work_task_column wtc ON wt.workTaskColumn_id = wtc.id WHERE wtc.workTaskProject_id = ?", [$id]);
        foreach ($tasks as $task) {
            $columnsById[$task->workTaskColumn_id]->tasks[] = $task;
        }
        return $item;
    }
}
