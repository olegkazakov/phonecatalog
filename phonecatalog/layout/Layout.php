<?php
namespace phonecatalog\layout;
/**
 * Description of Layout
 *
 * @author olegkazakov
 */

class Layout
{
  
    private $layoutName='default';
    private $viewName;
    private $view;
    
    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getLayoutName()
    {
        return $this->layoutName;
    }

    public function setLayoutName($layoutName)
    {
        $this->layoutName = $layoutName;
    }

    public function render($viewName)
    {
        $fileName = "layout/{$this->layoutName}.php";
        if (!file_exists($fileName)) {
            throw new \RuntimeException('Нет такого файла!');
        }
        $this->viewName = $viewName;
        require $fileName;
    }
    
    public function view()
    {
        $fileName = "view/{$this->viewName}.php";
        require $fileName;
    }
}
