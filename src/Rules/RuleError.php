<?php declare(strict_types = 1);

namespace PHPStan\Rules;

use PhpParser\Node;

class RuleError
{

	/** @var Node */
	public $node;

	/** @var string */
	public $message;

	public function __construct(Node $node, string $message)
	{
		$this->node = $node;
		$this->message = $message;
	}

}
