<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../twigextensions/Cell.php';

class Twig_Tests_Extension_Cell extends TestCase
{
  public function testLogin()
  {
    $output = Craft\Cell::login();
    $this->assertEquals("<!--# include virtual='/cells?name=login/show' -->", $output);
  }

  public function testGoogleTagWithoutBooking() {
    $output =  Craft\Cell::googleTag();
    $this->assertEquals("<!--# include virtual='/cells?name=google_tag/show' -->", $output);
  }

  public function testGoogleTagWithBooking() {
    $output =  Craft\Cell::googleTag(123);
    $this->assertEquals("<!--# include virtual='/cells?name=google_tag/show&booking_id=123' -->", $output);
  }

  public function testJavascriptBundle() {
    $output =  Craft\Cell::javascriptBundle("checkout");
    $this->assertEquals("<!--# include virtual='/cells?name=header/checkout' -->", $output);
  }

  public function testBookTour() {
    $output =  Craft\Cell::bookTour(1, [1], ['2016-01-01'], ['2017-01-01', '2017-02-01']);
    $this->assertEquals("<!--# include virtual='/cells?name=book_box/show&inline=yes&id=1&exclude_passenger_types%5B0%5D=1&date_exceptions%5B0%5D=2017-01-01&date_exceptions%5B1%5D=2017-02-01&date_restrictions%5B0%5D=2016-01-01' -->", $output);
  }

  public function testRenderCellWithoutArgs() {
    $output =  Craft\Cell::render("generic_cell/show");
    $this->assertEquals("<!--# include virtual='/cells?name=generic_cell/show' -->", $output);
  }

  public function testRenderCellWithArgs() {
    $output =  Craft\Cell::render("generic_cell/show", ["arg1" => 1]);
    $this->assertEquals("<!--# include virtual='/cells?name=generic_cell/show&arg1=1' -->", $output);
  }
}
