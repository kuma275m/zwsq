<?php

class Email extends CI_Model {
	
	public function send_email($mailto, $topic, $content, $attachment)  
    {  
        $this->load->library('email');            //加载CI的email类  
          
        //以下设置Email参数  
        $config['protocol'] = 'smtp';  
        $config['smtp_host'] = '';  
        $config['smtp_user'] = '';  
        $config['smtp_pass'] = '';  
        $config['smtp_port'] = '25'; 
        $config['charset'] = 'utf-8';  
        $config['wordwrap'] = TRUE; 
		$config['newline'] = "\r\n"; 
        $config['mailtype'] = 'html';  
        $this->email->initialize($config);              
          
        //以下设置Email内容  
        $this->email->from('', '');  
        $this->email->to($mailto);  
        $this->email->subject($topic);  
        $this->email->message($content);
		$this->email->attach($attachment);    
  		
        $this->email->send();  
  		//echo $mailto."<br />".$topic."<br />".$content."<br />".$attachment;
        echo $this->email->print_debugger();        //返回包含邮件内容的字符串，包括EMAIL头和EMAIL正文。用于调试。  
    }
}