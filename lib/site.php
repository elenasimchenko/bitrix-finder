<?php
namespace Finder;

use Bitrix\Main\Loader;

class Site {
  /**
   * Site Url
   * @param string $siteId
   * @return string
   */
  public static function getDomainUrl(string $siteId, string $protocol = 'https'):string {
      return $protocol.'://'.\CSite::GetByID($siteId)->Fetch()['SERVER_NAME'];
  }
  
    /**
   * Site domain name
   * @param string $siteId
   * @return string
   */
  public static function getDomain(string $siteId):string {
      return \CSite::GetByID($siteId)->Fetch()['SERVER_NAME'];
  }
}

