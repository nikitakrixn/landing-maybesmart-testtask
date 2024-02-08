<?php
class MyRestControllerResources extends \MODX\Revolution\Rest\modRestController {
    public $classKey = 'modResource';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
    
    public $allowedMethods = array();

    public function read($id) {
        if (empty($id)) {
            return $this->failure($this->modx->lexicon('rest.err_field_ns',array(
                'field' => $this->primaryKeyField,
            )));
        }
        /** @var xPDOObject $object */
        $c = $this->getPrimaryKeyCriteria($id);
        $this->object = $this->modx->getObject($this->classKey,$c);
		
        if (empty($this->object)) {
            return $this->failure($this->modx->lexicon('rest.err_obj_nf',array(
                'class_key' => $this->classKey,
            )));
        }
    }
}