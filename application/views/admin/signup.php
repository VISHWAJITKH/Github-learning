<?php include('header.php'); ?>

<div class="container">
	<h1 class="m-5">Admin Signup</h1>
	<div class="row">
		<?php if($this->session->flashdata('userregistered')): ?>
			<?php $msg_class = $this->session->flashdata('userregistered_class'); ?>
		<div class="col-md-7">
			<div class="alert <?= $msg_class; ?>">
				<?= $this->session->flashdata('userregistered'); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?= form_open('admin/register'); ?>
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
		    <div class="form-group row">
		      <label for="firstname" class="col-sm-2 col-form-label">Firstname :</label>
		      <div class="col-sm-5">
		        <?= form_input(['class'=>'form-control', 'placeholder'=>'Enter firstname', 'name'=>'firstname', 'value'=>set_value('firstname')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('firstname'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="lastname" class="col-sm-2 col-form-label">Lastname :</label>
		      <div class="col-sm-5">
		        <?= form_input(['class'=>'form-control', 'placeholder'=>'Enter lastname', 'name'=>'lastname', 'value'=>set_value('lastname')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('lastname'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="email" class="col-sm-2 col-form-label">Email :</label>
		      <div class="col-sm-5">
		        <?= form_input(['type'=>'email','class'=>'form-control', 'placeholder'=>'Enter Email Id', 'name'=>'email', 'value'=>set_value('email')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('email'); ?>
		      </div>
		    </div>
		    
		    <?= form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Register']) ?>
		    <?= form_reset(['type'=>'reset', 'class'=>'btn btn-secondary', 'value'=>'reset']) ?>
	  </fieldset>
	</form>
</div>

<?php include('footer.php'); ?>