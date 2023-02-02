<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdsManagement;

class AdsManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_ads = array(
            array('id' => '1', 'script' => '<a href="https://www.smartsoftware.com.bd/free-pos-software-in-bangladesh" target="_blank"> <img src="https://www.tradebangla.com.bd/public/img/banners/249220920063120.png"> </a>',
                'position_id' => '1' , 'serial_num' => '3', 'status' => 1),
            array('id' => '2', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-NewsDetels5 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="1895692682"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '4' , 'serial_num' => '5', 'status' => 1),
            array('id' => '3', 'script' => '<a href="https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani" target="_blank"> <img style="width: 820px; height: 100px;" src="http://www.desimediapoint.com/adManager/smartdokani.png"> </a>',
            'position_id' => '1' , 'serial_num' => '1', 'status' => 1),
            array('id' => '4', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-Home-55 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="5089536195"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '1' , 'serial_num' => '5', 'status' => 1),
            array('id' => '5', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-Home-3 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="9850908289"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '1' , 'serial_num' => '6', 'status' => 1),
            array('id' => '6', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '2' , 'serial_num' => '1', 'status' => 1),
            array('id' => '7', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '1' , 'serial_num' => '2', 'status' => 1),
            array('id' => '8', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '1' , 'serial_num' => '4', 'status' => 1),
            array('id' => '9', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '6' , 'serial_num' => '1', 'status' => 1),
            array('id' => '10', 'script' => '<a href="https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani" target="_blank"> <img style="width: 820px; height: 100px;" src="http://www.desimediapoint.com/adManager/smartdokani.png"> </a>',
            'position_id' => '4' , 'serial_num' => '1', 'status' => 1),
            array('id' => '11', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '4' , 'serial_num' => '2', 'status' => 1),
            array('id' => '12', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '5' , 'serial_num' => '1', 'status' => 1),
            array('id' => '13', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '2' , 'serial_num' => '2', 'status' => 1),
            array('id' => '14', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '6' , 'serial_num' => '2', 'status' => 1),
            array('id' => '15', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '3' , 'serial_num' => '1', 'status' => 1),
            array('id' => '16', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '3' , 'serial_num' => '2', 'status' => 1),
            array('id' => '17', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '4' , 'serial_num' => '4', 'status' => 1),
            array('id' => '18', 'script' => '<amp-auto-ads type="adsense"
            data-ad-client="ca-pub-8770580490084389">
            </amp-auto-ads>', 'position_id' => '1' , 'serial_num' => '7', 'status' => 1),
            array('id' => '19', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '4' , 'serial_num' => '3', 'status' => 1),
            array('id' => '20', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '2' , 'serial_num' => '3', 'status' => 1),
            array('id' => '21', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '3' , 'serial_num' => '3', 'status' => 1),
            array('id' => '22', 'script' => '<a href="https://www.smartsoftware.com.bd/free-pos-software-in-bangladesh" target="_blank"> <img src="https://www.tradebangla.com.bd/public/img/banners/249220920063120.png"> </a>',
                'position_id' => '1' , 'serial_num' => '8', 'status' => 1),
            array('id' => '23', 'script' => '<amp-auto-ads type="adsense"
            data-ad-client="ca-pub-8770580490084389">
            </amp-auto-ads>', 'position_id' => '1' , 'serial_num' => '8', 'status' => 1),
            array('id' => '24', 'script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- DM-category-news-1 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8770580490084389"
                 data-ad-slot="4731686811"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>', 'position_id' => '1' , 'serial_num' => '9', 'status' => 1),
            array('id' => '25', 'script' => '<amp-auto-ads type="adsense"
            data-ad-client="ca-pub-8770580490084389">
            </amp-auto-ads>', 'position_id' => '1' , 'serial_num' => '10', 'status' => 1),
            array('id' => '26', 'script' => '<amp-auto-ads type="adsense"
            data-ad-client="ca-pub-8770580490084389">
            </amp-auto-ads>', 'position_id' => '1' , 'serial_num' => '11', 'status' => 1),
            array('id' => '27', 'script' => '<amp-auto-ads type="adsense"
            data-ad-client="ca-pub-8770580490084389">
            </amp-auto-ads>', 'position_id' => '1' , 'serial_num' => '12', 'status' => 1),


        );

        foreach ($all_ads as $item) {
            AdsManagement::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'script'          => $item['script'],
                    'position_id'     => $item['position_id'],
                    'serial_num'      => $item['serial_num'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
