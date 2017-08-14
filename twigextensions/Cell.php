<?php
namespace Craft;

class Cell
{
  static function login()
  {
    return "<!--# include virtual='/cells?name=login/show' -->";
  }

  static function googleTag($booking_id = null)
  {
    $url = is_null($booking_id) ? '/cells?name=google_tag/show' : "/cells?name=google_tag/show&booking_id={$booking_id}";
    return "<!--# include virtual='{$url}' -->";
  }

  static function javascriptBundle($name)
  {
    return "<!--# include virtual='/cells?name=header/$name' -->";
  }

  static function bookTour($resource_id, $selected_pax, $restrication_dates, $exception_dates)
  {
    $args = [
      'inline' => 'yes',
      'id' => $resource_id,
      'exclude_passenger_types' => $selected_pax,
      'date_exceptions' =>  $exception_dates,
      'date_restrictions' => $restrication_dates,
    ];
    $params = http_build_query($args);
    return "<!--# include virtual='/cells?name=book_box/show&$params' -->";
  }

  static function render($name, $args = [])
  {
    $base_url = "<!--# include virtual='/cells?name=$name";
    if (count($args) > 0) {
      $params = http_build_query($args);
      $base_url .= "&$params";
    }
    return $base_url . "' -->";
  }
}
