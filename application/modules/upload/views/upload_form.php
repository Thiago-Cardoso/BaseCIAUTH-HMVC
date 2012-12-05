<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

	  <?php echo form_open_multipart('upload/do_upload');?>
        <?php 
        for ($i = 1; $i <=1; $i++): ?>
                <div class="form_element">
                    <label for="photo<?=$i?>">File <?=$i?></label>
                    <?=form_upload(array('name'     => 'userfile'.$i,
					'size' => '36'))?>
                </div>
        <?php endfor ?><br />
        <input type="submit" value="Upload" name="go_upload"/>
	</form>


