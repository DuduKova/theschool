<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function imageValidate(Request $request) {
            //fet file name with ext
            $fileNameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('img')->getClientOriginalExtension();

            // file name to store

            $fileNameToStore = $filename . '_' . time() . '.' . $ext;

            //upload img

            $request->file('img')->storeAs('public/uploads', $fileNameToStore);

            return $fileNameToStore;
    }
}
