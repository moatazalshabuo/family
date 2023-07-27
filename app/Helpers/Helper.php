<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\BloodMoney;
use App\Models\BloodMoneyUser;
use App\Models\Box;
use App\Models\BoxUser;
use App\Models\RecordUserMove;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function status_box_user()
    {
        $box = BoxUser::all();

        foreach ($box as $item) {
            if ($item->price == $item->value_in) {
                BoxUser::find($item->id)->update([
                    'status' => 0,
                ]);
            } else {
                BoxUser::find($item->id)->update([
                    'status' => 1,
                ]);
            }
        }

        $box = Box::all();
        $sum = 0;
        foreach ($box as $item) {
            $boxuser = BoxUser::where("box_id", $item->id)->get();
            foreach ($boxuser as $item2) {
                $sum += $item2->value_in;
            }
            Box::find($item->id)->update([
                'value_in'    => $item->value_in + $sum,
            ]);
            $sum = 0;
        }
    }

    public static function status_blood_user()
    {
        $box = BloodMoneyUser::all();

        foreach ($box as $item) {
            if ($item->price == $item->value_in) {
                BloodMoneyUser::find($item->id)->update([
                    'status' => 0,
                ]);
            } else {
                BloodMoneyUser::find($item->id)->update([
                    'status' => 1,
                ]);
            }
        }

        $box = BloodMoney::all();
        $sum = 0;
        foreach ($box as $item) {
            $boxuser = BloodMoneyUser::where("bm_id", $item->id)->get();
            foreach ($boxuser as $item2) {
                $sum += $item2->value_in;
            }
            Box::find($item->id)->update([
                'value_in'    => $item->value_in + $sum,
            ]);
            $sum = 0;
        }
    }

    public static function record_move($id, $descripe)
    {
        RecordUserMove::create([
            'user'=>$id,
            "descripe"=>$descripe
        ]);
    }
}
