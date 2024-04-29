<div class="hidden md:flex items-center justify-center">
  <div class=" relative inline-block text-left dropdown">
    <span class="rounded-md shadow-sm"
      ><button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" 
       type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
        <span>Cuenta</span>
        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button
    ></span>
    <div class="hidden dropdown-menu">
      <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
        <div class="py-1">
          <a href="/?page=profile" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Perfil</a>
        </div>
        <div class="py-1">
            <form action="?page=login" method="post">
                <input type="hidden" name="action" value="logout">
                <button class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" type="submit">Logout</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>              

<style>
.dropdown:focus-within .dropdown-menu {
  /* @apply block; */
  display:block;
}
</style>

<li class="block md:hidden mx-4 my-6 md:my-0">
    <a href="/?page=profile" class="w-full  text-white font-bold text-l md:text-xl flex items-center hover:text-gray-300 pl-10 pr-10">Perfil</a>
</li>
<li class="block md:hidden mx-4 my-6 md:my-0">
    <form action="?page=login" method="post">
        <input type="hidden" name="action" value="logout">
        <button class="w-full  text-white font-bold text-l md:text-xl flex items-center hover:text-gray-300 pl-10 pr-10" type="submit">Logout</button>
    </form>
</li>