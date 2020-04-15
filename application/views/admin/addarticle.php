<?php include('header.php'); ?>

<div class="container">
	<h1 class="m-5">Add Article</h1>

	<?= form_open_multipart('admin/insertarticle'); ?>
	<?= form_hidden('id', $this->session->userdata('id')); ?>
	<?= form_hidden('created_at', date("d-m-y H:i:s")); ?>
		<fieldset>
			<div class="form-group row">
		      <label for="title" class="col-sm-2 col-form-label">Article Title :</label>
		      <div class="col-sm-5">
		        <?= form_input(['class'=>'form-control', 'placeholder'=>'Enter Article Title', 'name'=>'title', 'value'=>set_value('title')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('title'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="body" class="col-sm-2 col-form-label">Article Body :</label>
		      <div class="col-sm-5">
		        <?= form_textarea(['class'=>'form-control', 'placeholder'=>'Enter Body', 'name'=>'body', 'value'=>set_value('body')]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('body'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="Image" class="col-sm-2 col-form-label">Select Image :</label>
		      <div class="col-sm-5">
		        <?= form_upload(['class'=>'form-control', 'name'=>'userfile']) ?>
		      </div>
		      <div class="col-sm-5 text-danger">
		      	<?php if(isset($upload_error)){ echo $upload_error; } ?>
		      </div>
		    </div>
		    
		    <?= form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Submit']) ?>
		    <?= form_reset(['type'=>'reset', 'class'=>'btn btn-secondary', 'value'=>'reset']) ?>
	  </fieldset>
	</form>
</div>

<?php include('footer.php'); ?>