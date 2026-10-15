<?php
namespace WorkTask\Api;

class WorkTaskProjectApi extends \Core\ApiController
{
/**
     * @ApiEndpoint(
 *   'type' => 'get',
 *   'url' => 'WorkTaskProject',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTaskProject',
 *   ),
 *   'description' => 'Get list of WorkTaskProject',
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
 *                 'name' => 
 *                 array (
 *                   'type' => 'text',
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
        $this->will('WorkTaskProject', 'show');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        return $WorkTaskProject->getAll();
    }
    
    /**
     * @ApiEndpoint(
 *   'type' => 'get',
 *   'url' => 'WorkTaskProject/{id}',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTaskProject',
 *   ),
 *   'description' => 'Get one WorkTaskProject',
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
 *               'name' => 
 *               array (
 *                 'type' => 'text',
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
        $this->will('WorkTaskProject', 'show');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        return $WorkTaskProject->getById($id);
    }
     /**
     * @ApiEndpoint(
 *   'type' => 'post',
 *   'url' => 'WorkTaskProject',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTaskProject',
 *   ),
 *   'description' => 'Insert one WorkTaskProject',
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
 *             'name' => 
 *             array (
 *               'type' => 'text',
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
 *               'name' => 
 *               array (
 *                 'type' => 'text',
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
        $this->will('WorkTaskProject', 'add');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $id = $WorkTaskProject->insert($data);
        return $WorkTaskProject->getById($id);
    }
    
        /**
     * @ApiEndpoint(
 *   'type' => 'put',
 *   'url' => 'WorkTaskProject/{id}',
 *   'tags' => 
 *   array (
 *     0 => 'WorkTask-WorkTaskProject',
 *   ),
 *   'description' => 'Insert one WorkTaskProject',
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
 *             'name' => 
 *             array (
 *               'type' => 'text',
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
 *               'name' => 
 *               array (
 *                 'type' => 'text',
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
        $this->will('WorkTaskProject', 'edit');
        $WorkTaskProject = new \WorkTask\WorkTaskProject();
        $WorkTaskProject->update($id, $data);
        return $WorkTaskProject->getById($id);
    }
    

}