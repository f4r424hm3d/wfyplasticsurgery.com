<?php

define('TO_EMAIL', 'mhdrafay@gmail.com');
define('TO_NAME', 'Mohd Rafay');
define('CC_EMAIL', 'farazahmad280@gmail.com');
define('CC_NAME', 'Mohd Faraz');

if (!function_exists('printArray')) {
  function printArray($data)
  {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}
if (!function_exists('getFormattedDate')) {
  function getFormattedDate($date, $formate)
  {
    return date($formate, strtotime($date));
  }
}
if (!function_exists('slugify')) {
  function slugify($text)
  {
    // Swap out Non "Letters" with a -
    $text = preg_replace('/[^\\pL\d]+/u', '-', $text);
    // Trim out extra -'s
    $text = trim($text, '-');
    // Convert letters that we have left to the closest ASCII representation
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Make text lowercase
    $text = strtolower($text);
    // Strip out anything we haven't been able to convert
    $text = preg_replace('/[^-\w]+/', '', $text);
    return $text;
  }
}
if (!function_exists('dateDiff')) {
  function dateDiff($date1, $date2)
  {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    return $days_between = ceil(abs($date2_ts - $date1_ts) / 86400);
  }
}
if (!function_exists('aurl')) {
  function aurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/admin/' . $path);
    } else {
      return url('/admin/');
    }
  }
}
if (!function_exists('uurl')) {
  function uurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/user/' . $path);
    } else {
      return url('/user/');
    }
  }
}
if (!function_exists('j2s')) {
  function j2s($data)
  {
    $sm = json_decode($data);
    return $sm = implode(' , ', $sm);
  }
}
if (!function_exists('replaceTag')) {
  function replaceTag($string, $array)
  {
    foreach ($array as $key => $value) {
      $string = $string == null ? null : str_replace('%' . $key . '%', $value, $string);
    }
    $string = trim(preg_replace('/\s+/', ' ', $string));
    $string = ucwords($string);
    return $string;
  }
}
if (!function_exists('profilePic')) {
  function profilePic($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('front/icons/icon.jpg');
    }
  }
}
if (!function_exists('doctorPic')) {
  function doctorPic($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('front/icons/doctor-icon.png');
    }
  }
}

if (!function_exists('hospitalPic')) {
  function hospitalPic($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('front/icons/hospital-icon.png');
    }
  }
}
if (!function_exists('departmentIcon')) {
  function departmentIcon($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('front/icons/department-icon.webp');
    }
  }
}
if (!function_exists('gr_site_key')) {
  function gr_site_key()
  {
    return "6LfzFIYpAAAAAB0ehzmZ0Cvb-lxwYgVIkB3fmXEa";
  }
}
if (!function_exists('gr_secret_key')) {
  function gr_secret_key()
  {
    return "6LfzFIYpAAAAAGJuUxkMra2bsDHsXXT4Te4TG0b7";
  }
}
