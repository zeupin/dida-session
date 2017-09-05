<?php
/**
 * Dida Framework --Powered by Zeupin LLC
 * http://dida.zeupin.com
 */

namespace Dida;

use \ArrayAccess;

/**
 * Session 类
 */
class Session implements ArrayAccess
{
    public function offsetExists($key)
    {
        return array_key_exists($key, $_SESSION);
    }


    public function offsetGet($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }


    public function offsetSet($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public function offsetUnset($key)
    {
        unset($_SESSION[$key]);
    }


    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public function get($key)
    {
        return $_SESSION[$key];
    }


    public function has($key)
    {
        return array_key_exists($key, $_SESSION);
    }


    public function remove($key)
    {
        unset($_SESSION[$key]);
    }


    /**
     * Clear all session variables.
     *
     * @param array $except  Except these varables.
     */
    public function clear($except = [])
    {
        $session = [];
        foreach ($except as $key) {
            if (array_key_exists($key, $_SESSION)) {
                $session[$key] = $_SESSION;
            }
        }
        session_unset();
        foreach ($session as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
}
