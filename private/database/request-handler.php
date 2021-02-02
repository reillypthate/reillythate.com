<?php

if(count($_REQUEST) > 0)
{
    if(count($_REQUEST) > 1)
    {
        if(isset($_POST['db_ADD']))
        {
            switch($_POST['db_type'])
            {
                case "dir": $data[DIRECTORY]->db_Add($_POST); break;
                case "image": $data[IMAGE]->db_Add($_POST); break;
                case "video": $data[VIDEO]->db_Add($_POST); break;
                default: echo "Bad Submit! Fix!"; die();
            }
        }else
        if(isset($_POST['db_UPDATE']))
        {
            switch($_POST['db_type'])
            {
                case "dir": $data[DIRECTORY]->db_Update($_POST); break;
                case "image": $data[IMAGE]->db_Update($_POST); break;
                case "video": $data[VIDEO]->db_Update($_POST); break;
                default: echo "Bad Submit! Fix!"; die();
            }
        }
    }
    //  Otherwise, it's probably a dynamic identifier.
    //  Nothing to handle.
}

?>