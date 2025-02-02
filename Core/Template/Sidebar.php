<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<a-col :xs="24" :sm="24" :md="24" :lg="5" :xl="5" :xxl="5" id="Sidebar">
    <?php
    if (Get::Fields('NijikaDownload') === 'open') {
        $title = '下载信息';
    } else {
        $title = '文章信息';
    }
    ?>
    <a-card title="<?php echo $title ?>">
        <a-list style="margin-bottom: 10px;">
            <a-list-item><?php GetPost::Category() ?></a-list-item>
            <a-list-item><?php GetPost::Tags() ?></a-list-item>
            <?php
            if (Get::Fields('NijikaDownload') === 'open') {
            ?>
                <a-list-item>
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

                        if (!empty($Text) && !empty($Link)) { // 确保变量都有值
                            // 判断 Info 是否为空
                            $displayText = !empty($Info) ? $Info : "前往 $Text 下载";
                    ?>
                            <a-trigger position="bottom" auto-fit-position :unmount-on-close="false">
                                <a-link href="<?php echo htmlspecialchars($Link); ?>" target="_blank" icon><?php echo htmlspecialchars($Text); ?></a-link>
                                <template #content>
                                    <a-card>
                                        <?php echo htmlspecialchars($displayText); ?>
                                    </a-card>
                                </template>
                            </a-trigger>
                    <?php
                        }
                    }
                    ?>
                </a-list-item>
            <?php } ?>
        </a-list>
    </a-card>
</a-col>