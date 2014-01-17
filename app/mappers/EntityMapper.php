<?php

use travi\framework\components\Forms\Form;
use travi\framework\content\collection\EntityBlock;
use travi\framework\content\collection\EntityList;
use travi\framework\mappers\CrudMapper;

require_once __DIR__ . '/../model/domain/Entity.php';

class EntityMapper extends CrudMapper {

    /**
     * @param $entity
     * @internal param $action
     * @return Form
     */
    public function mapToForm($entity = null)
    {
        // TODO: Implement mapToForm() method.
    }

    /**
     * @param $entities
     * @internal param $entity
     * @return EntityList
     */
    public function mapListToEntityList($entities)
    {
        $urlPrefix = Entities::URL_PREFIX;
        $list = new EntityList($urlPrefix);

        $list->setRemove($urlPrefix, "Are you sure you wish to REMOVE this blog entry?");

        foreach ($entities as $entity) {
            $list->addEntity($this->mapToEntityBlock($entity));
        }

        return $list;
    }

    /**
     * @param $entity Entity
     * @return EntityBlock
     */
    private function mapToEntityBlock($entity)
    {
        $entityBlock = new EntityBlock();

        $entityBlock->setTitle($entity->getTitle());
        $entityBlock->setSummary($entity->getContent());

        return $entityBlock;
    }

    /**
     * @param $form Form
     */
    public function mapFromForm($form)
    {
        // TODO: Implement mapFromForm() method.
    }

    /**
     * @param $form Form
     */
    protected function addFieldsTo($form)
    {
        // TODO: Implement addFieldsTo() method.
    }

    /**
     * @return Form
     */
    public function mapRequestToForm()
    {
        // TODO: Implement mapRequestToForm() method.
    }
}