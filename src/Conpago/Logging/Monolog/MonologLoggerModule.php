<?php
	/**
	 * Created by PhpStorm.
	 * User: bg
	 * Date: 19.05.15
	 * Time: 23:25
	 */

	namespace Conpago\Logging\Monolog;


	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;

	class MonologLoggerModule implements IModule {

		public function build( IContainerBuilder $builder ) {

			$builder
				->registerType('Conpago\Logging\Monolog\LoggerFactory');

			$builder
				->register(function (IContainer $c)
					{
						/** @var LoggerFactory $loggerFactory */
						$loggerFactory = $c->resolve('Conpago\Logging\Monolog\LoggerFactory');

						return $loggerFactory->createLogger();
					})
				->asA('Conpago\Logging\Contract\ILogger');
		}
	}
