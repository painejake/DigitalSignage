                <h2 class="sub-header">Editing Post - <?php echo $title; ?> - <?php echo '#' . $id; ?></h2>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                
                <div>
                    <?php echo form_open('home/update_news') ?>

                        <?php echo form_hidden('id', $id); ?>

                        <p><input class="form-control" type="input" name="title" value="<?php echo $title; ?>" placeholder="News Title" /></p>
                        <p><textarea class="form-control" rows="15" name="content" value="" placeholder="News Content"><?php echo $content; ?></textarea></p>
                        <p><input class="form-control" type="input" name="author" value="<?php echo $author; ?>" placeholder="Post Author" readonly></p>
                        <p><input class="button" type="submit" name="submit" value="Update news entry" /></p>
                    </form>
                </div>

                <hr>
