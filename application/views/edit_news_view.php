                <h2 class="sub-header">Editing Post - <?php echo $title; ?></h2>
                <div>
                    <?php echo form_open('home/create_events') ?>

                        <p><input class="form-control" type="input" name="title" value="<?php echo $title; ?>" placeholder="News Title" /></p>
                        <p><textarea class="form-control" rows="15" name="content" value="" placeholder="News Content"><?php echo $content; ?></textarea></p>
                        <p><input class="form-control" type="input" name="author" value="<?php echo $author; ?>" placeholder="Post Author" /></p>
                        <p><input class="button" type="submit" name="submit" value="Create news entry" /></p>
                    </form>
                </div>

                <hr>
