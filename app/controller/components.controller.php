<?php

use travi\framework\components\Forms\choices\CheckBoxes;
use travi\framework\components\Forms\choices\RadioButtons;
use travi\framework\components\Forms\choices\SelectionBox;
use travi\framework\components\Forms\FieldSet;
use travi\framework\components\Forms\Form;
use travi\framework\components\Forms\inputs\DateInput;
use travi\framework\components\Forms\inputs\FileInput;
use travi\framework\components\Forms\inputs\NumberInput;
use travi\framework\components\Forms\inputs\OpenIdInput;
use travi\framework\components\Forms\inputs\PasswordInput;
use travi\framework\components\Forms\inputs\RichTextArea;
use travi\framework\components\Forms\inputs\TextArea;
use travi\framework\components\Forms\inputs\TextInput;
use travi\framework\components\Forms\SubmitButton;
use travi\framework\content\collection\EntityBlock;
use travi\framework\content\collection\EntityList;
use travi\framework\controller\AbstractController;
use travi\framework\http\Request;
use travi\framework\http\Response;

class Components extends AbstractController
{
    private $config;
    const ENTITY_LIST_URL_PREFIX = '/components/entityList/';

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function index(&$request, &$response)
    {
        $response->setContent(
                array(
                'forms' => '/components/forms/',
                'icons' => '/components/icons/',
                'entity list' => '/entities/'
            )
        );
    }

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function icons(&$request, &$response)
    {

    }

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function forms(&$request, &$response)
    {
        $form = new Form(array());

        $inputs = new FieldSet();
        $inputs->setLegend('Inputs');
        $inputs->addFormElement(
            new TextInput(
                array(
                    'label' => 'Text Input'
                )
            )
        );
        $inputs->addFormElement(
            new DateInput(
                array(
                    'label' => 'Date Input'
                )
            )
        );
        $inputs->addFormElement(
            new FileInput(
                array(
                    'label' => 'File Input'
                )
            )
        );
        $inputs->addFormElement(
            new NumberInput(
                array(
                    'label' => 'Number Input'
                )
            )
        );
        $inputs->addFormElement(
            new OpenIdInput(
                array(
                    'label' => 'OpenID Input'
                )
            )
        );
        $inputs->addFormElement(
            new PasswordInput(
                array(
                    'label' => 'Password Input'
                )
            )
        );

        $textAreas = new FieldSet();
        $textAreas->setLegend('Text Areas');
        $textAreas->addFormElement(
            new TextArea(
                array(
                    'label' => 'Text Area'
                )
            )
        );
        $textAreas->addFormElement(
            new RichTextArea(
                array(
                    'label' => 'Rich Text Area'
                )
            )
        );

        $options = array(
            array(
                'label' => 'First Choice',
                'value' => 1
            ),
            array(
                'label' => 'Second Choice',
                'value' => 2
            )
        );

        $choices = new FieldSet();
        $choices->setLegend('Choices');
        $choices->addFormElement(
            new SelectionBox(
                array(
                    'label' => 'Selection Box',
                    'options' => $options
                )
            )
        );
        $choices->addFormElement(
            new CheckBoxes(
                array(
                    'label' => 'Checkboxes',
                    'options' => $options
                )
            )
        );
        $choices->addFormElement(
            new RadioButtons(
                array(
                    'label' => 'Radio Buttons',
                    'options' => $options
                )
            )
        );

        $form->addFormElement($inputs);
        $form->addFormElement($choices);
        $form->addFormElement($textAreas);

        $form->addAction(
            new SubmitButton(
                array(
                    'label' => 'Submit This Form'
                )
            )
        );

        $response->setContent(
            array(
                'form' => $form
            )
        );
    }

    /**
     * @PdInject config
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }
}