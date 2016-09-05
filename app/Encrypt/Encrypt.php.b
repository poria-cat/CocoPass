<?php
/**
 * Created by PhpStorm.
 * User: Elven
 * Date: 2016/9/1
 * Time: 21:20
 */

namespace App\Encrypt;


class encrypt
{
    /**
     * 加密.
     *
     * @param mixed  $contents   要加密的内容
     * @param string $encryptKey 加密的Key，长度为16，24，32的key
     *
     * @return string 已加密的内容
     */

//    public  function encrypt($contents, $encryptKey)
//    {
//        //填充为16位
//        $encryptKey = substr($encryptKey.'0000000000000000', 0,16);
//        // 将非标量数据转换为字符串
//        if (!is_scalar($contents)) {
//            $contents = json_encode($contents);
//        }
//        // 获取块尺寸
//        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
//        // 计算要填充的值
//        $padding = $size - strlen($contents) % $size;
//        // 添加Padding
//        $contents .= str_repeat(chr($padding), $padding);
//        // 生成随机字符串
//        // $iv = str_random($size);
//        $iv = mcrypt_create_iv($size);
//        // 进行AES/CBC加密
//        $encryptedData = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryptKey, $contents, MCRYPT_MODE_CBC, $iv).$iv;
//
//        return base64_encode($encryptedData);
//    }

    /**
     * 解密.
     *
     * @param string $contents   已加密的内容
     * @param string $encryptKey 解密Key，长度为16，24，32的key
     *
     * @return string 已解密的内容
     */
//    public  function decrypt($contents, $encryptKey)
//    {
//
//        //填充为16位
//        $encryptKey = substr($encryptKey.'0000000000000000', 0,16);
//        $encryptedData = base64_decode($contents);
//        // 获取块尺寸
//        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
//        // 获取加密iv
//        $iv = substr($encryptedData, -$size);
//        // 移除iv，获取加密正文
//        $contents = substr($encryptedData, 0, -$size);
//        // 进行AES/CBC解密
//        $contents = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $encryptKey, $contents, MCRYPT_MODE_CBC, $iv);
//        // 获取Padding的值
//        $padding = ord($contents{strlen($contents) - 1});
//
//        // 移除Padding，并返回加密前数据
//        return substr($contents, 0, -$padding);
//    }
    static public $mode = MCRYPT_MODE_NOFB;

    static public function generateKey($length=32) {
        if (!in_array($length,array(16,24,32)))
            return False;

        $str = '';
        for ($i=0;$i<$length;$i++) {
            $str .= chr(rand(33,126));
        }

        return $str;
    }

    static public function encrypt($data, $key) {
        $key = substr($key.'00000000000000000000000000000000', 0,32);
        if (strlen($key) > 32 || !$key)
            return trigger_error('key too large or key is empty.', E_USER_WARNING) && False;

        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, self::$mode);
        $iv = mcrypt_create_iv($ivSize, (substr(PHP_OS,0,1) == 'W' ? MCRYPT_RAND : MCRYPT_DEV_URANDOM ));
        $encryptedData = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, self::$mode, $iv);
        $encryptedData = $iv . $encryptedData;

        return base64_encode($encryptedData);
    }

    static public function decrypt($data, $key) {
        $key = substr($key.'00000000000000000000000000000000', 0,32);
        if (strlen($key) > 32 || !$key)
            return trigger_error('key too large or key is empty.', E_USER_WARNING) && False;

        $data = base64_decode($data);
        if (!$data)
            return False;

        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, self::$mode);
        $iv = substr($data, 0, $ivSize);

        $data = substr($data, $ivSize);

        $decryptData = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $data, self::$mode, $iv);

        return $decryptData;
    }
}