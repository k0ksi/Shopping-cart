<?php

abstract class BaseController
{
    protected $actionName;
    protected $controllerName;
    protected $layoutName = DEFAULT_LAYOUT;
    protected $isViewRendered = false;

    function __construct($controllerName, $actionName) {
        $this->actionName = $actionName;
        $this->controllerName = $controllerName;
        $this->onInit();
    }

    public function onInit() {
        // implement initializing logic in the subclasses
    }

    public function index() {
        // implement default action in the subclasses
    }

    public function renderView($viewName = null, $includeLayout = true) {
        if(!$this->isViewRendered) {
            if($viewName == null) {
                $viewName = $this->actionName;
            }

            $viewFileName = 'views/' . $this->controllerName . '/' . $viewName .
                '.php';
            if($includeLayout) {
                $headerFile = 'views/layouts/' . $this->layoutName . '/header.php';
                include_once($headerFile);
            }

            include_once($viewFileName);
            if($includeLayout) {
                $footerFile = 'views/layouts/' . $this->layoutName . '/footer.php';
                include_once($footerFile);
            }
            $this->isViewRendered = true;
        }
    }
}