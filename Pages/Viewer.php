<?php  
    
    $title = 'PDF Viewer';
    
    include dirname(__DIR__).'/Views/layout.php'; 

    echo "<br>";

    $pictures = glob('../resources/IMG/{*.jpg,*.gif,*.png}',GLOB_BRACE);

    // print_r($pictures);

    for ($i=0; $i < count($pictures); $i++) 
    { 
        echo '<img src="'.$pictures[$i].'" width="300">';
    }
?>