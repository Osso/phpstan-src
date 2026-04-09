<?php

declare(strict_types=1);

namespace Bug14654;

/**
 * @template TEntity of Entity
 */
abstract class Manager
{
}

/**
 * @template TManager of Manager<static>
 */
abstract class Entity
{
	/** @var TManager */
	protected Manager $manager;

	/** @return $this */
	public function me()
	{
		return $this;
	}
}
