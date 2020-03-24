<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wwtg99\JsonRpc\Client\JsonRpcClient;
use Wwtg99\JsonRpc\Http\JsonRpcRequest;

class ReviewController extends Controller
{

    public function getAll($page_uid)
    {
        $cli = new JsonRpcClient('http://tor-data.local/api/api/jsonrpc');  //default method is post, return type json
        $req1 = new JsonRpcRequest('data_getDataUid', $page_uid, [
            'page_uid' => $page_uid,
        ]);

        $result = $cli->send($req1);

        $all = $result['result'];

        if ($page_uid == 1) {
            return view('one', ['all' => $all]);
        } else if ($page_uid == 2) {
            return view('two', $all);
        }

    }

    public function store(Request $request, $page_uid)
    {

        $cli = new JsonRpcClient('http://tor-data.local/api/api/jsonrpc');  //default method is post, return type json
        $req1 = new JsonRpcRequest('data_addReview', $page_uid, [
            'email' => $request->email,
            'review' => $request->review,
            'page_uid' => $page_uid,
        ]);
        $res = $cli->send($req1);

       return redirect()->route('reviews.getAll', ['page_uid' => $page_uid]);
    }

}
