<?
    header( 'Content-Type: text/html; charset=UTF-8' );

    $sites = array (
        "java" => "http://www.oracle.com/technetwork/java/index.html",
        "python" => "https://www.python.org/downloads/",
        "php" => "http://www.php.net/"
    );

//  in order to use file_get_contents function,
//  openssl should be enabled in php executable and
//  allow_url_fopen = On in php.ini.
// 
//   $inputParam = array (
//       array('site',FILTER_SANITIZE_STRING)
//   );

    $site = filter_input(INPUT_GET,'site',FILTER_SANITIZE_STRING);
    //$input = filter_input_array(INPUT_GET,$inputParam);

    //$site = $_REQUEST['site'];
    $data = "";
    //if( is_array($input) && array_key_exists("site",$input) ){
    if( array_key_exists($site,$sites) ){
        //$url = $sites[$input["site"]];
        $url = $sites[$site];
        try {
            $data = file_get_contents($url);
            if($data === false){
                //$data = "false";
            }
        } catch ( Exception $e) {
            //$data = "exception";
        }
    }
?>
<? print_r($data) ?>
