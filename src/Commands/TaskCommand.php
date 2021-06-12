<?php

namespace App\Plugins\Htshop\src\Commands;

use App\Plugins\Htshop\src\Jobs\HtTask;
use Illuminate\Support\Arr;
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
    protected $description = '运行欢太商城所有任务';

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
        $htshops = Htshop::get();
        $config = include plugin_path("Htshop/src/lib/api.php");
        foreach ($htshops as $htshop) {
            dispatch(new HtTask($htshop,$config));
        }
        $this->info("所有任务已丢进队列!");
    }
}
