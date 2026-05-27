<style>
     body {
    background-image: url(https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YnVzfGVufDB8fDB8fHww);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;    
    background-position: center;
    background-size: cover;

}
</style>
<?php
include('db_connect.php');
if(isset($_GET['id']) && !empty($_GET['id']) ){
	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
}
?>
<div class="container-fluid">
	<form id="manage_user">
		<div class="col-md-12">
			<div class="form-group mb-2">
				<label for="name" class="control-label">Name</label>
				<input type="hidden" class="form-control" id="id" name="id" value='<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>' required="">
				<input type="text" class="form-control" id="name" name="name" required="" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="username" class="control-label">User Name</label>
				<input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($meta['password']) ? $meta['password'] : '' ?>">
			</div>
		</div>
	</form>
</div>
<script>
	$('#manage_user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'./save_user.php',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
    			end_load()
    			alert_toast('An error occured','danger');
			},
			success:function(resp){
				if(resp == 1){
    				end_load()
    				$('.modal').modal('hide')
    				alert_toast('Data successfully saved','success');
    				load_user()
				}
			}
		})
	})
</script>