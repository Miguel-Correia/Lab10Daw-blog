<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_model;
use Illuminate\Support\Facades\Storage;
use Cookie;


class Blog extends Controller{

    public function index(){
        
        $posts = Blog_model::get_posts();

        $cookie_value = Cookie::get('siteAuth');
        if($result = Blog_model::check_remember_digest($cookie_value)){
            session(['id' => $result->id]);
            session(['name' => $result->name]);
            session(['email' => $result->email]);
        }

        return view('index_template', compact('posts'));
    }

    public function register(){
        return view('register_template');
    }

    public function register_action(){
        $this->validate(request(), [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'pswd'=>'required|min:5',
            'conf_pswd'=>'required|same:pswd',
        ]);

        $name = request('name');
        $email = request('email');
        $pswd = request('pswd');
        $conf_pswd = request('conf_pswd');
        
        Blog_model::register_user($name, $email, $pswd);
        $message = "Success: New user registered";
        return view('message_template', compact('message'));
    }

    public function login(){
        return view('login_template');
    }


    public function login_action(){
        $this->validate(request(), [
            'email'=>'required|email',
            'pswd'=>'required',
        ]);
        
        $email = request('email');
        $pswd = request('pswd');

        $result = Blog_model::login_user($email, $pswd);

        if($result == false) {
            $err_auth = "Login failed";
            return view('login_template', compact('err_auth'));
 
        }else {
            session(['id' => $result->id]);
            session(['name' => $result->name]);
            session(['email' => $result->email]);
            $message = "Welcome back!";

            if(request('remember')) {
                $cookie_name = 'siteAuth';
                $cookie_time = (60 * 24 * 30);
                $remember_digest = substr(md5(time()),0,32);
                Blog_model::set_remember_digest($result->id, $remember_digest);
                Cookie::queue($cookie_name, $remember_digest, $cookie_time);
            }
            return view('message_template', compact('message'));
        }
    }

    public function logout(){
        session(['id' => '']);
        session(['name' => '']);
        session(['email' => '']);
        Cookie::queue('siteAuth', 'NOTSET');
        $message="See you back soon!";
        return view('message_template', compact('message'));
    }

    public function post($blog_id = FALSE){
        #Inserir
        if($blog_id == FALSE){
            $content = '';
            $action = 'blog.post_action';
            $btn_text = 'Post';
        #Atualizar
        }else {
            $blog_values = Blog_model::get_blog(session('id'), $blog_id);
            $content = $blog_values->content;
            $action = 'blog.update_post_action';
            $btn_text = 'Update';
        }

        return view('blog_template', compact('content', 'action', 'btn_text', 'blog_id'));
        
    }

    public function post_action($blog_id = FALSE){

        #inserir
        if($blog_id == FALSE){
            $content = request('blog_content');
            Blog_model::new_blog(session('id'), $content);
            
            $message = "SUCCESS: New post submitted";
        #atualizar
        }else{
            $content = request('blog_content');
            Blog_model::update_blog(session('id'), $blog_id,$content);
            
            $message = "SUCCESS: Post updated";
        }

        return view('message_template', compact('message'));
    }


}
?>