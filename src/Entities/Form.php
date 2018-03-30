<?php

namespace Goodwong\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Goodwong\DefaultJsonField\Traits\DefaultJsonField;

class Form extends Model
{
    use SoftDeletes;
    use DefaultJsonField;

    /**
     * table name
     */
    protected $table = 'forms';

    /**
     * fillable fields
     */
    protected $fillable = [
        'category_id',
        'name',
        'settings',
        'status',
        'start_at',
        'end_at',
    ];

    /**
     * 在数组中想要隐藏的属性。
     *
     * @var array
     */
    protected $hidden = ['settings'];
    
    /**
     * date
     */
    protected $dates = [
        'status',
        'start_at',
        'deleted_at',
    ];

    /**
     * cast attributes
     */
    protected $casts = [
        'settings' => 'object',
    ];

    /**
     * The default settings.
     * 注意：这里只能是一级数组
     *
     * @var array
     */
    protected $default_settings = [
        'title' => '', // 显示在页面中的标题，最多两行
        'gallerys' => [], // 滚动图片
        'brief' => '', // 简要
        'blocks' => [], // 自定义区块
        'fields' => [], // 自定义表单字段
        'footer' => '', // 页脚内容
        'form_header' => '', // 表单页上面的文字
        'detail' => '', // 详情页
        'case_text' => '', // 案例文本
        'case_link' => '', // 案例链接
        'location_address' => '', // 样板房地址
        'location_longitude' => 0, // 经度
        'location_latitude' => 0, // 纬度
        'service_phone' => '', // 客服电话
        'action_text' => '', // 按钮文字
        'success_block' => '', // 报名成功页面的内容
        'share_title' => '', // 微信分享标题
        'share_brief' => '', // 微信分享描述
        'share_thumbnail' => '', // 微信分享图标
    ];
}
