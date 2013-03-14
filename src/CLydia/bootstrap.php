<?php
/**
 * Bootstrapping, setting up and loading the core.
 *
 * @package LydiaCore
 */

/**
 * Enable auto-load of class declarations.
 */
function autoload($aClassName) 
{
  $classFile = "/src/{$aClassName}/{$aClassName}.php";
  $file1 = LYDIA_SITE_PATH . $classFile;
  $file2 = LYDIA_INSTALL_PATH . $classFile;
  if(is_file($file1)) 
  {
    require_once($file1);
  } 
  elseif(is_file($file2)) 
  {
    require_once($file2);
  }
}

/**
* Helper, wrap html_entites with correct character encoding
*/
function htmlent($str, $flags = ENT_COMPAT) 
{
  return htmlentities($str, $flags, CLydia::Instance()->config['character_encoding']);
}

/**
* Set a default exception handler and enable logging in it.
*/
function exception_handler($exception) 
{
  echo "Lydia: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('exception_handler');

spl_autoload_register('autoload');