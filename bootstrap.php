<?php

/**
* @package   s9e\mediaembed
* @copyright Copyright (c) 2015-2018 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace akmaljp\kedai-informasi;

use Flarum\Formatter\Event\Configuring;
use Illuminate\Events\Dispatcher;
use akmaljp\Configurator\Bundles\MediaPack;

function subscribe(Dispatcher $events)
{
	$events->listen(
		ConfigureFormatter::class,
		function (ConfigureFormatter $event)
		{
			$event->configurator->MediaEmbed->add(
				'KedaiInformasi',
				[
					'host'    => 'kedaiinformasi.website',
					'extract' => "!kedaiinformasi\\.website/play/h(?'id'[-0-9A-Z_a-z]+)!",
					'iframe'  => ['src' => 'https://kedaiinformasi.website/video/{@id}']
				]
			);
		}
	);
}

return __NAMESPACE__ . '\\subscribe';
