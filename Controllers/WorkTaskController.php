<?php

namespace WorkTask\Controllers;

use Authorization\Permissions;
use Core\Exceptions\NotFoundException;
class WorkTaskController extends \Common\PageStandardController
{

    function index()
    {
        $this->will('WorkTask', 'show');
        $this->addView('WorkTask', 'WorkTaskList');
        $this->pushBreadcrumb(['title' => 'WorkTask', 'url' => '/WorkTask']);

    }

    /**
     * @param int $id
     * @OfflineDataOnly
     */
    function edit(int $id)
    {
        $this->will('WorkTask', 'edit');
        $this->addView('WorkTask', 'WorkTaskEdit', ['type' => 'edit']);
        $this->pushBreadcrumb(['title' => 'WorkTask', 'url' => '/WorkTask']);
        $this->pushBreadcrumb(['title' => 'Edycja', 'url' => '/WorkTask/edit/'.$id]);
    }

    function edit_data(int $id)
    {
        $this->will('WorkTask', 'edit');
        $WorkTask = new \WorkTask\WorkTask();
        $data = $WorkTask->getById($id);
        if ($data == null)
            throw new NotFoundException();
        return ['WorkTask' => $data,'selects'=>$WorkTask->getSelects()];
    }

    /**
     * @OfflineConstant
     */
    function add()
    {
        $this->will('WorkTask', 'add');
        $this->addView('WorkTask', 'WorkTaskEdit', ['type' => 'add']);
        $this->pushBreadcrumb(['title' => 'WorkTask', 'url' => '/WorkTask']);
        $this->pushBreadcrumb(['title' => 'Dodaj', 'url' => '/WorkTask/add']);
    }
    function add_data()
    {
        $this->will('WorkTask', 'add');
        $WorkTask = new \WorkTask\WorkTask();
        return ['selects' => $WorkTask->getSelects()];
    }
    
        /**
     * @param int $id
     */
    function show(int $id)
    {
        $this->will('WorkTask', 'show');
                $WorkTask = new \WorkTask\WorkTask();
        $data = $WorkTask->getById($id);
        if ($data == null)
            throw new NotFoundException();
            
        $this->addView('WorkTask', 'WorkTaskShow', ['item' => $data]);
        $this->pushBreadcrumb(['title' => 'WorkTask', 'url' => '/WorkTask']);
        $this->pushBreadcrumb(['title' => 'Szczegóły', 'url' => '/WorkTask/show/'.$id]);
    }
}
