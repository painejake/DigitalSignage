<?php var_dump($userdata); ?>
                <h2 class="sub-header">Profile Managment - <?php echo $userdata['user_name']; ?></h2>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div>
                    <?php echo form_open('profile/manage') ?>

                        <p>Update email:<br />
                        <input class="form-control limit-width" type="email" name="email" value="" placeholder="Email" /></p>
                        <p>Change password:<br />
                        <input class="form-control limit-width" type="password" name="password" value="" placeholder="Password" /></p>
                        <p><input class="form-control limit-width" type="password" name="confirm_password" value="" placeholder="Confirm Password" /></p>

                        <p><input class="button" type="submit" name="submit" value="Update Profile" /></p>
                    </form>
                </div>

                <hr>
