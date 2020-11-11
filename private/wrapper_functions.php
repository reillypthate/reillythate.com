<?php
    /**
     * Take the list of $wanted_stylesheets and apply them to the page.
     */
    function insertWantedStylesheets()
    {
        global $wanted_stylesheets;

        if($wanted_stylesheets == "") return;
        echo "\n\t\t<!-- Stylesheet(s) -->";

        $stylesheet_names = explode(",", $wanted_stylesheets);
        $_attributes = array(
            "rel" => "stylesheet",
            "href" => STATIC_PATH . "/stylesheets"
        );
        foreach($stylesheet_names as $key => $stylesheet_name)
        {
            $_attributes["href"] = STATIC_PATH. "/stylesheets/" . $stylesheet_name;
            echo "\n\t\t" . generateElement("link", $_attributes);
        }
    }

    /**
     * Take a list of external JS files and populates the <head> with references to them.
     */
    function insertJavascriptSrcFiles()
    {
        global $wanted_ext_js;

        if($wanted_ext_js == "") return;
        echo "\n\t\t<!-- External Javascript files -->";

        $js_file_names = explode(",", $wanted_ext_js);
        $_attributes = array(
            "src" => STATIC_PATH . "/scripts",
            "type"=> "text/javascript"
        );
        foreach($js_file_names as $key => $js_file_name)
        {
            $_attributes["src"] = STATIC_PATH. "/scripts/" . $js_file_name;
            echo "\n\t\t" . generateElement("script", $_attributes, true);
        }
    }
    /**
     * Take a list of external JS files and populates the <body> with them.
     */
    function insertJavascriptFromSrcFiles()
    {
        global $wanted_body_js;

        if($wanted_body_js == "") return;
        echo "\n\t\t<!-- Ext. Javascript Files -->";

        $js_file_names = explode(",", $wanted_body_js);
        $_attributes = array(
            "src" => STATIC_PATH . "/scripts",
            "type"=> "text/javascript"
        );
        foreach($js_file_names as $key => $script_file_name)
        {
            $_attributes["src"] = STATIC_PATH. "/scripts/" . $script_file_name;
            echo "\n\t\t" . generateElement("script", $_attributes, true);
        }
    }

    /**
     * Generate an element of type $element with a list of attributes.
     * If $closingTag is true, add one.
     */
    function generateElement($type, $attributes, $requiresClosingTag = false)
    {
        $element = "<" . $type;
        foreach($attributes as $key => $attribute)
        {
            $element = $element . " " . $key . "=" . "\"" . $attribute . "\"";
        }
        $element = $element . ">";

        if($requiresClosingTag == true)
        {
            $element = $element . "</" . $type . ">";
        }
        return $element;
    }

?>