<?php


	namespace App\Controller\Admin\MajPanel;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\RedirectResponse;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
	use App\Services\MajPanel\JwtService;
	use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
	use Symfony\Component\HttpFoundation\Cookie;
	use Symfony\Component\HttpFoundation\Response;

	use App\Entity\User;
	class HomeController extends AbstractController
	{
		/**
	    * @Route("/admin/majpanel/home", name="majpanel_home")
	    * @IsGranted("ROLE_ADMIN")
	    */
		public function index(Request $request,AuthenticationUtils $authenticationUtils,JwtService $jwtService,JWTTokenManagerInterface $jWTTokenManagerInterface)
		{
			$error = $authenticationUtils->getLastAuthenticationError();
			// last username entered by the user
			$lastUsername = $authenticationUtils->getLastUsername();
			$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

			$user=new User();
			$user->setEmail($lastUsername);
			$token=$jwtService->getTokenUser( $user, $jWTTokenManagerInterface );

			// create JWT cookies
			$response = new Response();
			$jwtService->createJWTCookie($response,$token['token']);

			return $this->render('Admin/Index.html.twig', [
				'last_username' => $lastUsername,
				'error' => $error
			]);
		}

		/**
		 * @Route("/admin/majpanel/getstart", name="majpanel_getstart")
		 */
		public function getStart()
		{
			return $this->render('Admin/Start.html.twig');
		}


	}

