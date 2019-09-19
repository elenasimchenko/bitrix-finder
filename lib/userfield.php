<?php
namespace Finder;

class UF {
  /**
   * // TODO What? if many results
   * @param $name
   * @return int|boolean
   */
  public static function getEnumId(string $xmlId) {
      if( CUserFieldEnum::GetList([], ["XML_ID" => $xmlId])->selectedRowsCount() == 1)
        return CUserFieldEnum::GetList([], ["XML_ID" => $xmlId])->fetch()['ID'];
      else
        return false;
}
