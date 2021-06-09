<?php

namespace App\Plugins\Htshop\src\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Plugins\Htshop\src\Models\Htshop;

class TaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'htshop:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $htshop = Htshop::where("id",1)->first();
        $config = include plugin_path("Htshop/src/lib/api.php");
        $response = Http::withHeaders([
            "Cookie"=>$htshop->cookies,
            "Accept"=>"application/json, text/plain, */*",
            "Connection" => "keep-alive",
            "s_channel" => "xiaomi",
            "utm_term" => "hd_direct",
            "utm_campaign" => "hd_direct",
            "ut" => "direct",
            "uc" => "direct",
            "sa_device_id" => "a8171e41b0c15108",
            "sa_distinct_id" => "TXNPUkFWM0hyZWtJSGlDditjTUdNdz09",
            "clientPackage" => "com.oppo.store",
            "um" => "hot",
            "User-Agent" => "Mozilla/5.0 (Linux; Android 11; M2102K1C Build/RKQ1.201112.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 oppostore/200702 MIUI/V125 brand/Xiaomi model/M2102K1C",
            "Content-Type" => "application/x-www-form-urlencoded",
            "source_type" => "501",
            "utm_medium" => "fenleiye",
            "brand" => "Xiaomi",
            "s_version" => "200702",
            "us" => "fenleiye",
            "utm_source" => "Mzhan",
            "Origin" => "https://store.oppo.com",
            "X-Requested-With" => "com.oppo.store",
            "Sec-Fetch-Site" => "same-origin",
            "Sec-Fetch-Mode" => "cors",
            "Sec-Fetch-Dest" => "empty",
            "Referer" => "https://store.oppo.com/cn/app/taskCenter/index",
            "Accept-Encoding" => "gzip, deflate",
            "Accept-Language" => "zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7"
        ])->post($config['签到'],[
            "amount" => 5,
            "type" => 1,
            "gift" => 50002058
        ]);
        $this->info(json_encode($response->json()));
        return 0;
    }
}
