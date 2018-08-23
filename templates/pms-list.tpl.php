<?php //dsm($rows['#rows'], '$rows'); ?>

<?php if (!empty($rows['#rows'])): ?>
    <ul class="list-layout">
        <?php foreach ($rows['#rows'] as $thread => $row) : ?>
            <li id="thread-<?php print $row['thread'] ?>" class="thread">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 thread-author">
                        <div class="row row-table">
                            <div class="thread-avatar col-md-5">
                                <a class="" href="/user/<?php print $row['uid']; ?>">
                                    <div class="thread-avatar-container">
                                        <?php print $row['avatar']; ?>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-7 thread-name text-truncate">
                                <div class="name"><?php print $row['name']; ?></div>
                                <div class="last-updated"><?php print $row['last_updated']; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-8 col-sm-5 col-md-5 col-lg-5 thread-body">
                        <a href="/messages/view/<?php print $row['thread'] ?>"
                           class="thread-link link-reset <?php $row['is_new'] ? print 'thread-unread' : print 'text-muted' ?>">
                            <span class="thread-subject"><?php print $row['message_body']; ?></span>
                            <div class="thread__listing text-muted show-lg"><?php print $row['message_subject']; ?></div>
                        </a>
                    </div>
                    <div class="col-xs-1 col-sm-4 col-md-4 col-lg-4 thread-label">
                        <div class="row">
                            <div class="hidden-xs col-sm-12 col-md-5"><span tabindex="0"><span
                                            class="thread-status"
                                            id="thread-status">Отправлено
                                        <?php print render($row['tags']); ?></span></span>
                            </div>
                            <div class="col-sm-6 col-md-7 options hide-sm">
                                <div class="thread-action thread-action-star">
                                    <?php print render($row['favorite']); ?>
                                </div>
                                <div class="thread-action thread-action-archive">
                                    <?php print render($row['archive']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4 text-center space-8 space-top-8">
                <h3><span>Сообщений пока нет.</span></h3>
                <p class="text-lead text-muted">
                    <span>Когда вы составляете план поездки, читайте ответы хозяина здесь.</span>
                </p>
                <a href="/" class="btn btn-primary btn-large">
                    <span>Открывайте новые объявления</span></a>
            </div>
        </div>
<?php endif; ?>