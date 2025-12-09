<?php

    namespace App\Controllers;

    use App\Models\Blog;

    class BlogController {
        public function list(){
            $blogs = Blog::all();
            require __DIR__ . '/../Views/blogs/list.php';
        }

        public function show($id){
            $blog = Blog::find($id);
            require __DIR__ . '/../Views/blogs/show.php';
        }

        public function create(){
            require __DIR__ . '/../Views/blogs/create.php';
        }

        public function store(){
            $title = $_POST['title'];
            $content = $_POST['content'];

            Blog::create([
                'title' => $title,
                'content' => $content,
            ]);
            
            header('Location: /blog/list');
        }

        public function edit($id){
            $blog = Blog::find($id);

            require __DIR__ . '/../Views/blogs/edit.php';
        }

        public function update($id){
            $title = $_POST['title'];
            $content = $_POST['content'];

            Blog::update($id , [
                'title' => $title,
                'content' => $content,
            ]);
            
            header('Location: /blog/list');
        }
        
        public function delete($id){
            Blog::delete($id);
            
            header('Location: /blog/list');
        }
    }