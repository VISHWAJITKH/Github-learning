<?php include('header.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function(){
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	
</script>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('admin/addarticle') ?>"><div class="btn btn-lg btn-primary">Add Article</div></a>
		</div>
		<div class="col-md-6 form-group">
			<form action="" class="forminline row">
				<input class="form-control col-md-8 mr-2" type="search" placeholder="Search" aria-label="Search" id="myInput">
					<button class="btn btn-outline-success col-md-2" type="submit">Search</button>
			</form>
		</div>
	</div><hr>
	<div class="row">
		<?php if($this->session->flashdata('articlestatus')): ?>
			<?php $msg_class = $this->session->flashdata('articlestatus_class'); ?>
		<div class="col-md-12">
			<div class="alert <?= $msg_class; ?>">
				<?= $this->session->flashdata('articlestatus'); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Article Title</th>
				<th>Article Image</th>
				<th>Posted on</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($articles)): ?>
			<?php $id = $this->uri->segment(3); foreach($articles as $art): ?>
			<tr>
				<td><?= ++$id ?></td>
				<td><?= $art->article_title; ?></td>
				<td>
					<?php if($art->article_image!=''): ?>
						<img src="<?= $art->article_image; ?>" alt="" height="50" width="50" >
					<?php else : ?>
						<img src="<?= base_url('uploads/blank.jpg') ?>" alt="" height="50" width="50" >
					<?php endif; ?>
				
					
				</td>
				<td><?= date('d M y H:i:s', strtotime($art->created_at)) ?></td>
				<td>
					<?= anchor("admin/edituser/{$art->id}", 'Edit', ['class'=>'btn btn-primary']); ?>
				</td>
				<td>
					<?= form_open('admin/delarticle'),
						form_hidden('id', $art->id),
						form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger']),
						form_close();
					 ?>
					
				</td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="4">
						No Data Available !
					</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>

	<?php echo $this->pagination->create_links(); ?>
</div>

<?php include('footer.php'); ?>