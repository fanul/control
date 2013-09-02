<?
//print_r($tersangka);
$folder = substr($tersangka[0]->document_folder,28);
//$fullPath = strtolower(str_replace("/", '\\', $tersangka[0]->document_folder));
 //$fullPath = site_url($folder);
$fullPath = strtolower($tersangka[0]->document_folder);
//$fileT = explode('/', $folder);
//$file = $fileT[count($fileT)-1];
//echo $file."<br>";

//echo $fullPath."<br>";
  // Must be fresh start
  if( headers_sent() )
    die('Headers Sent');

//  // Required for some browsers
  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  // File Exists?
  if( file_exists($fullPath) ){

    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    echo $fsize."<br>";
    //print_r($path_parts);
    ///echo $path_parts["extension"];
    $ext = strtolower($path_parts["extension"]);

    // Determine Content Type
    switch ($ext) {
      case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xlsx":
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg": $ctype="image/jpeg"; break;
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
    }

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Description: File Transfer");
    header("Content-Disposition: filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile($fullPath);
    //fopen($fullPath, FOPEN_READ);
  } else
    die('File Not Found');

?>