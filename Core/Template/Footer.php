<?php

/**
 * 这里是前端输出中的Footer内容。
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
</div>
<footer>
    <a-card>
        <div
            :style="{
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'space-between',
            }"
        >
            <span
                :style="{ display: 'flex', alignItems: 'center', color: '#1D2129' }">
                <a-typography-text>© <?php echo date("Y"); ?> <a-link href="<?php Get::SiteUrl() ?>"><?php echo Get::Options("title"); ?></a-link> 版权所有</a-typography-text>
            </span>
            <a-link href="https://beian.miit.gov.cn/" target="_blank"><?php echo Get::Options('icpCode') ?></a-link>
        </div>
    </a-card>
</footer>
</main>
<?php
$jsFiles = [
    'arco/arco-vue.min',
    'vuetify/vuetify.min',
];
foreach ($jsFiles as $js) {
?>
    <script src="<?php echo GetTheme::Url(false, 'Assets') . "/" . $js . '.js'; ?>?v=<?php GetTheme::Ver(); ?>"></script>
<?php }; ?>
<?php Get::Footer() ?>
</body>

</html>