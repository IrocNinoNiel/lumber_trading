@extends('layouts.homeApp')

@include('inc.message')
@section('content')
<div class="container">
    <h2>My Account</h2>
    <div class="account-info">

        <div class="profile">
            @if (Auth::user()->user_img == '')
                <img src="{{asset('css/profile/anon.jpg')}}" style="position: absolute;
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    top: 20px;
                    left: 35px;
                    background-size: cover;
                    border-radius: 5px;
                ">
            @else
                <img src="{{asset('css/profile/'.Auth::user()->user_img)}}" style="position: absolute;
                    position: absolute;
                    width: 100px;
                    height: 100px;
                    top: 20px;
                    left: 35px;
                    background-size: cover;
                    border-radius: 5px;
                ">
            @endif
        </div>
        <label
        style="position: absolute;
        width: 120px;
        height: 21px;
        left: 230px;
        top: 150px;
        color: white;">{{ Auth::user()->name }}</label>


        <button style="position: absolute;
        width: 118px;
        height: 35px;
        left: 400px;
        top:150px;
        background-color: white;
        color: #474646;
        border-style: none;
        border-radius: 5px;"
        id="myBtn1">Upload photo</button>


        <div class="user-details">

            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left:40px;
            top: 15px;">User Name</label>

            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left: 40px;
            top: 45px;
            font-weight: bold;
            font-size: 16px;
            ">{{ Auth::user()->username }}</label>

            <label
            style="position: absolute;
            width: 170px;
            height: 21px;
            left:40px;
            top: 100px;">Contact Number</label>


            <label
            style="position: absolute;
            width: 120px;
            height: 21px;
            left: 40px;
            top: 125px;
            font-weight: bold;
            font-size: 16px;
            ">{{ Auth::user()->contact_number }}</label>

            <button style="position: absolute;
            width: 110px;
            height: 30px;
            left: 300px;
            top:45px;
            background-color: #0077B6;
            color: white;
            border-style: none;
            border-radius: 5px;"
            id="myBtn">Edit</button>


        </div>

        <button style="position: absolute;
        width: 150px;
        height: 35px;
        left:650px;
        top:400px;
        background-color: #0077B6;
        color: white;
        border-style: none;
        border-radius: 5px;" 
        id="myBtn2">Change password</button>

        <button style="position: absolute;
        width: 150px;
        height: 35px;
        left:1000px;
        top:400px;
        background-color: white;
        border: 1px solid #2A2828;;
        border-radius: 5px;" >Delete account</button>

        <form action="{{ route('profile.destroy', Auth::user()->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this Account?');"  
            style="position: absolute;
                width: 150px;
                height: 35px;
                left:1000px;
                top:400px;
                background-color: white;
                border: 1px solid #2A2828;;
                border-radius: 5px;">
        </form>

    </div>

    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            

            <form action="{{route('profile.editbasicinfo',Auth::user()->id)}}" method="POST">
                @csrf
                <div class="container-profile">
                    <h3>Edit Account Information</h3>
                    <hr>
                
                    <label for="name"><b>Name</b></label>
                    <input class="inputText" type="text" placeholder="Enter Name" name="name" id="name"  value="{{Auth::user()->name}}" required>

                    <label for="email"><b>Email</b></label>
                    <input class="inputText" type="text" placeholder="Enter Email" name="email" id="email" value="{{Auth::user()->email}}" required>

                    <label for="email"><b>Username</b></label>
                    <input class="inputText" type="text" placeholder="Enter Username" name="username" id="username" value="{{Auth::user()->username}}" required>
                    
                    <label for="email"><b>Contact Number</b></label>
                    <input class="inputText" type="text" placeholder="Enter Contact Number" name="contact_number" id="contact_number" value="{{Auth::user()->contact_number}}" required>
                    
                    <label for="address"><b>Address</b></label>
                    <input class="inputText" type="text" placeholder="Enter Address" name="address" id="address" value="{{Auth::user()->address}}" required>
                
                    <button type="submit" class="editbtn">Edit</button>
                </div>
            </form>
        </div>
      
    </div>

    <!-- The Modal for photo-->
    <div id="myModal1" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{route('profile.imageuploadpost',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container-profile">
                    <h3>Edit Profile Picture</h3>
                    <hr>
                
                    <label for="name"><b>Image</b></label>
                    <input class="inputText" type="file" placeholder="Choose Profile Picture" name="image" id="image" accept="image/png, image/jpeg" required>

                    <button type="submit" class="editbtn">Edit Picture</button>
                </div>
            </form>
        </div>
    </div>

     <!-- The Modal for change password-->
     <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{route('profile.changepassword',Auth::user()->id)}}" method="POST">
                @csrf
                <div class="container-profile">
                    <h3>Change Password</h3>
                    <hr>
                
                    <label for="name"><b>Enter Old Password</b></label>
                    <input class="inputPassword" type="password" placeholder="Enter Old Password" name="oldpassword" id="oldpassword" required>

                    <label for="name"><b>Enter New Password</b></label>
                    <input class="inputPassword" type="password" placeholder="Enter New Password" name="newpassword" id="newpassword" required>

                    <label for="name"><b>Re enter New Password</b></label>
                    <input class="inputPassword" type="password" placeholder="Enter New Password" name="newpassword1" id="newpassword1" required>

                    <button type="submit" class="editbtn">Change Password</button>
                </div>
            </form>
        </div>
    </div>

</div>


<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var modal1 = document.getElementById("myModal1");
    var modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var btn1 = document.getElementById("myBtn1");
    var btn2 = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span1 = document.getElementsByClassName("close")[1];
    var span2 = document.getElementsByClassName("close")[2];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    btn1.onclick = function() {
        modal1.style.display = "block";
    }

    btn2.onclick = function() {
        modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    span1.onclick = function() {
        modal1.style.display = "none";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        } else if (event.target == modal1) {
            modal1.style.display = "none";
        } else if (event.target == modal2) {
            modal1.style.display = "none";
        }
    }
</script>
@endsection
