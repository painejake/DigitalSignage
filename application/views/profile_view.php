<?php

$username = $userdata['user_name'];

$this->db->select('email');
$this->db->where('username', $username); 

$s_q = $this->db->get('users');

foreach ($s_q->result() as $row) {
   $email = $row->email;
}

?>

                <h2 class="sub-header">Profile Managment <small>- <?php echo $username; ?></small></h2>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div>
                    <?php echo form_open('profile/manage') ?>

                        <p>Update email:<br />
                        <input class="form-control limit-width" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" /></p>
                        <p>Change password:<br />
                        <input class="form-control limit-width" type="password" name="password" value="" placeholder="Password" /></p>
                        <p><input class="form-control limit-width" type="password" name="confirm_password" value="" placeholder="Confirm Password" /></p>

                        <p><input class="button" type="submit" name="submit" value="Update Profile" /></p>
                    </form
>                </div>

                <hr>
