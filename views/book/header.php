<header class="bg-white shadow-md px-8 py-4 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <img src="/Bachelor/TP_2/assets/img/book.png" alt="Icône Livre" class="w-8 h-8 object-contain">
        <span class="font-bold text-xl text-slate-800">Ma Médiathèque</span>
    </div>

    <div class="flex items-center gap-6">
        <?php if (isset($_SESSION['username'])): ?>
            <div class="flex items-center gap-2">
                <img src="/Bachelor/TP_2/assets/img/user.png" alt="Utilisateur" class="w-6 h-6 object-cover rounded-full">
                <span class="text-slate-700 font-semibold">
                    <?= htmlspecialchars($_SESSION['username']) ?>
                </span>
            </div>

            <a href="/Bachelor/TP_2/User/login" class="relative inline-block px-6 py-2.5 text-[14px] font-bold text-[#131313] bg-[#ecd448] border-2 border-white rounded-[12px] shadow-[0_2px_0_2px_#000] overflow-hidden cursor-pointer transition-all duration-300 hover:bg-[#4cc9f0] hover:text-white hover:shadow-[0_2px_0_2px_#0d3b66] active:scale-90 group">
                <span class="absolute top-1/2 left-0 w-[100px] h-[120%] bg-[#ff6700] -translate-x-[150%] -translate-y-1/2 skew-x-[30deg] transition-all duration-500 group-hover:translate-x-[150%] group-hover:transition-delay-100 pointer-events-none"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <img src="/Bachelor/TP_2/assets/img/logout.png" alt="Déconnexion" class="w-4 h-4 object-contain">
                    <span>Déconnexion</span>
                </span>
            </a>
        <?php else: ?>
            <a href="/Bachelor/TP_2/User/login" class="relative inline-block px-6 py-2.5 text-[14px] font-bold text-[#131313] bg-[#ecd448] border-2 border-white rounded-[12px] shadow-[0_2px_0_2px_#000] overflow-hidden cursor-pointer transition-all duration-300 hover:bg-[#4cc9f0] hover:text-white hover:shadow-[0_2px_0_2px_#0d3b66] active:scale-90 group">
                <span class="absolute top-1/2 left-0 w-[100px] h-[120%] bg-[#ff6700] -translate-x-[150%] -translate-y-1/2 skew-x-[30deg] transition-all duration-500 group-hover:translate-x-[150%] group-hover:transition-delay-100 pointer-events-none"></span>
                <span class="relative z-10 flex items-center gap-2">
                    <img src="/Bachelor/TP_2/assets/img/user.png" alt="Connexion" class="w-4 h-4 object-contain">
                    <span>Connexion</span>
                </span>
            </a>
        <?php endif; ?>
    </div>
</header>
<main class="py-8">