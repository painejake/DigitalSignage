
        <section class="login">
            <article>
                <header>
                    <hr>
                    <h1>Digital signage dashboard</h1>
                </header>
                <div class="error">
                    <?php echo validation_errors(); ?>
                </div>

				<?php echo form_open('verifylogin') ?>
					<input type="input" id="username" name="username" placeholder="Username" /><br />

				    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

					<input class="button" type="submit" name="submit" value="Login" />
				</form>

                <hr>
                <footer>
                    <p><a href="<?php echo base_url(); ?>index.php/forgot">Forgot your password?</a></p>
                </footer>
            </article>
        </section>