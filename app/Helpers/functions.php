<?php 

use Intervention\Image\Facades\Image;


if (!function_exists('getThumbnail')) {
    function getThumbnail($fileName)
    {
    	$file = public_path('uploads/thumbnails/'.$fileName);
    	if (file_exists($file)) {
	    	return '/uploads/thumbnails/'.$fileName;
    	}
    	return false;
    }
}

if (!function_exists('getMedium')) {
    function getMedium($fileName)
    {
	    $file = public_path('uploads/medium/'.$fileName);
    	if (file_exists($file)) {
	    	return '/uploads/medium/'.$fileName;
    	}
    	return false;
    }
}

if (!function_exists('getFull')) {
    function getFull($fileName)
    {
	    $file = public_path('uploads/'.$fileName);
      if (file_exists($file)) {
        return '/uploads/'.$fileName;
      }
    }
}

if (!function_exists('getMediumSquare')) {
    function getMediumSquare($fileName)
    {
        $file = public_path('uploads/555x555/'.$fileName);
        if (file_exists($file)) {
            return '/uploads/555x555/'.$fileName;
        }
        return false;
    }
}


if (!function_exists('getLittleSquare')) {
    function getLittleSquare($fileName)
    {
        $file = public_path('uploads/360x360/'.$fileName);
        if (file_exists($file)) {
            return '/uploads/360x360/'.$fileName;
        }
        return false;
    }
}

if (!function_exists('getSNIco')) {
    function getStorageFile($fileName)
    {
      $file = storage_path('app/public/'.$fileName);
    	if (file_exists($file)) {
        return asset('storage/'.$fileName);
      }
    }
}

