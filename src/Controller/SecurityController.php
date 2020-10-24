<?php

	namespace App\Controller;

	use App\Entity\User;
	use App\Services\MajPanel\JwtService;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
	use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
	use Symfony\Component\Security\Core\User\UserInterface;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
	use App\Services\MajPanel\ApiService;

	/**
     * @author Majid Kazerooni <support@majpanel.com>
     */

	class SecurityController extends AbstractController
	{
		/**
		 * @Route("/login", name="app_login")
		 */
		public function login(AuthenticationUtils $authenticationUtils): Response
		{
			// if ($this->getUser()) {
			//     return $this->redirectToRoute('target_path');
			// }

			// get the login error if there is one
			$error = $authenticationUtils->getLastAuthenticationError();
			// last username entered by the user
			$lastUsername = $authenticationUtils->getLastUsername();

			return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
		}

		/**
		 * @Route("/logout", name="app_logout")
		 */
		public function logout()
		{
			throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
		}

		/**
		 * @param JWTTokenManagerInterface $JWTManager
		 * @return JsonResponse
		 */
		public function getJwtTokenUser(
			Request $request,
			ApiService $apiService,
			UserPasswordEncoderInterface $encoder,
			JwtService $jwtService,
			JWTTokenManagerInterface $jWTTokenManagerInterface)
		{
			if (0 === strpos($request->headers->get('Content-Type') , 'application/json') ) {
				$request = $jwtService->transformJsonBody($request);
				$username = $request->get('username');
				$password = $request->get('password');
			} else  return $apiService->respondValidationError('Content-Type JSON  is invalid.');;

			$UserObject= $this->getDoctrine()
				->getRepository(User::class)
				->findOneBy(array('email' => $username));

			if(empty($UserObject)) return $apiService->respondUnauthorized('The given Email is invalid.');

			if (!$encoder->isPasswordValid($UserObject, $password, $UserObject->getSalt())) {
				return $apiService->respondUnauthorized('The given password is invalid.');
			}

			return new JsonResponse([$jwtService->getTokenUser($UserObject,$jWTTokenManagerInterface)]);

		}


	}
