<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Page de connexion</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-50 min-h-screen">
        
        <main class="min-h-screen flex flex-col items-center justify-center">
           <div class="py-4 px-4 md:px-8 w-full">
              <div class="grid items-center gap-6 max-w-6xl w-full lg:grid-cols-2 mx-auto">
                 
                 <!-- Formulaire de connexion -->
                 <div class="border border-slate-300 rounded-lg p-6 max-w-md w-full mx-auto shadow-sm md:p-8 lg:mx-0 bg-white">

                    <div class="mb-8">
                       <h1 class="text-slate-900 text-3xl font-bold mb-4">Connexion</h1>
                       <p class="text-slate-600 text-base leading-relaxed">Connectez-vous à votre compte pour accéder à votre tableau de bord.</p>
                    </div>

                    <!-- Formulaire PHP -->
                    <form action="/Bachelor/TP_2/User/login" method="post" class="space-y-6">
                       <div>
                          <label for="email" class="mb-2 text-slate-900 font-medium text-sm inline-block">Adresse e-mail</label>
                          <input type="email" id="email" name="email" placeholder="john@readymadeui.com" required
                             class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                       </div>

                       <div>
                          <label for="password" class="mb-2 text-slate-900 font-medium text-sm inline-block">Mot de passe</label>
                          <input type="password" id="password" name="password" placeholder="••••••••" required
                             class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                       </div>

                       <!-- Affichage dynamique du message PHP (erreur ou succès) -->
                       <?php if(isset($message)): ?>
                          <div class="text-red-600 text-sm font-medium bg-red-50 p-3 rounded-md border border-red-200">
                              <?php echo($message); ?>
                          </div>
                       <?php endif; ?>

                       <button type="submit"
                          class="w-full py-2.5 px-3.5 text-sm rounded-md font-semibold cursor-pointer tracking-wide text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all focus:outline-none">
                          Se connecter
                       </button>

                       <div class="text-slate-900 text-sm text-center">
                          Vous n'avez pas de compte ? <a href="/Bachelor/TP_2/User/signin" class="text-blue-700 hover:underline ml-1 font-medium">S'inscrire</a>
                       </div>
                    </form>
                 </div>

                 <!-- Illustration graphique sur le côté -->
                 <div class="aspect-[71/50] max-lg:w-4/5 mx-auto">
                    <img src="https://readymadeui.com/images/integration-illus.webp" class="w-full object-cover" alt="login illustration" />
                 </div>

              </div>
           </div>
        </main>

    </body>
</html>