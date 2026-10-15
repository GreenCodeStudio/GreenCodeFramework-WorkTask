<?php
namespace WorkTask\Api;

class WorkTaskApi extends \Core\ApiController
{
/**
     * @ApiEndpoint(
 *   'type' => 'get',
 *   'url' => 'WorkTask',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTask',
 *   ),
 *   'description' => 'Get list of WorkTask',
 *   'responses' => 
 *   array (
 *     200 => 
 *     array (
 *       'content' => 
 *       array (
 *         'application/json' => 
 *         array (
 *           'schema' => 
 *           array (
 *             'type' => 'array',
 *             'items' => 
 *             array (
 *               'type' => 'object',
 *               'properties' => 
 *               array (
 *                 'id' => 
 *                 array (
 *                   'type' => 'int(11)',
 *                   'format' => NULL,
 *                 ),
 *                 'title' => 
 *                 array (
 *                   'type' => 'text',
 *                   'format' => NULL,
 *                 ),
 *                 'description' => 
 *                 array (
 *                   'type' => 'longtext',
 *                   'format' => NULL,
 *                 ),
 *                 'workTaskColumn_id' => 
 *                 array (
 *                   'type' => 'int(11)',
 *                   'format' => NULL,
 *                 ),
 *               ),
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 * )
     **/
    public function getList()
    {
        $this->will('WorkTask', 'show');
        $WorkTask = new \WorkTask\WorkTask();
        return $WorkTask->getAll();
    }
    
    /**
     * @ApiEndpoint(
 *   'type' => 'get',
 *   'url' => 'WorkTask/{id}',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTask',
 *   ),
 *   'description' => 'Get one WorkTask',
 *   'parameters' => 
 *   array (
 *     0 => 
 *     array (
 *       'name' => 'id',
 *       'in' => 'path',
 *       'required' => true,
 *     ),
 *   ),
 *   'responses' => 
 *   array (
 *     200 => 
 *     array (
 *       'content' => 
 *       array (
 *         'application/json' => 
 *         array (
 *           'schema' => 
 *           array (
 *             'type' => 'object',
 *             'properties' => 
 *             array (
 *               'id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *               'title' => 
 *               array (
 *                 'type' => 'text',
 *                 'format' => NULL,
 *               ),
 *               'description' => 
 *               array (
 *                 'type' => 'longtext',
 *                 'format' => NULL,
 *               ),
 *               'workTaskColumn_id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 * )
     **/
    public function getOneById(int $id)
    {
        $this->will('WorkTask', 'show');
        $WorkTask = new \WorkTask\WorkTask();
        return $WorkTask->getById($id);
    }
     /**
     * @ApiEndpoint(
 *   'type' => 'post',
 *   'url' => 'WorkTask',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTask',
 *   ),
 *   'description' => 'Insert one WorkTask',
 *   'requestBody' => 
 *   array (
 *     'content' => 
 *     array (
 *       'application/json' => 
 *       array (
 *         'schema' => 
 *         array (
 *           'type' => 'object',
 *           'properties' => 
 *           array (
 *             'id' => 
 *             array (
 *               'type' => 'int(11)',
 *               'format' => NULL,
 *             ),
 *             'title' => 
 *             array (
 *               'type' => 'text',
 *               'format' => NULL,
 *             ),
 *             'description' => 
 *             array (
 *               'type' => 'longtext',
 *               'format' => NULL,
 *             ),
 *             'workTaskColumn_id' => 
 *             array (
 *               'type' => 'int(11)',
 *               'format' => NULL,
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 *   'responses' => 
 *   array (
 *     200 => 
 *     array (
 *       'content' => 
 *       array (
 *         'application/json' => 
 *         array (
 *           'schema' => 
 *           array (
 *             'type' => 'object',
 *             'properties' => 
 *             array (
 *               'id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *               'title' => 
 *               array (
 *                 'type' => 'text',
 *                 'format' => NULL,
 *               ),
 *               'description' => 
 *               array (
 *                 'type' => 'longtext',
 *                 'format' => NULL,
 *               ),
 *               'workTaskColumn_id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 * )
     **/
    public function insert($data)
    {
        $this->will('WorkTask', 'add');
        $WorkTask = new \WorkTask\WorkTask();
        $id = $WorkTask->insert($data);
        return $WorkTask->getById($id);
    }
    
        /**
     * @ApiEndpoint(
 *   'type' => 'put',
 *   'url' => 'WorkTask/{id}',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTask',
 *   ),
 *   'description' => 'Insert one WorkTask',
 *   'parameters' => 
 *   array (
 *     0 => 
 *     array (
 *       'name' => 'id',
 *       'in' => 'path',
 *       'required' => true,
 *     ),
 *   ),
 *   'requestBody' => 
 *   array (
 *     'content' => 
 *     array (
 *       'application/json' => 
 *       array (
 *         'schema' => 
 *         array (
 *           'type' => 'object',
 *           'properties' => 
 *           array (
 *             'id' => 
 *             array (
 *               'type' => 'int(11)',
 *               'format' => NULL,
 *             ),
 *             'title' => 
 *             array (
 *               'type' => 'text',
 *               'format' => NULL,
 *             ),
 *             'description' => 
 *             array (
 *               'type' => 'longtext',
 *               'format' => NULL,
 *             ),
 *             'workTaskColumn_id' => 
 *             array (
 *               'type' => 'int(11)',
 *               'format' => NULL,
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 *   'responses' => 
 *   array (
 *     200 => 
 *     array (
 *       'content' => 
 *       array (
 *         'application/json' => 
 *         array (
 *           'schema' => 
 *           array (
 *             'type' => 'object',
 *             'properties' => 
 *             array (
 *               'id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *               'title' => 
 *               array (
 *                 'type' => 'text',
 *                 'format' => NULL,
 *               ),
 *               'description' => 
 *               array (
 *                 'type' => 'longtext',
 *                 'format' => NULL,
 *               ),
 *               'workTaskColumn_id' => 
 *               array (
 *                 'type' => 'int(11)',
 *                 'format' => NULL,
 *               ),
 *             ),
 *           ),
 *         ),
 *       ),
 *     ),
 *   ),
 * )
     **/
    public function update($data, int $id)
    {
        $this->will('WorkTask', 'edit');
        $WorkTask = new \WorkTask\WorkTask();
        $WorkTask->update($id, $data);
        return $WorkTask->getById($id);
    }
    

}