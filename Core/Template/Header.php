<?php

/**
 * 这里是前端输出中的Header内容。
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="renderer" content="webkit" />
    <link href="<?php echo Get::Options(true, "faviconUrl") ? Get::Options("faviconUrl") : GetTheme::Url(true, 'Assets') . "/images/Nijika.svg"; ?>" rel="icon" />
    <script src="<?php GetTheme::Url(false, 'Assets'); ?>/jquery.min.js?ver=<?php GetTheme::Ver(); ?>"></script>
    <script src="<?php GetTheme::Url(false, 'Assets'); ?>/main.js?ver=<?php GetTheme::Ver(); ?>"></script>
    <script src="<?php GetTheme::Url(false, 'Assets'); ?>/vue.global.js?ver=<?php GetTheme::Ver(); ?>"></script>
    <?php
    $cssFiles = [
        'main',
        'arco/arco.min',
        'vuetify/vuetify.min',
    ];
    foreach ($cssFiles as $css) {
    ?>
        <link rel="stylesheet" href="<?php echo GetTheme::Url(false, 'Assets') . "/" . $css . '.css'; ?>?ver=<?php GetTheme::Ver(); ?>">
    <?php }; ?>
    <title><?php $archiveTitle = GetPost::ArchiveTitle(
                [
                    "category" => _t("%s 分类"),
                    "search" => _t("搜索结果"),
                    "tag" => _t("%s 标签"),
                    "author" => _t("%s 的空间"),
                ],
                "",
                " - "
            );
            echo $archiveTitle;
            if (Get::Is("index") && !empty(Get::Options("subTitle")) && Get::CurrentPage() > 1) {
                echo "「第" . Get::CurrentPage() . "页」 - ";
            }
            $title = Get::Options("title");
            echo $title;
            if (Get::Is("index") && !empty(Get::Options("subTitle"))) {
                echo " - ";
                $subTitle = Get::Options("subTitle");
                echo $subTitle;
            }
            ?></title>
    <?php Get::Header(); ?>
</head>

<body>
    <main id="app">
        <a-menu mode="horizontal" theme="dark" :default-selected-keys="['1']">
            <?php
            $logoUrl = Get::Options('logoUrl');
            if (!empty($logoUrl)) {
            ?>
                <a-menu-item key="0" :style="{ padding: 0, height: '30px', marginRight: '15px' }" disabled>
                    <img src="<?php echo htmlspecialchars($logoUrl); ?>" style="height: 30px; cursor: none;" />
                </a-menu-item>
            <?php
            }
            ?>
            <?php
            $headerNav = Get::Options('headerNav');
            $navItems = explode("\n", $headerNav);

            foreach ($navItems as $item) {
                $parts = explode('|', trim($item));
                if (count($parts) == 2) {
                    list($name, $link) = $parts;
            ?>
                    <a href="<?php echo htmlspecialchars($link); ?>">
                        <a-menu-item key="<?php echo htmlspecialchars($name); ?>"><?php echo htmlspecialchars($name); ?></a-menu-item>
                    </a>
            <?php
                }
            }
            ?>
        </a-menu>
    <div class="Nijika-container">
