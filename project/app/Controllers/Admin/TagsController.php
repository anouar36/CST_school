<?php
namespace App\Controllers\Admin;


use App\Controllers\View;
use App\Repositories\CoursRepositorie;
use App\Repositories\UserRepositorie;
use App\Repositories\Auth;
use App\Repositories\TagRepositorie;



if ($_SESSION['role'] !== 'Admin') {
    die('خطأ: ليس لديك الصلاحية لتنفيذ هذا الإجراء');
}

class TagsController
{
    public function index()
    {
        $tags = new TagRepositorie;
        $nmuberUse = $tags->count();
        $tags = $tags->index();
        





        View::render('Admin/tags.twig', [
            'tags' => $tags
        ]);
    }

    public function addTag()
    {
        $tag_name = $_POST['tag-name'];
        $tag_active = $_POST['tag-active'];
        $tag = new TagRepositorie;
        $tag->addTag($tag_name, $tag_active);
        header('Location: /admin/tags');
    }

    public function deleteTag()
    {
        $id = $this->extractTagId($_GET['url']);
        if ((int) $id == 0) {
            return header('Location: /admin/tags');
        }
        $tag = new TagRepositorie;
        $resulte = $tag->deleteTag($id);

        header('Location: /admin/tags');
    }

    public function updateTag()
    {     
        $name = $_POST['edit-tag-name'];
        $id = $_POST['edit-tag-id'];
    
        if (isset($_POST['edit-tag-active'])) {
            $active = 'on';
        } else {
            $active = 'off';
        }

        if ((int) $id == 0) {
            return header('Location: /admin/tags');
        }
        

        
        $tag = new TagRepositorie;

        $resulte = $tag->updateTag($id, $name, $active);

        header('Location: /admin/tags');
    }

    public function extractTagId($url)
    {
        // Split the string by '/'
        $segments = explode('/', $url);
        // Return the last segment, which is the ID
        return (int) end($segments);
    }


}
