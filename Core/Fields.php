<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeFields($layout)
{
    /**
     * 下载字段配置
     * NijikaDownload    判断下载是否启用
     * NijikaDownloadUrl 下载链接
     */

    // 下载开关
    $NijikaDownload = new Typecho_Widget_Helper_Form_Element_Radio(
        'NijikaDownload',
        array(
            'close' => _t('关闭'),
            'open' => _t('打开')
        ),
        'close',
        _t('侧边下载'),
        _t('是否启用侧边下载')
    );
    $layout->addItem($NijikaDownload);

    // 下载链接
    $NijikaDownloadUrl = new Typecho_Widget_Helper_Form_Element_Textarea(
        'NijikaDownloadUrl',
        NULL,
        NULL,
        _t('下载链接'),
        _t('下载链接格式：<br>名称|链接|说明，多个链接请换行')
    );
    $NijikaDownloadUrl->input->setAttribute('style', 'width: 100%; height: 100px;');
    $layout->addItem($NijikaDownloadUrl);
}