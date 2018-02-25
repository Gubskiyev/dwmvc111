<?php

class View {

    public $template = 'template';

    public function render($title, $var = []) {

        if(!empty($var[0])) $data = $var[0];
        if(!empty($var[1])) $data2 = $var[1];
        else $data2 = null;
        if(!empty($var[2])) $data3 = $var[2];
        else $data3 = null;

        $url = substr($_SERVER['REQUEST_URI'],1);
        $argArr = explode('/',$url);

        if(!empty($argArr[0])) $path = $argArr[0];
        if(!empty($argArr[1])) $view = $argArr[1];
        else $view = 'index';

        $findSymbol = strpos($view, '?');
        if($findSymbol == true) {
            $view = stristr($view, '?', true);
        }

        $content = 'app/views/'.$path.'/'.$view.'.php';

        include 'app/views/'.$this->template.'.php';
    }

    public function render2 ($title, $content, $template, $data = null, $data2 = null) {
        include 'app/views/'.$template;
    }
}

