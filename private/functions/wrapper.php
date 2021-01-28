<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **
 * Wrapper Functions
 * -- Focused on adding CSS and JavaScript to pages that request it.
 * -- Default CSS: common.css
 * -- Default JS: jquery-3.5.1.min.js
**/
    /**
     * Initialize desired stylesheets here.
     */
    $wanted_stylesheets = array("common.css");

    /**
     * Initialize desired scripts here.
     */
    $wanted_ext_js = array("vendor/jquery-3.5.1.min.js");
    array_push($wanted_ext_js, "all-pages/onload.js");

    /**
     * Initialize desired body scripts here.
     */
    $wanted_body_js = array();

    /**
     * Add one or more stylesheets to the document.
     */
    function pushStylesheets(...$stylesheet_names)
    {
        global $wanted_stylesheets;

        foreach($stylesheet_names as $stylesheet)
        {
            array_push($wanted_stylesheets, $stylesheet);
        }
    }
    /**
     * Add one or more Javascript sources to the document head.
     */
    function pushHeadScripts(...$scripts)
    {
        global $wanted_ext_js;

        foreach($scripts as $script)
        {
            array_push($wanted_ext_js, $script);
        }
    }
    /**
     * Add one or more Javascript sources to the document body.
     */
    function pushFootScripts(...$scripts)
    {
        global $wanted_body_js;

        foreach($scripts as $script)
        {
            array_push($wanted_body_js, $script);
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


    /** DEPRECATED!!!
     * 
     * Take the list of $wanted_stylesheets and apply them to the page.
     */
    function insertWantedStylesheets()
    {
        global $wanted_stylesheets;

        if(count($wanted_stylesheets) == 0) return;

        // Add comment to <head> section of page to signify Stylesheet group.
        echo "\n\t\t<!-- Stylesheet(s) -->";
        /* 
         * Initialize the attributes that'll be used to define the <link>
         * element(s) as stylesheets.
         */
        $_attributes = array(
            "rel" => "stylesheet",
            "href" => STATIC_PATH . "/stylesheets"
        );
        foreach($wanted_stylesheets as $index => $stylesheet_name)
        {
            $_attributes["href"] = STATIC_PATH. "/stylesheets/" . $stylesheet_name;
            echo "\n\t\t" . generateElement("link", $_attributes);
        }
    }

    /** DEPRECATED!!!
     * 
     * Take a list of external JS files and populates the <head> with references to them.
     * 
     */
    function insertJavascriptSrcFiles()
    {
        global $wanted_ext_js;

        if(count($wanted_ext_js) == 0) return;

        // Add comment to <head> section of page to signify Javascript group.
        echo "\n\t\t<!-- External Javascript files -->";
        /* 
         * Initialize the attributes that'll be used to define the <script>
         * element(s) as Javascript.
         */
        $_attributes = array(
            "src" => STATIC_PATH . "/scripts",
            "type"=> "text/javascript"
        );
        foreach($wanted_ext_js as $index => $js_file_name)
        {
            $_attributes["src"] = STATIC_PATH. "/scripts/" . $js_file_name;
            echo "\n\t\t" . generateElement("script", $_attributes, true);
        }
    }
    /** DEPRECATED!!!
     * 
     * Take a list of external JS files and populates the <body> with them.
     */
    function insertJavascriptFromSrcFiles()
    {
        global $wanted_body_js;

        if(count($wanted_body_js) == 0) return;

        // Add comment to <head> section of page to signify Javascript group.
        echo "\n\t\t<!-- Ext. Javascript Files -->";
        /* 
         * Initialize the attributes that'll be used to define the <script>
         * element(s).
         */
        $_attributes = array(
            "src" => STATIC_PATH . "/scripts",
            "type"=> "text/javascript"
        );
        foreach($wanted_body_js as $key => $script_file_name)
        {
            $_attributes["src"] = STATIC_PATH. "/scripts/" . $script_file_name;
            echo "\n\t\t" . generateElement("script", $_attributes, true);
        }
    }

?>