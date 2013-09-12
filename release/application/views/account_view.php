
        <section class="wrap">
            <hr>
            <div class="span1">
                <h1>Create an Account</h1>
                <?php echo form_open('verifylogin') ?>
                    <input type="input" autocomplete="off" id="username" name="username" placeholder="Username" /><br />

                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Confirm Password" /><br />

                    <input type="input" autocomplete="off" id="email" name="email" placeholder="Email Address" /><br />

                    <input type="input" autocomplete="off" id="security" name="security" placeholder="Security Code" /><br />

                    <input class="button" type="submit" name="submit" value="Create Account" />
                </form>
            </div>

            <div class="span2">
                <h1>Change Password</h1>
                <?php echo form_open('verifylogin') ?>
                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Confirm Password" /><br />

                    <input class="button" type="submit" name="submit" value="Change Password" />
                </form>
            </div>

            <hr>
                <h1>Manage Users</h1>
                <ol>
                    <li>admin - admin@fairfax.bham.sch.uk - Delete</li>
                    <li>jpaine - j.paine@fairfax.bham.sch.uk - Delete</li>
                    <li>lsmart - l.smart@fairfax.bham.sch.uk - Delete</li>
                </ol>
            <hr>
        </section>