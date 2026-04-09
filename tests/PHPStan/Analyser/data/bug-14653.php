<?php

declare(strict_types=1);

namespace Bug14653;

/**
 * @template TEntity of Entity
 */
class Manager
{
}

/**
 * @template TManager of Manager<static>
 */
class Entity
{
	/** @var TManager */
	protected Manager $manager;

	public function ping(): bool
	{
		return true;
	}
}

/** @extends Manager<MyEntity> */
class MyManager extends Manager
{
}

/** @extends Entity<MyManager> */
class MyEntity extends Entity
{
}

function test(MyEntity $entity): void
{
	$entity->ping();
}
