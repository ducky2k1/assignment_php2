
    <div class="boxcontent mt-[150px] w-full border-[1px] pb-[20px]">
        <form class="w-full m-auto px-[15px] py-[20px] border-black" action="./login.php?url=login" method="post">
            <h1 class="text-black w-full flex justify-center font-[500] text-[25px] text-white mb-[50px]">Đăng nhập</h1>

            <div class="form-group">
                <label class="font-normal sm:font-medium md:semibold text-[16px] text-white" for="">Email</label><br>
                <input type="text" name="email" value="" class="w-full h-[50px] border-solid border-[1px] border-[#37A9CD] rounded-[5px] p-[10px] focus:outline-none">
{{--                <span style="color: red;"><?= $errer['email'] ?? "" ?></span>--}}
            </div>
            <div class="form-group">
                <label class="font-normal sm:font-medium md:semibold text-[16px] text-white" for="">Password</label><br>
                <input type="password" name="password" value="" class="w-full h-[50px] border-solid border-[1px] border-[#37A9CD] rounded-[5px] p-[10px] focus:outline-none">
{{--                <span style="color: red;"><?= $errer['password'] ?? "" ?></span>--}}
            </div>
            <input type="submit" name="dang_nhap" value="Đăng nhập" class="h-[30px] md:h-[40px] lg:h-[50px] font-semibold text-[16px] border-none w-full bg-[#37A9CD] my-[15px] rounded-[5px] text-[#FFFFFF]">
        </form>
        <section class="w-full flex justify-between items-center m-auto">
            <a href="./login.php?url=qmk" class="font-semibold text-[14px]  w-full text-white text-center">Quên mật khẩu</a>
            <a href="./login.php?url=dk" class="font-semibold text-[14px]  w-full text-white text-center">Đăng kí thành viên</a>
        </section>
    </div>