if (!function_exists('deleteStorageFile')) {
    function deleteStorageFile($fileName)
    {
      if ($fileName) {
        $file = storage_path('app/public/'.$fileName);
        if(file_exists($file)){
          unlink($file);
        }
      }
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($fileName)
    {
      if ($fileName) {
        $fullFile = public_path('uploads/'.$fileName);
        $thumbnailFile = public_path('uploads/thumbnails/'.$fileName);
        $mediumFile = public_path('uploads/medium/'.$fileName);
        $squareThumbnail = public_path('uploads/360x360/'.$fileName);
        if(file_exists($fullFile)){
            unlink($fullFile);
        }

        if(file_exists($thumbnailFile)){
            unlink($thumbnailFile);
        }
          if(file_exists($squareThumbnail)){
              unlink($squareThumbnail);
          }
        if(file_exists($mediumFile)){
            unlink($mediumFile);
        }

      }
    }
}


if (!function_exists('toAscii')) {
    function toAscii($str, $delimiter='-') {
      $clean = iconv('UTF-8', 'ASCII//TRANSLIT', rus2translit(trim($str)));
      $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
      $clean = strtolower(trim($clean, '-'));
      $clean = preg_replace("/[_|+ -]+/", $delimiter, $clean);
      return $clean;
    }
}


if (!function_exists('rus2translit')) {
    function rus2translit($string) {
      $converter = array(
          'а' => 'a',   'б' => 'b',   'в' => 'v',
          'г' => 'g',   'д' => 'd',   'е' => 'e',
          'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
          'и' => 'i',   'й' => 'y',   'к' => 'k',
          'л' => 'l',   'м' => 'm',   'н' => 'n',
          'о' => 'o',   'п' => 'p',   'р' => 'r',
          'с' => 's',   'т' => 't',   'у' => 'u',
          'ф' => 'f',   'х' => 'h',   'ц' => 'c',
          'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
          'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
          'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
          
          'А' => 'A',   'Б' => 'B',   'В' => 'V',
          'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
          'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
          'И' => 'I',   'Й' => 'Y',   'К' => 'K',
          'Л' => 'L',   'М' => 'M',   'Н' => 'N',
          'О' => 'O',   'П' => 'P',   'Р' => 'R',
          'С' => 'S',   'Т' => 'T',   'У' => 'U',
          'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
          'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
          'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
          'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
      );
      return strtr($string, $converter);
  }
}


if (!function_exists('monthList')) {
  function monthList($month = false) {
    $arr = array(
      1  => __('main.January'),
      2  => __('main.February'),
      3  => __('main.March'),
      4  => __('main.April'),
      5  => __('main.May'),
      6  => __('main.June'),
      7  => __('main.July'),
      8  => __('main.August'),
      9  => __('main.September'),
      10 => __('main.October'),
      11 => __('main.November'),
      12 => __('main.December'),
    );
    if (isset($arr[$month])) {
      return $arr[$month];
    }
    return $arr;
  }
}

if (!function_exists('getNumber')) {
  function getNumber($str) {
    return preg_replace("/[^0-9\.]/", '', $str);
  }
}

if (!function_exists('randomString')) {
  function randomString($length = 16) {
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
  }
}

if (!function_exists('hasGetParam')) {
  function hasGetParam($key, $value) {
    if (isset($_GET[$key])) {
      if ($_GET[$key] == $value) {
        return true;
      }
    }
    return false;
  }
}

if (!function_exists('GetParam')) {
  function GetParam($key) {
    if (isset($_GET[$key])) {
      return $_GET[$key];
    }
    return false;
  }
}

if (!function_exists('mDateFormat')) {
  function mDateFormat($date) {
    $date = new \DateTime($date);
    $day = $date->format('d');
    $month = monthList($date->format('n'));
    $year = $date->format('Y');
    return $day.' '.$month.' '.$year;
  }
}

if (!function_exists('metaPublished')) {
  function metaPublished($date) {
    return \Carbon\Carbon::parse($date)->format('Y-m-d\TH:i:sO');
  }
}

if (!function_exists('menu')) {
  function menu($name) {
    $menu = App\Repositories\MenuRepository::getMenuForSite($name);
    return $menu;
  }
}

if (!function_exists('getListEmails')) {
  function getListEmails($models) {
    $arr = [];
    if (count($models) > 0) {
      foreach ($models as $item) {
        $arr[] = $item->email;
      }
    }
    return $arr;
  }
}

if (!function_exists('textBlock')) {
  function textBlock($name) {
    $textblock = App\Repositories\TextBlocksRepository::getForSite($name);
    if ($textblock) {
      return $textblock;
    }
    return false;
  }
}
if (!function_exists('textBlockAll')) {
  function textBlockAll($name) {
    $textblock = App\Repositories\TextBlocksRepository::getAllByName($name);
    if ($textblock) {
      return $textblock;
    }
    return false;
  }
}

if (!function_exists('getSocialNetworks')) {
  function getSocialNetworks() {
    return App\Repositories\SocialNetworksRepository::getAll();
  }
}

if(!function_exists('getContacts')) {
    function getContacts() {
        return App\Repositories\MainRepository::getContact();
    }
}

if (!function_exists('getString')) {
  function getString($str) {
    return preg_replace('/[^A-Za-z0-9\-]\s/', '', $str);
  }
}

if (!function_exists('tableLength')) {
  function tableLength($model) {
    $startPagePost = ($model->currentPage()-1)* $model->perPage() + 1;
    $endPagePost = ($model->currentPage()-1)* $model->perPage() + $model->perPage();
    $total = $model->total();
    if ($endPagePost > $total) {
      $endPagePost = $total;
    }
    if ($total == 0) {
      $startPagePost = 0;
    }
    return [
      'lengthPage' => $startPagePost.' - '.$endPagePost.' из '.$total,
      'startPage' => $startPagePost
    ];
  }
}

if (!function_exists('generateMenu')) {
  function generateMenu($childs, $class = "", $id="") {
    if ($childs) {
      $result = '<ul class="' . $class . '" ' . (!empty($id)?'id="' . $id . '"':'') . '>';
      foreach ($childs as $item) {
        $result .= "<li>";
        $result .= "<a href='". $item['item']->url ."'>";
        $result .= $item['item']->title;
        $result .= "</a>";
        if (generateMenu($item['childrens'])) {
          $result .= generateMenu($item['childrens'], 'sub-menu animated fadeIn');
        }
        $result .= "</li>";
      }
      $result .= "</ul>";
      return $result;
    }
    return false;
  }
}


if (!function_exists('generateMenuMobile')) {
    function generateMenuMobile($childs) {
        if ($childs) {
            $result = '<ul class="mmenu" id="top-mobile-menu">';
            $i = 1;
            foreach ($childs as $item) {
                $result .= "<li>";
                $sub = generateMenu($item['childrens'], 'collapse', 'sub-menu-link-'.$i);
                if ($sub) {
                    $result .= '<a data-toggle="collapse" data-parent="#top-mobile-menu" href="#sub-menu-link-'.$i.'">';
                    $i++;
                } else {
                    $result .= '<a href="'.$item['item']->url.'">';
                }
                $result .= $item['item']->title;
                $result .= "</a>";
                if($sub) {
                    $result .= $sub;
                }
                $result .= "</li>";
            }
            $result .= "</ul>";
            return $result;
        }
        return false;
    }
}


if (!function_exists('getImageSizes')) {
    function getImageSizes($photos) {
        $arr = [];
        if(empty($photos)) {
            return false;
        }
        $height = 260;
        foreach ($photos as $item) {
            if(is_file(public_path(getMedium($item->image)))) {
                $img = Image::make(public_path(getMedium($item->image)));
                $arr[$item->id] = [
                    'width'     => round($height * ($img->getWidth() / $img->getHeight()), 2),
                    'height'    => $height,
                ];
                $img->destroy();
            }
        }
        return $arr;
    }
}