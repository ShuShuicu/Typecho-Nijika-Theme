<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
class Nijika
{
    public static function GetTemplate($file)
    {
        Get::Need('Core/Template/' . $file . '.php');
    }
    public static function Tomori()
    {
        Nijika::GetTemplate('Header');
        if (Get::Is("index")) {
            Nijika::GetTemplate('Index');
        } elseif (Get::Is("post")) {
            Nijika::GetTemplate('Post');
        } elseif (Get::Is("page")) {
            Nijika::GetTemplate('Page');
        } elseif (Get::Is("404")) {
            Nijika::GetTemplate('Error');
        } else {
            Nijika::GetTemplate('Index');
        }
        Nijika::GetTemplate('Footer');
    }
}

// 获取随机缩略图
function get_RandomThumbnail($base_url, $maxImages = 15)
{
    if ($maxImages < 1) {
        $maxImages = 1;
    }
    $rand = mt_rand(1, $maxImages);
    return $base_url . $rand . '.webp';
}

// 获取文章缩略图
function get_ArticleThumbnail($widget)
{
    // 检查自定义缩略图
    if (!empty($widget->fields->thumb)) {
        return $widget->fields->thumb;
    }

    // 提取文章第一张图片
    $pattern = '/<img[^>]*src=[\'"]([^\'"]+)[\'"][^>]*>/i';
    if (preg_match($pattern, $widget->content, $matches) && !empty($matches[1])) {
        return $matches[1];
    }

    // 检查文章附件
    $attach = $widget->attachments(1)->attachment;
    if ($attach && $attach->isImage) {
        return $attach->url;
    }

    // 生成随机缩略图
    $base_url = !empty(Helper::options()->articleImgSpeed)
        ? rtrim(Helper::options()->articleImgSpeed, '/') . '/'
        : Helper::options()->themeUrl . '/Assets/images/thumb/';

    return get_RandomThumbnail($base_url);
}

require_once 'Fields.php';
require_once 'Options.php';
