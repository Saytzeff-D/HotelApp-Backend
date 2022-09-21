<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function setBanner()
    {
            $setBanner = Banner::create(['banner'=>$_FILES['banner']['name'], 'caption'=>request('caption'), 'subCaption'=>request('subCaption')]);
            if ($setBanner) {
                $upload = move_uploaded_file($_FILES['banner']['tmp_name'], 'C:\Users\DELL\Desktop\Angular Projects\hotel-app\src\assets\images\\'. $_FILES['banner']['name']);
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
    public function deleteBanner()
    {
        $delete = DB::delete('delete from banners where banner_id = ?', [request('id')]);
        if($delete){
            return response()->json('Success', 200);
        }
    }
}
