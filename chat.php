<?php require "head.php"; 
	include 'config.php';
	$fd_name = $_REQUEST['page'];
	$fd_sql = "SELECT name FROM user WHERE user_id={$fd_name}" or die('Failed');
	$fd_result = mysqli_query($connection, $fd_sql);

	while($fd_info = mysqli_fetch_assoc($fd_result)){

?>
<style type="text/css">
 	.chat{
		background: white;
	}
	.mode{
		position: absolute;
		top: 20px;
		right: 20%;
		background: black !important;
	}
	.dark-mood{
		background: black !important;
	}
 </style>
<br><div class="empty alert-danger mt-5 text-center"></div>
		<br><br><br>

		<div class="container">
			<div class="mode btn btn-dark">Dark mode</div>
			<div class="row py-4 px-3">
				<div class="col-4"><a href="profile.php"><button class="btn btn-danger">Back</button></a></div>
				<div class="col-4 text-center"><h2><?php echo 'Chat with: '.$fd_info['name']; ?></h2></div>
				<div class="col-4 text-end"><h4><?php session_start(); $name= $_SESSION['name']; echo 'You:' .$name; ?></h4></div>

			</div>
		</div>
		<?php } ?>
	<div class="container form mt-5 d-flex justify-content-center align-items-center bg-secondary sticky-top top-0">
		<form class="input-submit d-flex align-items-center w-100">
			<input class="hidden_input" id="<?php echo $_REQUEST['page']; ?>" type="hidden" name="uid" value="<?php echo $_REQUEST['page']; ?>">
			<input id="user-one-input" type="text" style="width: 100%; height: 60px;">
			<input type="submit" class="btn btn btn-success ms-3 py-3 px-5" name="submit" id="submit" value="Send">
		</form>
	</div>
	<br><br>
	<div class="container chat overflow-scroll" style="height: 90vh;">
		<div class="row">
			<div class="messege" style="padding: 2rem;">
				
			</div>
		</div>
	</div>
	
	

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var uid = $('.hidden_input').val();
		// LoadTable 
		function loadTable(uid){
			var uid = $('.hidden_input').val();

			$.ajax({
				url : "ajax/message-ajax.php",
		 		type: "POST",
		 		data:{uid:uid},
				success: function(data){
					$(".messege").html(data);
				}
			})
		}

		// send messege
		$('#submit').on("click",function(e){
			e.preventDefault();
			var input_val = $('#user-one-input').val();
			
			if(input_val !== ""){
				$.ajax({
					url : "ajax/index-ajax.php",
					type: "POST",
					data:{val:input_val,uid:uid},
					success: function(data){
						if(data == 1){
							// $('.hidden_input').val(uid);
							$('.input-submit').trigger("reset");
							loadTable(uid);
						}
					
					}
				})
			}else{
				$('.empty').html('<h1> No message inserted!</h1>');
				$('.empty').attr('style','padding:5px');
			}
		});
		setInterval(loadTable,500);

		$(".mode").on('click', function(){
			$('.chat').toggleClass('dark-mood');

		});
		
	}); //jquery
</script>

<?php require "footer.php"; ?>
