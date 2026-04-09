<?php declare(strict_types = 1);

namespace PHPStan\Type\Generic;

use PHPStan\Type\ErrorType;
use PHPStan\Type\RecursionGuard;
use PHPStan\Type\Type;
use PHPStan\Type\VerbosityLevel;
use function sprintf;

final class TypeProjectionHelper
{

	public static function describe(
		Type $type,
		?TemplateTypeVariance $variance,
		VerbosityLevel $level,
	): string
	{
		$describedType = RecursionGuard::runOnObjectIdentity($type, fn () => $type->describe($level));
		if ($describedType instanceof ErrorType) {
			$describedType = '...';
		}

		if ($variance === null || $variance->invariant()) {
			return $describedType;
		}

		if ($variance->bivariant()) {
			return '*';
		}

		return sprintf('%s %s', $variance->describe(), $describedType);
	}

}
