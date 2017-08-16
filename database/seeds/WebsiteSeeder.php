<?php

use Illuminate\Database\Seeder;
use App\Model\WebSite;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebSite::create([
            'name'=>'copyright',
            'values'=>'Copyright ©接力浙商网 浙ICP备17033185号-1'
        ]);
        WebSite::create([
            'name'=>'web_description',
            'values'=>'接力浙商网是专注于技术、人才与产业融合创新的在线内容平台，专注报道浙商产业创新项目的垂直媒体。'
        ]);
        WebSite::create([
            'name'=>'key_word',
            'values'=>'青年浙商，产业融合'
        ]);
        WebSite::create([
            'name'=>'web_title',
            'values'=>'接力浙商网——发现青年浙商领袖'
        ]);
    }
}
