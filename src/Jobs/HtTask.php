<?php

namespace App\Plugins\Htshop\src\Jobs;

use App\Plugins\Htshop\src\Models\Htshop;
use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class HtTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $config;

    public $htshop;

    public function __construct($htshop, $config)
    {
        $this->htshop = $htshop;
        $this->config = $config;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $htp = http_getsWithHeaders("https://www.heytap.com/cn/oapi/users/web/member/info",[
            "Cookie"=>$this->htshop->cookies,
            "Accept"=>"application/json, text/plain, */*"
        ])->json();
        if($htp['code']==200){
            Htshop::where('id',$this->htshop->id)->update([
                "status" => "成功,accountName:".$htp['data']['accountName'].",id:".$htp['data']['id']
            ]);
            $response =http_gets($this->config["任务列表"]);
            $data = $response->json();
            // 商品列表
            $shopList = http_gets("https://www.heytap.com/cn/oapi/goods/web/ranking/rankDetailInfo?rankId=2240&currentPage=1&pageSize=100")->json();
            if ($data['no'] == 200) {
                foreach ($data['data'] as $value) {
                    //做任务
                    htcurl_post($this->config['完成浏览任务'], $this->htshop->cookies, [
                        "aid" => 1506,
                        "t_index" => $value['t_index']
                    ]);
    
                    if ($value['title'] == "浏览商品") {
                        for ($i = 0; $i < 6; $i++) {
                            htcurl_get($this->config["浏览商品"], $this->htshop->cookies, [
                                "skuId" => Arr::random($shopList['data']['rankingGoods'])['goodsSkuId']
                            ]);
                            // 间隔2秒
                            sleep(5);
                        }
                    }
    
                    // 自动领取
                    htcurl_post($this->config['领积分'], $this->htshop->cookies, [
                        "aid" => 1506,
                        "t_index" => $value['t_index']
                    ]);
                    
                }
            } else {
                dd("出错: 任务ID:" . $this->htshop->id);
            }
        }else{
            Htshop::where('id',$this->htshop->id)->update([
                "status" => "出错"
            ]);
            dd("出错");
        }
        
    }
}
