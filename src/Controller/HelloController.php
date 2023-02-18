<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Entity\User;
use App\Entity\UserProfle;
use App\Repository\CommentRepository;
use App\Repository\MicroPostRepository;
use App\Repository\UserProfleRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HelloController extends AbstractController
{

  private array $messages = [
    ['message' => 'Siema', 'created' => '2023/01/25'],
    ['message' => 'Czesc', 'created' => '2022/11/25'],
    ['message' => 'Bye!', 'created' => '2021/05/12']
  ];

  #[Route('/', name: 'app_index')]
  public function index(MicroPostRepository $posts, CommentRepository $comments): Response
  {
    // $post = new MicroPost();
    // $post->setTitle('siemaXD');
    // $post->setText('co tam?');
    // $post->setCreated(new DateTime());

    $post = $posts->find(8);
    $post->getComments()->count();

  //  dd($post);

    // $user = new User();
    // $user->setEmail('superuser@email.com');
    // $user->setPassword('haslo');

    // $profile = new UserProfle();
    // $profile->setUser($user);
    // $profiles->save($profile, true);

    // $profile = $profiles->find(1);
    // $profiles->remove($profile, true);


    return $this->render(
      'hello/index.html.twig',
      [
        'messages' => $this->messages,
        'limit' => 3
      ]
    );
  }
  #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
  public function showOne(int $id): Response
  {
    return $this->render(
      'hello/show_one.html.twig',
      [
        'message' => $this->messages[$id]
      ]
    );

    //    return new Response($this->messages[$id]);
  }
}
