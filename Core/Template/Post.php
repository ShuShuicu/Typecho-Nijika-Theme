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
?>
    <a-col :xs="24" :sm="24" :md="24" :lg="5" :xl="5" :xxl="5" id="Sidebar">
        <a-card title="下载信息">
            <a-list style="margin-bottom: 10px;">
                <a-list-item><?php GetPost::Category() ?></a-list-item>
                <a-list-item><?php GetPost::Tags() ?></a-list-item>
                <?php
                $DownloadUrl = Get::Fields('NijikaDownloadUrl');

                // 分行解析
                $Lines = explode("\n", $DownloadUrl);
                foreach ($Lines as $button) {
                    // 正则解析 名称|链接|说明
                    $Text = '';
                    $Link = '';
                    $Info = ''; // 初始化变量，防止未定义

                    if (preg_match('/^(.*?)\|(.*?)\|(.*?)$/', trim($button), $matches)) {
                        $Text = $matches[1]; // 名称
                        $Link = $matches[2]; // 链接
                        $Info = $matches[3]; // 说明
                    }

                    if (!empty($Text) && !empty($Link) && !empty($Info)) { // 确保所有变量都有值
                ?>
                        <a-list-item>
                            <a-trigger position="bottom" auto-fit-position :unmount-on-close="false">
                                <a-link href="<?php echo htmlspecialchars($Link); ?>" target="_blank" icon><?php echo htmlspecialchars($Text); ?></a-link>
                                <template #content>
                                    <a-card>
                                        <?php echo htmlspecialchars($Info); ?>
                                    </a-card>
                                </template>
                            </a-trigger>
                        </a-list-item>
                <?php
                    }
                }
                ?>
            </a-list>
        </a-card>
    </a-col>
<?php
}