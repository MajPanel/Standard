<?php


	namespace App\Services\MajPanel;
	use Symfony\Component\Security\Core\User\UserInterface;
	use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpFoundation\Cookie;

	class JwtService
	{

		/**
		 * @param UserInterface $user
		 * @param JWTTokenManagerInterface $JWTManager
		 */
		public function getTokenUser(UserInterface $user, JWTTokenManagerInterface $JWTManager)
		{

			return ['token' => $JWTManager->create($user)];
		}


		public function createJWTCookie(Response $response, $jwt)
		{
			$response->headers->clearCookie('BEARER');
			$response->headers->setCookie(
				new Cookie(
					"BEARER",
					$jwt,
					new \DateTime("+1 day"),
					"/",
					null,
					false,
                    false,
					false,
					'strict'
				)
			);
			$response->sendHeaders();
		}

		public function getJWTCookie(Request $request)
		{
			if( $request->cookies->has('BEARER') ) {
			return 	$request->cookies->get('BEARER');
			}
		}

		public function transformJsonBody(Request $request)
		{
			$data = json_decode($request->getContent(), true);

			if ($data === null) {
				return $request;
			}

			$request->request->replace($data);

			return $request;
		}


	}
