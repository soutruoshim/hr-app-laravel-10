<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\Company;
use App\Models\Content;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        // appName
        // version
        // androidUrls
        // iosUrls

        // aboutUs
        // privacyPolicy
        // termsConditions

        // companyPhone
        // companyEmail
        // companyLogo

        $app_setting = AppSetting::get()->first();

        $term_condition = Content::where('content_type', '=', 'terms-and-conditions')->first();
        $app_policy = Content::where('content_type', '=', 'app-policy')->first();
        $about_us = Content::where('content_type', '=', 'about-us')->first();

        $company = Company::get()->first();

        return response()->json([
            "success" => true,
            "message" => "Term and Condition",
            "data" => ["app_setting" => $app_setting, "term_condition" => $term_condition, "app_policy" => $app_policy, "about_us" => $about_us, "company"=>$company]
            ]);
    }
}
