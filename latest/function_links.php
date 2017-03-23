<?php
//require ('../mysqli_connect.php');
class CV_Functions{
    public $id="";
    public $name="";
    public $username="";
    public $phone="";
    public $highlights="";
    public $email="";
    public $about="";
    public $official=array();
    public $freelancer=array();

    function search_cv($dbc,$query){
        $str=array();
        $q="SELECT * FROM personal_data WHERE name LIKE '%$query%'";
        $r=mysqli_query($dbc,$q);
        //  echo mysqli_num_rows($r);
        while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $this->name=$row['name'];
            $this->username=$row['username'];
            //  $this->id=$row['íd'];
            $this->branch=branch_check($this->id);
            //var_dump($this);
            $abc=json_encode($this);
            // echo $abc;
            array_push($str,$abc);
        }
        $ans_array='[';
        for($i=0;$i<count($str);$i++){
            $ans_array.=$str[$i];
            if($i!=count($str)-1){
                $ans_array.=',';
            }
        }
        $ans_array.=']';
        echo $ans_array;
    }
    function show_cv($dbc,$username){
        $str="";
        $q="SELECT * FROM cv_data WHERE username='$username'";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $this->username=$row['username'];
            $this->highlights=$row['highlights'];
            $this->email=$row['email'];
            $this->about=$row['about'];
            $official=json_decode($row['official']);
            for($i=0;$i<count($official);$i++){
                array_push($this->official,$official[$i]);
            }
            $freelancer=json_decode($row['freelancer']);
            for($i=0;$i<count($freelancer);$i++){
                array_push($this->freelancer,$freelancer[$i]);
            }
            $usr=$this->username;
            $q="SELECT * from personal_data WHERE username='$usr'";
            $r=mysqli_query($dbc,$q);
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
                $this->name=$row['name'];
                $this->phone=$row['phone'];
            }
            //$this->name="Student's Union";
            $this->branch="CSE";
        }
        //echo $this->username;

        $str=json_encode($this);
        echo $str;
    }


}
function branch_check($id){
    return $id;
}
$cv=new CV_Functions();
?>