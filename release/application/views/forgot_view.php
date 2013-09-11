
        <section class="login">
            <article>
                <header>
                    <hr>
                    <h1>Reset your password</h1>
                </header>
                <div class="error">
                    <?php echo validation_errors(); ?>
                </div>

				<?php echo form_open('forgotpassword') ?>
                    <input type="input" id="username" name="username" placeholder="Username" /><br />

                    <input type="input" id="security" name="security" placeholder="Security Code" /><br />

                    <input type="password" id="passowrd" name="password" placeholder="New Password" /><br />

                    <input type="password" id="confirmpassowrd" name="confirmpassowrd" placeholder="Confirm New Password" /><br />

					<input class="button" type="submit" name="submit" value="Reset Password" />
				</form>

                <hr>
                <footer>
                    <p><a href="<?php echo base_url(); ?>index.php/login">Back to login</a></p>
                </footer>
            </article>
        </section>