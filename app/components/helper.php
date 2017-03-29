<?php

/* * ****** Array ******* */

/* Depreciated. see arrayIsEmpty(). */

function emptyArray($arr) {
    return (is_array($arr) === false || count($arr) === 0);
}

function arrayNotEmpty($arr) {
    return (is_array($arr) && (count($arr) > 0));
}

/**
 *  checks if is array, remove all empty elements.
 * if is not array, return the param.
 * @param type $arr
 * @return type array
 */
function arrayFilterEmptyValues($arr) {
    if (is_array($arr))
        return array_filter($arr);
    else
        return $arr;
}

function arrayExtractDistinctValue($models, $field) {
    $ret = array();
    if (isset($models) && is_array($models)) {
        foreach ($models as $model) {
            if (isset($model->{$field}) && isset($ret[$model->{$field}]) === false) {
                $ret[$model->{$field}] = $model->{$field};
            }
        }
    }
    return $ret;
}

function arrayExtractValue($models, $field) {
    $ret = array();
    if (isset($models) && is_array($models)) {
        foreach ($models as $model) {
            if (isset($model->{$field})) {
                $ret[] = $model->{$field};
            }
        }
    }
    return $ret;
}

function arrayExtractKeyValue($models, $field_key, $field_value) {
    $ret = array();
    if (isset($models) && is_array($models)) {
        foreach ($models as $model) {
            if (isset($model->{$field_key}) && isset($model->{$field_value})) {
                $ret[$model->{$field_key}] = $model->{$field_value};
            }
        }
    }

    return $ret;
}

/*
 * @param $arr array key value pair
 * @param $valueToLower bool if true then converts value to lower case.
 * @return an array containing lower case key and lower/normal case value.
 */

function arrayKeyToLower(array $arr, $valueToLower = false) {
    $ret = array();
    if ($valueToLower) {
        foreach ($arr as $key => $value) {
            $ret[strtolower($key)] = strtolower($value);
        }
    } else {
        foreach ($arr as $key => $value) {
            $ret [strtolower($key)] = $value;
        }
    }
    return $ret;
}

function arrayToCsv(array $arr, $delimiter = ', ') {
    $ret = implode($delimiter, $arr);
    return $ret;
}

/**
 *  Converts an array json object.
 * @param array $arr
 * @return json $arr
 */
function arrayToJson($arr, $unset = true) {
    if (is_array($arr) && count($arr) > 0) {
        $arr = \yii\helpers\BaseJson::encode($arr);
    } else if ($unset) {
        $arr = null;
    }
    return $arr;
}

/**
 * Converts a json object to array.
 * @param json $json
 * @return array $arr
 */
function jsonToArray($json) {
    if (is_array($json) === false) {
        //  $this->{$attribute} = json_decode($this->{$attribute});
        $json = \yii\helpers\BaseJson::decode($json);
    }
    return $json;
}

/* * ****** Number ******* */

function numRoundToNearestN($num, $n) {
    return (round($num / $n) * $n);
}

function numGetDecimal($num, $digits = 2) {
    $t = explode('.', $num);
    if (isset($t[1]))
        return str_pad($t[1], $digits, '0', STR_PAD_RIGHT);
    else
        return str_pad('', $digits, '0', STR_PAD_RIGHT);
}

function numIsEven($num) {
    return ($num % 2 == 0);
}

/* * ****** String ******* */

function strIsEmpty($value, $trim = false) {
    if ($trim) {
        $value = trim($value);
    }
    return ($value === null || $value == '');
}

function strStartsWith($haystack, $needle) {
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function strEndsWith($haystack, $needle) {
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function strContains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
}

/**
 * @param type $length
 * @return type 32 chars.
 */
function strRandom($length = 32) {
    return(strtoupper(substr(str_shuffle(MD5(microtime())), 0, $length)));
}

/**
 *
 * @param type $length
 * @return type variable length.
 */
function strRandomLong($length = 10) {
    $randomstring = '';
    // Length of md5 hash.
    $len_per_loop = 32;
    if ($length > $len_per_loop) {
        $multiplier = floor($length / $len_per_loop);
        $remainder = $length % $len_per_loop;
        for ($i = 0; $i < $multiplier; $i++) {
            $randomstring .= substr(str_shuffle(md5(rand())), 0, $len_per_loop);
        }
        $randomstring .= substr(str_shuffle(md5(rand())), 0, $remainder);
    } else {
        $randomstring = substr(str_shuffle(md5(rand())), 0, $length);
    }
    return strtoupper($randomstring);
}

/* * ****** Encryption ******* */

function encrypt($value) {
    return hash('sha256', $value);
}

/* * ****** Datetime ******* */

function calYearsFromDatetime($datetimeFrom, $datetimeTo = 'today') {
    return date_diff(date_create($datetimeFrom), date_create($datetimeTo))->y;
}

/**
 *
 * @param string $dateField '2014-06-20'.
 * @param string $timeField '12:20'.
 * @return string $str a string representing datetime.
 */
function combineDateTimeField($dateField, $timeField) {
    $date = new DateTime($dateField);
    $str = $date->format('Y-m-d') . ' ' . $timeField;
    return $str;
}

function isLeapYear($year) {
    if ($year % 400 == 0) {
        return true;
    } else if ($year % 100 == 0) {
        return false;
    } else if ($year % 4 == 0) {
        return true;
    } else
        return false;
}

/* * ** File system *** */

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function readFileToBytes($file) {
    $fp = fopen($file, 'r');
    $content = fread($fp, filesize($file));
    fclose($fp);
    return $content;
}

function createDirectory($dir) {
    if (is_dir($dir) === false) {
        if (mkdir($dir) === false) {
            throw new CException("Error saving data - failed to create directory");
        }
    }
}

// Deletes the directory with all sub-directories and files.
function deleteDirectory($dirPath) {
    if (is_dir($dirPath)) {
        if (substr($dirPath, strlen($dirPath) - 1, 1) != DIRECTORY_SEPARATOR) {
            $dirPath .=DIRECTORY_SEPARATOR;
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDirectory($file);
            } else {
                deleteFile($file);
            }
        }
        rmdir($dirPath);
    }
}

