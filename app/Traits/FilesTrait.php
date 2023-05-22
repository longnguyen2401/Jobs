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

                if (is_array($file)) {
            
                    // $fileName    = $file[0]->getClientOriginalName();
                    $arrStr = '';
                    foreach ($file as $item) {
                        $fileName    = $item->getClientOriginalName();
                        $item->storeAs('public/uploads', $fileName);
                        $arrStr = $arrStr . '|' . $fileName;
                    }
               
                    $arrStr = substr($arrStr, 1, strlen($arrStr));
                    $arrayKeyValue = array_merge($arrayKeyValue, $this->handleKeyValue($request, $key, $arrStr));
                    
                } else {
                    $fileName    = $file->getClientOriginalName();
                    $file->storeAs('public/uploads', $fileName);
                    $arrayKeyValue = array_merge($arrayKeyValue, $this->handleKeyValue($request, $key, $fileName));
                }
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
        if (count($keyArr) < 3) {
            $key    = $keyArr[1];
            $data   = array($key => $fileName);   
        } else {
            $data = [];
            $item = array($keyArr[2] => $fileName);    
            $request[$keyArr[1]] = array_merge($item, $request[$keyArr[1]]);
        }
        return $data;
    }

}