
        <section class="login">
            <article>
                <header>
                    <hr>
                    <h1>Create an Account</h1>
                </header>
                <?php echo form_open('createuser') ?>
                    <input type="input" autocomplete="off" id="username" name="username" placeholder="Username" /><br />

                    <input type="password" autocomplete="off" id="passowrd" name="password" placeholder="Password" /><br />

                    <input type="password" autocomplete="off" id="confirmpassowrd" name="password" placeholder="Confirm Password" /><br />

                    <input type="input" autocomplete="off" id="email" name="email" placeholder="Email Address" /><br />

                    <input type="input" autocomplete="off" id="security" name="security" placeholder="Security Code" /><br />

                    <input class="button" type="submit" name="submit" value="Create Account" />
                </form>

                <hr>
            </article>
        </section>