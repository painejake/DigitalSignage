
        <section class="login">
            <article>
                <header>
                    <hr>
                    <h1>Reset your password</h1>
                </header>
                <div class="error">
                    <?php echo validation_errors(); ?>
                </div>

				<?php echo form_open('verifylogin') ?>
                    <input type="input" id="username" name="username" placeholder="Username" /><br />

					<input type="input" id="email" name="email" placeholder="Email" /><br />

                    <input type="password" id="passowrd" name="password" placeholder="New Password" /><br />

                    <input type="password" id="passowrd" name="password" placeholder="Confirm New Password" /><br />

					<input class="button" type="submit" name="submit" value="Login" />
				</form>

                <hr>
                <footer>
                    <p><a href="<?php echo base_url(); ?>index.php/login">Back to login</a></p>
                </footer>
            </article>
        </section>