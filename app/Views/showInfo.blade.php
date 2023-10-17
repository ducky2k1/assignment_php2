<div class="boxtitle">Tài khoản </div>
                  <div class="">
                      <div class="flex items-center  w-full justify-center">
                           <div class="w-[300px]">
                               <div class="bg-white  rounded-lg py-3">
                                   <div class="photo-wrapper p-2">
                                      <img class="w-32 h-32 rounded-full mx-auto" src="./public/img_upload/{{$img}}" alt="">
                                   </div>
                                    <div class="p-2">
                                        <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$fullname}}</h3>
                                       <table class="text-xs my-3">
                                           <tbody>
                                           <tr>
                                              <td class="px-2 py-2 text-gray-500 font-semibold">Address</td>
                                             <td class="px-2 py-2">{{$location}}</td>
                                           </tr>
                                           <tr>
                                               <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                               <td class="px-2 py-2">{{$email}}</td>
                                           </tr>
                                          <tr>
                                             <td class="px-2 py-2 text-gray-500 font-semibold">Account Type</td>
                                              <td class="px-2 py-2">{{$role}}</td>
                                          </tr>
                                          </tbody>
                                     </table>
                                  </div>
                               </div>
                          </div>
                       </div>
                       <a href="./login.php?url=edit" class="font-semibold text-[14px]  w-full flex justify-center my-[20px]">
                          <button class="bg-[#37A9CD] hover:bg-sky-700 rounded-[20px] w-[150px] h-[30px] text-white">Cập nhật thông tin</button>
                       </a>
                        @if (isset($_SESSION['login']) && ($_SESSION['login']['role']== "admin"))
                          <a href="./BE.php"
                                   class="font-semibold text-[14px]  w-full flex justify-center">
                                        <button class="bg-[#37A9CD] hover:bg-sky-700 rounded-[20px] w-[150px] h-[30px] text-white">
                                           Admin
                                        </button>
                          </a>
                        @endif