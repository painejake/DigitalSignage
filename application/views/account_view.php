
        <section class="wrap">
            <hr>
            <div class="span1">
                <h1>Update Password</h1>
                <?php echo form_open('verifylogin') ?>
                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Confirm Password" /><br />

                    <input class="button" type="submit" name="submit" value="Change Password" />
                </form>
                </form>
            </div>

            <div class="span2">
                <h1>Update Security Code</h1>
                <?php echo form_open('verifylogin') ?>
                    <input type="password" autocomplete="off" id="security" name="security" placeholder="Security Code" /><br />

                    <input type="password" autocomplete="off" id="securityconfirm" name="securityconfirm" placeholder="Confirm Security Code" /><br />

                    <input class="button" type="submit" name="submit" value="Change Security Code" />
                </form>
            </div>

            <hr>
                <h1>Manage Users</h1>
                <ol>
                    <li>admin - admin@fairfax.bham.sch.uk - Delete Account</li>
                    <li>jpaine - j.paine@fairfax.bham.sch.uk - Delete Account</li>
                    <li>lsmart - l.smart@fairfax.bham.sch.uk - Delete Account</li>
                </ol>
            <hr>
        </section>