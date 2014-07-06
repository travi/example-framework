<?php

use travi\framework\controller\CrudController;

require_once __DIR__ . '/../model/EntityModel.php';
require_once __DIR__ . '/../mappers/EntityMapper.php';

/**
 * @PdInject new:EntityModel method:setModel
 * @PdInject new:EntityMapper method:setMapper
 */
class Entities extends CrudController {

    const ENTITY = 'Entity';
    const URL_PREFIX = '/entities/';

    /** @var EntityModel */
    protected $model;

    public function deleteById($id, &$response)
    {
        $this->model->deleteById($id);

        $response->addToResponse('resource', self::URL_PREFIX . $id);
    }

    protected function getEditHeading()
    {
        return 'Edit ' . self::ENTITY;
    }

    protected function getAddHeading()
    {
        return 'Add ' . self::ENTITY;
    }

    protected function getUrlPrefix()
    {
        return self::URL_PREFIX;
    }

    protected function getEntityType()
    {
        return self::ENTITY;
    }
}