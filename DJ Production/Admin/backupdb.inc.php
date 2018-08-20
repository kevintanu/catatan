<?php
	require_once 'dbConnect.php';
	$now = str_replace(":", "", date("Y-m-d H:i:s"));
    $outputfilename = $dbname . '-' . $now . '.sql';
    $outputfilename = str_replace(" ", "-", $outputfilename);
	exec('mysqldump -u '. $dbuser .' -p'. $dbpass .' '. $dbname .' > '. $outputfilename);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($outputfilename));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($outputfilename));
    ob_clean();
    flush();
    readfile($outputfilename);
    exec('rm ' . $outputfilename);  
?>