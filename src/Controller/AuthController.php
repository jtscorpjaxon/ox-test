<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 27.10.2021
 * Time: 14:53
 */
namespace App\Controller;

use App\Entity\Users;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
class AuthController extends ApiController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->transformJsonBody($request);
        $username = $request->get('username');
        $password = $request->get('password');
        $email = $request->get('email');

        if (empty($username) || empty($password) || empty($email)){
            return $this->respondValidationError("Invalid Username or Password or Email");
        }


        $user = new Users($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setUsername($username);
        $em->persist($user);
        $em->flush();
        return $this->respondWithSuccess(sprintf('User %s successfully created', $user->getUsername()));
    }
    /**
     * @param UserInterface $user
     * @param JWTTokenManagerInterface $JWTManager
     * @return JsonResponse
     */
    public function getTokenUser(UserInterface $user, JWTTokenManagerInterface $JWTManager)
    {
        return new JsonResponse(['token' => $JWTManager->create($user)]);
    }

}