<?php  
    
    $title = 'PDF Viewer';
    
    include dirname(__DIR__).'/Views/layout.php'; 

    echo "<br>";

    $pictures = glob('../resources/IMG/{*.jpg,*.gif,*.png}',GLOB_BRACE);

    // print_r($pictures);

    $img = "";

    for ($i=0; $i < count($pictures); $i++) 
    { 
        $img.= '<img class="col-4 mb-2" src="'.$pictures[$i].'?'.time().'" >';
    }

    include dirname(__DIR__).'/Views/viewer_view.php'; 
?>
