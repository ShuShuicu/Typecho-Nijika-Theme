<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<a-row>
    <?php
    while (Get::Next()) {
        IndexPostCard($this);
    };
    ?>
</a-row>

<?php function IndexPostCard($post)
{
    $thumbnailUrl = '';
    $thumbnailStyle = Get::Fields('thumbnailStyle');
    $thumbnailUrl = $thumbnailStyle ?: get_ArticleThumbnail($post);
?>
    <a-col :xs="24" :sm="24" :md="12" :lg="12" :xl="6" :xxl="6">
        <a href="<?php GetPost::Permalink(); ?>">
            <a-card
                hoverable
                :bordered="false"
                style="margin:5px">
                <template #cover>
                    <div class="thumbnail" :style="{
                        backgroundImage: `url(<?php echo htmlspecialchars($thumbnailUrl); ?>)`,
                    }"></div>
                </template>
                <a-card-meta title="<?php GetPost::Title(); ?>">
                    <template #description>
                        <?php GetPost::Date(); ?> · <?php GetPost::Category() ?> · <?php GetPost::Tags() ?>
                    </template>
                </a-card-meta>
            </a-card>
        </a>
    </a-col>
<?php
}
?>