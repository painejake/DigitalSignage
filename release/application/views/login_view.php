
<h3>Login to dashboard</h3>

<div>
	<div><?php echo validation_errors(); ?></div>
	
    <?php echo form_open('verifylogin') ?>
		<input type="input" id="username" name="username" placeholder="Username" /><br />

        <input type="password" id="passowrd" name="password" placeholder="Password" /><br />

		<input class="button" type="submit" name="submit" value="Login" />
	</form>
</div>
