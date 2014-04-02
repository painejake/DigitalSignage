                <h2 class="sub-header">Create a News Post</h2>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div>
                    <?php echo form_open('home/create_news') ?>

                        <p><input class="form-control" type="input" name="title" value="<?php echo set_value('title'); ?>" placeholder="News Title" /></p>

                        <div class="btn-toolbar editor" role="toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-bold"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-italic"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-link"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-align-left"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-align-center"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-align-right"></span></button>
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-align-justify"></span></button>
                            </div>
                        </div>

                        <p><textarea class="form-control" rows="15" name="content" value="<?php echo set_value('content'); ?>" placeholder="News Content"></textarea></p>
                        <p><input class="form-control" type="input" name="author" value="<?php echo set_value('author'); ?>" placeholder="Post Author" /></p>
                        <p><input class="button" type="submit" name="submit" value="Create news entry" /></p>
                    </form>
                </div>

                <hr>
