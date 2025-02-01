<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL", GetTheme::Url(false));
define("THEME_NAME", GetTheme::Name(false));
function themeConfig($form)
{
    $form->addInput(new \Typecho\Widget\Helper\Form\Element\Text(
        'subTitle',
        null,
        null,
        _t('副标题'),
        _t('在这里填入一个文字, 以在网站标题后加上一个副标题')
    ));

    $form->addInput(new \Typecho\Widget\Helper\Form\Element\Text(
        'faviconUrl',
        null,
        '' . THEME_URL . '/Assets/images/Nijika.svg',
        _t('Favicon'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个图标')
    ));

    $form->addInput(new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('Logo'),
        _t('在这里填入一个图片 URL 地址, 以在顶部导航前加上一个LOGO')
    ));

    $form->addInput(new \Typecho\Widget\Helper\Form\Element\Text(
        'icpCode',
        null,
        null,
        _t('备案号'),
        _t('在这里填入网站ICP备案号, 将显示在底部右侧位置')
    ));

    $form->addInput(new \Typecho\Widget\Helper\Form\Element\Textarea(
        'headerNav',
        null,
        '首页|' . Get::SiteUrl(false) .'',
        _t('顶部导航'),
        _t('顶部自定义导航栏，格式为 名称|链接，多个导航请换行。')
    ));
}