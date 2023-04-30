<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FilesTrait
{  
    /**
    * Update file
    *
    * @param $request \Illuminate\Http\Request
    * @return Request
    */
    public function checkUploadFile(Request $request): Request
    {
        $arrayKeyValue = [];
        foreach ($request->all() as $key => $value) 
        {
            if (preg_match('/^file-*/', $key) && $request->hasFile($key)) 
            {
                $file        = $request->file($key);
                $fileName    = $file->getClientOriginalName();
                $file->storeAs('public/uploads', $fileName);
                
                $arrayKeyValue = array_merge($arrayKeyValue, $this->handleKeyValue($request, $key, $fileName));
            }
        }
        return $request->merge($arrayKeyValue);
    }

    /**
    * Tách chuỗi VD: file-logo -> logo
    *
    * @param $request \Illuminate\Http\Request
    * @param String $key
    * @param String $fileName
    * @return array
    */
    public function handleKeyValue(Request $request, String $key, String $fileName): array
    {
        $keyArr = explode("-", $key);
        $key    = $keyArr[1];
        $data   = array($key => $fileName);
        return $data;
    }

}