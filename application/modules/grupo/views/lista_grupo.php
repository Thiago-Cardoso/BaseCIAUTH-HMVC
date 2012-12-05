<script language="javascript"><!--
	function Exclui(id){
		var c = confirm("Tem certeza que deseja excluir este registro?");
		if(c === true){
			window.location = "grupo/remover/"+id;
		}else{
			return false;
		}
	}
--></script>
	<div id="conteudo_meio">

<?php echo validation_errors() ?><br />
  <form class="form-horizontal" method="POST" action="<?php echo base_url().'grupo/cadastrar' ?>">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Cadastro de Grupo</legend>
      </div>
   	   <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="input01">Grupo</label>
          <div class="controls">
            <input type="text" placeholder="Grupo" name="name" value="<?php echo set_value('name'); ?>" class="input-xlarge">
            <p class="help-block">Informe o seu Grupo</p>
          </div>
        </div>

    <div class="control-group">
          <!-- Form Actions -->
            <div class="form-actions">
              <button type="submit" name="Enviar" value="Salvar" class="btn btn-primary">Enviar</button>
              <button type="button" class="btn">Cancel</button>
            </div>
        </div>
    </fieldset>
  </form>
</div>
    <?php include 'grupo_listar.php' ?>
			
