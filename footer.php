<br/>
<br/>
<footer class="mt-5">
	<div class="navbar-light bg-light py-3">
		<center>
			<p class="text-muted text-center m-0" style="font-size: 11pt;font-weight: bold">
				<b>Website Forum</b>
			</p>
		</center>
	</div>

</footer>

<script src="assets_forum/assets/vendor/jquery/jquery.min.js"></script>
<script src="assets_forum/assets/vendor/popper/popper.min.js"></script>
<script src="assets_forum/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="assets_forum/assets/vendor/headroom/headroom.min.js"></script>
<script src="assets_forum/assets/js/argon.js?v=1.1.0"></script>

<link rel="stylesheet" href="assets_forum/summernote2/summernote-bs4.css">
<script src="assets_forum/summernote2/summernote-bs4.js"></script>


<script>
	$(document).ready(function(){

		$('#editor_forum').summernote({
			height:'250px',
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
					console.log(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});

		function uploadImage(image) {
			var data = new FormData();
			data.append("file", image);
			$.ajax({
				url: 'summernote_upload.php',
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "post",
				success: function(url) {
					var image = $('<img>').attr('src', 'http://' + url);
					$('#editor_forum').summernote("insertNode", image[0]);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {src : src},
				type: "POST",
				url: "summernote_delete.php",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}


	});

</script>
</body>

</html>