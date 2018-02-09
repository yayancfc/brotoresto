

        <div class="toast">
        	<p id="bayar"></p>
        </div>

        <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/scrollbar.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/meja_makan.js') ?> " type="text/javascript"></script>

        <script type="text/javascript">
			$(document).ready(function() {
				
				(function () {
					setInterval(function () {
					var cekData = localStorage.getItem('no_meja');
					if (cekData) {
						$("#bayar").text('Nomor Meja : ' + cekData + ' Meminta Bill');
						$('.toast').css({visibility: 'visible', opacity: 1});
						localStorage.removeItem('no_meja');
					} else{
						$('.toast').css({visibility: 'hidden', opacity: 0});
					}
				},5000)
					
				}());        		
			});        	
        </script>
    </body>
</html>
