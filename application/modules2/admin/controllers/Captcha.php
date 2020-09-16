    <?php
    defined('BASEPATH') OR exit('your exit message');
    class Captcha extends CI_Controller
    {
		function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('captcha');
        $this->load->helper('url');
    }
        public function index(){
            if ($this->input->post('submit')) {
                $captcha_insert = $this->input->post('captcha');
                $contain_sess_captcha = $this->session->userdata('valuecaptchaCode');
                if ($captcha_insert === $contain_sess_captcha) {
                    echo 'Success';
                } else {
                    echo 'Failure';
                }
            }
            $config = array(
                'img_url' => base_url() . 'image_for_captcha/',
                'img_path' => 'image_for_captcha/',
                'img_height' => 45,
                'word_length' => 5,
                'img_width' => 150,
                'font_size' => 12
            );
            $captcha = create_captcha($config);
            $this->session->unset_userdata('valuecaptchaCode');
            $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
            $data['captchaImg'] = $captcha['image'];
            $this->load->view('captcha/index', $data);
        }
        public function refresh()
        {
            $config = array(
                'img_url' => base_url() . 'image_for_captcha/',
                'img_path' => 'image_for_captcha/',
                'img_height' => 45,
                'word_length' => 5,
                'img_width' => 150,
                'font_size' => 12
            );
            $captcha = create_captcha($config);
            $this->session->unset_userdata('valuecaptchaCode');
            $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
            echo $captcha['image'];
        }
    }