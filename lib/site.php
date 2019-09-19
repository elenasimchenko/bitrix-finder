<?php
namespace Finder;

use Bitrix\Main\Loader;

class Site {
  /**
   * Site Url
   * @param string $siteId
   * @return string
   */
  public static function getDomainUrl($siteId, $protocol = 'https'):string {
      return $protocol.'://'.\CSite::GetByID($siteId)->Fetch()['SERVER_NAME'];
  }
  
    /**
   * Site domain name
   * @param string $siteId
   * @return string
   */
  public static function getDomain($siteId, $protocol = 'https'):string {
      return \CSite::GetByID($siteId)->Fetch()['SERVER_NAME'];
  }
}

