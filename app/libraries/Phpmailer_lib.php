<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: a.kader
 * Date: 22-Aug-19
 * Time: 5:03 PM
 */

//include(APPPATH . "/third_party/phpqrcode/qrlib.php");
include APPPATH.'/third_party/PHPMailer/src/Exception.php';
include APPPATH.'/third_party/PHPMailer/src/PHPMailer.php';
include APPPATH.'/third_party/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
//require '../vendor/autoload.php';
//use PHPMailer\PHPMailer\Exception;
class Phpmailer_lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files

        $mail = new PHPMailer;
        return $mail;
    }
}