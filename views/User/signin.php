<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Page d'inscription</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-50 min-h-screen">
        
        <main class="min-h-screen flex flex-col items-center justify-center">
           <div class="py-4 px-4 md:px-8 w-full">
              <div class="grid items-center gap-6 max-w-6xl w-full lg:grid-cols-2 mx-auto">
                 
                 <!-- Formulaire d'inscription -->
                 <div class="border border-slate-300 rounded-lg p-6 max-w-md w-full mx-auto shadow-sm md:p-8 lg:mx-0 bg-white">

                    <div class="mb-6">
                       <h1 class="text-slate-900 text-3xl font-bold mb-2">Inscription</h1>
                       <p class="text-slate-600 text-base leading-relaxed">Créez votre compte pour commencer.</p>
                    </div>

                    <!-- Formulaire pointant vers ton action -->
                    <form action="/Bachelor/TP_2/User/signin" method="post" class="space-y-4">
                       
                       <!-- Nom d'utilisateur -->
                       <div>
                          <label for="username" class="mb-1 text-slate-900 font-medium text-sm inline-block">Nom d'utilisateur</label>
                          <input type="text" id="username" name="username" placeholder="john_doe" required
                             class="px-3 py-2 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                       </div>

                       <!-- Adresse e-mail -->
                       <div>
                          <label for="email" class="mb-1 text-slate-900 font-medium text-sm inline-block">Adresse e-mail</label>
                          <input type="email" id="email" name="email" placeholder="john@readymadeui.com" required
                             class="px-3 py-2 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                       </div>

                       <!-- Mot de passe -->
                       <div>
                          <label for="password" class="mb-1 text-slate-900 font-medium text-sm inline-block">Mot de passe</label>
                          <input type="password" id="password" name="password" placeholder="••••••••" required
                             class="px-3 py-2 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                       </div>

                       <!-- Affichage dynamique du message (ex: succès) -->
                       <?php if(isset($message) && !empty($message)): ?>
                          <div class="text-emerald-600 text-sm font-medium bg-emerald-50 p-3 rounded-md border border-emerald-200">
                              <?php echo($message); ?>
                          </div>
                       <?php endif; ?>

                       <!-- Affichage dynamique de l'erreur -->
                       <?php if(isset($error) && !empty($error)): ?>
                          <div class="text-red-600 text-sm font-medium bg-red-50 p-3 rounded-md border border-red-200">
                              <?php echo($error); ?>
                          </div>
                       <?php endif; ?>

                       <!-- Bouton de soumission -->
                       <button type="submit"
                          class="w-full py-2.5 px-3.5 text-sm rounded-md font-semibold cursor-pointer tracking-wide text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all focus:outline-none mt-2">
                          S'inscrire
                       </button>

                       <!-- Lien de redirection vers la connexion -->
                       <div class="text-slate-900 text-sm text-center mt-4">
                          Vous avez déjà un compte ? <a href="/Bachelor/TP_2/User/login" class="text-blue-700 hover:underline ml-1 font-medium">Se connecter</a>
                       </div>
                    </form>
                 </div>

                 <!-- Illustration graphique sur le côté -->
                 <div class="aspect-[71/50] max-lg:w-4/5 mx-auto">
                    <img src="https://readymadeui.com/images/integration-illus.webp" class="w-full object-cover" alt="register illustration" />
                 </div>

              </div>
           </div>
        </main>

    </body>
</html>