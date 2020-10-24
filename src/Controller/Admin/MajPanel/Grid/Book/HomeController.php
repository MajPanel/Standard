<?php

    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

	namespace App\Controller\Admin\MajPanel\Grid\Book;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

	class HomeController extends AbstractController
	{
		/**
		 * @Route("/admin/majpanel/book/home", name="admin_majpanel_grid_book_home")
		 * @IsGranted("ROLE_ADMIN")
		 */

		public function index(AuthenticationUtils $authenticationUtils)
		{
			return $this->render('Admin/MajPanel/Grid/Book/Home.html.twig', [
				'controller_name' => 'HomeController',
			]);
		}
	}

