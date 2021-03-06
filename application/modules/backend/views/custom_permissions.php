<html>
	<head><title>Manage Custom Permissions</title></head>
	<body>
	<?php
		echo '<b>Customisar Permissão</b><br/><br/>';
		
		// Build drop down menu
		foreach ($roles as $role)
		{
			$options[$role->id] = $role->name;
		}

		// Change allowed uri to string to be inserted in text area
		if ( ! empty($allowed_uri))
		{
			$allowed_uri = implode("\n", $allowed_uri);
		}
		
		if (empty($edit))
		{
			$edit = FALSE;
		}
			
		if (empty($delete))
		{
			$delete = FALSE;
		}
		
		// Build form
		echo form_open($this->uri->uri_string());
		
		echo form_label('Role', 'role_name_label');
		echo form_dropdown('role', $options); 
		//echo form_submit('show', 'Mostrar Permissões'); 
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"show\" type=\"submit\">Mostrar Permissões</button>";
		
		echo form_label('', 'uri_label');
				
		echo '<hr/>';
		
		echo form_checkbox('edit', '1', $edit);
		echo form_label('Pemitir Edição', 'edit_label');
		echo '<br/>';
		
		echo form_checkbox('delete', '1', $delete);
		echo form_label('Permitir Deletar', 'delete_label');
		echo '<br/>';
					
		echo '<br/>';
		//echo form_submit('save', 'Salvar Permissões');
		echo "<button class=\"btn btn btn-primary\" value=\"Submit\"  name=\"save\" type=\"submit\">Salvar Permissões</button>";
		
		echo '<br/>';
		
		echo 'Open '.anchor('auth/custom_permissions/').'Para ver o resultado, tento fazer o login usando o usuário que você mudou.<br/>';
		echo 'Se você mudar o seu próprio papel, você precisa relogar para ver as mudanças de resultado..';
		
		echo form_close();
			
	?>
	</body>
</html>