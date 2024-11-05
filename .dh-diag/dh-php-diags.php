<?php

class PHPInfo {
    public $mode = "CGI";
    public $version = "unknown";
    public $ini = "None";
    public $scanned = array();
    public $user_ini_directives = array();

    public function user_directives() {
        foreach ($this->scanned as $file) {
            if (preg_match("/^\/home\//", $file)) {
                $inifile = fopen($file, "r") or die("Unable to open $file\n");
                array_push(
                    $this->user_ini_directives,
                    array_filter(
                        explode("\n",
                            fread($inifile, filesize($file))
                        ),
                        "ini_filter"
                    )
                );
                fclose($inifile);
            }
        }
    }
}

// Filter out comments and blank lines
function ini_filter($var) {
    if (preg_match("/^;/", $var) or preg_match("/^\s?$/", $var)) {
        return false;
    }
    return true;
}

$info = new PHPInfo();

//TODO figure out a smarter FPM check. We only support FPM on Nginx right now so this will work, but that might change.
// FCGI_ROLE is set to 'RESPONDER' for both FPM and FCGID, but not CGI
if (array_key_exists("SERVER_SOFTWARE", $_SERVER) and preg_match('/nginx/', $_SERVER['SERVER_SOFTWARE'])) {
    $info->mode =  'FPM';
} else if (array_key_exists("FCGI_ROLE", $_SERVER) and $_SERVER['FCGI_ROLE'] == 'RESPONDER') {
    $info->mode = 'FCGID';
}

$info->version = phpversion();
$info->ini = php_ini_loaded_file();
$info->scanned = str_replace("\n", "", explode(',', php_ini_scanned_files()));
$info->user_directives();

header('Content-Type: application/json');
echo json_encode($info);

//phpinfo();