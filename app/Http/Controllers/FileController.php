<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function download(){
        $path = storage_path('/app/public/file/collect.pdf');
        return response()->download($path,'MediaBird.pdf');
}


public function logoDownload($id)
        {
                $work = Work::findOrFail($id);

                $path = storage_path('/app/public/'.$work->logo->first()->pdf);
                return response()->download($path,$work->name.'.pdf');
        }

}
