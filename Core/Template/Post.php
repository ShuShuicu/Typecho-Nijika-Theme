<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<a-row>
    <?php
    PostComment();
    PostSidebar();
    ?>
</a-row>
<?php
function PostComment()
{
?>
    <a-col :xs="24" :sm="24" :md="24" :lg="18" :xl="18" :xxl="18" style="margin-right: 10px;margin-bottom: 10px;">
        <a-card title="<?php GetPost::Title(); ?>">
            <template #extra>
                <a-link><?php GetPost::Date(); ?></a-link>
            </template>
            <div class="Nijika-typo">
                <?php GetPost::Content(); ?>
            </div>
            <a-alert style="margin-top: 20px;"><?php echo Get::Options('postCopyright') ? Get::Options('postCopyright') : '资源均来自互联网收集，如有侵权请与站长联系。' ?></a-alert>
        </a-card>
        <?php Nijika::GetTemplate('Comments') ?>
    </a-col>
<?php
}
function PostSidebar()
{
    require_once 'Sidebar.php';
}
?>