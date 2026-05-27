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
<section id="" class="d-flex align-items-center">
    <div class="container">
    <center>
      <br>
    <h1>Online Bus Reservation System</h1></center>
      <?php if(!isset($_SESSION['login_id'])): ?>
      	<center><button class="btn btn-danger btn-lg" type="button" id="book_now">Reserve Your Tickets Now</button></center>
      <?php else: ?>
        
		<center><br><br><br><h2>Welcome, <?php echo $_SESSION['login_name'] ?></h2></center>
	
      <?php endif; ?>
    </div>
  </section>
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>