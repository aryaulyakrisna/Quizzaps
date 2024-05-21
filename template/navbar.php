
<header class="px-20 max-lg:px-4 h-[100px] flex fixed top-0 right-0 w-full justify-between items-center shadow-md z-1000 bg-[#1D232A]">
    <div class="navbar bg-base-100">
      <div class="navbar-start">
        <div class="drawer">
          <input id="my-drawer" type="checkbox" class="drawer-toggle" />
          <div class="drawer-content">

            <label for="my-drawer" class="w-[48px] h-[48px] flex justify-center items-center hover:bg-white/5 active:scale-90 transition-all rounded-full drawer-button"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#A6ADBB" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path></svg></label>
          </div> 
          <div class="drawer-side">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu px-8 pt-20 w-80 min-h-full bg-base-200 text-base-content">

              <li><a href="add-quiz.php" class="btn btn-primary poppins-semibold tracking-wide mb-4 h-16">Tambahkan <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M230.91,124A8,8,0,0,1,228,134.91l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,36,121.09l92,53.65,92-53.65A8,8,0,0,1,230.91,124ZM24,80a8,8,0,0,1,4-6.91l96-56a8,8,0,0,1,8.06,0l96,56a8,8,0,0,1,0,13.82l-96,56a8,8,0,0,1-8.06,0l-96-56A8,8,0,0,1,24,80Zm23.88,0L128,126.74,208.12,80,128,33.26ZM232,192H216V176a8,8,0,0,0-16,0v16H184a8,8,0,0,0,0,16h16v16a8,8,0,0,0,16,0V208h16a8,8,0,0,0,0-16Zm-92,23.76-12,7L36,169.09A8,8,0,0,0,28,182.91l96,56a8,8,0,0,0,8.06,0l16-9.33A8,8,0,1,0,140,215.76Z"></path></svg></a></li>
              <li><a href="dashboard.php" class="btn btn-primary poppins-semibold tracking-wide h-16 mb-4">
                Home
              </a></li>
              <div class="divider"></div>
              <li><a href="quizes.php" class="btn btn-ghost poppins-semibold tracking-wide mb-4">Daftar Quiz</a></li>
              <li><a href="quiz-results.php" class="btn btn-ghost poppins-semibold tracking-wide ">Hasil Quiz</a></li>

            </ul>
          </div>
        </div>
      </div>
      <div class="navbar-center">
        <a class="text-xl poppins-bold tracking-wide max-lg:text-lg">Quizzaps</a>
      </div>
      <div class="navbar-end">
        <button class="btn poppins-semibold tracking-wide max-lg:text-xs" onclick="my_modal_5.showModal()">Logout</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle flex items-center justify-center max-lg:px-8">
          <div class="modal-box p-10 max-lg:p-8 rounded-xl">
            <h3 class="poppins-bold text-xl">Logout!</h3>
            <p class="py-4 text-lg">Anda yakin untuk keluar?</p>
            <div class="modal-action">
              <form method="dialog">
                <button class="btn btn-primary mr-1">No</button>
              </form>
              <form action="logout.php" method="post">
                <input type="submit" value="Yes" class="btn btn-active btn-warning">
              </form>
            </div>
          </div>
        </dialog>
      </div>
    </div>
  </header>

