<?php
class Blog extends Controller {
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->commentModel = $this->model('Comment');
    }

    // Página principal con acceso a las publicaciones más recientes
    public function index(){
        $posts = $this->postModel->getRecentPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('blog/index', $data);
    }

    // Mostrar un solo post y los comentarios
    public function post($id){
        $post = $this->postModel->getPostById($id);
        $comments = $this->commentModel->getCommentsByPostId($id);
        $data = [
            'post' => $post,
            'comments' => $comments
        ];
        $this->view('blog/post', $data);
    }

    // Agregar un nuevo comentario
    public function comment($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'post_id' => $id,
                'author' => trim($_POST['author']),
                'content' => trim($_POST['content']),
                'authorError' => '',
                'contentError' => ''
            ];

            // Validar autor y contenido
            if(empty($data['author'])){
                $data['authorError'] = 'El nombre es obligatorio';
            }
            if(empty($data['content'])){
                $data['contentError'] = 'El comentario es obligatorio';
            }

            // Si no hay errores, insertar el comentario
            if(empty($data['authorError']) && empty($data['contentError'])){
                if($this->commentModel->addComment($data)){
                    header('location: ' . urlRoot . '/blog/post/' . $id);
                } else {
                    die('Algo salió mal...');
                }
            }
        }

        $this->view('blog/post', $data);
    }

    // Agregar nuevo post (solo usuario principal)
    public function addPost(){
        // Verificar si el usuario es el principal (administrador)
        if(!isAdmin()) {
            // Si no es admin, redirigir al login
            header('location: ' . urlRoot . '/users/login');
            exit();  // Asegúrate de salir para no continuar la ejecución
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'titleError' => '',
                'contentError' => ''
            ];

            // Validar título y contenido
            if(empty($data['title'])){
                $data['titleError'] = 'El título es obligatorio';
            }
            if(empty($data['content'])){
                $data['contentError'] = 'El contenido es obligatorio';
            }

            // Si no hay errores, insertar el post
            if(empty($data['titleError']) && empty($data['contentError'])){
                if($this->postModel->addPost($data)){
                    header('location: ' . urlRoot . '/blog');
                    exit();
                } else {
                    die('Algo salió mal...');
                }
            }
        }

        $this->view('blog/addPost', $data);
    }

    // Nuevo método para mostrar una publicación específica
    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $comments = $this->commentModel->getCommentsByPostId($id);
        $data = [
            'post' => $post,
            'comments' => $comments,
            'title' => $post->title // Opcional: Puedes usar el título para la página
        ];

        $this->view('blog/post', $data);
    }
}
?>
