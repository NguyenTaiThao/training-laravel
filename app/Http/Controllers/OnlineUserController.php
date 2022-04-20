<?php

namespace App\Http\Controllers;

use App\Events\UpdateOnlineUser;
use App\Models\OnlineUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OnlineUserController extends Controller
{
    public function index()
    {
        $key_code = Str::random(40);
        return Redirect('page1?code=' . $key_code);
    }

    public function page1(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 1);
        return view('not-zoom.page1')->with(['page' => 1, 'prevPageNum' => null, 'nextPageNum' => 2, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page2(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 2);
        return view('not-zoom.page2')->with(['page' => 2, 'prevPageNum' => 1, 'nextPageNum' => 3, 'onlineNum' => $res['count'],  'onlineData' => $res['data']]);
    }

    public function page3(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 3);
        return view('not-zoom.page3')->with(['page' => 3, 'prevPageNum' => 2, 'nextPageNum' => 4, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page4(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 4);
        return view('not-zoom.page4')->with(['page' => 4, 'prevPageNum' => 3, 'nextPageNum' => 5, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page5(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 5);
        return view('not-zoom.page5')->with(['page' => 5, 'prevPageNum' => 4, 'nextPageNum' => 6, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page6(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 6);
        return view('not-zoom.page6')->with(['page' => 6, 'prevPageNum' => 5, 'nextPageNum' => 7, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page7(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 7);
        return view('not-zoom.page7')->with(['page' => 7, 'prevPageNum' => 6, 'nextPageNum' => 8, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page8(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 8);
        return view('not-zoom.page8')->with(['page' => 8, 'prevPageNum' => 7, 'nextPageNum' => 9, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page9(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 9);
        return view('not-zoom.page9')->with(['page' => 9, 'prevPageNum' => 8, 'nextPageNum' => 10, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page10(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 10);
        return view('not-zoom.page10')->with(['page' => 10, 'prevPageNum' => 9, 'nextPageNum' => 11, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function page11(Request $request)
    {
        $key_code = $request->code;
        $res = $this->newOnlineUser($key_code, 11);
        return view('not-zoom.page11')->with(['page' => 11, 'prevPageNum' => 10, 'nextPageNum' => null, 'onlineNum' => $res['count'], 'onlineData' => $res['data']]);
    }

    public function newOnlineUser($code, $position)
    {
        try {
            DB::beginTransaction();

            $onlineUserData = OnlineUser::orderBy('id', 'DESC')->lockForUpdate()->first();
            $data = json_decode($onlineUserData->data_json, true);
            $data[$code] = $position;
            $onlineUserData->data_json = json_encode($data);
            $onlineUserData->save();

            DB::commit();

            event(new UpdateOnlineUser($data));
            return ['count' => count($data), 'data' => json_encode($data, true)];
        } catch (\Exception $err) {
            DB::rollBack();
            dd($err);
        }
    }

    public function newExitUser($code)
    {
        try {
            DB::beginTransaction();

            $onlineUserData = OnlineUser::orderBy('id', 'DESC')->lockForUpdate()->first();
            $data = json_decode($onlineUserData->data_json, true);
            unset($data[$code]);
            $onlineUserData->data_json = json_encode($data);
            $onlineUserData->save();

            DB::commit();

            event(new UpdateOnlineUser($data));
        } catch (\Exception $err) {
            DB::rollBack();
            dd($err);
        }
    }

    public function syncByBroadcasting()
    {
    }
}