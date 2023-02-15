<?php  
    
    include dirname(__DIR__).'/PDF_Lector/PDF_Lector.php';

    $title = 'PDF Upload';
    $content = file_get_contents( dirname(__DIR__)."/Views/upload_view.php" );

    include dirname(__DIR__)."/Views/layout.php";
    
    if( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        $response = '';
        $file = $_FILES['file'];
        // print_r($file);
        // echo "<br> Init Function <br>";
        
        try 
        {
            $response = convertPDFtoJPG($file,dirname(__DIR__)."/resources/IMG");
        } 
        catch (\Throwable $th) 
        {
            $response = $th;
        }

        if( $response === true)
        {
            header('Location: /PDF_Lector/Pages/Viewer.php');
        }
        else
        {
            echo '        ERROR: '.$response;
        }

    }

    
    

?>