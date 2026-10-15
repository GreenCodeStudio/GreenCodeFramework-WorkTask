<?php

namespace WorkTask\Controllers;

use Authorization\Permissions;
use Core\Exceptions\NotFoundException;
class WorkTaskProjectController extends \Common\PageStandardController
{

    function index()
    {
        $this->will('WorkTask', 'show');
        $this->addView('WorkTask', 'WorkTaskProjectList');
        $this->pushBreadcrumb(['title' => 'WorkTaskProject', 'url' => '/WorkTaskProject']);

    }

    /**
     * @param int $id
     * @OfflineDataOnly
     */
    function edit(int $id)
    {
        $this->will('WorkTask', 'edit');
        $this->addView('WorkTask', 'WorkTaskProjectEdit', ['type' => 'edit']);
        $this->pushBreadcrumb(['title' => 'WorkTaskProject', 'url' => '/WorkTaskProject']);
        $this->pushBreadcrumb(['title' => 'Edycja', 'url' => '/WorkTaskProject/edit/'.$id]);
    }

    function edit_data(int $id)
    {
        $this->will('WorkTask', 'edit');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $data = $WorkTaskProject->getById($id);
        if ($data == null)
            throw new NotFoundException();
        return ['WorkTaskProject' => $data];
    }

    /**
     * @OfflineConstant
     */
    function add()
    {
        $this->will('WorkTask', 'add');
        $this->addView('WorkTask', 'WorkTaskProjectEdit', ['type' => 'add']);
        $this->pushBreadcrumb(['title' => 'WorkTaskProject', 'url' => '/WorkTaskProject']);
        $this->pushBreadcrumb(['title' => 'Dodaj', 'url' => '/WorkTaskProject/add']);
    }


        /**
     * @param int $id
     */
    function show(int $id)
    {
        $this->will('WorkTask', 'show');
                $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $data = $WorkTaskProject->getById($id);
        if ($data == null)
            throw new NotFoundException();

        $this->addView('WorkTask', 'WorkTaskProjectShow', ['item' => $data]);
        $this->pushBreadcrumb(['title' => 'WorkTaskProject', 'url' => '/WorkTaskProject']);
        $this->pushBreadcrumb(['title' => 'Szczegóły', 'url' => '/WorkTaskProject/show/'.$id]);
    }
}
