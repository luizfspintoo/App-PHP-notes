<?php

namespace Core;

use Monolog\Formatter\LineFormatter;
use Monolog\Level;
use Monolog\Logger as Monologger;
use Monolog\Handler\StreamHandler;

class Logger
{
  protected static $instance;

  /**
   * Method to return the Monolog instance
   *
   * @return Monologger
   */
  static public function getLogger()
  {
    if (!self::$instance) {
      self::configureInstance();
    }

    return self::$instance;
  }

  protected static function configureInstance()
  {
    $logger = new Monologger($_ENV['APP_NAME']);

    //format a mensagem de log. Ex.: [2021-08-01 00:00:00] [ERROR] Mensagem de log {"context": "contexto"}
    $output = "[%datetime%] [%level_name%] %message% %context% %extra%\n";
    $formatter = new LineFormatter($output);
    $stream = new StreamHandler($_ENV["LOG_FILE"], Level::Debug);
    $stream->setFormatter($formatter);

    $logger->pushHandler($stream);
    self::$instance = $logger;
  }

  protected static function log($level, $message, array $context = [])
  {
    $backtrace = debug_backtrace();
    $class = $backtrace[2]['class'];
    $method = $backtrace[2]['function'];
    $message = "[$class::$method] $message";
    self::getLogger()->log($level, $message, $context);
  }

  public static function debug($message, array $context = [])
  {
    self::log(Level::Debug, $message, $context);
  }

  public static function info($message, array $context = [])
  {
    self::log(Level::Info, $message, $context);
  }

  public static function warn($message, array $context = [])
  {
    self::log(Level::Warning, $message, $context);
  }

  public static function error($message, array $context = [])
  {
    self::log(Level::Error, $message, $context);
  }

}