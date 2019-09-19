<?php
namespase Finder;

use Bitrix\Main\Loader;

/**
 * Fined IBlock data by CODE
 */
class IBlock {

  /**
   * $code could be IBLOCK_CODE or IBLOCK_TYPE_ID:IBLOCK_CODE
   * @param $code
   * @return int|boolean
   */
  public static function getId(string $code) {
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
      return $data ? (int)$data['ID'] : false;
  }
  
  /**
     * @param $code could be SECTION_CODE or IBLOCK_CODE:SECTION_CODE
     * @return int|boolean
     */
    public static function getSectionId(string $code) {
        try {
            Loader::includeModule('iblock');
        } catch (\Exception $e) {
            return false;
        }

        if (false !== strpos($code, ':')) {
            list($iblockCode, $sectionCode) = explode(':', $code);
            $filter['IBLOCK_ID'] = self::getId($iblockCode);
            $filter['CODE'] = $sectionCode;
        } else {
            $filter = [
                'CODE' => $code
            ];
        }

        $data = SectionTable::getRow([
            'filter' => $filter,
            'select' => [
                'ID'
            ],
            'cache' => [
                'ttl' => 3600
            ]
        ]);

        return $data ? (int)$data['ID'] : false;
    }
    
    /**
     * @param $code
     * @return int|bool
     */
    public static function getElementId(string $code) {
        try {
            Loader::includeModule('iblock');
        } catch (\Exception $e) {
            return false;
        }

        $data = ElementTable::getRow([
            'filter' => [
                'CODE' => $code
            ],
            'select' => [
                'ID'
            ],
            'cache' => [
                'ttl' => 3600
            ]
        ]);

        return $data ? $data['ID'] : false;
    }
  
}
