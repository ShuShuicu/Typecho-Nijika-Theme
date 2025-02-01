<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div id="comments">
    <a-card title="共有 <?php GetComments::CommentsNum(); ?> 条评论" style="margin-top: 10px;">
        <?php $this->comments()->to($comments); ?>

        <?php if ($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
                <div class="cancel-comment-reply">
                    <?php $comments->cancelReply(); ?>
                </div>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" novalidate>
                    <?php if ($this->user->hasLogin()) { ?>
                    <?php } else { ?>
                        <a-input placeholder="名称" allow-clear type="text" name="author" class="text" value="<?php $this->remember('author'); ?>"></a-input>
                        <a-input placeholder="邮箱" allow-clear type="text" name="main" class="text" value="<?php $this->remember('mail'); ?>" style="margin-top: 10px;margin-bottom: 10px;"></a-input>
                    <?php } ?>
                    <a-textarea name="text" placeholder="万水千山总是情，评论一句行不行~" allow-clear><?php $this->remember('text'); ?></a-textarea>
                    <div style="text-align: right;">
                    <a-button type="primary" html-type="submit" style="margin-top: 10px;">提交评论</a-button>
                    </div>
                </form>

            <?php else: ?>
                <h3><?php _e('评论已关闭'); ?></h3>
            <?php endif; ?>
            </div>
            <?php if ($comments->have()): ?>
                <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
                <?php $comments->listComments(); ?>
            <?php endif; ?>
    </a-card>
</div>