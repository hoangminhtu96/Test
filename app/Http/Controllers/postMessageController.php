

<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Requests\aRequest;
use App\cate;


class postMessage extends Controller
{
   function store(Request $request) {
        $request->session()->flash('status', 'Xoá thành công');
    }
}
