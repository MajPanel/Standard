<?php


	namespace App\EventListener;



	use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

	class AcmeExceptionListener
	{
		public function onKernelException(GetResponseForExceptionEvent $event)
		{
			// You get the exception object from the received event
			$exception = $event->getException();
			$message ['errors']=  sprintf(
				'%s with code: %s',
				$exception->getMessage(),
				$exception->getCode()
			);

			// Customize your response object to display the exception details
			$response = new JsonResponse();
			$response->setContent(json_encode($message));

			// HttpExceptionInterface is a special type of exception that
			// holds status code and header details
			if ($exception instanceof HttpExceptionInterface) {
				$response->setStatusCode($exception->getStatusCode());
				$response->headers->replace($exception->getHeaders());
			} else {
				$response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
			}

			// Send the modified response object to the event
			$event->setResponse($response);
		}
	}
