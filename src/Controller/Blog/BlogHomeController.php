<?php
/*
 * (c) MajPanel <https://github.com/MajPanel/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace App\Controller\Blog;

use App\Entity\Blog;
use App\Services\MajPanel\Blog\ServiceBlog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Majid Kazerooni <support@majpanel.com>
 */
class BlogHomeController extends AbstractController
{
    /**
     * @Route("/", name="blog_home")
     */
    public function index()
    {
        $blog = new ServiceBlog($this->getDoctrine()->getManager(), Blog::class);
        return $this->render('Blog/Blog_home/index.html.twig', ['dataget_all' => $blog->getAllBlog(),]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function showcontent($id)
    {
        $blog = new ServiceBlog($this->getDoctrine()->getManager(), Blog::class);
        return $this->render('Blog/Blog_home/showcontent.html.twig', ['dataget' => $blog->getDataBlogId($id),]);
    }

}
