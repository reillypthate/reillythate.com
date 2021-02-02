<?php

namespace Trick;
{

    /** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Element Functions
     * + db_getSiteDirectory()
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    class Element
    {
        /** @var array */
        protected $lines;

        public function __construct()
        {
            $this->lines = array();
        }

        /**  */
        public function pushLine($num_tabs, $line)
        {
            array_push($this->lines, str_repeat("\t", $num_tabs) . $line);
        }
        /** Returns the HTML code by line. */
        public function getLines()
        {
            return $this->lines;
        }
        /** Prints HTML code with line-breaks after each line item. */
        public function printLines($tab_start)
        {
            foreach($this->lines as $index=>$line)
            {
                for($i = 0; $i < $tab_start; $i++)
                {
                    echo "\t";
                }
                echo $line;
                echo "\n";
            }
        }
    }

}
?>