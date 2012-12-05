<style>
.error{
    color:red;
}
</style>

<div id="conteudo_meio">
	<?php echo validation_errors() ?><br />
  
  <form class="form-horizontal" method="POST" action="<?php echo base_url().'usuario/' ?>">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Cadastro de Usuários</legend>
      </div>
      <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Nome</label>
          <div class="controls">
            <input type="text" name="usu_nome"  placeholder="Nome" class="input-xlarge" value="<?=set_value('usu_nome') ?>">
            <p class="help-block">Informe um nome</p>
          </div>
        </div>
        <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Apelido</label>
          <div class="controls">
            <input type="text" placeholder="Apelido" name="username" size="40" value="<?=set_value('username') ?>" class="input-xlarge">
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
                echo "<option value=".$v->id.">".$v->name."</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <!-- Form Actions -->
            <div class="form-actions">
              <input type="hidden" name="usu_status" value="1"/>
              <button type="submit" value="Submit" name="submit" class="btn btn-primary">Enviar</button>
              <button type="button" class="btn">Cancelar</button>
            </div>
        </div>
    </fieldset>
  </form>
</div>
  
