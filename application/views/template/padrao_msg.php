
<?php if($this->session->flashdata('msg_erro') || $this->session->flashdata('msg_info')): ?>
    <?php if($this->session->flashdata('msg_erro')): #Mensagem ÚNICA de Alerta ?>
    <div class="ui-widget">
        <div class="ui-state-error ui-corner-all">
            <p><span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong> <?php echo $this->session->flashdata('msg_erro');?></p>
        </div>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('msg_info')): #Mensagem ÚNICA de Informação?>
    <div class="ui-widget">
        <div class="ui-state-highlight ui-corner-all">
            <p><span class="ui-icon ui-icon-info"></span>
            <strong>Olá!</strong> <?php echo $this->session->flashdata('msg_info');?></p>
        </div>
    </div>
    <?php endif; ?>
<?php elseif($msg_erro || $msg_info): ?>

    <?php if($msg_erro): #Mensagem ÚNICA de Alerta ?>
    <div class="ui-widget">
        <?php echo $msg_erro;?>
    </div>
    <?php endif; ?>

    <?php if($msg_info): #Mensagem ÚNICA de Informação?>
    <div class="ui-widget">
        <div class="ui-state-highlight ui-corner-all">
            <p><span class="ui-icon ui-icon-info"></span>
            <strong>Olá!</strong> <?php echo $msg_info;?></p>
        </div>
        
    </div>
    <?php endif; ?>
<?php elseif($msg): ?>
<div class="ui-widget">
        <div class="ui-state-error ui-corner-all">
            <p><span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong> <?php echo $msg;?></p>
        </div>
</div>
<?php endif; ?>


