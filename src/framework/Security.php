<?php

//Class Security dedicated to the global application of security functions like htmlspecialchars.

class Security {
    public static function htmlSecurity($string) {
        return htmlspecialchars($string, ENT_QUOTES);
    }
}