<?php
namespace App;
use Illuminate\Support\Facades\DB;
class Blog_model{

    public static function get_posts(){

        $posts = DB::select("SELECT m.id, m.user_id, u.name, m.content, m.created_at, m.updated_at FROM users as u, microposts as m WHERE u.id = m.user_id ORDER BY updated_at DESC");
        return $posts;
    } 

    public static function register_user($username, $email, $password){
        $query = "INSERT INTO users (name, email, created_at, updated_at, password_digest) VALUES ('" . $username . "','" . $email . "', NOW(), NOW(),'" . substr(md5($password), 0, 32) . "')";
        DB::insert($query);
        return true;    
    }

    public static function login_user($email, $password){

        $query = "SELECT * FROM users WHERE email ='" . $email . "' AND password_digest ='" . substr(md5($password),0,32) . "'";
        $result = DB::select($query);
        
        if (!$result) 
            return false;
        else 
             return $result[0];    
    }

    public static function new_blog($user_id, $blog){
        $query = "INSERT INTO microposts (content, user_id, created_at, updated_at, likes) VALUES ('" . $blog . "', '" . $user_id . "', NOW(), NOW(), '0');";
        DB::insert($query);
        return true;
    }

    public static function get_blog($user_id, $blog_id){
        $query = "SELECT * FROM microposts WHERE user_id = '" . $user_id . "' AND id = '" . $blog_id . "'";
        $result = DB::select($query);
        if(!$result)
            return false;
        else
            return $result[0];
    }

    public static function update_blog($user_id, $blog_id, $content){
        $query = "UPDATE microposts SET content = '" . $content . "' WHERE user_id = '" . $user_id . "' AND id = '" . $blog_id . "'";
        DB::update($query);
        return true;
    }

    public static function set_remember_digest($id,$remember_digest){
        $query = "UPDATE users SET remember_digest = '" . $remember_digest . "' WHERE id = '" . $id . "'";
        DB::update($query);
        return true;
    } 

    public static function check_remember_digest($remember_digest){
        $query = "SELECT * FROM users WHERE remember_digest = '" . $remember_digest . "'";
        $result = DB::select($query);
        if(!$result)
            return false;
        else
            return $result[0];

    } 

}
?>