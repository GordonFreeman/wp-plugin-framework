<?php

 function copy_directory($source, $destination, $whatsgoingon = false){
      if ($destination{strlen($destination) - 1} == '/'){
         $destination = substr($destination, 0, -1);
        }
      if (!is_dir($destination)){
         if ($whatsgoingon){
            echo "Creating directory {$destination}\n";
            }
         mkdir($destination, 0755);
      }

      $folder = opendir($source);

      while ($item = readdir($folder)){
         if ($item == '.' || $item == '..'){
            continue;
            }
         if (is_dir("{$source}/{$item}")){
            copy_directory("{$source}/{$item}", "{$destination}/{$item}", $whatsgoingon);
         }else{
            if ($whatsgoingon){
               echo "Copying {$item} to {$destination}"."\n";
            }
            copy("{$source}/{$item}", "{$destination}/{$item}");
            }
      }
   }
