<div id="conteudo_meio">
	  <?php echo validation_errors() ?>
	<form class="form-horizontal" method="POST" action="<?php echo base_url().'usuario/editar'.$usuario->id_usuario ?>">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Alteração de Usuário</legend>
      </div>
      <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Nome</label>
          <div class="controls">
            <input type="text" name="usu_nome"  placeholder="Nome" class="input-xlarge" value="<?= $usuario->usu_nome ?>">
            <p class="help-block">Informe um nome</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Apelido</label>
          <div class="controls">
            <input type="text" placeholder="Apelido" name="username" size="40" value="<?=$usuario->username ?>" class="input-xlarge">
            <p class="help-block">Informe um Apelido</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Senha</label>
          <div class="controls">
            <input type="text" placeholder="Senha" name="password" value="<?=set_value('password') ?>" class="input-xlarge">
            <p class="help-block">Informa sua senha</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Select Basic -->
          <label class="control-label">Selecione o Grupo</label>
          <div class="controls">
            <select name="group_id" class="input-xlarge">
           	 <?php
					   foreach($grupo as $k => $v){
				      ?>
						 <option value="<?php echo $v->id ?>" <?php if($grup->id == $v->id) echo " selected"; ?>><?php echo $v->name ?></option>
  					<?php
  						}
  					?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <!-- Form Actions -->
            <div class="form-actions">
              <button type="submit" value="Submit" value="alterar" name="Alterar" class="btn btn-primary">Alterar</button>
              <button type="button" class="btn">Cancelar</button>
            </div>
        </div>
    </fieldset>
  </form>
  <form class="form-horizontal">
     <fieldset>
    <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success">Voltar</button>
          </div>
        </div>
    </fieldset>
  </form>
</div>
		


		
