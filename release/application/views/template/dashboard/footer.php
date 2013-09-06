        
        <footer>
            <p>Page rendered in {elapsed_time} seconds.</p>
            <p><small>Script memory usage {memory_usage}</small></p>
            <p><small>DigitalSignage v0.2</small></p>
        </footer>

        <script>
		$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		</script>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>
    </body>
</html>
