                <h2 class="sub-header">Editing Post - <?php echo $event; ?> - <?php echo '#' . $id; ?></h2>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                
                <div>
                    <?php echo form_open('home/update_event') ?>

                        <?php echo form_hidden('id', $id); ?>

                        <p><input class="form-control limit-width" type="input" name="event" value="<?php echo $event; ?>" placeholder="Event Title" /></p>
                        <p><input class="form-control limit-width" type="input" id="datepicker" name="date" value="<?php echo $date; ?>" placeholder="Event Date" /></p>
                        <p><input class="form-control limit-width" type="input" name="time" value="<?php echo $time; ?>" placeholder="Event Time" /></p>
                        <p><input class="button" type="submit" name="submit" value="Create event entry" /></p>
                    </form>
                </div>

                <hr>
