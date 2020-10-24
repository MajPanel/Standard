<?php
/*
 * (c) MajPanel <https://github.com/MajPanel/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
	namespace App\Form\MajPanel\Blog;

	use App\Form\MajPanel\AbstractValidate;
	use Symfony\Component\Validator\Constraints as Assert;


	class EditFormValidateBlog extends AbstractValidate
	{

		/**
		 * @return array
		 */
		public function validateCheck(): array
		{
			$groups     = new Assert\GroupSequence(['Default', 'custom']);
			$constraint = new Assert\Collection([
			'id' => [new Assert\NotBlank()]
				,  'header' => [new Assert\NotBlank()]
				,  'content' => [new Assert\NotBlank()]
				,  'active' => [new Assert\NotBlank()]

			]);

			return $this->setValidate($constraint, $groups);
		}

	}
