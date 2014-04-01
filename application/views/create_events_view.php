                <h2 class="sub-header">Create a News Post</h2>
                <div>
                    <?php echo form_open('home/create_events') ?>

                        <p><input class="form-control limit-width" type="input" name="event" value="<?php echo set_value('title'); ?>" placeholder="Event Title" /></p>
                        <p><input class="form-control limit-width" type="input" id="datepicker" name="date" value="<?php echo set_value('title'); ?>" placeholder="Event Date" /></textarea></p>
                        <p><input class="form-control limit-width" type="input" name="time" value="<?php echo set_value('author'); ?>" placeholder="Event Time" /></p>
                        <p><input class="button" type="submit" name="submit" value="Create event entry" /></p>
                    </form>
                </div>

                <hr>
