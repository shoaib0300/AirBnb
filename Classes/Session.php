<?php
    class Session{
        public static function sessiosStart(){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
        }
        public static function setSession($key, $value){
            self::sessiosStart();
            $_SESSION[$key] = $value;
        }
        public static function getSession($key, $default=NULL){
            self::sessiosStart();
            return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;            
        }
        public static function destroySession(){
            self::sessiosStart();
            session_destroy();
        }
    }
