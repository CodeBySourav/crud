<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_submit;
use DB;

class UserController extends Controller
{
    public function user_submit_post(Request $request){
        $user_submit = new User_submit;

        if($request->hasfile('image'))
        {
           $file = $request->file('image');
           $exten = $file->getClientOriginalExtension();
           $filename = date('YmdHi').".".$exten;
           $file->move(public_path('public/Image'),$filename);
           $user_submit->image = $filename;
       }

        $user_submit->name = $request['name'];
        $user_submit->rollno = $request['roll_no'];
        $user_submit->phone_no = $request['phone_no'];
        $user_submit->save();


        return redirect('deshboard')->with(['message' => 'new data created', 'status' => true]);

    }

    public function load_all_data(){
        $output="";
        
        $products=DB::table('table_user')->get();

        if($products)
        {
        foreach ($products as $key => $data) {
            
            $output.='<tr>
                <td scope="row">'.$data->name.'</td>
                <td>'.$data->rollno.'</td>
                <td>'.$data->phone_no.'</td>
                <td> <a href="'.url('public/Image/'.$data->image).'"> <img src="'.url('public/Image/'.$data->image).'" style="height: 80px; width:100px;" alt="image"></a> </td>

                <td><a data-userupdate-id="'.route('update.name',['id'=> $data->id]).'" id="edit-button" href="javascript:void(0)" > <button style="margin-top:2px;" class="edit-btn">Edit</button></a></td>
                <td><a data-userdelete-id="'.route('user_delete.name',['id'=> $data->id]).'" id="delete-button" href="javascript:void(0)"><button class="btn btn-danger">delete</button></a></td>
            
            </tr>';
         
        }
        return $output;
        }
        }

        public function user_delete($id){
            $findid = User_submit::find($id);
            if(!is_null($findid)){
                $findid->delete(); 
            }
            return 1 ; 
        }
        public function update($id){
            $datafinder = User_submit::find($id);

            return $datafinder ;
        }

        public function update_user_data(Request $request){
         
            $id = $request['id'];
    
            $data = User_submit::find($id);
            $data->name = $request->input('uname');
            $data->rollno = $request->input('uroll_no');
            $data->phone_no = $request->input('uphone_no');
            $data->update();
    
            return 1;
    
        }
}


