<?php

require_once __DIR__ . '/../mappers/FormMapper.php';

use travi\framework\controller\AbstractController;
use travi\framework\http\Request;
use travi\framework\http\Response;

class Components extends AbstractController
{
    const ENTITY_LIST_URL_PREFIX = '/components/entityList/';

    private $config;

    /** @var  FormMapper */
    private $formMapper;

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function index(&$request, &$response)
    {
        $response->setTitle('UI Components');

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
        $response->setTitle('Icons');
    }

    /**
     * @param $request Request
     * @param $response Response
     * @return void
     */
    public function forms(&$request, &$response)
    {
        $response->setTitle('Forms');
        $response->setContent(
            array(
                'form' => $this->formMapper->createForm()
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

    /**
     * @PdInject $mapper new:FormMapper
     * @param $mapper FormMapper
     */
    public function setFormMapper($mapper)
    {
        $this->formMapper = $mapper;
    }
}