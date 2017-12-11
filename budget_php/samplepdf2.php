<?php
    require('phpToPDF.php');

    //It is possible to include a file that outputs html and store it in a variable 
    //using output buffering.
    ob_start();
    include('C:\xampp\htdocs\budget_php/report.php');
    $my_html = ob_get_clean();

    //Set Your Options -- we are saving the PDF as 'my_filename.pdf' to a 'my_pdfs' folder
    $pdf_options = array(
      "source_type" => 'html',
      "source" => $my_html,
      "action" => 'save',
      "save_directory" => 'Desktop',
      "file_name" => 'rep_fac.php');

    //Code to generate PDF file from options above
    phptopdf($pdf_options);
?>