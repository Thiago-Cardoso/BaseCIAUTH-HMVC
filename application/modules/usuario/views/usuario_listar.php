<div class="btn-toolbar">
    <a href="<?php echo base_url(); ?>usuario"><button class="btn btn-primary">Novo Usuário</button></a>
</div>
<?php
  echo "<div class=\"well\">";
		echo "<table  class=\"table\">";
                 echo "<thead>";
                         echo "<tr>";
                         echo "<th>";
                                echo "Nome:";
                      echo "</th>";
                       echo "<th>";
                                echo "Grupo:";
                      echo "</th>";
                     echo "<th>";
                                echo "Apelido:";
                      echo "</th>";
                      echo "<th style=\"width: 36px;\"></th>";
                      echo "</tr>";
             echo "</thead>";		
             echo "<tbody>";	 
		      foreach($usuario as $k => $v){
            ?>
             <?php
              echo "<tr>";
              	echo "<td>";
                        echo '<a href="'.base_url().'usuario/sel/'.$v->id_usuario.'">'.$v->usu_nome.'</a>';
                   echo "</td>";
                  	echo "<td>";
                        echo '<a href="'.base_url().'usuario/sel/'.$v->id_usuario.'">'.$v->name.'</a>';
                   echo "</td>";
                   	echo "<td>";
                        echo '<a href="'.base_url().'usuario/sel/'.$v->id_usuario.'">'.$v->username.'</a>';
                   echo "</td>";
    				 	echo "<td>";
                             echo '<a href="'.base_url().'usuario/alt/'.$v->id_usuario.'" class="btn"><i class="icon-edit"></i> 
                             <strong>Editar</strong></a>';
                  echo "</td>";
    				   echo "<td>";
                           //echo"<a href=\"#\" onclick=\"javascript:Exclui('".$v->id_usuario."');\" style=\'float: left;\'  title=\"Excluir\">";
                           //  echo '<img src="'.base_url().'img/delete.png"/>';
                             echo "<a href=\"#myModal\" role=\"button\" data-toggle=\"modal\"><i class=\"icon-remove\"></i></a>";
                    echo"</td>";
    		  echo "</tr>";
				  } 
            echo "</tbody>";
            echo "</table>";
	echo "</div>";
?>
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmação</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>
<!--<a href="#" class="btn"><i class="icon-edit"></i> <strong>Editar</strong></a>
<a href="#" class="btn"><i class="icon-trash"></i> <strong>Delete</strong></a>
<a href="#" class="btn"><i class="icon-align-justify"></i> <strong>Listar</strong></a>-->