<?php
/**
 * Created by PhpStorm.
 * User: phoebegl
 * Date: 2016/11/6
 * Time: 15:11
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'Model/PostModel.php';
require_once 'Model/MessageModel.php';

$message = MessageModel::getInstance();
$post = PostModel::getInstance();

$app->get('/myDynamics',function (Request $request, Response $response,$args) use($post) {
    return $this->view->render($response, 'post.php');
});

$app->get('/myPosts',function (Request $request, Response $response,$args) use($post) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $result = $post->getMyPosts($_SESSION['userid']);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }

});

$app->post('/deletePost',function (Request $request, Response $response, $args) use($post){
    session_start();
    if (isset($_SESSION['userid'])) {
        $id = $_POST['postid'];
        $result = $post->deletePost($id);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        } else {
            $response->getBody()->write("<script>alert('删除失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/addPost',function (Request $request, Response $response, $args) use($post){
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $data = $request->getParsedBody();
        $title = filter_var($data['posttitle'], FILTER_SANITIZE_STRING);
        $content = filter_var($data['postcontent'], FILTER_SANITIZE_STRING);
        $result = $post->addPost($userid,$title,$content);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('发布成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        } else {
            $response->getBody()->write("<script>alert('发布失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/Dynamic/{postid}',function (Request $request, Response $response,$args) use($post) {
    session_start();
    if (isset($_SESSION['user'])) {
        $postid = $request->getAttribute('postid');
        $_SESSION['postid'] = $postid;
        return $this->view->render($response, 'postinfo.php');
    } else {
        return $this->view->render($response, 'login.php');
    }
});
$app->get('/Post/{postid}',function (Request $request, Response $response,$args) use($post) {
    session_start();
    if (isset($_SESSION['user'])) {
        $postid = $request->getAttribute('postid');
        $result = $post->getPostDetail($postid);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});
$app->get('/Comment/{postid}',function (Request $request, Response $response,$args) use($post) {
    session_start();
    if (isset($_SESSION['user'])) {
        $postid = $request->getAttribute('postid');
        $result = $post->showComments($postid);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/addComment',function (Request $request, Response $response, $args) use($post,$message){
    session_start();
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $postid = $_SESSION['postid'];
        $data = $request->getParsedBody();
        $content = filter_var($data['commentcontent'], FILTER_SANITIZE_STRING);
        $result = $post->addComment($userid,$postid,$content);
        if ($result == 1) {
            $author = $post->getAuthor($postid);
            $message->sendMessage($author,'您收到了新的评论');
            $response->getBody()->write("<script>alert('评论成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        } else {
            $response->getBody()->write("<script>alert('评论失败!');history.go(-1); </script>");
            return $response;
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->post('/like',function (Request $request, Response $response, $args) use($post){
    session_start();
    if (isset($_SESSION['userid'])) {
        $postid = $_SESSION['postid'];
        $result = $post->like($postid);
        if ($result == 1) {
            $response->getBody()->write("<script>alert('点赞成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        }
    } else {
        return $this->view->render($response, 'login.php');
    }
});

$app->get('/friendDynamics',function (Request $request, Response $response,$args) use($post) {
    return $this->view->render($response, 'postlist.php');
});

$app->get('/friendpost',function (Request $request, Response $response,$args) use($post) {
    session_start();
    if (isset($_SESSION['userid'])) {
        $id = $_SESSION['userid'];
        $result = $post->getFriendPosts($id);
        return $result;
    } else {
        return $this->view->render($response, 'login.php');
    }
});
