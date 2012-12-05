<html>
	<head><title>Manage URI Permissions</title></head>
	<body>	
	<?php  				
		// Build drop down menu
		foreach ($roles as $role)
		{
			$options[$role->id] = $role->name;
		}

		// Change allowed uri to string to be inserted in text area
		if ( ! empty($allowed_uris))
		{
			$allowed_uris = implode("\n", $allowed_uris);
		}
		
		// Build form
		echo form_open($this->uri->uri_string());
		
		echo form_label('Papel', 'role_name_label');
		echo form_dropdown('role', $options); 
		//echo form_submit('show', 'Mostrar URI Permissão'); 
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"show\" type=\"submit\">Mostrar URI Permissão</button>";
		
		echo form_label('', 'uri_label');
				
		echo '<hr/>';
				
		echo 'Permitir URI (1 URI  por linha) :<br/><br/>';
		
		echo "Input '/'Permitir acesso total ao papel URI.<br/>";
		echo "Input '/controller/' Permitir Acesso Controller.<br/>";
		echo "Input '/controller/function/' Permitir acesso Controller/Função.<br/><br/>";
		//echo 'Estas regras só tem efeito se você usar check_uri_permissions () em seu controlador<br/><br/>.';
		
		echo form_textarea('allowed_uris', $allowed_uris); 
				
		echo '<br/>';
		//echo form_submit('save', 'Salvar URI Permissão');
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"save\" type=\"submit\">Salvar URI Permissão</button>";
		
		echo form_close();
	?>
	</body>
</html>