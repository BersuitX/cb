<?hh

namespace FastRoute\TestFixtures;

function all_options_simple(): \FastRoute\Dispatcher {
    return \FastRoute\simpleDispatcher(
      $Vmk4y5b0ug21 ==> {},
      shape(
        'routeParser' => \FastRoute\RouteParser\Std::class,
        'dataGenerator' => \FastRoute\DataGenerator\GroupCountBased::class,
        'dispatcher' => \FastRoute\Dispatcher\GroupCountBased::class,
        'routeCollector' => \FastRoute\RouteCollector::class,
      ),
    );
}

function all_options_cached(): \FastRoute\Dispatcher {
    return \FastRoute\cachedDispatcher(
      $Vmk4y5b0ug21 ==> {},
      shape(
        'routeParser' => \FastRoute\RouteParser\Std::class,
        'dataGenerator' => \FastRoute\DataGenerator\GroupCountBased::class,
        'dispatcher' => \FastRoute\Dispatcher\GroupCountBased::class,
        'routeCollector' => \FastRoute\RouteCollector::class,
        'cacheFile' => '/dev/null',
        'cacheDisabled' => false,
      ),
    );
}
