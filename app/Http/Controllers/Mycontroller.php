<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\category_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Mycontroller extends Controller
{
    public function test($id)
    {
        return 'Hello';
    }

    public function register()
    {
        return view('/register/register');
    }

    public function register_data(Request $request)
    {
        $name = $request->input('user_name');
        $email = $request->input('user_email');
        $password = $request->input('user_confirm_password');
        // dd($name,$email,$password);
        $data = [
            'name' => $request->input('user_name'),
            'message' => 'kaise ho'
        ];
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        // Mail::to($request->input('user_email'))->send(new CustomEmail($data));
        // $message = "Data received in backend and Please verify your email  Thank You!";
        // // return redirect('/home');
        // return response()->json($message);
        // // return response()->json(['user'=>$user],201);
        return redirect('/login');
    }


    public function login()
    {
        return view('login.login');
    }

    public function login_data(Request $request)
    {
        $email = $request->input('user_email');
        $password = $request->input('user_password');
        // dd($email,$password);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            // $token = $user->createToken('mytoken')->plainTextToken;
            return redirect()->route('home');
            // return response()->json(['Token'=>$token]);
            // return response()->json(['message' => 'Success1']);
        } else {
            $message = "Wrong Credentials";
            return response()->json($message);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function Home()
    {
        $data = category::all();
        // dd($data);
        return view('Layout/Store_dashboard', compact('data'));
    }

    public function delete_category($id)
    {
        $category = category::find($id);
        if (!$category) {
            return redirect()->route('home')->with('error', 'Page not found');
        }
        $category->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }

    public function Add_product($id)
    {
        $category = category::findorFail($id);
        return view('add_product/add_product_form', compact('category'));
    }


    public function add_items(Request $request)
    {
        $data = $request->all();
        // dd($data);
        category_item::create([
            'name' => $request->p_name,
            'model' => $request->p_model,
            'category_id' => $request->category_id,
            'title' => $request->p_title,
            'short_desc' => $request->p_desc,
            'amount' => $request->p_amount,
        ]);
        return redirect('/');
    }

    public function View_product($id)
    {
        $category_items = category_item::where('category_id', $id)->get();
        $category_name = category::where('id', $id)->get('name');
        return view('category_view/category_view', compact('category_items', 'category_name'));
    }

    public function Back_from_category_view()
    {
        return redirect('/');
    }

    public function add_category()
    {
        return view('category_view/add_category');
    }

    public function add_category1(Request $request)
    {
        $data = $request->all();
        category::create([
            'name' => $request->category_name
        ]);
        return redirect('/');
    }


    public function Add_new_category(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Perform the search on the products table
        $data = category::where('name', 'like', "%{$query}%")
            ->get();

        // Return the filtered products as a response (view or JSON)
        return response()->json($data);
        // return view('Search_result.search_result',compact('data'));
    }
}


// ->orWhere('desc', 'like', "%{$query}%")