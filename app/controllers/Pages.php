<?php 
class Pages extends Controller {
    public function __construct(){
        // Cargar los modelos necesarios
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->commentModel = $this->model('Comment'); 
        $this->commentModel = $this->model('Comment');

    }

    // Página principal
    public function index(){
        // Obtener usuarios
        $user = $this->userModel->getUsers(); 
        
        // Obtener publicaciones recientes, de tecnología y cultura
        $recentPosts = $this->postModel->getRecentPosts();
        $techPosts = $this->postModel->getPostsByCategory('tecnologia');
        $culturePosts = $this->postModel->getPostsByCategory('cultura');
        
        // Pasar todos los datos a la vista
        $data = [
            'title' => 'Página principal',
            'name'  => 'Jorge Ruiz',
            'users' => $user,
            'recent_posts' => $recentPosts,
            'tech_posts' => $techPosts,
            'culture_posts' => $culturePosts
        ];
        
        $this->view('pages/index', $data);
    }

    // Página 'Acerca de'
    public function about(){            
        $this->view('pages/about');
    }

    /*public function vmas() {
        $data = [
            'title' => 'VMAs 2024',
            'comments' => $this->commentModel->getCommentsByPostId(1) // Obtén los comentarios
        ];
        $this->view('pages/vmas', $data); // Carga la vista
    }*/

    public function vmas() {
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Limpiar los datos del formulario
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Preparar los datos del comentario
            $data = [
                'post_id' => $_POST['post_id'],
                'author' => trim($_POST['author']),
                'content' => trim($_POST['content']),
                'title' => 'VMAs 2024',
                'comments' => $this->commentModel->getCommentsByPostId(1) // Mantener los comentarios existentes
            ];
    
            // Agregar el comentario a la base de datos
            if ($this->commentModel->addComment($data)) {
                // Redireccionar para evitar el reenvío del formulario al actualizar
                header("Location: " . urlRoot . "/pages/vmas");
                exit;
            } else {
                die('Algo salió mal al agregar el comentario.');
            }
        } else {
            // Si no se envió el formulario, simplemente mostrar la página con los comentarios
            $data = [
                'title' => 'VMAs 2024',
                'comments' => $this->commentModel->getCommentsByPostId(1)
            ];
        }
    
        $this->view('pages/vmas', $data);
    }
    

    public function comida() {
        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Limpiar los datos del formulario
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Preparar los datos del comentario
            $data = [
                'post_id' => $_POST['post_id'],  // ID del post para comida italiana
                'author' => trim($_POST['author']),
                'content' => trim($_POST['content']),
                'title' => 'Comida Italiana',
                'comments' => $this->commentModel->getCommentsByPostId(2) // Mantener los comentarios existentes del post_id 2
            ];
    
            // Agregar el comentario a la base de datos
            if ($this->commentModel->addComment($data)) {
                // Redireccionar para evitar el reenvío del formulario al actualizar
                header("Location: " . urlRoot . "/pages/comida");
                exit;
            } else {
                die('Algo salió mal al agregar el comentario.');
            }
        } else {
            // Si no se envió el formulario, simplemente mostrar la página con los comentarios
            $data = [
                'title' => 'Comida Italiana',
                'comments' => $this->commentModel->getCommentsByPostId(2)
            ];
        }
    
        // Cargar la vista con los datos
        $this->view('pages/comida', $data);
    }
    
    
}
?>
