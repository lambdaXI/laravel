<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\User;
use App\Test;
use \Session;

class TestController extends Controller
{
  public function test($id, $name) {
  echo "ton id : " . $id."<br>";
  echo "ton speudo : " . $name."<br>";
  echo route('test',['id'=>'5', 'name'=>'maxime']);
  }
  public function add($id) {
  echo "ton id : " . $id."<br>";
  }
  public function like($id) {
    $like = Session::get('like');
    $like[$id] = !$like[$id];
    Session::put('like', $like);
    if ($like[$id]) {
      Session::flash('success',"vous avez liker l' article".$id);
    }else {
      Session::flash('success',"vous avez disliker l' article".$id);
    }

  return redirect()->route('affiche');
  }
  public function etat(Test $id) {

  $id->etat = !$id->etat;
  $id->save();
  return redirect()->route('affiche');
  }
  public function affiche() {
    // $test1 = new Test();
    // $test1->titre = "test1";
    // $test1->content = "lordzqd zqd dqzd qzd zd zd qd";
    // $test2 = new Test();
    // $test2->titre = "test2";
    // $test2->content = "lordzfqzfz fqzf qzf fqfqz fqd";
    // $test1->save();
    // $test2->save();

    $test = Test::all();

    if (Session::has('like')) {
      $like =Session::get('like');
    }else {
      foreach ($test as $key) {
        $like[$key->id] = false;
      }
      Session::put('like', $like);
    }



  return view('test', [
      'testuser' => $test,
      'like' => $like,
    ]);
  }
}
