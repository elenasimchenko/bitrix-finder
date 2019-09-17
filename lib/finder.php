<?php
use Bitrix\Main\Loader;

class Finder {

  /**
   * Site domain name
   * @param string $siteId
   * @return string
   */
  public static function findDomain($siteId, $protocol = 'https'):string {
      return $protocol.'://'.\CSite::GetByID($siteId)->Fetch()['SERVER_NAME'];
  }
  
  /**
   * $code could be IBLOCK_CODE or IBLOCK_TYPE_ID:IBLOCK_CODE
   * @param $code
   * @return int
   */
  public static function findIblock(string $code):int {

      try {
          Loader::includeModule('iblock');
      } catch (\Exception $e) {
          return false;
      }

      if (false !== strpos($code, ':')) {
          list($typeCode, $iblockCode) = explode(':', $code);
          $filter['IBLOCK_TYPE_ID'] = $typeCode;
          $filter['CODE'] = $iblockCode;
      } else {
          $filter = [
              'CODE' => $code
          ];
      }

      $data = IblockTable::getRow([
          'filter' => $filter,
          'select' => [
              'ID'
          ],
          'cache' => [
              'ttl' => 3600
          ]
      ]);

      return $data ? (int)$data['ID'] : 0;
  }
}
