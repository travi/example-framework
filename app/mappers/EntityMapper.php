<?php

use travi\framework\components\Forms\FieldSet;
use travi\framework\components\Forms\Form;
use travi\framework\components\Forms\inputs\RichTextArea;
use travi\framework\components\Forms\inputs\TextInput;
use travi\framework\components\Forms\SubmitButton;
use travi\framework\content\collection\EntityBlock;
use travi\framework\content\collection\EntityList;
use travi\framework\mappers\CrudMapper;

require_once __DIR__ . '/../model/domain/Entity.php';

class EntityMapper extends CrudMapper {

    /**
     * @param $entity Entity
     * @internal param $action
     * @return Form
     */
    public function mapToForm($entity = null)
    {
        $action = Entities::URL_PREFIX;
        if (isset($entity)) {
            $action .= $entity->getId();
        }
        $form = new Form(
            array(
                'action' => $action
            )
        );

        $this->addFieldsTo($form);

        if (isset($entity)) {
            $this->setFieldValues(
                $form,
                array(
                    'title' => $entity->getTitle(),
                    'content' => $entity->getContent()
                )
            );
        }

        return $form;
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

        $list->setRemove($urlPrefix, "Are you sure you wish to REMOVE this entity?");

        foreach ($entities as $entity) {
            $list->addEntity($this->mapToEntityBlock($entity));
        }

        return $list;
    }

    public function mapFromDb($entry)
    {
        $entity = new Entity();

        $entity->setId($entry['id']);
        $entity->setTitle($entry['title']);
        $entity->setContent($entry['content']);

        return $entity;
    }


    public function mapListFromDb($array)
    {
        $list = array();

        foreach ($array as $entry) {
            array_push($list, $this->mapFromDb($entry));
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

        $entityBlock->setId($entity->getId());
        $entityBlock->setTitle($entity->getTitle());
        $entityBlock->setSummary($entity->getContent());

        return $entityBlock;
    }

    /**
     * @param $form Form
     * @return \Entity
     */
    public function mapFromForm($form)
    {
        $entity = new Entity();

        $entity->setTitle($form->getFieldByName('title')->getValue());
        $entity->setContent($form->getFieldByName('content')->getValue());

        return $entity;
    }

    /**
     * @param $form Form
     */
    protected function addFieldsTo($form)
    {
        $fieldSet = new FieldSet();

        $fieldSet->addFormElement(
            new TextInput(
                array(
                    'label' => 'Title'
                )
            )
        );

        $fieldSet->addFormElement(
            new RichTextArea(
                array(
                    'label' => 'Content'
                )
            )
        );

        $fieldSet->addFormElement(
            new SubmitButton(
                array(
                    'label' => 'Submit'
                )
            )
        );

        $form->addFormElement($fieldSet);
    }

    /**
     * @return Form
     */
    public function mapRequestToForm()
    {
        $form = new Form();

        $this->addFieldsTo($form);
        $this->mapRequestValuesToForm($form);

        return $form;
    }
}