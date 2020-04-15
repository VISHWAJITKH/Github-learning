<?php include('header.php'); ?>

<div class="container">
	<h1 class="m-5">Edit Article</h1>
	<?= form_open("admin/editarticle/$records->id"); ?>
		<fieldset>
			<div class="form-group row">
		      <label for="title" class="col-sm-2 col-form-label">Article Title :</label>
		      <div class="col-sm-5">
		        <?= form_input(['class'=>'form-control', 'placeholder'=>'Enter Article Title', 'name'=>'title', 'value'=>set_value('title', $records->article_title)]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('title'); ?>
		      </div>
		    </div>
		    <div class="form-group row">
		      <label for="body" class="col-sm-2 col-form-label">Article Body :</label>
		      <div class="col-sm-5">
		        <?= form_textarea(['class'=>'form-control', 'placeholder'=>'Enter Body', 'name'=>'body', 'value'=>set_value('body', $records->article_body)]) ?>
		      </div>
		      <div class="col-sm-5">
		      	<?= form_error('body'); ?>
		      </div>
		    </div>
		    
		    <?= form_submit(['type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Update']) ?>
		    <?= form_reset(['type'=>'reset', 'class'=>'btn btn-secondary', 'value'=>'reset']) ?>
	  </fieldset>
	</form>
</div>

<?php include('footer.php'); ?>