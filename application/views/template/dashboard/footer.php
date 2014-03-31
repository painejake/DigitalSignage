        
        <footer>
            <p>Page rendered in {elapsed_time} seconds</p>
            <p><small>Script memory usage {memory_usage}</small></p>
            <?php $version = $this->config->item('version'); ?>
            <p><small><?php echo $version; ?></small></p>
        </footer>

        <script>
		$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		</script>

        <div id="dropdown-1" class="dropdown dropdown-tip">
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>index.php/create">Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/user">Create a User</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/account">Manage Account</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="<?php echo base_url(); ?>index.php/logout">Log Out</a></li>
            </ul>
        </div>

        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dropdown.js"></script>
    </body>
</html>
