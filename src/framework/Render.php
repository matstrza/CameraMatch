<?php

// Class dedicated to rendering of the webpage view elements.

class Render {
    public static function render($template ='', $args=[]) {
        $layout = $template;
        require 'src/templates/layout.php';
    }
}