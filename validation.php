<?php


function validate_main($structure) 
{
     $mandatory_list = array("name","output_dir","description","author_name");
     foreach ($mandatory_list as $label)
     {
         if (!isset($structure->{$label})) {
             throw new Exception("Required label not found: $label");
         }
     }
}
