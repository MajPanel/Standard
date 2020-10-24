<?php


	namespace App\Controller\Admin\MajPanel\Grid\Blog;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\RedirectResponse;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

	class HomeController extends AbstractController
	{
		/**
		 * @Route("/admin/majpanel/blog/home", name="admin_majpanel_grid_blog_home")
		 */
		public function index(AuthenticationUtils $authenticationUtils)
		{
			$error = $authenticationUtils->getLastAuthenticationError();
			// last username entered by the user
			$lastUsername = $authenticationUtils->getLastUsername();
			$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

			return $this->render('Admin/MajPanel/Grid/Blog/Home.html.twig', [
				'controller_name' => 'HomeController',
			]);
		}
	}

