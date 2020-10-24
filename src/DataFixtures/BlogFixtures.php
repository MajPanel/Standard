<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager )
    {

		$lorem='Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing tristique risus nec feugiat. Nunc mattis enim ut tellus elementum sagittis. A diam maecenas sed enim. Fringilla ut morbi tincidunt augue interdum. Eget magna fermentum iaculis eu non. At tellus at urna condimentum. Quis imperdiet massa tincidunt nunc pulvinar. Vulputate eu scelerisque felis imperdiet. Rutrum tellus pellentesque eu tincidunt tortor aliquam. Fames ac turpis egestas integer eget aliquet nibh. Rhoncus mattis rhoncus urna neque viverra justo. Tincidunt praesent semper feugiat nibh sed. In ante metus dictum at tempor. Nunc sed blandit libero volutpat sed cras ornare arcu dui. Diam maecenas sed enim ut sem viverra aliquet eget sit. Sit amet nisl suscipit adipiscing bibendum est ultricies integer. Dui accumsan sit amet nulla facilisi morbi.

                                         Lacus vestibulum sed arcu non odio euismod lacinia at quis. Tristique senectus et netus et malesuada fames ac turpis egestas. Tortor pretium viverra suspendisse potenti nullam ac tortor. Gravida rutrum quisque non tellus orci. Non sodales neque sodales ut etiam sit amet. Nec tincidunt praesent semper feugiat nibh sed pulvinar. Vitae nunc sed velit dignissim sodales ut eu sem integer. Lectus magna fringilla urna porttitor. Purus viverra accumsan in nisl. Semper quis lectus nulla at. Nisi lacus sed viverra tellus in hac habitasse. Elit eget gravida cum sociis natoque.

                                         Interdum consectetur libero id faucibus nisl tincidunt eget nullam. Eget mi proin sed libero. Lectus mauris ultrices eros in cursus turpis massa. Consectetur a erat nam at lectus urna duis convallis. Nisi scelerisque eu ultrices vitae auctor eu. Urna id volutpat lacus laoreet non curabitur gravida arcu ac. Velit sed ullamcorper morbi tincidunt ornare massa eget. A diam maecenas sed enim. Vitae tortor condimentum lacinia quis vel. Consequat semper viverra nam libero justo laoreet sit. Erat nam at lectus urna duis convallis convallis. Iaculis urna id volutpat lacus laoreet non curabitur gravida. Luctus accumsan tortor posuere ac ut consequat. Odio euismod lacinia at quis risus sed vulputate. Adipiscing elit ut aliquam purus sit amet luctus venenatis lectus. At urna condimentum mattis pellentesque id. In eu mi bibendum neque egestas congue quisque egestas. Nullam ac tortor vitae purus faucibus. Cursus eget nunc scelerisque viverra. Tellus at urna condimentum mattis pellentesque id nibh tortor id.

                                         Elementum sagittis vitae et leo duis ut diam. Aliquet enim tortor at auctor urna. Amet porttitor eget dolor morbi non arcu risus. In fermentum et sollicitudin ac orci phasellus egestas. Lectus nulla at volutpat diam. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Sollicitudin tempor id eu nisl. Tellus pellentesque eu tincidunt tortor aliquam. At consectetur lorem donec massa sapien faucibus et molestie. Diam in arcu cursus euismod quis viverra nibh cras. Cursus sit amet dictum sit. Ac ut consequat semper viverra nam. Malesuada proin libero nunc consequat interdum varius sit. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Sodales neque sodales ut etiam sit. Morbi tempus iaculis urna id volutpat lacus laoreet non.

                                         Nibh mauris cursus mattis molestie a iaculis at erat. Posuere lorem ipsum dolor sit amet. Leo duis ut diam quam nulla porttitor massa id. In dictum non consectetur a erat nam. Platea dictumst quisque sagittis purus. Faucibus purus in massa tempor nec. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper. In eu mi bibendum neque egestas congue quisque. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Proin fermentum leo vel orci porta non pulvinar neque. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sagittis nisl rhoncus mattis rhoncus urna neque. Netus et malesuada fames ac. Sit amet volutpat consequat mauris nunc congue. Convallis posuere morbi leo urna molestie at. Eget felis eget nunc lobortis mattis aliquam faucibus. Adipiscing elit ut aliquam purus.';
	    for($i=1 ; $i<5 ; $i ++)
	    {
		    $blog = new Blog();
		    $blog->setContent($lorem);
		    $blog->setHeader('Content '.$i);
		    $blog->setCreatedAt(new \DateTime());
		    $blog->getModifiedAt(new \DateTime());
		    $manager->persist($blog);
	    }

        $manager->flush();
    }
}
