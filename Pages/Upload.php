<?php  
    
    $title = 'PDF Upload';
    $content = file_get_contents( dirname(__DIR__)."/Views/upload_view.php" );

    include dirname(__DIR__)."/Views/layout.php"; 

?>