
	<div id="conteudo_meio">
	<form class="form-horizontal" method="POST" action="<?php echo base_url().'grupo/editar/'.$grupo->id ?>">
	    <fieldset>
	      <div id="legend" class="">
	        <legend class="">Alteração de Grupo</legend>
	      </div>
	   	   <div class="control-group">
	          <!-- Text input-->
	          <label class="control-label" for="input01">Grupo</label>
	          <div class="controls">
	            <input type="text" placeholder="Grupo" name="name" value="<?php echo $grupo->name ?>" class="input-xlarge">
	            <p class="help-block">Informe o seu Grupo</p>
	          </div>
	        </div>
	    <div class="control-group">
	          <!-- Form Actions -->
	            <div class="form-actions">
	              <button type="submit" name="Alterar" value="Alterar" class="btn btn-primary">Alterar</button>
	              <button type="button" class="btn">Cancel</button>
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
		


		
