
                <h2 class="sub-header">Login</h2>
                <div>

                <div class="text-danger"><?php echo validation_errors(); ?></div>

                <?php echo form_open('verifylogin') ?>
                    <input class="form-control limit-width" type="input" id="username" name="username" placeholder="Username" /><br />

                    <input class="form-control limit-width" type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

                    <input class="button" type="submit" name="submit" value="Login" />
                </form>

                <hr>

                <footer>
                    <p><a href="<?php echo base_url(); ?>index.php/forgot">Forgot your password?</a></p>
                </footer>

                <hr>

        </div>