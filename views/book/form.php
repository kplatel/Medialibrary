<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ajouter un livre</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-slate-50 min-h-screen flex items-center justify-center py-10">
        
        <main class="max-w-xl w-full mx-auto px-4">
           
           <!-- Carte principale centrée avec contour et fond blanc -->
           <div class="bg-white border border-slate-300 rounded-2xl shadow-sm p-6 sm:p-10">
              
              <!-- BANDEAU VERT DE SUCCÈS -->
              <?php if(isset($message) && !empty($message)): ?>
                 <div class="flex items-center text-emerald-800 text-sm font-medium bg-emerald-50 p-3.5 mb-6 rounded-md border border-emerald-300">
                    <svg class="shrink-0 inline w-5 h-5 me-2.5 text-emerald-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span><?php echo($message); ?></span>
                 </div>
              <?php endif; ?>

              <?php if(isset($error) && !empty($error)): ?>
                 <div class="text-red-600 text-sm font-medium bg-red-50 p-3.5 mb-6 rounded-md border border-red-200">
                    <?php echo($error); ?>
                 </div>
              <?php endif; ?>

              <div class="mb-8">
                 <h1 class="text-3xl font-bold text-slate-900 mb-2">Ajouter un livre</h1>
                 <p class="text-slate-600 text-base leading-relaxed">Renseignez les informations du livre pour l'ajouter au catalogue.</p>
              </div>

              <!-- Formulaire -->
              <form action="" method="post" class="space-y-6">
                 
                 <!-- Titre -->
                 <div>
                    <label for="bookTitle" class="mb-2 text-slate-900 font-medium text-sm inline-block">Titre</label>
                    <input type="text" id="bookTitle" name="bookTitle" placeholder="Les Misérables" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Auteur -->
                 <div>
                    <label for="bookAuthor" class="mb-2 text-slate-900 font-medium text-sm inline-block">Auteur</label>
                    <input type="text" id="bookAuthor" name="bookAuthor" placeholder="Victor Hugo" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Nombre de pages -->
                 <div>
                    <label for="pageNumber" class="mb-2 text-slate-900 font-medium text-sm inline-block">Nombre de pages</label>
                    <input type="number" id="pageNumber" name="pageNumber" placeholder="350" required
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Nom de l'image -->
                 <div>
                    <label for="image" class="mb-2 text-slate-900 font-medium text-sm inline-block">Nom de l'image (ex: book_1.jpg)</label>
                    <input type="text" id="image" name="image" placeholder="book_1.jpg"
                       class="px-3.5 py-2.5 text-sm text-slate-900 w-full rounded-md bg-white border border-slate-300 focus:outline-2 focus:outline-offset-2 focus:outline-blue-600" />
                 </div>

                 <!-- Disponibilité (Radios) -->
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

                 <!-- Boutons Ajouter et Retour côte à côte -->
                 <div class="pt-4 flex items-center gap-4">
                    <button type="submit"
                       class="flex-1 py-3 px-4 text-sm rounded-md font-semibold cursor-pointer text-white border border-blue-600 bg-blue-600 hover:bg-blue-700 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 text-center">
                       Ajouter le livre
                    </button>
                    <a href="/Bachelor/TP_2/Book/library" 
                       class="px-6 py-3 text-sm rounded-md font-semibold text-slate-700 bg-slate-200 hover:bg-slate-300 transition-all text-center">
                       Retour
                    </a>
                 </div>

              </form>
           </div>

        </main>

    </body>
</html>