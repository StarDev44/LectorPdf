<?php

    function convertPDFtoJPG($pdfFile, $outputFolder) 
    {
        // This Line remove the files in the output folder (if exists)
        $total_imagenes = count(glob($outputFolder.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));

        if ($total_imagenes>0) {
            for ($i=0; $i <= $total_imagenes; $i++) { 
                unlink($outputFolder.'/page_'.$i.".jpg");
            }
        }

        $pdfFilePath = $pdfFile['tmp_name'];

        // Validar que el archivo sea un PDF
        $extension = pathinfo($pdfFile['name'], PATHINFO_EXTENSION);
        // echo '<br>'.$extension.'<br>';

        if (strtolower($extension) !== 'pdf') 
        {
            return 'El archivo proporcionado no es un PDF';
        }
        

        $imagick = new Imagick();
        $imagick->readImage($pdfFilePath);
        $imagick->setImageFormat('jpg');

        $pageCount = $imagick->getNumberImages();

        for ($i = 0; $i < $pageCount; $i++) 
        {
            $image = clone $imagick;
            $image->setIteratorIndex($i);
            $imagePath = $outputFolder . '/page_' . ($i+1) . '.jpg';
            $image->writeImage($imagePath);
        }

        // Retornar TRUE si todo ha ido bien
        return true;
    }