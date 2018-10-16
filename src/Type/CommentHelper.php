<?php declare(strict_types = 1);

namespace PHPStan\Type;

use PhpParser\Node;

class CommentHelper
{

	/**
	 * @param Node|\Reflector $element
	 * @return string|null
	 */
	public static function getDocComment($element): ?string
	{
		if ($element instanceof Node) {
			return static::getDocCommentOfNode($element);
		}

		return static::getDocCommentOfReflector($element);
	}

	private static function getDocCommentOfNode(Node $node): ?string
	{
		$phpDoc = $node->getDocComment();
		if ($phpDoc !== null) {
			return $phpDoc->getText();
		}

		return null;
	}

	private static function getDocCommentOfReflector(\Reflector $reflector): ?string
	{
		if ($reflector instanceof \ReflectionFunctionAbstract) {
			$docComment = $reflector->getDocComment();
			if ($docComment !== false) {
				return $docComment;
			}
		}

		if ($reflector instanceof \ReflectionClass) {
			$docComment = $reflector->getDocComment();
			if ($docComment !== false) {
				return $docComment;
			}
		}

		if ($reflector instanceof \ReflectionProperty) {
			$docComment = $reflector->getDocComment();
			if ($docComment !== false) {
				return $docComment;
			}
		}

		if ($reflector instanceof \ReflectionClassConstant) {
			$docComment = $reflector->getDocComment();
			if ($docComment !== false) {
				return $docComment;
			}
		}

		return null;
	}

}
