<html>
	<head><title>Manage users</title></head>
	<body>
	<?php  				
		// Show reset password message if exist
		if (isset($reset_message))
			echo $reset_message;
			
		// Show error
		echo validation_errors();
		
		$this->table->set_heading('', 'Username', 'Email', 'Papel', 'Banido', 'Último IP', 'Último login', 'Criado');
		
		foreach ($users as $user) 
		{
			$banned = ($user->banned == 1) ? 'Yes' : 'No';
			
				$this->table->add_row(
				form_checkbox('checkbox_'.$user->id, $user->id),
				$user->username, 
				$user->email, 
				$user->role_name, 			
				$banned, 
				$user->last_ip,
				date('Y-m-d', strtotime($user->last_login)), 
				date('Y-m-d', strtotime($user->created)));
		}
		
		echo form_open($this->uri->uri_string());
				
		//echo form_submit('ban', 'Ban user');
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"ban\" type=\"submit\">Banir Usuario</button>";
		echo "<button class=\"btn btn-success\" value=\"Submit\"  name=\"unban\" type=\"submit\">Desbanir Usuario</button>";
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"reset_pass\" type=\"submit\">Resetar Senha</button>";
		//echo form_submit('unban', 'Unban user');
		//echo form_submit('reset_pass', 'Reset password');
		
		echo '<hr/>';
		
		echo $this->table->generate(); 
		
		echo form_close();
		
		echo $pagination;
			
	?>
	</body>
</html>