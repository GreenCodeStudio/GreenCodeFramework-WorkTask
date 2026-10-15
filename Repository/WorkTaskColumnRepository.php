<?php

namespace WorkTask\Repository;

use Core\Database\DB;
use Exception;


class WorkTaskColumnRepository extends \Core\Repository
{

    public function __construct()
    {
        $this->archiveMode = static::ArchiveMode_OnlyExisting;
    }
    public function defaultTable(): string
    {
        return 'work_task_column';
    }

    public function getSelect()
    {
        return DB::funquery("SELECT c.id, c.name as title, p.id as project_id, p.name as project_name FROM work_task_column c JOIN work_task_project p ON c.workTaskProject_id = p.id")
            ->groupBy(fn($x)=> $x->project_id)->map(fn($g)=>[
                "project_id" => $g->first()->project_id,
                "project_name" => $g->first()->project_name,
                "columns" =>$g
            ]);
    }

}
