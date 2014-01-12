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
                'entity list' => '/components/entityList/'
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
    public function entityList(&$request, &$response)
    {
        $list = new EntityList();
        $list->setRemove(self::ENTITY_LIST_URL_PREFIX, "Are you sure you wish to REMOVE this entity?");

        $entity = new EntityBlock();
        $entity->setTitle('Example Entity');
        $entity->setSummary(
            "<p> well, do you have anything to say for yourself? this is the ak-47 assault rifle, the preferred weapon
            of your enemy; and it makes a distinctive sound when fired at you, so remember it. i did the same thing to
            gandhi, he didn't eat for three weeks. cities fall but they are rebuilt. heroes die but they are remembered.
            rehabilitated? well, now let me see. you know, i don't have any idea what that means. man's gotta know his
            limitations. bruce... i'm god. you want a guarantee, buy a toaster. let me tell you something my friend.
            hope is a dangerous thing. hope can drive a man insane. when a naked man's chasing a woman through an alley
            with a butcher knife and a hard-on, i figure he's not out collecting for the red cross. you measure yourself
            by the people who measure themselves by you. this is my gun, clyde! </p>"
        );

        $entity2 = new EntityBlock();
        $entity2->setTitle('Another Example');
        $entity2->setSummary(
            "<p> no, this is mount everest. you should flip on the discovery channel from time to time. but i guess you
            can't now, being dead and all. boxing is about respect. getting it for yourself, and taking it away from the
            other guy. don't p!ss down my back and tell me it's raining. i don't think they tried to market it to the
            billionaire, spelunking, base-jumping crowd. what you have to ask yourself is, do i feel lucky. well do ya'
            punk? dyin' ain't much of a livin', boy. that tall drink of water with the silver spoon up his ass. i now
            issue a new commandment: thou shalt do the dance. you see, in this world there's two kinds of people, my
            friend: those with loaded guns and those who dig. you dig. are you feeling lucky punk circumstances have
            taught me that a man's ethics are the only possessions he will take beyond the grave. here. put that in your
            report!' and 'i may have found a way out of here. </p>"
        );

        $list->addEntity($entity);
        $list->addEntity($entity2);

        $response->setContent($list);
    }

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function forms(&$request, &$response)
    {
        $form = new Form();

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

        $form->addFormElement(
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