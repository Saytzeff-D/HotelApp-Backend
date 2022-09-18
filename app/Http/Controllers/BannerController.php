<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

// 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 my git token
class BannerController extends Controller
{
    public function setBanner()
    {
            $setBanner = Banner::create(['banner'=>$_FILES['banner']['name'], 'caption'=>request('caption'), 'subCaption'=>request('subCaption')]);
            if ($setBanner) {
                $upload = move_uploaded_file($_FILES['banner']['tmp_name'], 'C:\Users\DELL\Desktop\Angular Class\hotel-app\src\assets\images\\'. $_FILES['banner']['name']);
            }
            else{
                return response()->json('Network Error');
            }
    }
    public function getBanner()
    {
        $allBanner = Banner::get();
        return response()->json($allBanner);
    }
}
