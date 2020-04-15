<?php include('header.php'); ?>

<div class="container mt-3">
	<div class="row">
		<h1>Dynamic Dependent Dropdown</h1>
		<div class="col-md-6">
			<form>
			  <fieldset>
			    <legend>Country-State-City</legend>
			    <div class="form-group">
				    <label for="country">Country</label>
				    <select class="form-control" id="country" name="country">
				        <option value="">Select Country</option>
				        <?php foreach($country as $data): ?>
				        	<option value ="<?= $data->country_id ?>"><?= $data->country_name ?></option>
				    	<?php endforeach; ?>
				    </select>
			    </div>
			    <div class="form-group">
				    <label for="state">State</label>
				    <select class="form-control" id="state" name="state">
				        <option value="">Select Stat</option>
				        
				    </select>
			    </div>
			    <div class="form-group">
				    <label for="city">City</label>
				    <select class="form-control" id="city" name="city">
				        <option value="">Select Cit</option>
				    </select>
			    </div>

			    <fieldset class="form-group">
			      
			    	<button type="submit" class="btn btn-primary">Submit</button>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#country').change(function() {
			var country_id = $('#country').val();
// alert(country_id); exit;
			if (country_id != "") {
				$.ajax({
					url:"<?php echo base_url(); ?>Dynamic_dependent/fetch_state",
					type:'POST',
					data:'country_id='+country_id,
					success: function(data){
						$('#state').html(data);
						$('#city').html('<option value="">Select City</option>');
					}
				});
			}
			else{
				$('#state').html('<option value = "">Select State</option>');
				$('#city').html('<option value = "">Select City</option>');
			}
		});

		$('#state').change(function() {
			var state_id = $('#state').val();
// alert(state_id); exit;
			if (state_id != "") {
				$.ajax({
					url:"<?php echo base_url(); ?>Dynamic_dependent/fetch_city",
					type:'POST',
					data:'state_id='+state_id,
					success: function(data){
						$('#city').html(data);
						// $('#city').html('<option value="">Select City</option>');
					}
				});
			}
			else{
				// $('#state').html('<option value = "">Select State</option>');
				$('#city').html('<option value = "">Select City</option>');
			}
		});
	});

</script>
<?php include('footer.php'); ?>