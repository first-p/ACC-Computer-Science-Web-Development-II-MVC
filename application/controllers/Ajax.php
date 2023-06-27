<?php
class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function get_news() {
        $news_data = $this->news_model->get_news();
        echo json_encode($news_data);
    }

    public function contact() {
        /* ********************************************
         * TODO (erase this comment when you are done)
         * ********************************************
         * these two lines are for debugging purposes to get started.
         * erase them both when you are ready to complete this processing
         */
        //    var_dump($_POST);
        //    exit();

        /* This will test to make sure we have a non-empty $_POST from
         * the form submission. */

        $input_data = json_decode(trim(file_get_contents('php://input')), true);
//        echo json_encode($input_data);
//
        if (!empty($input_data)) {
//            $/* ********************************************
//             * TODO (erase this comment when you are done)
//             * ********************************************
//             * Do your validation and cleaning here. You need to extract FOUR
//             * things from the $input_data array...
//               $name --> trim it, strip HTML tags, and sub-string it to 64
//               $subject --> trim it, strip HTML tags, and sub-string it to 64
//               $message --> trim it, strip HTML tags, and sub-string it to 1000
//               $from --> look up and use the PHP filter_var() with FILTER_VALIDATE_EMAIL
//               https://www.php.net/manual/en/function.filter-var.php
//             *
//             */
            $name = $input_data['name'];
            $subject = $input_data['subject'];
            $message = $input_data['message'];
            $from = $input_data['email'];
            // $from = filter_var($from, FILTER_VALIDATE_EMAIL);

            $name = substr(trim(strip_tags($name)), 0 , 64);
            $subject = substr(trim(strip_tags($subject)), 0 , 64);
            $message = substr(trim(strip_tags($message)), 0 , 64);
            $from = substr(trim(strip_tags($from)), 0 , 64);


            /* The cleaning routines above may leave any variable empty. If we
             * find an empty variable, we stop processing because that means
             * someone tried to send us something malicious and/or incorrect. */
            if (!empty($name) && !empty($from) && !empty($subject) && !empty($message)) {

                /* this forms the correct email headers to send an email */
                $headers = "From: $from\r\n";
                $headers .= "Reply-To: $from\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

                /* Now attempt to send the email. This uses a REAL email function
                 * and will send an email. Make sure you only sned it to yourself.
                 * server, you would use just "mail" instead of "mymail" and
                 * it will be sent normally. Read about the PHP mail() function
                 * https://www.php.net/manual/en/function.mail.php
                 * then it's up to you to fill out the paramters correctly.
                 */
                if (mail($from, $subject, $message, $headers)){
                    $json_result = array('result'=>'okay');
                    echo json_encode($json_result).PHP_EOL;
                } else {
                    $json_result = array('result'=>'not sent');
                    echo json_encode($json_result).PHP_EOL;
                }
            } else {
                $json_result = array('result'=>'error');
                echo json_encode($json_result).PHP_EOL;
            }
        } else {
            $json_result = array('result'=>'error');
            echo json_encode($json_result).PHP_EOL;
        }
    }
}