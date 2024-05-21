<x-app-layout>
    <x-slot name="header"></x-slot>

    <section class="update-profile">

        <h1 class="title">update profile</h1>
     
        <form action="" method="POST" enctype="multipart/form-data">
           <img src="{{ asset('/storage/'.$user['image']) }}" alt="">
           <div class="flex">
              <div class="inputBox">
                 <span>username :</span>
                 <input type="text" name="name" value="<?= $user['name']; ?>" placeholder="update username" required class="box">
                 <span>email :</span>
                 <input type="email" name="email" value="<?= $user['email']; ?>" placeholder="update email" required class="box">
                 <span>update pic :</span>
                 <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                 <input type="hidden" name="old_image" value="<?= $user['image']; ?>">
              </div>
              <div class="inputBox">
                 <input type="hidden" name="old_pass" value="<?= $user['password']; ?>">
                 <span>old password :</span>
                 <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                 <span>new password :</span>
                 <input type="password" name="new_pass" placeholder="enter new password" class="box">
                 <span>confirm password :</span>
                 <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
              </div>
           </div>
           <div class="flex-btn">
              <input type="submit" class="btn" value="update profile" name="update_profile">
              <a href="home.php" class="option-btn">go back</a>
           </div>
        </form>
     
     </section>

    <x-slot name="footer">

    </x-slot>
</x-app-layout>