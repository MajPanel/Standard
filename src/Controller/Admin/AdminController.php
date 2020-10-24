<?php

	namespace App\Controller\Admin;

	use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

	/**
	 * Require ROLE_ADMIN for *every* controller method in this class.
	 *
	 * @IsGranted("ROLE_ADMIN")
	 */
	class AdminController
	{
		/**
		 * Require ROLE_ADMIN for only this controller method.
		 *
		 * @IsGranted("ROLE_ADMIN")
		 */
		public function adminDashboard()
		{
			$this->denyAccessUnlessGranted('ROLE_ADMIN');

			// or add an optional message - seen by developers
			$this->denyAccessUnlessGranted('ROLE_ADMIN', null,
				'User tried to access a page without having ROLE_ADMIN');

		}
	}