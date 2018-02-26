<?php

namespace App;

class AppTools
{
  public static function setInitialVersion ()
  {
    return 1;
  }

  public static function setVersion ($modelName,$idRow)
  {
    return 1;
  }

  public static function setNum ($modelName)
  {
    $num = \DB::table($modelName)->max('Num');

    if($num == null)
      return 1;
    else
      return ++$num;
  }

  public static function nullValue ($value)
  {
    return $value == null ? "" : $value;
  }


}
