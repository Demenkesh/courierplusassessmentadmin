<?php

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


function calculateDiscount($amount, $type, $base_price)
{
    if ($type == 1) {
        $discount = $amount;
    } else {
        $discount = ($amount * $base_price) / 100;
    }
    return $discount;
}

function checkWishList($product_id)
{
    $wishlist   = session()->get('wishlist') ?? [];
    $wishlist   = array_keys($wishlist);
    if (in_array($product_id, $wishlist)) {
        return true;
    } else {
        return false;
    }
}

function checkCompareList($product_id)
{
    $compare   = session()->get('compare') ?? [];
    $compare   = array_keys($compare);
    if (in_array($product_id, $compare)) {
        return true;
    } else {
        return false;
    }
}

function displayAvgRating($rating)
{
    $ratingCount   =  $rating->count();
    $sumOfRating   =  $rating->sum('rating');

    if ($ratingCount == 0) {
        $ratingCount = 1;
    }

    $rating_avg    =  $sumOfRating / $ratingCount;
    $prec          = round($rating_avg, 2) - intval($rating_avg);
    $result        = '';

    if ($prec > 0.25) {
        $rating_avg = intval($rating_avg) + 0.5;
    }

    if ($prec > 0.75) {
        $rating_avg = intval($rating_avg) + 1;
    }

    for ($i = 0; $i < intval($rating_avg); $i++) {
        $result .= '<i class="la la-star"></i>';
    }

    if ($rating_avg - intval($rating_avg) == 0.5) {
        $i++;
        $result .= '<i class="las la-star-half-alt"></i>';
    }

    for ($k = 0; $k < 5 - $i; $k++) {
        $result .= '<i class="lar la-star"></i>';
    }
    return $result;
}

function getAmount($amount, $length = 2)
{
    $amount = round($amount, $length);
    return $amount + 0;
}

function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function getPaginate($paginate = 20)
{
    return $paginate;
}


if (!function_exists('shortDescription')) {
    function shortDescription($string, $length = 35)
    {
        return strlen($string) > $length ? substr($string, 0, $length) . '...' : $string;
    }
}

function getTenantName()
{

    $tenant = Tenant::where('id', tenant('id'))->first();

    if ($tenant) {
        // dd($tenant);
        return $tenant ? $tenant->id : config('app.name', 'Laravel');
    } else {
        return config('app.name', 'Laravel');
    }
}

function getTenantUrl()
{
    $tenant = Tenant::where('id', tenant('id'))->first();
    if ($tenant) {
        $domain = DB::connection('mysql')->table('domains')->where('tenant_id', tenant('id'))->first();

        if ($domain && isset($domain->domain)) {
            // Ensure the domain includes the correct protocol
            $protocol = request()->secure() ? 'https://' : 'http://';
            return $protocol . $domain->domain;
        }
    }
    return config('app.urls');
}

function generateOrderNumber()
{
    return 'ORD' . str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
}

function getYoutubeID($url)
{
    preg_match('/(youtu\.be\/|youtube\.com\/(watch\?v=|embed\/|v\/|shorts\/))([^\&\?\/]+)/', $url, $matches);
    return $matches[3] ?? null;
}

function getVimeoID($url)
{
    preg_match('/vimeo\.com\/(\d+)/', $url, $matches);
    return $matches[1] ?? null;
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang', 'en');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}
