<?php

namespace App\Console\Commands;

use App\Models\Box;
use App\Models\BoxUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MyScheduledTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:my-scheduled-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (date('d') == 10) {
            Log::info('Log message', ['context' => 'Other helpful information']);
            $boxes = Box::where(['status' => 1,"type_box"=>1])->get();
            foreach ($boxes as $box) {
                $users = BoxUser::where("box_id", $box->id)->get();
                foreach ($users as $item) {
                    BoxUser::create([
                        'user_id' => $item->user_id,
                        "box_id" => $item->box_id,
                        "price" =>  empty($box->all_value) ?$box->periodic_value : ($box->all_value / count($users)),
                        "value_in" => 0
                    ]);
                }
            }
        }
    }
}
