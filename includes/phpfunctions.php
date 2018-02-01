	
	
	<?php 
	//hide email address
	function convert_email_adr($email) {
    $pieces = str_split(trim($email));
    $new_mail = '';
    foreach ($pieces as $val) {
        $new_mail .= '&#'.ord($val).';';
    }
    return $new_mail;
	}
	?>