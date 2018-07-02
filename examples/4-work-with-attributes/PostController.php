<?php

/* /src/Controller/PostController.php */

namespace App\Controller;

use App\Email\NewPostEmail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// ...

class PostController extends Controller
{
    // ...

    public function newPostAction(NewPostEmail $email)
    {
        // ...

        $email
            ->send([
                'recipient-1@example.com',
                'recipient-2@example.com',
            ], [
                'author' => $author,
                'post' => $post,
            ]);

       // ...
    }

    // ...
}
