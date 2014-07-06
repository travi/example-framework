<?php

use travi\framework\components\Forms\FieldSet;
use travi\framework\components\Forms\Form;
use travi\framework\components\Forms\inputs\RichTextArea;
use travi\framework\components\Forms\inputs\TextInput;
use travi\framework\components\Forms\SubmitButton;
use travi\framework\collection\EntityBlock;
use travi\framework\collection\EntityList;
use travi\framework\mappers\CrudMapper;
use travi\framework\view\objects\LinkView;

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
        $list = new EntityList(Entities::URL_PREFIX);
        $list->add = new LinkView('Add Entity', Entities::URL_PREFIX . 'add');
        $list->pluralType = 'Entities';

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
    public function mapToEntityBlock($entity)
    {
        $entityBlock = new EntityBlock($entity->getId(), Entities::URL_PREFIX);

        $entityBlock->setId($entity->getId());
        $entityBlock->selfLink = Entities::URL_PREFIX . $entity->getId();
        $entityBlock->addRemoveAction();
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
                    'label' => 'Title',
                    'validations' => array('required')
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

        $form->addFormElement($fieldSet);


        $cancelLink = new LinkView('Cancel', Entities::URL_PREFIX);
        $cancelLink->addTag('cancel');
        $form->addAction($cancelLink);

        $form->addAction(
            new SubmitButton(
                array(
                    'label' => 'Submit'
                )
            )
        );

    }

    /**
     * @return Form
     */
    public function mapRequestToForm()
    {
        $form = new Form(array());

        $this->addFieldsTo($form);
        $this->mapRequestValuesToForm($form);

        return $form;
    }
}