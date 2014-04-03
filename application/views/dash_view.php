                <?php
                if($this->session->flashdata('msg')) {
                    echo '<div class="alert alert-success">' . $this->session->flashdata('msg') . '</div>';
                    } ?>

                <h2 class="sub-header">News Items</h2>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Date Posted</th>
                                <th>Author</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news as $news_item): ?><tr>
                                <td><?php echo $news_item['id'] ?></td>
                                <td><?php echo $news_item['title'] ?></td>
                                <td><?php echo substr ($news_item['content'] , 0, 50) . "..." ?></td>
                                <td><?php echo $news_item['date'] ?></td>
                                <td><?php echo $news_item['author'] ?></td>
                                <td>
                                    <a href="home/edit_news/<?php echo $news_item['id'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="home/delete_news/<?php echo $news_item['id'] ?>" onclick="return confirm('Are you sure you wish to delete this post?');">
                                        <button type="button" class="btn btn-primary btn-sm">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <h2 class="sub-header">Event Items</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Event Date</th>
                                <th>Time</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $events_item): ?><tr>
                                <td><?php echo $events_item['id'] ?></td>
                                <td><?php echo $events_item['event'] ?></td>
                                <td><?php echo $events_item['date'] ?></td>
                                <td><?php echo $events_item['time'] ?></td>
                                <td>
                                    <a href="home/edit_event/<?php echo $events_item['id'] ?>">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="home/delete_dates/<?php echo $events_item['id'] ?>" onclick="return confirm('Are you sure you wish to delete this event?');">
                                        <button type="button" class="btn btn-primary btn-sm">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <hr>