<?php

abstract class AbstractController {

    protected function renderView($viewPath, array $data)
    {
        extract($data);

        ob_start();
        require_once "views/{$viewPath}.phtml";
        $content = ob_get_clean();
        require_once "templates/layout.phtml";
    }
}
