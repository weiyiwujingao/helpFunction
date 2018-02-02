<?php
/**
 * 对数据进行编码转换
 * @param array/string $data       数组
 * @param string $output    转换后的编码
 */
function data_iconv_gbk($data, $output = 'GBK') {
    if (!is_array($data)) {
        if (is_bool($data) || is_numeric($data)) {
            return $data;
        }
        $encode_arr = array('UTF-8', 'ASCII', 'GBK', 'GB2312', 'BIG5', 'JIS', 'eucjp-win', 'sjis-win', 'EUC-JP');
        $encoded = mb_detect_encoding($data, $encode_arr);
        if ($output == $encoded) {
            return $data;
        }
        return iconv($encoded, $output . '//IGNORE', $data);
    } else {
        foreach ($data as $key => $val) {
            $key = pp_iconv($key, $output);
            $data[$key] = pp_iconv($val, $output);
        }
        return $data;
    }
}

function data_iconv_utf8($data, $output = 'UTF-8') {
    if (!is_array($data)) {
        if (is_bool($data) || is_numeric($data)) {
            return $data;
        }
        $encode_arr = array('ASCII', 'GBK', 'GB2312', 'UTF-8', 'BIG5', 'JIS', 'eucjp-win', 'sjis-win', 'EUC-JP');
        $encoded = mb_detect_encoding($data, $encode_arr);
        if ($output == $encoded) {
            return $data;
        }
        return iconv($encoded, $output . '//IGNORE', $data);
    } else {
        foreach ($data as $key => $val) {
            $key = pp_iconv_utf8($key, $output);
            $data[$key] = pp_iconv_utf8($val, $output);
        }
        return $data;
    }
}