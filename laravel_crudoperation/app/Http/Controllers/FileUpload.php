<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Controller
{

    public function createForm(){
        return view('file.fileupload');
    }

    public function fileUpload(Request $request){
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:jpg,png|max:2048'
        ]);

        $filedata = new File();

       

        if($request->file()) {
            $filedata->fileholdername = $request->name;
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $filedata->name = time().'_'.$request->file->getClientOriginalName();
            $filedata->file_path = '/storage/' . $filePath;
            $filedata->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    
    }

    public function show()
    {
        $filedata = File::all();
        return view('file.filedisplay',['data'=>$filedata]);
    }

    public function downloadfile($name){
        $downloadfile =storage_path().'/app/public/uploads/'.$name;
        return response()->download($downloadfile);
    }
    
    public function destroy($id){
        $filedata = File::find($id);
        //$data = storage_path().'/app/public/uploads/'.$filedata->name;
        //unlink($data);
        $filedata->delete();

        return redirect('filedisplay');
    }
}
