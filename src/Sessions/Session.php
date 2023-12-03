<?php

namespace App\Sessions;
    class Session{
        public static function sessionStart(){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
        }
        public static function setSession($key, $value){
            self::sessionStart();
            $_SESSION[$key] = $value;
        }
        public static function getSession($key, $default=NULL){
            self::sessionStart();
            return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;            
        }
        public static function destroySession(){
            self::sessionStart();
            session_destroy();
        }
    }
