<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ajouter un film</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-50 min-h-screen flex items-center justify-center py-10">
        <main class="max-w-xl w-full mx-auto px-4">
           
           <div class="bg-white border border-slate-300 rounded-2xl shadow-sm p-6 sm:p-10">
              
              <!-- Messages de succès ou d'erreur -->
              <?php if(isset($message) && !empty($message)): ?>
                 <div class="flex items-center text-emerald-800 text-sm font-medium bg-emerald-50 p-3.5 mb-6 rounded-md border border-emerald-300">
                    <span><?php echo($message); ?></span>
                 </div>
              <?php endif; ?>

              <?php if(isset($error) && !empty($error)): ?>
                 <div class="text-red-600 text-sm font-medium bg-red-50 p-3.5 mb-6 rounded-md border border-red-200">
                    <?php echo($error); ?>
                 </div>
              <?php endif; ?>

              <div class="mb-8">
                 <h1 class="text-3xl font-bold text-slate-900 mb-2">Ajouter un film</h1>
                 <p class="text-slate-600 text-base leading-relaxed">Renseignez les informations du film pour l'ajouter au catalogue.</p>
              </div>

              <!-- Formulaire -->
              <form action="" method="post" class="space-y-6">
                 
                 <!-- Titre -->
                 <div>
                    <label for="movieTitle" class="mb-2 text-slate-900 font-medium text-sm inline-block">Titre du film</label>
                    <input type="text" id="movieTitle" name="movieTitle" placeholder="Inception" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Auteur / Réalisateur -->
                 <div>
                    <label for="movieDirector" class="mb-2 text-slate-900 font-medium text-sm inline-block">Réalisateur</label>
                    <input type="text" id="movieDirector" name="movieDirector" placeholder="Christopher Nolan" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Durée -->
                 <div>
                    <label for="duration" class="mb-2 text-slate-900 font-medium text-sm inline-block">Durée (ex: 2.28)</label>
                    <input type="number" step="0.01" id="duration" name="duration" placeholder="2.28" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Genre (Enum) -->
                 <div>
                    <label for="genre" class="mb-2 text-slate-900 font-medium text-sm inline-block">Genre du film</label>
                    <select id="genre" name="genre" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600">
                       <option value="">Sélectionnez un genre</option>
                       <option value="Science Fiction">Science Fiction</option>
                       <option value="Thriller">Thriller</option>
                       <option value="Comedy">Comedy</option>
                    </select>
                 </div>

                 <!-- Nom de l'image -->
                 <div>
                    <label for="image" class="mb-2 text-slate-900 font-medium text-sm inline-block">Nom de l'image (ex: movie_1.jpg)</label>
                    <input type="text" id="image" name="image" placeholder="movie_1.jpg"
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Disponibilité -->
                 <div class="pt-2">
                    <span class="text-slate-900 font-medium text-sm block mb-2">Disponible :</span>
                    <div class="flex items-center gap-6">
                       <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-700">
                          <input type="radio" id="yes" name="availability" value="yes" required class="accent-blue-600 w-4 h-4">
                          OUI
                       </label>
                       <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-700">
                          <input type="radio" id="no" name="availability" value="no" class="accent-blue-600 w-4 h-4">
                          NON
                       </label>
                    </div>
                 </div>

                 <!-- Boutons Ajouter et Retour -->
                 <div class="pt-4 flex items-center gap-4">
                    <button type="submit"
                       class="flex-1 py-3 px-4 text-sm rounded-md font-semibold cursor-pointer text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all text-center">
                       Ajouter le film
                    </button>
                    <a href="/Bachelor/TP_2/Movie/library" 
                       class="px-6 py-3 text-sm rounded-md font-semibold text-slate-700 bg-slate-200 hover:bg-slate-300 transition-all text-center">
                       Retour
                    </a>
                 </div>

              </form>
           </div>
        </main>
    </body>
</html>