function deleteFile($filename) {
    if (file_exists($filename)) {
        chmod($filename, 0777);
        return unlink($filename);
    }
    return true;
}

function getFileExtension($file) {
    $name = $file->name;
    $extension = substr($name, strrpos($name, "."));
    return $extension;
}

function createSignature($values, $secret)
{
    ksort($values, SORT_STRING);
    $tmpStr = '';
    foreach($values as $k=>$v){
        if($v !== ''){
            $tmpStr .= $k.'='.$v.'&';
        }

    }
    $tmpStr = rtrim($tmpStr, '&');
    $tmpStr = md5($tmpStr.$secret);
    return $tmpStr;
}

function checkSignature($values, $secret, $signature)
{
    ksort($values, SORT_STRING);
    $tmpStr = '';
    foreach($values as $k=>$v){
        if($v !== ''){
            $tmpStr .= $k.'='.$v.'&';
        }
    }
    $tmpStr = rtrim($tmpStr, '&');
    $tmpStr = md5($tmpStr.$secret);
    if($tmpStr == $signature){
        return true;
    }else{
        return false;
    }
}

//加入辅助函数
//----------------------------------------------------------------------
/**
 * 获取一个url APP::mkModuleUrl 的同名函数
 * @param $mRoute	模块路由
 * @param $qData	URL 参数可以是字符串如 "a=xxx&b=ooo" 或者数组 array('k'=>'k_var')
 * @param $entry	模块入口 默认为当前入口，可指定入口程序 如 admin.php
 * @return 			URL
 */
function URL($mRoute, $qData=false, $entry=false){
    return mkModuleUrl($mRoute, $qData, $entry);
}
//----------------------------------------------------------------------
/// 数据交互组件的快捷访问方法 调用函数 dsMgr::call，自动处理错误，无错误时，直接返回组件结果
function DS() {
    $p = func_get_args();
    array_unshift($p, true);
  //  return call_user_func_array(array('dsMgr','call'), $p);
}

/// 数据交互组件的快捷访问方法 调用函数 dsMgr::call， 返回标准返回值结构，可自行处理错误
function DR() {
    $p = func_get_args();
    array_unshift($p, false);
    //return call_user_func_array(array('dsMgr','call'), $p);
}
 function mkModuleUrl($mRoute, $qData=false, $entry=false){
    $baseUrl	= $entry ?  W_BASE_URL.$entry : W_BASE_URL.W_BASE_FILENAME;
    $basePath	= W_BASE_URL;
    //--------------------------------------------------------------
    //锚点
    $aName = "";
    //把参数统一转换为数组
    if (!is_array($qData)){
        if (!empty($qData)){
            if (strpos($qData,'#')!==false ){
                $aName = substr($qData,strpos($qData,'#'));
                $qData = substr($qData, 0, strpos($qData,'#'));
            }
            parse_str($qData,$qData);
        }else{
            $qData = array();
        }
    }
    //--------------------------------------------------------------
    //wap URL特殊处理，增加SESSIONID
    if(ENTRY_SCRIPT_NAME == 'wap' && (!isset($_COOKIE) || empty($_COOKIE))){
        $qData[WAP_SESSION_NAME]=session_id();
    }
    //--------------------------------------------------------------
    //处理 APACHE 中 类 /indexschool.php/sdfdsf 地址，在 ？ 之前出现 %2f 时无法使用的BUG
    //可用于 rewrite 优化的数据
    $qStr1 = "";
    //不可用于 rewrite 优化的数据 值 或者 名 中，包含 / 字符
    $qStr2 = "";
    if(!empty($qData)) {
        $kv1 = array();
        $kv2 = array();
        foreach($qData as $k=>$v){
            if (strpos($k.$v, '/') === false) {
                $kv1[] = $k . "=" . urlencode($v);
            }else{
                $kv2[] = $k . "=" . urlencode($v);
            }
        }

        $qStr1 = empty($kv1) ? "" :  implode("&", $kv1);
        $qStr2 = empty($kv2) ? "" :  implode("&", $kv2);
    }
    //--------------------------------------------------------------
    if (R_MODE == 0 ){
        $rStr	= R_GET_VAR_NAME . '=' . $mRoute;
        if ($qStr1) $rStr.="&".$qStr1;
        if ($qStr2) $rStr.="&".$qStr2;
        return $baseUrl . '?' . $rStr . $aName;
    }
    //--------------------------------------------------------------
    if (R_MODE == 1 ){
        return empty($qData) ? $baseUrl."/" . trim($mRoute,'/ ')
            : $baseUrl."/" . trim($mRoute,'/ ')  ."?" . trim($qStr1.'&'.$qStr2, '& ') ;
    }
    //--------------------------------------------------------------
    if (R_MODE == 2 || R_MODE == 3 ){

        $rStr = $qStr1 ? preg_replace("#(?:^|&)([a-z0-9_]+)=#sim","/\\1-",$qStr1) : '/';
        $rStr .= $qStr2 ? "?".$qStr2 : '';
        return empty($qData)? $basePath. trim($mRoute,'/ ')
            : $basePath. trim($mRoute,'/ ') . $rStr ;
    }
    //--------------------------------------------------------------
    trigger_error("Unknow route type: [ ".R_MODE." ]", E_USER_ERROR);
    return false;
}
