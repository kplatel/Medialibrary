<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Modifier un livre</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="min-h-screen bg-slate-100 p-10">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow-xl">
            
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 mb-6">Modifier un livre</h2>
            
            <form action="/Bachelor/TP_2/Book/updateProcess/<?= $book['book_id'] ?? '' ?>" method="post" class="space-y-5">
                
                <!-- Titre -->
                <div>
                    <label for="bookTitle" class="block text-sm font-medium text-slate-700 mb-1">Titre du livre :</label>
                    <input type="text" id="bookTitle" name="bookTitle" value="<?= htmlspecialchars($book['title'] ?? '') ?>" required 
                           class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Auteur -->
                <div>
                    <label for="bookAuthor" class="block text-sm font-medium text-slate-700 mb-1">Auteur :</label>
                    <input type="text" id="bookAuthor" name="bookAuthor" value="<?= htmlspecialchars($book['author'] ?? '') ?>" required 
                           class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Nombre de pages -->
                <div>
                    <label for="pageNumber" class="block text-sm font-medium text-slate-700 mb-1">Nombre de pages :</label>
                    <input type="number" id="pageNumber" name="pageNumber" value="<?= htmlspecialchars($book['page_number'] ?? $book['pageNumber'] ?? '') ?>" required 
                           class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-slate-700 mb-1">Image (ex: book_1.jpg) :</label>
                    <input type="text" id="image" name="image" value="<?= htmlspecialchars($book['imageMedia'] ?? '') ?>" required 
                           class="w-full px-4 py-2 border border-slate-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Disponibilité -->
                <div>
                    <span class="block text-sm font-medium text-slate-700 mb-2">Disponible :</span>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" id="yes" name="availability" value="yes" <?= (($book['is_available'] ?? 0) == 1) ? 'checked' : '' ?> class="text-indigo-600 focus:ring-indigo-500">
                            <span>OUI</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" id="no" name="availability" value="no" <?= (($book['is_available'] ?? 0) == 0) ? 'checked' : '' ?> class="text-indigo-600 focus:ring-indigo-500">
                            <span>NON</span>
                        </label>
                    </div>
                </div>

                <!-- Boutons Modifier et Retour côte à côte -->
                <div class="pt-4 flex items-center gap-4">
                    <button type="submit" class="flex-1 py-3 px-6 text-white font-bold bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition duration-200 text-center">
                        Modifier
                    </button>
                    <a href="/Bachelor/TP_2/Book/library" class="px-6 py-3 text-slate-700 font-semibold bg-slate-200 hover:bg-slate-300 rounded-xl transition duration-200 text-center">
                        Retour
                    </a>
                </div>

            </form>
        </div>
    </body>
</html>