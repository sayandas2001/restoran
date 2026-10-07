
<footer>
	<div class="footer-area">
		
	</div>
</footer>

</div>

<?php $this->load->view('admin/include/footer_js'); ?>
<script>
	$(document).ready(function(){
		$('.bannerdel_confirmation').on('click',function(){
			return banner_delete();
		});
	});
	function banner_delete() {
		return confirm("Are you sure you want to delete?")
	}
</script>
</body>

</html>