<?php
namespace Finder;

use Bitrix\Main\Loader;
use \Bitrix\Highloadblock\HighloadBlockTable as HL;

class Hl {
  /**
   * Hl haven't CODE, but a NAME
   * @param $name
   * @return int|boolean
   */
  public static function getId(string $name) {
      try {
          Loader::includeModule('highloadblock');
      } catch (\Exception $e) {
          return 0;
      }

      $hlData = HL::getRow([
          'filter' => [
              'LOGIC' => 'OR',
              'NAME' => $name,
              'TABLE_NAME' => $name,
          ],
          'cache' => [
              'ttl' => 3600
          ]
      ]);

      return $hlData ? (int)$hlData['ID'] : false;
  }
}

