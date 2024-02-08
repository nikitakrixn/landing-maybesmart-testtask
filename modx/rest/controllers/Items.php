<?php 
class MyRestControllerItems extends \MODX\Revolution\Rest\modRestController {
    public $classKey = 'MyServices\Model\Item';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    public $classAlias = 'Item';

    public $defaultLimit = 0;
    public $searchFields = ['name'];
    public $postRequiredFields = ['name', 'price', 'unit'];

    public function verifyAuthentication()
    {
        if ($this->request->method == 'get') {
            return true;
        }

        if (!$this->modx->user->isMember('Administrator')) {
            return false;
        }

        return true;
    }
}