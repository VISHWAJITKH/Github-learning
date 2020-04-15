<?php include('header.php'); ?>

<!-- <div class="container">
	<h1 class="m-5">Admin Form</h1>
	<?= form_open('admin/index'); ?>
		<fieldset>
			<div class="form-group row">
		      <label for="username" class="col-sm-2 col-form-label">Username :</label>
		      <div class="col-sm-5">
		        <?= form_input(['class'=>'form-control', 'placeholder'=>'Enter Username', 'name'=>'uname', 'value'=>set_value('uname')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('uname'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="password" class="col-sm-2 col-form-label">password :</label>
		      <div class="col-sm-5">
		        <?= form_password(['class'=>'form-control', 'type'=>'password', 'placeholder'=>'Enter Password', 'name'=>'pass', 'value'=>set_value('pass')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('pass'); ?>
		      </div>
		    </div>
		    
		    <?= form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'login']) ?>
		    <?= form_reset(['type'=>'reset', 'class'=>'btn btn-secondary', 'value'=>'reset']) ?>
	  </fieldset>
	</form>
</div> -->

<?php include('footer.php'); ?>