<?php
namespace Craft;

use Twig_Extension;
use Twig_SimpleFunction;

class SealinkTwigExtensions extends \Twig_Extension
{
  public function getFunctions()
  {
    $safe_functions = ['is_safe' => ['html']];

    return [
      new Twig_SimpleFunction('loginCell', 'Craft\Cell::login', $safe_functions),
      new Twig_SimpleFunction('googleTagCell', 'Craft\Cell::googleTag', $safe_functions),
      new Twig_SimpleFunction('javascriptBundleCell', 'Craft\Cell::javascriptBundle', $safe_functions),
      new Twig_SimpleFunction('bookTourCell', 'Craft\Cell::bookTour', $safe_functions),
      new Twig_SimpleFunction('renderCell', 'Craft\Cell::render', $safe_functions)
    ];
  }
}
